<?php
 error_reporting(0);

$lang = $_GET['lang'];

if($lang){	
	$word = [];
	$word = file_get_contents('./words/main/' . $lang . '.txt');
	echo json_encode($word);
}
?>