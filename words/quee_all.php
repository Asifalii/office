<?php
require_once('../connect.php');

$count = mysql_fetch_assoc(mysql_query('select count(*) as cnt from words where added=0'));

echo "<meta charset='utf8'>";
echo "<pre>";

// $array = [
// "azerbaijani",
// "bulgarian",
// "catalan",
// "cebuano",
// "chinese",
// "filipino",
// "gujarati",
// "hindi",
// "hungarian",
// "indonesian",
// "japanese",
// "javanese",
// "kannada",
// "khmer",
// "korean",
// "malay",
// "marathi",
// "nepali",
// "persian",
// "punjabi",
// "thai",
// "turkish",
// "urdu",
// "vietnamese",
// "welsh",
// "yiddish"];
$array = [
"bulgarian",
"catalan",
"cebuano",
"chinese",
"filipino",
"gujarati",
"hungarian",
"indonesian",
"japanese",
"javanese",
"kannada",
"khmer",
"korean",
"malay",
"marathi",
"nepali",
"persian",
"punjabi",
"thai",
"turkish",
"urdu",
"vietnamese",
"welsh",
"yiddish"];

$query = mysql_query('show tables');
while($row=mysql_fetch_assoc($query))
{
	$rows[] = $row['Tables_in_bn'];
}

echo "<hr>"; 

echo 'lang-->'.mysql_num_rows(mysql_query('select * from '.$_GET['lang'].''))."<hr>";
echo 'quiz-->'.mysql_num_rows(mysql_query('select * from '.$_GET['lang'].'_quiz where added=0'))."<hr>";
echo 'words-->'.mysql_num_rows(mysql_query('select * from words where added=0'));

echo "<hr>";
$i=0;
foreach($array as $a)
{
	$i++;
	if(in_array($a, $rows))
	{
		echo $i.": updated->".$a."<br>";
	}else
	{
		echo $i.": not updated->".$a."<br>";
	}
}

?>
