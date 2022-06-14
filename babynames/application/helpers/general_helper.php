<?php

function printView($data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

function generate_database($country, $gender)
{
	$name = '';

	if (empty($country) || empty($gender)) {
		return false;
	}
	$country = trim($country);

	if ($country == 'American') {
		$name = 'american_' . $gender;
	} else if ($country == 'Arabic') {
		$name = 'arabic_' . $gender;
	} else if ($country == 'Asamese') {
		$name = 'asamese_' . $gender;
	} else if ($country == 'Australian') {
		$name = 'australian_' . $gender;
	} else if ($country == 'Bengali') {
		$name = 'bengali_' . $gender;
	} else if ($country == 'Christian') {
		$name = 'christian_' . $gender;
	} else if ($country == 'English') {
		$name = 'english_' . $gender;
	} else if ($country == 'Finnish') {
		$name = 'finnish_' . $gender;
	} else if ($country == 'French') {
		$name = 'french_' . $gender;
	} else if ($country == 'German') {
		$name = 'german_' . $gender;
	} else if ($country == 'Greek') {
		$name = 'greek_' . $gender;
	} else if ($country == 'Gujrati') {
		$name = 'gujrati_' . $gender;
	} else if ($country == 'Hebrew') {
		$name = 'hebrew_' . $gender;
	} else if ($country == 'Indian') {
		$name = 'indian_' . $gender;
	} else if ($country == 'Iranian') {
		$name = 'iranian_' . $gender;
	} else if ($country == 'Irish') {
		$name = 'irish_' . $gender;
	} else if ($country == 'Kannada') {
		$name = 'kannada_' . $gender;
	} else if ($country == 'Latin') {
		$name = 'latin_' . $gender;
	} else if ($country == 'Malaylam') {
		$name = 'malaylam_' . $gender;
	} else if ($country == 'Marathi') {
		$name = 'marathi_' . $gender;
	} else if ($country == 'Oriya') {
		$name = 'oriya_' . $gender;
	} else if ($country == 'Sangskrit') {
		$name = 'sangskrit_' . $gender;
	} else if ($country == 'Punjabi') {
		$name = 'sikh_punjabi_' . $gender;
	} else if ($country == 'Sindhi') {
		$name = 'sindhi_' . $gender;
	} else if ($country == 'Swedish') {
		$name = 'swedish_' . $gender;
	} else if ($country == 'Tamil') {
		$name = 'tamil_' . $gender;
	} else if ($country == 'Telegu') {
		$name = 'telegu_' . $gender;
	}

	return $name;
}
