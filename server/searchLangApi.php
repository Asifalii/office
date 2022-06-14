<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
header('Access-Control-Allow-Origin: *');
$q = trim($_REQUEST['q']);
$lang = $_REQUEST['lang'];
$file = "./search_word/".$lang."/".$q.".txt";
$result = [];
if(file_exists($file)){
	$result = json_decode(file_get_contents($file));
}
header('Content-Type: application/json');
echo json_encode($result);