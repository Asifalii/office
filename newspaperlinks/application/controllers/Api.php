<?php


class Api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('general_model', 'gm');
	}

	public function getNewspaperByCountry($country)
	{
		try {
			if ($this->input->method(true) !== 'GET' || empty($country)) {
				throw new  Exception('Bad Request Method!');
			}

			$result = $this->gm->getNewsPaperByCountry($country);

			if ($result) {

				foreach ($result as $key => $item) {
					$result[$key]['img'] = str_replace( 'http://', 'https://', base_url('/public/images/')) . $item['img'];
				}

				$response = $result;

				$this->output
					->set_status_header(200)
					->set_content_type('application/json')
					->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

			} else {
				throw new  Exception('No Data Found!');
			}
		} catch (\Exception $e) {
			$response = [
				'error' => true,
				'message' => $e->getMessage(),
				'status' => false,
			];

			log_message('error', json_encode($response));

			$this->output
				->set_status_header(401)
				->set_content_type('application/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
		}
	}

	public function saveNewspaper()
	{
		try {
			if ($this->input->method(true) !== 'POST') {
				throw new  Exception('Bad Request Method!');
			}

			$data = $this->input->post(NULL, True);

			if (empty($data)) {
				throw new  Exception('No Data Found!');
			}

			$this->db->select('*');
			$this->db->from('details');
			$this->db->where('link', $data['link']);
			$result = $this->db->get()->row_array();

			if (empty($result)) {
				$insert = [];
				$insert['link'] = $data['link'];
				$insert['title'] = $data['title'];
				$insert['lang'] = $data['lang'];
				$insert['cat'] = 'News Paper';
				$insert['img'] = 'newspaper.jpg';

				$res = $this->db->insert('details', $insert);

				if ($res == true) {
					echo 'Data Saved Successfully!!';
				} else {
					die('Data Save Failed!!');
				}
			} else {
				die('Data Exists!!');
			}

		} catch (\Exception $e) {
			$response = [
				'error' => true,
				'message' => $e->getMessage(),
				'status' => false,
			];

			log_message('error', json_encode($response));

			$this->output
				->set_status_header(401)
				->set_content_type('application/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
		}
	}

	public function getNewspaperByCountryWithLimit($country, $limit)
	{
		try {
			if ($this->input->method(true) !== 'GET' || empty($country) || empty($limit)) {
				throw new  Exception('Bad Request Method!');
			}

			$result = $this->gm->getNewsPaperByCountry($country);

			$result = array_slice($result, 0, $limit);

			if ($result) {

				foreach ($result as $key => $item) {
					$result[$key]['img'] = str_replace( 'http://', 'https://', base_url('/public/images/')) . $item['img'];
				}

				$response = $result;

				$this->output
					->set_status_header(200)
					->set_content_type('application/json')
					->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

			} else {
				throw new  Exception('No Data Found!');
			}

		} catch (\Exception $e) {
			$response = [
				'error' => true,
				'message' => $e->getMessage(),
				'status' => false,
			];

			log_message('error', json_encode($response));

			$this->output
				->set_status_header(401)
				->set_content_type('application/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
		}
	}

	public function getItemByParam($country, $category)
	{
		try {
			if ($this->input->method(true) !== 'GET' || empty($country) || empty($category)) {
				throw new  Exception('Bad Request Method!');
			}

			$result = $this->gm->getItem($country, $category);

			if ($result) {

				foreach ($result as $key => $item) {
					$result[$key]['img'] = str_replace( 'http://', 'https://', base_url('/public/images/')) . $item['img'];
				}

				$response = $result;

				$this->output
					->set_status_header(200)
					->set_content_type('application/json')
					->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

			} else {
				throw new  Exception('No Data Found!');
			}

		} catch (\Exception $e) {
			$response = [
				'error' => true,
				'message' => $e->getMessage(),
				'status' => false,
			];

			log_message('error', json_encode($response));

			$this->output
				->set_status_header(401)
				->set_content_type('application/json')
				->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
		}
	}
}
