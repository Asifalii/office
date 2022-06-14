<?php


class NewspaperList extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		ini_set('max_execution_time', 3600);
		$this->load->model('General_model', 'gm');
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	}

	public function index()
	{
		$data = [];
		$data['title'] = 'Newspaperlinks';
		$data['countryList'] = $this->cache->get('country_list');

		if (empty($data['countryList'])) {
			$data['countryList'] = array_column($this->gm->getCountryList(), 'lang');
			$this->cache->save('country_list', $data['countryList']);
			$data['countryList'] = $this->cache->get('country_list');
		}

		$data['meta_data'] = '';
		$data['keyword'] = implode(',', $data['countryList']) . ',';
		$this->load->view('home_page', $data);
	}

	public function getNewspaperByCountry($country)
	{
		$country = str_replace("_", " ", $country);
		$data = [];
		$data['title'] = ucfirst($country) . ' Newspapers';
		$data['country'] = $country;
		$data['paperList'] = $this->gm->getNewsPaperByCountry($country);
		$data['countryList'] = $this->cache->get('country_list');
		if (empty($data['countryList'])) {
			$data['countryList'] = array_column($this->gm->getCountryList(), 'lang');
			$this->cache->save('country_list', $data['countryList']);
			$data['countryList'] = $this->cache->get('country_list');
		}

		$data['meta_data'] = $country . ' Newspapers. ';
		$data['keyword'] = $country . ',';

		$this->load->view('list', $data);
	}

	public function privacy()
	{
		$data['countryList'] = $this->cache->get('country_list');
		if (empty($data['countryList'])) {
			$data['countryList'] = array_column($this->gm->getCountryList(), 'lang');
			$this->cache->save('country_list', $data['countryList']);
			$data['countryList'] = $this->cache->get('country_list');
		}
		$data['title'] = 'Newspaperlinks » Privacy Policy';
		$this->load->view('privacy_policy', $data);
	}

	public function disclaimer()
	{
		$data['countryList'] = $this->cache->get('country_list');
		if (empty($data['countryList'])) {
			$data['countryList'] = array_column($this->gm->getCountryList(), 'lang');
			$this->cache->save('country_list', $data['countryList']);
			$data['countryList'] = $this->cache->get('country_list');
		}
		$data['title'] = 'Newspaperlinks » Disclaimer';
		$this->load->view('disclaimer', $data);
	}

	public function contact()
	{
		$data['countryList'] = $this->cache->get('country_list');
		if (empty($data['countryList'])) {
			$data['countryList'] = array_column($this->gm->getCountryList(), 'lang');
			$this->cache->save('country_list', $data['countryList']);
			$data['countryList'] = $this->cache->get('country_list');
		}
		$data['title'] = 'Newspaperlinks » Contact Us';
		$this->load->view('contact', $data);
	}

	function ip_visitor_country()
	{
		$client = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote = $_SERVER['REMOTE_ADDR'];
		$country = "Unknown";

		if (filter_var($client, FILTER_VALIDATE_IP)) {
			$ip = $client;
		} elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
			$ip = $forward;
		} else {
			$ip = $remote;
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=" . $ip);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$ip_data_in = curl_exec($ch); // string
		curl_close($ch);

		$ip_data = json_decode($ip_data_in, true);
		$ip_data = str_replace('&quot;', '"', $ip_data); // for PHP 5.2 see stackoverflow.com/questions/3110487/

		if ($ip_data && $ip_data['geoplugin_countryName'] != null) {
			$country = $ip_data['geoplugin_countryName'];
		}

		if ($country == 'France') {
			$country = 'French';
		}

		return ($country == 'Unknown') ? 'Bangladesh' : $country;
	}

	public function submit()
	{
		$data['countryList'] = $this->cache->get('country_list');
		if (empty($data['countryList'])) {
			$data['countryList'] = array_column($this->gm->getCountryList(), 'lang');
			$this->cache->save('country_list', $data['countryList']);
			$data['countryList'] = $this->cache->get('country_list');
		}
		$data['title'] = 'Newspaperlinks » Submit Newspaper';
		$this->load->view('submit', $data);
	}

	public function submitPaper()
	{
		$input = $this->input->post(null, true);

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('paper_name', 'Newspaper Name', 'required|is_unique[client_data.id.paper_name]');
		$this->form_validation->set_rules('paper_url', 'Newspaper Full URL', 'required|valid_url|is_unique[client_data.paper_url]');


		if ($this->form_validation->run() == true) {
			$data['message'] = '<span class="text-success">Your submission is successful, Thanks.</span>';
			$this->db->insert('client_data', array_filter($input));
			$id = $this->db->insert_id();

			if (!empty($id)) {
				$file = $this->_fileUpload($id);

				$favicon = $this->_faviconUpload($id);

				if (!empty($favicon)) {
					$this->db->set('favicon', $favicon);
				}

				$this->db->set('image', $file);
				$this->db->where('id', $id);
				$this->db->update('client_data');
			}
		}

		$data['countryList'] = $this->cache->get('country_list');
		if (empty($data['countryList'])) {
			$data['countryList'] = array_column($this->gm->getCountryList(), 'lang');
			$this->cache->save('country_list', $data['countryList']);
			$data['countryList'] = $this->cache->get('country_list');
		}
		$data['title'] = 'Newspaperlinks » Submit Newspaper';
		$this->load->view('submit', $data);
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

	public function newsList()
	{
		$data = [];
		$data['title'] = 'Newspaperlinks » Latest News';
		$data['meta_data'] = 'Latest news of all over the world';
		$data['keyword'] = 'Latest news, world news, today news';
		$this->load->view('news_list', $data);
	}
	
	public function saveFavicon()
	{
		$this->db->select('*')->from('details')
			->where('favicon IS NULL')
			->limit(50);
		$result = $this->db->get()->result_array();
		
		//printView($result);
		//die;

		if (!empty($result)) {
			foreach ($result as $item) {
				$values = parse_url($item['link']);
				$host = explode('.', $values['host']);
				$faviconName = $item['lang'] . '_' . $host[1] . '_favicon.png';
				$url = 'https://www.google.com/s2/favicons?domain=' . $item['link'];
				$img = 'public/images/' . strtolower($faviconName);
				file_put_contents($img, file_get_contents($url));

				$this->db->set('favicon', strtolower($faviconName));
				$this->db->where('id', $item['id']);
				$this->db->update('details');
				
				
			}
			
			echo 'success';
			
		} else {
			echo 'empty';
		}
	}
	
	public function getNews()
	{
		header('Access-Control-Allow-Origin: *');
		$file = 'https://news.google.com/rss?hl=en-US&gl=US&ceid=US:en';
		$data = [];
		if (!$xml = simplexml_load_file($file)) {
			$data['news'] = [];
		} else {
			$news = $xml->channel;
			$json_string = json_encode($news);
			$result_array = json_decode($json_string, TRUE);
			$data['news'] = $result_array['item'];
		}

		$this->load->view('news_section', $data);
	}

	public function getNewsPaper()
	{
		header('Access-Control-Allow-Origin: *');
		$data = [];
		$data['countryName'] = $this->ip_visitor_country();
		$data['paperList'] = $this->gm->getNewsPaperByCountry($data['countryName']);

		if (empty($data['paperList'])) {
			$data['countryName'] = 'Popular';
			$data['paperList'] = $this->gm->getRandomNewspapers();
		}

		$this->load->view('country_news', $data);
	}

	public function getNewsList()
	{
		header('Access-Control-Allow-Origin: *');
		$file = 'https://news.google.com/rss?hl=en-US&gl=US&ceid=US:en';
		$data = [];
		if (!$xml = simplexml_load_file($file)) {
			$data['news'] = [];
		} else {
			$news = $xml->channel;
			$json_string = json_encode($news);
			$result_array = json_decode($json_string, TRUE);
			$data['news'] = $result_array['item'];
		}

		$this->load->view('news_ajax_list', $data);
	}
	
	public function cache()
	{
		$countryList = array_filter(array_column($this->gm->getCountryList(), 'lang'));

		$page = file_get_contents('http://server2.mcqstudy.com/newspaperlinks/index.php/');
		file_put_contents('public/cache/index.html', $page);

		$page = file_get_contents('http://server2.mcqstudy.com/newspaperlinks/index.php/submit_newspaper');
		file_put_contents('public/cache/submit_newspaper', $page);

		$page = file_get_contents('http://server2.mcqstudy.com/newspaperlinks/index.php/contact');
		file_put_contents('public/cache/contact', $page);

		$page = file_get_contents('http://server2.mcqstudy.com/newspaperlinks/index.php/privacy');
		file_put_contents('public/cache/privacy', $page);

		$page = file_get_contents('http://server2.mcqstudy.com/newspaperlinks/index.php/disclaimer');
		file_put_contents('public/cache/disclaimer', $page);

		foreach ($countryList as $country) {
			$url = 'http://server2.mcqstudy.com/newspaperlinks/index.php/newspaper/' . strtolower(str_replace(" ", "_", $country));
			$page = file_get_contents($url);
			file_put_contents('public/cache/newspaper/' . strtolower(str_replace(" ", "_", $country)), $page);
		}
	}

	function getCache()
	{
		$page = file_get_contents('http://server2.mcqstudy.com/newspaperlinks/public/cache/index.html');
		echo $page;
	}

}


