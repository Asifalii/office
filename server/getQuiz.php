<?php
require('functions.php');
$id = $_REQUEST['id'];
$sid = $_REQUEST['sid'];
$lang = getLang();

$id = ((int) $id) + (((int) $sid) * 50);

if($id)
{
	require('connect4.php');
	$rows = mysqli_fetch_assoc(mysqli_query($conn, "select details from ".$lang."_quiz where id=".$id." limit 1"));
	
	echo $rows['details'];	
}
?>