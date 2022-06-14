<?php
set_time_limit(0);
require_once('../connect.php');
mysql_set_charset('utf8');

$lang = $_GET['lang'];

if(!$lang){
	exit;
}

$pri_query = mysql_query('SELECT LEFT(mean , 1) as m FROM `'.$lang.'_text` group by m ORDER BY `m`  ASC') or die(mysql_error());
while($pri_row=mysql_fetch_assoc($pri_query)){
	$array[] = $pri_row['m'];
}

foreach($array as $a)
{
	$words = array();
	$query = mysql_query('select word, mean from `'.$lang.'_text` where mean like "'.$a.'%"');
	while($row=mysql_fetch_assoc($query))
	{
		$words[] = $row['mean'];
	}
	
	$words_imp = implode(',', array_unique($words));
	
	$myfile = fopen("local/".$lang."/".$a.".txt", "w") or die("Unable to open file!");
	fwrite($myfile, $words_imp);
	fclose($myfile);
	
}



?>