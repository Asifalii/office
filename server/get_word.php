<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once('connect.php');
$query = mysqli_query($conn,"SELECT DISTINCT(word) FROM `3000` ORDER BY RAND() LIMIT 1");
while($r=mysqli_fetch_assoc($query))
{
	$rows = $r['word'];
}
echo $rows;
?>