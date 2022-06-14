<?php

class General_Model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getCountryList()
	{
		$this->db->select('DISTINCT(lang)')->from('details');
		$this->db->order_by('lang');
		return $this->db->get()->result_array();
	}

	public function getNewsPaperByCountry($country)
	{
		$this->db->select('*')->from('details')->where('lang', $country);
		return $this->db->get()->result_array();
	}

	public function getSingleRow($table, $id)
	{
		$result = [];

		if (!empty($table) && !empty($id)) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where('id', $id);
			$result = $this->db->get()->row_array();
		}

		return $result;
	}

	public function getRandomNewspapers()
	{
		$this->db->select('*')->from('details');
		$this->db->order_by('RAND()');
		$this->db->limit(15);

		return $this->db->get()->result_array();
	}

	public function getItem($country, $category)
	{
		$this->db->select('*')
			->from('details')
			->where('lang', $country);

		if ($category == 'Newspaper') {
			$this->db->group_start();
			$this->db->where('cat', 'News Paper');
			$this->db->or_where('cat = ""');
			$this->db->group_end();
		}

		if ($category == 'Television') {
			$this->db->where('cat', 'Countries Top Television');
		}

		if ($category == 'Radio') {
			$this->db->where('cat', 'Countries Top Radios');
		}

		if ($category == 'Magazine') {
			$this->db->where('cat', 'Countries Top Magazines');
		}

		if ($category == 'Job') {
			$this->db->where('cat', 'Countries Top Job Sites');
		}

		if ($category == 'Education') {
			$this->db->where('cat', 'Countries Top Education Sites');
		}

		return $this->db->get()->result_array();
	}

	public function getSingleRowByField($table, $field, $fieldValue)
	{
		$result = [];

		if (!empty($table) && !empty($field) && !empty($fieldValue)) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($field, $fieldValue);
			$result = $this->db->get()->row_array();
		}

		return $result;
	}
}
