<?php
require_once('connect.php');
$q = mysql_escape_string(trim($_REQUEST['q']));

$query = mysql_query("select word, mean from bengali_sug where mean like '".$q."%' limit 30");
$rows = array();
while($r=mysql_fetch_assoc($query))
{
	$rows[] = array($r['word'], $r['mean']);
}
header('Content-Type: application/json');
echo json_encode($rows);
?>