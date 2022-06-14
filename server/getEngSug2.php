<?php
require_once('connect.php');
$q = strtolower(mysql_escape_string(trim($_REQUEST['q'])));

$query = mysql_query('select word from word_sug where word like "'.$q.'%" limit 10');

$rows = array();
while($r=mysql_fetch_assoc($query))
{
	$rows[] = $r['word'];
}
header('Content-Type: application/json');

echo json_encode($rows);
?>