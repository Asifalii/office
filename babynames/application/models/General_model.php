<?php

class General_Model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getRandomValuesByTable($table, $limit = null)
	{
		$this->db->select('*')->from($table);

		if ($limit) {
			$this->db->limit($limit);
		}
		$this->db->order_by('RAND()');
		return $this->db->get()->result_array();
	}

	public function getAllValuesByTable($table)
	{
		$this->db->select('*')->from($table);
		$this->db->order_by('name', 'ASC');
		return $this->db->get()->result_array();
	}

	public function getAllValuesByLetter($table, $letter)
	{
		$this->db->select('*')->from($table);
		$this->db->like('name', $letter, 'after');
		$this->db->order_by('name', 'ASC');
		return $this->db->get()->result_array();
	}

	public function name_generator($input)
	{
		$tableName = generate_database($input['country'], $input['options']);

		$result = [];

		if (!empty($tableName)) {
			$this->db->select('*');
			$this->db->from($tableName);
			$this->db->like('name', $input['name1'], 'both');
			$this->db->like('name', $input['name2'], 'both');
			$this->db->order_by('name', 'ASC');
			$result = $this->db->get()->result_array();
		}

		return $result;
	}

	public function getSingleName($countryName, $type, $id)
	{
		$tableName = generate_database($countryName, $type);
	
		$result = [];

		if (!empty($tableName)) {
			$this->db->select('*');
			$this->db->from($tableName);
			$this->db->where('id', $id);
			$result = $this->db->get()->row_array();
		}

		return $result;
	}

	public function getPopularName($countryName, $type)
	{
		$tableName = generate_database($countryName, $type);

		$result = [];

		if (!empty($tableName)) {
			$this->db->select('*');
			$this->db->from($tableName);
			$this->db->where('like > 0');
			$this->db->order_by('like', 'DESC');
			$this->db->limit(10);
			$result = $this->db->get()->result_array();
		}

		return $result;
	}

	public function getSuggestionByName($countryName, $type, $name)
	{
		$tableName = generate_database($countryName, $type);
		$result = [];

		if (!empty($tableName)) {
			$nameArray = str_split($name, 3);

			$query_parts = array();
			foreach ($nameArray as $val) {
				$query_parts[] = "'%" . (preg_replace('/[^A-Za-z0-9\-]/', '', $val)) . "%'";
			}

			$string = implode(' OR name LIKE ', $query_parts);

			$query = "SELECT * FROM " . $tableName . " WHERE name LIKE {$string}
					ORDER BY RAND() LIMIT 10";

			$query = $this->db->query($query);

			$result = $query->result_array();
		}

		return $result;
	}

	public function getTotalCount($type)
	{
		$boyTable = generate_database($type, 'boy');
		$girlTable = generate_database($type, 'girl');
		$result = [];

		$this->db->select('count(id) as boy')->from($boyTable);
		$boy = $this->db->get()->row()->boy;

		$this->db->select('count(id) as girl')->from($girlTable);
		$girl = $this->db->get()->row()->girl;

		$result['boy'] = $boy;
		$result['girl'] = $girl;

		return $result;
	}

	public function search_name($input)
	{
		$tableName = generate_database($input['country'], $input['options']);

		$result = [];

		if (!empty($tableName)) {
			$this->db->select('*');
			$this->db->from($tableName);

			if ($input['position'] == 'Starting From') {
				$this->db->like('name', $input['name'], 'after');
			}

			if ($input['position'] == 'Contains') {
				$this->db->like('name', $input['name'], 'both');
			}

			if ($input['position'] == 'Ends With') {
				$this->db->like('name', $input['name'], 'before');
			}

			$this->db->order_by('name', 'ASC');
			$result = $this->db->get()->result_array();
		}
		return $result;
	}

	public function get_favourite_name($array)
	{
		$result = [];
		if (!empty($array)) {
			foreach ($array as $key => $row) {
				$string = explode("/", $row);
				$info = $this->getSingleName($string[0], $string[1], $string[2]);
				$result[$key]['id'] = $string[2];
				$result[$key]['like'] = $info['like'];
				$result[$key]['name'] = $info['name'];
				$result[$key]['meaning'] = $info['meaning'];
				$result[$key]['country'] = $string[0];
				$result[$key]['gender'] = $string[1];
			}
		}

		return $result;
	}

	public function getCountryTag($type, $name)
	{
		$countryList = array_column($this->getAllValuesByTable('coutry_name'), 'name');
		$countryTag = [];

		if (!empty($countryList)) {
			foreach ($countryList as $country) {
				$tableName = generate_database($country, $type);
				if (!empty($tableName)) {
					$this->db->select('*');
					$this->db->from($tableName);
					$this->db->like('name', $name, 'both');
					$result = $this->db->get()->result_array();

					if (!empty($result)) {
						$countryTag[] = $country;
					}
				}

			}
		}

		return $countryTag;
	}
}
