<?php 
header('Access-Control-Allow-Origin: *');
$q = strtolower(trim($_REQUEST['q']));
$file = "./search_word/".$q.".txt";
$result = [];
if(file_exists($file)){
	$result = json_decode(file_get_contents($file));
}
header('Content-Type: application/json');
echo json_encode($result);
