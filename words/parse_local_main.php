<?php
set_time_limit(0);
require_once('../connect.php');
mysql_set_charset('utf8');

$lang = $_GET['lang'];

if(!$lang){
	exit;
}

$array = array();
$pri_query = mysql_query('SELECT LEFT(mean , 1) as m FROM `'.$lang.'_text` group by m order by m asc') or die(mysql_error());
while($pri_row=mysql_fetch_assoc($pri_query)){
	$array[] = trim($pri_row['m']);
}


$words_imp = implode(',', array_unique($array));

$myfile = fopen("./main/".$lang.".txt", "w") or die("Unable to open file!");
fwrite($myfile, $words_imp);
fclose($myfile);
	




// SELECT LEFT(mean , 1) as m FROM `text-bengali` group by m order by m asc
?>