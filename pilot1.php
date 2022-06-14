<?php 
$array = array_unique(explode("\n", file_get_contents('list.txt')));

echo '<pre>';
print_r($array);
die;
$healthy = ["https://media.english-dictionary.help/ss/",".jpeg"];
$yummy   = ["", ""];

foreach($array as $row){
	$string = str_replace($healthy,$yummy,$row);
	
	$x = explode('-', $string);
	$first_half = $x[0].'-'.$x[1].'-'.$x[2];
	$second_half = implode('-', array_slice($x, 3));
	echo "DELETE FROM subtitle WHERE subtitle.mname = '".$first_half."' AND REPLACE(subtitle.end_time, '.', ',') = '".rtrim(str_replace('.',',',$second_half))."';".'<br>';

}
?>