<?php

 error_reporting(0);

require_once('./v5/connect.php');
$q = $_GET['q'];
$lang = $_GET['lang'];

if($q and $lang){
	
	$sql1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT word FROM lang WHERE `".$lang."` = '".$q."'  ORDER BY id DESC LIMIT 1"));
	$result = $sql1['word'];
	echo json_encode($result);
}
?>