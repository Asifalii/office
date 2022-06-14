<?php


class ControlPanel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'um');
		$this->load->model('Admin_model', 'am');
		$this->load->model('General_model', 'gm');
		$this->load->library('session');
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login_user()
	{
		$this->form_validation->set_rules('user_email', 'Email', 'required');
		$this->form_validation->set_rules('user_password', 'Password', 'required');

		if ($this->form_validation->run() == true) {
			$login = $this->um->login_user();
			if ($login) {
				$this->session->set_userdata('user_email', $login['user_email']);
				$this->session->set_userdata('user_name', $login['user_name']);
				$this->session->set_userdata('user_id', $login['user_id']);
				$data['title'] = 'Newspaperlinks » Admin Panel';
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error_msg', 'Wrong Credentials! Please try again');
				redirect('admin_login');
			}
		} else {
			$this->session->set_flashdata('error_msg', 'Please Type your credentials');
			redirect('admin_login');
		}

	}

	public function dashboard()
	{
		$data['title'] = 'Newspaperlinks » Admin Panel';
		$this->load->view('admin/cp', $data);
	}

	public function pending_item()
	{
		$data['title'] = 'Newspaperlinks » Pending Item';
		$data['result'] = $this->am->getValuesByTable('client_data');
		$this->load->view('admin/pending', $data);
	}

	public function approve_item($id)
	{
		if (empty($id)) {
			return false;
		}

		$data['title'] = 'Newspaperlinks » Approve Item';
		$data['result'] = $this->gm->getSingleRow('client_data', $id);
		$data['countryList'] = $this->cache->get('country_list');
		if (empty($data['countryList'])) {
			$data['countryList'] = array_column($this->gm->getCountryList(), 'lang');
			$this->cache->save('country_list', $data['countryList']);
			$data['countryList'] = $this->cache->get('country_list');
		}

		$this->load->view('admin/approve', $data);
	}

	public function approve()
	{
		$input = $this->input->post(null, true);
		$itemId = $input['id'];
		$this->form_validation->set_rules('cat', 'Item Category', 'required');
		$this->form_validation->set_rules('title', 'Item Title', 'required');
		$this->form_validation->set_rules('lang', 'Origin', 'required');
		$this->form_validation->set_rules('link', 'URL', 'required|valid_url|is_unique[details.link]');

		if ($this->form_validation->run() == true) {
			$this->db->trans_begin();

			$this->db->set('status', 1);
			$this->db->where('id', $input['id']);
			$this->db->update('client_data');

			unset($input['id']);

			$this->db->insert('details', array_filter($input));

			if ($this->db->trans_status() == false) {
				$this->db->trans_rollback();
				$data['message'] = '<span class="text-danger">Data Approve Failed</span>';
			} else {
				$this->db->trans_commit();
				$data['message'] = '<span class="text-success">Data Approve Successful</span>';
				$this->cache->delete('item_list');
				$result = $this->am->getValuesByTable('details');
				$this->cache->save('item_list', $result);
			}

			$data['countryList'] = $this->cache->get('country_list');
			if (empty($data['countryList'])) {
				$data['countryList'] = array_column($this->gm->getCountryList(), 'lang');
				$this->cache->save('country_list', $data['countryList']);
				$data['countryList'] = $this->cache->get('country_list');
			}

			$data['title'] = 'Newspaperlinks » Pending Item';
			$data['result'] = $this->am->getValuesByTable('client_data');
			$this->load->view('admin/pending', $data);
		} else {
			$data['title'] = 'Newspaperlinks » Approve Item';
			$data['result'] = $this->gm->getSingleRow('client_data', $itemId);
			$data['countryList'] = $this->cache->get('country_list');
			if (empty($data['countryList'])) {
				$data['countryList'] = array_column($this->gm->getCountryList(), 'lang');
				$this->cache->save('country_list', $data['countryList']);
				$data['countryList'] = $this->cache->get('country_list');
			}
			$this->load->view('admin/approve', $data);
		}

	}

	public function item_list()
	{
		$data['title'] = 'Newspaperlinks » Item List';
		$this->load->view('admin/list', $data);
	}

	public function get_items()
	{
		$postData = $this->input->post();
		$data = $this->am->getItem($postData);
		echo json_encode($data);
	}

	public function add_item()
	{
		$data['countryList'] = $this->cache->get('country_list');
		if (empty($data['countryList'])) {
			$data['countryList'] = array_column($this->gm->getCountryList(), 'lang');
			$this->cache->save('country_list', $data['countryList']);
			$data['countryList'] = $this->cache->get('country_list');
		}
		$data['title'] = 'Newspaperlinks » Add Item';
		$this->load->view('admin/add', $data);
	}

	public function saveData()
	{
		$input = $this->input->post(null, true);

		$this->form_validation->set_rules('cat', 'Item Category', 'required');
		$this->form_validation->set_rules('title', 'Item Title', 'required');
		$this->form_validation->set_rules('lang', 'Origin', 'required');
		$this->form_validation->set_rules('link', 'URL', 'required|valid_url|is_unique[details.link]');

		if ($this->form_validation->run() == true) {
			$data['message'] = '<span class="text-success">Data Saved Successfully</span>';
			$this->db->insert('details', array_filter($input));
			$id = $this->db->insert_id();

			if (!empty($id)) {
				$this->cache->delete('item_list');
				$result = $this->am->getValuesByTable('details');
				$this->cache->save('item_list', $result);

				$file = $this->_fileUpload($id);
				$favicon = $this->_faviconUpload($id);

				if (!empty($favicon)) {
					$this->db->set('favicon', $favicon);
				}

				$this->db->set('img', $file);
				$this->db->where('id', $id);
				$this->db->update('details');
			}
		}

		$data['countryList'] = array_column($this->gm->getCountryList(), 'lang');
		$data['title'] = 'Newspaperlinks » Add Item';
		$this->load->view('admin/add', $data);
	}

	private function _fileUpload($id)
	{
		$file_path = '';
		if ($_FILES['image']['name']) {
			// Build file upload path
			if (empty($id)) {
				return FALSE;
			}

			$dir_path = $this->config->item('UPLOAD_ROOT_DIR');
			make_dir($dir_path, 777);
			$upload_path = $this->config->item('UPLOAD_ROOT_DIR');

			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = $this->config->item('ALLOWED_FILE_TYPE');
			$config['max_size'] = $this->config->item('MAX_ALLOWED_FILE_SIZE');
			$config['overwrite'] = FALSE;
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')) {
				echo $this->upload->display_errors('<div class="msg-error close">', '</div>');
				return FALSE;
			} else {
				$data = array('upload_data' => $this->upload->data());
				$file_path .= $upload_path . $data['upload_data']['file_name'];
				$data['org_file_path'] = $file_path;
				return $data['upload_data']['file_name'];
			}
		}
	}

	private function _faviconUpload($id)
	{
		$file_path = '';
		if ($_FILES['favicon']['name']) {
			// Build file upload path
			if (empty($id)) {
				return FALSE;
			}

			$dir_path = $this->config->item('UPLOAD_ROOT_DIR');
			make_dir($dir_path, 777);
			$upload_path = $this->config->item('UPLOAD_ROOT_DIR');

			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = $this->config->item('ALLOWED_FILE_TYPE');
			$config['max_size'] = $this->config->item('MAX_ALLOWED_FILE_SIZE');
			$config['overwrite'] = FALSE;
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('favicon')) {
				echo $this->upload->display_errors('<div class="msg-error close">', '</div>');
				return FALSE;
			} else {
				$data = array('upload_data' => $this->upload->data());
				$file_path .= $upload_path . $data['upload_data']['file_name'];
				$data['org_file_path'] = $file_path;
				return $data['upload_data']['file_name'];
			}
		}
	}

	public function edit_item($id)
	{
		if (empty($id)) {
			return false;
		}

		$data['title'] = 'Newspaperlinks » Edit Item';
		$data['result'] = $this->gm->getSingleRow('details', $id);
		$data['countryList'] = $this->cache->get('country_list');
		if (empty($data['countryList'])) {
			$data['countryList'] = array_column($this->gm->getCountryList(), 'lang');
			$this->cache->save('country_list', $data['countryList']);
			$data['countryList'] = $this->cache->get('country_list');
		}

		$this->load->view('admin/edit', $data);
	}

	public function update_item()
	{
		$input = $this->input->post(null, true);
		$item = $input['id'];
		$this->form_validation->set_rules('cat', 'Item Category', 'required');
		$this->form_validation->set_rules('title', 'Item Title', 'required');
		$this->form_validation->set_rules('lang', 'Origin', 'required');
		$this->form_validation->set_rules('link', 'URL', 'required|valid_url');

		if ($this->form_validation->run() == true) {
			$this->db->trans_begin();

			unset($input['id']);

			$file = $this->_fileUpload($item);
			$favicon = $this->_faviconUpload($item);

			if (!empty($favicon)) {
				$input['favicon'] = $favicon;
			}

			if (!empty($file)) {
				$input['img'] = $file;
			}

			$data['recover_status'] = 1;
			$this->db->where('id', $item);
			$this->db->update('details', array_filter($input));

			if ($this->db->trans_status() == false) {
				$this->db->trans_rollback();
				$data['message'] = '<span class="text-danger">Data Update Failed</span>';
			} else {
				$this->db->trans_commit();
				$data['message'] = '<span class="text-success">Data Update Successful</span>';
				$this->cache->delete('item_list');
				$result = $this->am->getValuesByTable('details');
				$this->cache->save('item_list', $result);
			}
		}

		$data['title'] = 'Newspaperlinks » Edit Item';
		$data['result'] = $this->gm->getSingleRow('details', $item);
		$data['countryList'] = $this->cache->get('country_list');
		if (empty($data['countryList'])) {
			$data['countryList'] = array_column($this->gm->getCountryList(), 'lang');
			$this->cache->save('country_list', $data['countryList']);
			$data['countryList'] = $this->cache->get('country_list');
		}

		$this->load->view('admin/edit', $data);
	}


	public function user_logout()
	{
		$this->session->sess_destroy();
		redirect('admin_login', 'refresh');
	}

	public function upload($country)
	{
		$fileName = 'public/excel/' . $country . '.xlsx';
		$this->load->library('Excel');

		$objPHPExcel = PHPExcel_IOFactory::load($fileName);
		$data = $objPHPExcel->getActiveSheet()->toArray(null, true, true, false);

		$data = array_map('array_filter', $data);
		$data = array_filter($data);

		unset($data[0]);
		if (!empty($data)) {
			$this->db->trans_begin();
			foreach ($data as $row) {
				$info = $this->gm->getSingleRowByField('details', 'link', trim($row[0]));
			
				if (!empty($info)) {
					$update = [];
					$update['link'] = !empty($row[0]) ? trim($row[0]) : '';
					$update['title'] = !empty($row[1]) ? trim($row[1]) : '';
					$update['lang'] = !empty($row[2]) ? trim($row[2]) : '';
					$update['cat'] = !empty($row[3]) ? trim($row[3]) : '';;
					$update['img'] = !empty($row[4]) ? trim($row[4]) : '';;
					$update['favicon'] = !empty($row[5]) ? trim($row[5]) : '';
					$this->db->where('id', $info['id']);
					$this->db->update('details', array_filter($update));
				} else {
					$insert = [];
					$insert['link'] = !empty($row[0]) ? trim($row[0]) : '';
					$insert['title'] = !empty($row[1]) ? trim($row[1]) : '';
					$insert['lang'] = !empty($row[2]) ? trim($row[2]) : '';
					$insert['cat'] = !empty($row[3]) ? trim($row[3]) : '';;
					$insert['img'] = !empty($row[4]) ? trim($row[4]) : '';;
					$insert['favicon'] = !empty($row[5]) ? trim($row[5]) : '';
					$this->db->insert('details', array_filter($insert));
				}
			}
			if ($this->db->trans_status() == false) {
				$this->db->trans_rollback();
				echo 'Failed';
			} else {
				$this->db->trans_commit();
				echo 'Success';
				$this->cache->delete('item_list');
				$result = $this->am->getValuesByTable('details');
				$this->cache->save('item_list', $result);
			}
		}
	}
	
	public function title()
	{
		$this->db->select('*')->from('details')
			->where('title = ""')
			->or_where('title IS null');
			//->limit(15);
		$result = $this->db->get()->result_array();
		
		if (!empty($result)) {
			foreach ($result as $item) {
				echo $item['link'].'<br>';

			}
		} else {
			echo 'empty';
		}
	}
	
	public function missing($country)
	{
		$country = str_replace("_", " ", $country);
		ini_set('max_execution_time', '0');
		$this->db->select('*')->from('details')
			->where('lang', $country);
		$result = $this->db->get()->result_array();

		foreach ($result as $row) {
			$path = 'https://newspaperlinks.xyz/public/images/' . $row['img'];
			if ($this->is_webUrl($path) !== true) {
				if ($row['link']) {
					$host = parse_url($row['link']);
					$imgName = str_replace('www', '', $host['host']) . rand(10, 100) . '.jpg';

					echo 'pageres ' . $row['link'] . ' 1280x800 --format=jpg --filename="public/img/' . str_replace(".jpg", "", $imgName) . '" 400x200 --crop';
					echo '<br>';
					$this->db->set('img', $imgName);
					$this->db->where('id', $row['id']);
					$this->db->update('details');
				}
			}
		}
	}

	public function is_webUrl($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		// don't download content
		curl_setopt($ch, CURLOPT_NOBODY, 1);
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		if (curl_exec($ch) !== FALSE) {
			return true;
		} else {
			return false;
		}
	}
}
