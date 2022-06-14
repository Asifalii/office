<?php
set_time_limit(0);
require_once('../connect.php');
mysql_set_charset('utf8');

$lang_array = [
"bulgarian",
"catalan",
"cebuano",
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
"tamil",
"telugu",
"hindi",
"arabic",
"yiddish"
];

$lang_array = [
"chinese"
];

foreach($lang_array as $la)
{
	load_e($la);
	reset_words($la);
}

function load_e($lang)
{

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
