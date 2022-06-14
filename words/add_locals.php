<?php
set_time_limit(0);
require_once('../connect3.php');
mysql_set_charset('utf8');
die('done');
$langs = array(
// "zu"=>"zulu"
);

foreach($langs as $k=>$lang)
{
	add_local($lang);
}

function add_local($lang)
{
	$array = array();
	$pri_query = mysql_query('SELECT LEFT(`'.$lang.'` , 1) as m, `'.$lang.'`, word FROM `lang` where lower(word)!=lower(`'.$lang.'`) group by m order by m asc') or die(mysql_error());
	while($pri_row=mysql_fetch_assoc($pri_query))
	{
		
		$word_ex = explode(' ', strtolower($pri_row['word']));
		$mean_ex = explode(' ', strtolower($pri_row[$lang]));
		
		$inters = count(array_intersect($word_ex, $mean_ex));
		
		if(strtolower($pri_row['word'])!=strtolower($pri_row[$lang]) and $pri_row[$lang]!=null and $inters==0)
		{
			$array[] = trim($pri_row['m']);
		}
		
	}
	
	$words_imp = implode(',', array_unique($array));
	
	$myfile = fopen("./main/".$lang.".txt", "w") or die("Unable to open file!1");
	fwrite($myfile, $words_imp);
	fclose($myfile);

	foreach($array as $a)
	{
		$words = array();
		$query = mysql_query('select word, `'.$lang.'` from lang where `'.$lang.'` like "'.$a.'%"');
		while($row=mysql_fetch_assoc($query))
		{
			$words[] = $row[$lang];
		}
		
		$words_imp = implode(',', array_unique($words));
		
		$oldmask = umask(0);
		mkdir("local/".$lang, 0777);
		umask($oldmask);
		
		$myfile = fopen("local/".$lang."/".$a.".txt", "w") or die("Unable to open file!2");
		fwrite($myfile, $words_imp);
		fclose($myfile);
		
	}
}

?>