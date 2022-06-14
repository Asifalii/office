<?php
set_time_limit(0);
require_once('../connect.php');
mysql_set_charset('utf8');

$lang_array = [
// "bulgarian",
// "catalan",
// "cebuano",
"chinese",
// "filipino",
// "gujarati",
// "hungarian",
// "indonesian",
// "japanese", faule
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
// "yiddish"
];

$lang_array = [
"arabic"
];

foreach($lang_array as $la)
{
	load_e($la);
	reset_words($la);
}

function load_e($lang)
{

	$query = mysql_query('update words set added=0');

	if($query){
	
	// create main database from xlsx files
	$array = array('a','b','c','d','e','f','g','h','i','l','m','no','p','r','s','t','w','jkquvxyz');
	@mysql_query('drop table '.$lang);
	mysql_query('create table '.$lang.' like telugu');
	foreach($array as $a)
	{
		
		if (($handle = fopen('files/'.$lang.'/'.$a.'.xlsx - Simple.csv', "r") or die('error')) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

				mysql_query('insert into '.$lang.' (word, mean) values ("'.mysql_real_escape_string($data[0]).'","'.mysql_real_escape_string($data[1]).'")');
			
			}
			fclose($handle);
		}

	}
	mysql_query('delete from '.$lang.' where word=mean');

	// die;
	// create text table
	@mysql_query('drop table '.$lang.'_text');
	
	mysql_query('create table '.$lang.'_text like bengali_text');
	mysql_query('insert into '.$lang.'_text (word) select word from bengali_text');
	
	$query = mysql_query('select '.$lang.'.word, '.$lang.'.mean, '.$lang.'_text.id from '.$lang.'_text left join '.$lang.' on '.$lang.'_text.word='.$lang.'.word where '.$lang.'_text.added=0');
	while($row=mysql_fetch_assoc($query))
	{
		mysql_query('update '.$lang.'_text set mean="'.$row['mean'].'", added=1 where id='.$row['id'].' limit 1');
	}
	
	mysql_query('delete from '.$lang.'_text where word=mean or mean=""') or die(mysql_error());
	
	// create quiz table
	@mysql_query('drop table '.$lang.'_quiz');
	mysql_query('CREATE TABLE '.$lang.'_quiz LIKE bengali_quiz');

	$query = mysql_query('select * from '.$lang.'_text');
	$i = 0;
	$group = array();
	while($row=mysql_fetch_assoc($query))
	{
		$i++;
		$group[] = $row['word'];
		if($i%10==0)
		{
			mysql_query('insert into '.$lang.'_quiz (qwords) values ("'.implode(',',$group).'")');
			$group = array();
		}
	}
	
	// populate quiz table
	$query = mysql_query('select qwords,id from `'.$lang.'_quiz` where added=0');

	while($row=mysql_fetch_assoc($query))
	{
		$id = $row['id'];
		$words = explode(',',$row['qwords']);
		$wimp = '"'.implode('","',$words).'"';
		
		$alt_query = mysql_query('select word,mean from `'.$lang.'` where word in ('.$wimp.') limit 10');
		$meanarray = array();
		while($arow=mysql_fetch_assoc($alt_query))
		{
			$meanarray[$arow['word']] = $arow['mean'];
		}
		
		$alt_query = mysql_query('select word,mean from `'.$lang.'` where word not in ('.$wimp.') order by rand() limit 30');
		$altarray = array();
		while($arow=mysql_fetch_assoc($alt_query))
		{
			$altarray[] = $arow['mean'];
		}
		
		$all_row = array();
		$j=0;
		foreach($words as $w)
		{
			
			$each_row = array();
			$each_row['main'] = $w;
			$quiz_row = array();
			$quiz_row[] = $meanarray[$w];
			for($i=0;$i<3;$i++)
			{
				$quiz_row[] = $altarray[$i+$j];
			}
			shuffle($quiz_row);
			$each_row['quiz'] = $quiz_row;
			$each_row['ans'] = $meanarray[$w];
			$all_row[] = $each_row;
			$j = $j+3;
		}
		
		$details = mysql_real_escape_string(json_encode($all_row));
		
		mysql_query('update `'.$lang.'_quiz` set details="'.$details.'", added=1 where id='.$id.' limit 1');
		
	}
	
	
	// create local lang alphabets in main folder
	$array = array();
	$pri_query = mysql_query('SELECT LEFT(mean , 1) as m FROM `'.$lang.'_text` group by m order by m asc');
	while($pri_row=mysql_fetch_assoc($pri_query)){
		$pri_char = trim($pri_row['m']);
		if(preg_match('#[^a-z_\-0-9\.]#i', $pri_char))
		{
		  $array[] = trim($pri_row['m']);
		}
		
	}

	$words_imp = implode(',', array_unique($array));

	$myfile = fopen("main/".$lang.".txt", "w") or die("Unable to open file 1!");
	fwrite($myfile, $words_imp);
	fclose($myfile);
	
	// parse and create local mean files in lang folder

	foreach($array as $a)
	{
		$words = array();
		$query = mysql_query('select word, mean from `'.$lang.'_text` where mean like "'.$a.'%"');
		while($row=mysql_fetch_assoc($query))
		{
			$words[] = $row['mean'];
		}
		
		$words_imp = implode(',', array_unique($words));
		
		$oldmask = umask(0);
		mkdir("local/".$lang, 0777);
		umask($oldmask);
		
		$myfile = fopen("local/".$lang."/".$a.".txt", "w") or die("Unable to open file!");
		fwrite($myfile, $words_imp);
		fclose($myfile);
		
	}
	
	// update words table according to lang
	$query = mysql_query("select * from words where added=0");
	while($row=mysql_fetch_assoc($query))
	{
		$file = store($row['alls'], $lang);
		$id = $row['id'];
		$mean = mysql_real_escape_string($file);
		mysql_query('update words set '.$lang.'="'.$mean.'", added=1 where id='.$id.' limit 1');

	}

	}
}

function reset_words($lang){
	mysql_query('update words set added=0');
}

function store($q, $lang)
{
	$locals = array();

	$alls = explode(',',$q);

	$alls2 = array();
	foreach($alls as $a)
	{
		if(!preg_match("#\'#",$a))
		{
			$alls2[] = $a;
		}
	}
	
	
	$locals = "'".implode("','", array_unique($alls2))."'";

	$sql = 'select word,mean from '.$lang.' where word in ('.$locals.') and word!=mean';
	
	$get_local_mean = mysql_query($sql);

	$local_mean = array();

	while($local_row = mysql_fetch_assoc($get_local_mean))
	{
		$local_mean[$local_row['word']] = $local_row['mean'];
	}

	return json_encode($local_mean);
}


?>
