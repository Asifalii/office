<?php


class BabyName extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('general_model', 'gm');
	}

	public function index()
	{
		$data = [];
		$data['title'] = 'Baby Names 24';
		$data['menu'] = 'home';

		$data['arabic_boy'] = array_chunk($this->gm->getRandomValuesByTable('arabic_boy', 8), 4);
		$data['arabic_girl'] = array_chunk($this->gm->getRandomValuesByTable('arabic_girl', 8), 4);
		$data['indian_boy'] = array_chunk($this->gm->getRandomValuesByTable('indian_boy', 8), 4);
		$data['indian_girl'] = array_chunk($this->gm->getRandomValuesByTable('indian_girl', 8), 4);
		$data['latin_boy'] = array_chunk($this->gm->getRandomValuesByTable('latin_boy', 8), 4);
		$data['latin_girl'] = array_chunk($this->gm->getRandomValuesByTable('latin_girl', 8), 4);
		$data['english_boy'] = array_chunk($this->gm->getRandomValuesByTable('english_boy', 8), 4);
		$data['english_girl'] = array_chunk($this->gm->getRandomValuesByTable('english_girl', 8), 4);
		$data['christian_boy'] = array_chunk($this->gm->getRandomValuesByTable('christian_boy', 8), 4);
		$data['christian_girl'] = array_chunk($this->gm->getRandomValuesByTable('christian_girl', 8), 4);
		$data['french_boy'] = array_chunk($this->gm->getRandomValuesByTable('french_boy', 8), 4);
		$data['french_girl'] = array_chunk($this->gm->getRandomValuesByTable('french_girl', 8), 4);
		$data['german_boy'] = array_chunk($this->gm->getRandomValuesByTable('german_boy', 8), 4);
		$data['german_girl'] = array_chunk($this->gm->getRandomValuesByTable('german_girl', 8), 4);
		$data['australian_boy'] = array_chunk($this->gm->getRandomValuesByTable('australian_boy', 8), 4);
		$data['australian_girl'] = array_chunk($this->gm->getRandomValuesByTable('australian_boy', 8), 4);
		$data['sangskrit_boy'] = array_chunk($this->gm->getRandomValuesByTable('sangskrit_boy', 8), 4);
		$data['sangskrit_girl'] = array_chunk($this->gm->getRandomValuesByTable('sangskrit_girl', 8), 4);
		$data['hebrew_boy'] = array_chunk($this->gm->getRandomValuesByTable('hebrew_boy', 8), 4);
		$data['hebrew_girl'] = array_chunk($this->gm->getRandomValuesByTable('hebrew_girl', 8), 4);

		$data['country_list'] = $this->gm->getAllValuesByTable('coutry_name');

		$this->load->view('home_page', $data);
	}

	public function name($type)
	{
		$boyTable = generate_database($type, 'boy');
		$girlTable = generate_database($type, 'girl');

		$data = [];
		$data['title'] = ucfirst($type) . ' Baby Names';
		$data['menu'] = $type;

		$data['count'] = $this->gm->getTotalCount($type);

		$data['boy'] = array_chunk($this->gm->getRandomValuesByTable($boyTable, 12), 3);
		$data['girl'] = array_chunk($this->gm->getRandomValuesByTable($girlTable, 12), 3);
		$data['popular_boy'] = array_unique(array_column($this->gm->getRandomValuesByTable($boyTable, 12), 'name'));
		$data['popular_girl'] = array_unique(array_column($this->gm->getRandomValuesByTable($girlTable, 12), 'name'));

		$data['country_list'] = $this->gm->getAllValuesByTable('coutry_name');

		$data['combine_data'] = [];
		if (isset($_COOKIE['combine_array'])) {
			$array = unserialize($_COOKIE['combine_array']);
			if (!empty($array)) {
				foreach ($array as $row) {
					if ($row['country'] == $type) {
						$data['combine_data'][] = $row;
					}
				}
			}
		}

		$data['search_data'] = [];
		if (isset($_COOKIE['search_array'])) {
			$array = unserialize($_COOKIE['search_array']);
			if (!empty($array)) {
				foreach ($array as $row) {
					if ($row['country'] == $type) {
						$data['search_data'][] = $row;
					}
				}
			}
		}

		$data['meta_data'] = ucfirst($type) . ' Baby Names. Total collection of ' . ($data['count']['boy'] + $data['count']['girl']) . ' baby names with Meanings in our ' . ucfirst($type) . ' collection. ';
		$data['keyword'] = ucfirst($type) . ', beginning, contains, collection';

		$this->load->view('category', $data);
	}

	public function name_combine()
	{
		$data = [];
		$data['title'] = 'Baby Name Combiner';
		$data['menu'] = 'name_combine';
		$data['country_list'] = $this->gm->getAllValuesByTable('coutry_name');
		$data['meta_data'] = "Create beautiful & unique names from two names, mother and father's names.";
		$data['keyword'] = 'generator, creator, combiner, blender, parent, names, sibling, grand-parents, hybrid, builder, mixer,';
		$this->load->view('name_combine', $data);
	}

	public function name_list()
	{
		$input = $this->input->post(null, true);

		$array1 = explode(' ', trim($input['name1']));
		$input['name1'] = $array1[0];
		$array2 = explode(' ', trim($input['name2']));
		$input['name2'] = $array2[0];

		$cookieArray = [];
		$cookieArray['name1'] = $input['name1'];
		$cookieArray['name2'] = $input['name2'];
		$cookieArray['country'] = $input['country'];
		$cookieArray['options'] = $input['options'];

		if (isset($_COOKIE['combine_array'])) {
			$newArray = unserialize($_COOKIE['combine_array']);
			$key = max(array_keys($newArray)) + 1;
			$newArray[$key] = $cookieArray;
		} else {
			$newArray[] = $cookieArray;
		}
		setcookie('combine_array', serialize($newArray), time() + (86400 * 7), "/");

		$data = [];
		$data['title'] = 'Combination of ' . ucfirst($input['name1']) . ' & ' . ucfirst($input['name2']);
		$data['menu'] = 'name_combine';
		$data['country_list'] = $this->gm->getAllValuesByTable('coutry_name');

		if (empty($input['name1']) || empty($input['name2'])) {
			$data['message'] = 'Names are required !!';
		} else {
			$data['result'] = $this->gm->name_generator($input);

			$data['description'] = 'We have found <b>' . count($data['result']) . '</b> matching '
				. $input['options'] . ' names
				for the blend of <b>' . ucfirst($input['name1']) . '</b> +
				<b>' . ucfirst($input['name2']) . '</b>
				in <b>' . $input['country'] . '</b> Category';

			if (empty($data['result'])) {
				$data['message'] = "Sorry, we don't found any name for this combination !!";
			}
		}

		$data['input'] = $input;
		$data['meta_data'] = "Create beautiful & unique names from two names, mother and father's names.";
		$data['keyword'] = 'generator, creator, combiner, blender, parent, names, sibling, grand-parents, hybrid, builder, mixer,';

		$this->load->view('name_combine', $data);
	}

	public function single_name($countryName, $type, $id)
	{
		$data = [];
		$data['menu'] = 'home';
		$data['gender'] = $type;
		$data['countryName'] = $countryName;
		$data['country_list'] = $this->gm->getAllValuesByTable('coutry_name');

		$data['result'] = $this->gm->getSingleName($countryName, $type, $id);
		$data['name'] = $data['result']['name'];

		$data['title'] = ucfirst($countryName) . ' Baby ' . ucfirst($type) . ' Name Meaning of ' . ucfirst($data['name']);
		$data['suggestion'] = array_chunk($this->gm->getSuggestionByName($countryName, $type, $data['name']), 5);
		$data['country_tag'] = $this->gm->getCountryTag($type, $data['name']);
		$data['popular_boy'] = $this->gm->getPopularName($countryName, 'boy');
		$data['popular_girl'] = $this->gm->getPopularName($countryName, 'girl');

		$metaData1 = ucfirst($countryName) . ' Baby ' . ucfirst($type) . ' Name Meaning of ' . ucfirst($data['name']) . ';';
		$metaData2 = (!empty($data['country_tag'])) ? 'Tagged with: ' . implode(',', $data['country_tag']) : '';
		$data['meta_data'] = $metaData1 . $metaData2 . '; ';
		$data['keyword'] = $data['name'] . ',' . ucfirst($countryName) . ',Baby,Baby name,' . ucfirst($type) . ',';

		$this->load->view('single_name', $data);
	}

	public function name_search()
	{
		$input = $this->input->post(null, true);

		$array = explode(' ', trim($input['name_word']));
		$input['name'] = $array[0];

		$cookieArray = [];
		$cookieArray['position'] = $input['position'];
		$cookieArray['name_word'] = $input['name_word'];
		$cookieArray['country'] = $input['country'];
		$cookieArray['options'] = $input['options'];

		if ($input['position'] == 'Starting From') {
			if (isset($_COOKIE['search_array'])) {
				$newArray = unserialize($_COOKIE['search_array']);
				$key = max(array_keys($newArray)) + 1;
				$newArray[$key] = $cookieArray;
			} else {
				$newArray[] = $cookieArray;
			}
			setcookie('search_array', serialize($newArray), time() + (86400 * 7), "/");
		}

		$data = [];
		$data['title'] = trim(ucfirst($input['country'])) . ' ' . $input['position'] . ' "' . $input['name'] . '"';
		$data['menu'] = 'name_combine';
		$data['options'] = $input['options'];
		$data['country_list'] = $this->gm->getAllValuesByTable('coutry_name');

		if (empty($input['position']) || empty($input['name_word']) || empty($input['country'])) {
			$data['message'] = 'Fields are required !!';
		} else {
			$data['result'] = $this->gm->search_name($input);

			$data['description'] = 'We have found <b>' . count($data['result']) . '</b> matching '
				. $input['options'] . ' names
				for <b>' . ucfirst($input['name']) . '</b> at
				<b>' . ucfirst($input['position']) . '</b>
				in <b>' . $input['country'] . '</b> Category';

			if (empty($data['result'])) {
				$data['message'] = "Sorry, we don't found any name for this search !!";
			}
		}

		$data['input'] = $input;
		$data['meta_data'] = "Create beautiful & unique names from two names, mother and father's names.";
		$data['keyword'] = 'generator, creator, combiner, blender, parent, names, sibling, grand-parents, hybrid, builder, mixer,';

		$this->load->view('name_combine', $data);
	}

	public function all_name_by_letter($country, $gender, $letter)
	{
		$table = generate_database($country, $gender);

		$data = [];
		$data['title'] = ucfirst($country) . ' » ' . ucfirst($gender) . ' » ' . ucfirst($letter);
		$data['menu'] = $country;
		$data['gender'] = ucfirst($gender);
		$data['letter'] = ucfirst($letter);

		$data['result'] = $this->gm->getAllValuesByLetter($table, $letter);

		$data['meta_data'] = count($data['result']) . ' ' . ucfirst($gender) . ' Names Beginning with letter ' . $letter . ' in our ' . $country . ' collection; ';
		$data['keyword'] = ucfirst($country) . ',' . ucfirst($gender) . ',';
		$this->load->view('list', $data);
	}

	public function name_combine_from_cookie($country, $type, $first, $second)
	{
		$input['name1'] = $first;
		$input['name2'] = $second;
		$input['country'] = $country;
		$input['options'] = $type;

		$data = [];
		$data['title'] = 'Combination of ' . ucfirst($input['name1']) . ' & ' . ucfirst($input['name2']);
		$data['menu'] = 'name_combine';
		$data['country_list'] = $this->gm->getAllValuesByTable('coutry_name');

		if (empty($input['name1']) || empty($input['name2'])) {
			$data['message'] = 'Names are required !!';
		} else {
			$data['result'] = $this->gm->name_generator($input);

			$data['description'] = 'We have found <b>' . count($data['result']) . '</b> matching '
				. $input['options'] . ' names
				for the blend of <b>' . ucfirst($input['name1']) . '</b> +
				<b>' . ucfirst($input['name2']) . '</b>
				in <b>' . $input['country'] . '</b> Category';

			if (empty($data['result'])) {
				$data['message'] = "Sorry, we don't found any name for this combination !!";
			}
		}

		$data['input'] = $input;
		$data['meta_data'] = "Create beautiful & unique names from two names, mother and father's names.";
		$data['keyword'] = 'generator, creator, combiner, blender, parent, names, sibling, grand-parents, hybrid, builder, mixer,';

		$this->load->view('name_combine', $data);
	}

	public function name_search_from_cookie($country, $type, $name, $position = null)
	{
		if (!empty($position)) {
			$input['position'] = $position;
		} else {
			$input['position'] = 'Starting From';
		}

		$input['name'] = $name;
		$input['country'] = $country;
		$input['options'] = $type;

		$data = [];
		$data['title'] = trim(ucfirst($input['country'])) . ' ' . $input['position'] . ' "' . $input['name'] . '"';
		$data['menu'] = 'name_combine';
		$data['options'] = $input['options'];
		$data['country_list'] = $this->gm->getAllValuesByTable('coutry_name');

		if (empty($input['position']) || empty($input['name']) || empty($input['country'])) {
			$data['message'] = 'Fields are required !!';
		} else {
			$data['result'] = $this->gm->search_name($input);

			$data['description'] = 'We have found <b>' . count($data['result']) . '</b> matching '
				. $input['options'] . ' names
				for <b>' . ucfirst($input['name']) . '</b> at
				<b>' . ucfirst($input['position']) . '</b>
				in <b>' . $input['country'] . '</b> Category';

			if (empty($data['result'])) {
				$data['message'] = "Sorry, we don't found any name for this search !!";
			}
		}

		$data['input'] = $input;
		$data['meta_data'] = "Create beautiful & unique names from two names, mother and father's names.";
		$data['keyword'] = 'starting, contains, ends with, generator, creator, combiner, blender, parent, names, sibling, grand-parents, hybrid, builder, mixer,';

		$this->load->view('name_combine', $data);
	}

	public function favourite_name()
	{
		$array = [];
		$data = [];
		$data['title'] = 'Baby Names » Favorite';

		if (isset($_COOKIE['xyz'])) {
			$array = array_unique(json_decode($_COOKIE['xyz']));
		}
		$data['menu'] = 'home';
		$data['country_list'] = $this->gm->getAllValuesByTable('coutry_name');

		$data['result'] = $this->gm->get_favourite_name($array);

		$data['keyword'] = 'starting, contains, ends with, generator, creator, combiner, blender, parent, names, sibling, grand-parents, hybrid, builder, mixer, favourite names, most liked names';

		$this->load->view('favourite_name', $data);
	}

	public function privacy()
	{
		$data['menu'] = 'home';
		$data['title'] = 'Baby Names 24 » Privacy Policy';
		$this->load->view('privacy_policy', $data);
	}

	public function contact()
	{
		$data['menu'] = 'home';
		$data['title'] = 'Baby Names 24 » Contact Us';
		$this->load->view('contact', $data);
	}

	public function name_like()
	{
		$input = $this->input->post(null, true);
		if (empty($input)) {
			return false;
		}

		$array = explode('/', $input['param']);
		$info = $this->gm->getSingleName($array[0], $array[1], $array[2]);
		$count = $info['like'] + 1;
		$tableName = generate_database($array[0], $array[1]);

		if (!empty($tableName)) {
			$this->db->set('like', $count);
			$this->db->where('id', $info['id']);
			$this->db->update($tableName);
		}

		echo $count;
	}

	public function name_dislike()
	{
		$input = $this->input->post(null, true);
		if (empty($input)) {
			return false;
		}

		$array = explode('/', $input['param']);
		$info = $this->gm->getSingleName($array[0], $array[1], $array[2]);
		$count = $info['like'] - 1;
		$count = $count < 0 ? 0 : $count;
		$tableName = generate_database($array[0], $array[1]);

		if (!empty($tableName)) {
			$this->db->set('like', $count);
			$this->db->where('id', $info['id']);
			$this->db->update($tableName);
		}

		echo $count;
	}
	
	public function pilot()
	{
		$this->load->view('test');
	}
}
