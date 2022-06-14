<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

header('Access-Control-Allow-Origin: *');
require_once('./v5/connect.php');

$q = trim($_REQUEST['q']);
$lang = $_REQUEST['lang'];

if($q and $lang){
$query = mysqli_query($conn, "select word, mean from x_".$lang." where mean like '".$q."%' limit 30");

$rows = array();
while($r=mysqli_fetch_assoc($query))
{
    $rows[] = array($r['word'], $r['mean']);
}
header('Content-Type: application/json');

echo json_encode($rows);	
	
}else{
	echo 'Please specify valid inputs.';
}


?>