<?php

function printView($data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

function make_dir($path, $rights = 0775)
{
	$folder_path = array(strstr($path, '.') ? dirname($path) : $path);
	while (!@is_dir(dirname(end($folder_path))) && dirname(end($folder_path)) != '/' && dirname(end($folder_path)) != '.' && dirname(end($folder_path)) != '') {
		array_push($folder_path, dirname(end($folder_path)));
	}

	while ($parent_folder_path = array_pop($folder_path)) {
		if (!@mkdir($parent_folder_path, $rights)) {
			//user_error("Can't create folder \"$parent_folder_path\".");
		}
	}
}

function get_title($url)
{
	$title  = '';
	$page = file_get_contents($url);

	if (!$page){
		return $title;
	}

	$matches = array();

	if (preg_match('/<title>(.*?)<\/title>/', $page, $matches)) {
		return $matches[1];
	} else {
		return $title;
	}
}
