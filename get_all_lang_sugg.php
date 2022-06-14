<?php
 error_reporting(0);

require_once('./v5/connect.php');
$q = trim($_GET['q']);
$lang = $_GET['lang'];

if($q and $lang){
	$query = "SELECT `".$lang."` FROM lang WHERE `".$lang."` LIKE '".$q."%' LIMIT 10";
	$result = mysqli_query($conn, $query);
	$x_array = array_column(mysqli_fetch_all($result,MYSQLI_ASSOC),$lang);
	echo json_encode($x_array);
}
?>