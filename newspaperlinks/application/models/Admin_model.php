<?php


class Admin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getValuesByTable($table)
	{
		$this->db->select('*')->from($table);
		return $this->db->get()->result_array();
	}

public function getItem($postData = null)
	{
		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		$searchQuery = "";
		if ($searchValue != '') {
			$searchQuery = "(details.link like '%" . $searchValue . "%'
         or details.title like '%" . $searchValue . "%'
         or details.lang like '%" . $searchValue . "%'
         or details.cat like '%" . $searchValue . "%' )";
		}

		## Total number of records without filtering
		$this->db->select('*')
			->from('details');
		$records = $this->db->get()->result_array();
		$totalRecords = count($records);

		## Total number of record with filtering
		$this->db->select('*')
			->from('details');

		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}

		$records = $this->db->get()->result_array();
		$totalRecordwithFilter = count($records);

		## Fetch records

		$this->db->select('*')
			->from('details');
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get()->result_array();

		$data = array();
		foreach ($records as $r) {

			$action = '<a href="' . base_url('/edit_item/') . $r['id'] . '"><img
									src="' . base_url('/public/svg_icon/edit.svg') .
				'"title="Approve" width="30px" height="30px"></a>';

			$image = '<img src="' . base_url('/public/images/') . $r['img'] . '"
							 alt="' . $r['title'] . '" width="100px" height="40px">';


			$data[] = array(
				"cat" => $r['cat'],
				"title" => $r['title'],
				"link" => '<a href="' . $r['link'] . '" target="_blank">Click</a>',
				"lang" => $r['lang'],
				"img" => $image,
				"action" => $action,
			);
		}
		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}
}
