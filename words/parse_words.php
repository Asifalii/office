<?php
set_time_limit(0);
require_once('../connect.php');

$array = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

foreach($array as $a)
{
	$words = array();
	$query = mysql_query('select word from text where word like "'.$a.'%"');
	while($row=mysql_fetch_assoc($query))
	{
		$words[] = $row['word'];
	}
	
	$words_imp = implode(',',$words);
	
	$myfile = fopen("words/".$a.".txt", "w") or die("Unable to open file!");
	fwrite($myfile, $words_imp);
	fclose($myfile);
	
}



?>