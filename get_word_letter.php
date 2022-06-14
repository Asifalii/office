<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once('./v5/connect.php');
$q = trim($_GET['q']);
$lang = $_GET['lang'];

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}


if (isset($_GET['size'])) {
    $no_of_records_per_page  = $_GET['size'];
} else {
    $no_of_records_per_page  = 10;
}

$offset = ($pageno-1) * $no_of_records_per_page; 


if($lang == 'english'){
	$lang = 'word';
}

if($q and $lang){
	$query = "SELECT `".$lang."` FROM lang WHERE `".$lang."` LIKE '".$q."%' LIMIT $offset, $no_of_records_per_page";
	$result = mysqli_query($conn, $query);
	$x_array = array_column(mysqli_fetch_all($result,MYSQLI_ASSOC),$lang);
	echo json_encode($x_array);
}
?>