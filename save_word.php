<?php 
ini_set('max_execution_time', '0');
header('Access-Control-Allow-Origin: *');
require_once('connect4.php');

if(!empty($argv[1])){
	$item = $argv[1];
	$query = mysqli_query($conn, 'select distinct(SUBSTRING(mean, 1, 2)) as pos from `y_' . $item . '_master`');
	$result = array_column(mysqli_fetch_all($query, MYSQLI_ASSOC),'pos');
	$path = '/var/www/html/server/search_word/'.$item;
	if (!file_exists($path)) {
		mkdir($path, 0777, true);
	}


	foreach($result as $row)
	{
		$query1 = mysqli_query($conn, "SELECT mean FROM y_".$item."_master where SUBSTRING(mean, 1, 2) = '".$row."'");
		$result1 = array_column(mysqli_fetch_all($query1, MYSQLI_ASSOC),'mean');
		file_put_contents('/var/www/html/server/search_word/'.$item.'/'.$row.'.txt', json_encode($result1));
	}
}
//$query = mysqli_query($conn, "SELECT distinct(SUBSTRING(word, 1, 2)) as pos FROM word_sug");
//$result = array_column(mysqli_fetch_all($query, MYSQLI_ASSOC),'pos');

//foreach($result as $row)
//{
//	$query1 = mysqli_query($conn, "SELECT word FROM word_sug where SUBSTRING(word, 1, 2) = '".$row."'");
//	$result1 = array_column(mysqli_fetch_all($query1, MYSQLI_ASSOC),'word');
//	file_put_contents('/var/www/html/server/search_word/'.$row.'.txt', json_encode($result1));
//}



