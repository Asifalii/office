<?php
session_start();
error_reporting(0);
require('functions.php');

isUserAgent();

checkBot();

require_once('connect3.php');

$q 		= trim(mysql_real_escape_string($_REQUEST['q']));
$lang 	= getLang();
$type 	= trim(mysql_real_escape_string($_REQUEST['type']));


if($type==1)
{
	$mquery = mysql_query("select word, `".$lang."` as `mean` from `lang` where `".$lang."` like '".$q."' limit 10");

	if(mysql_num_rows($mquery)==0)
	{
		$msg = 'No word meaning found for: '.$q;
		echo json_encode(array('main'=>'','data'=>'','mean'=>'','error'=>1, 'msg'=>$msg, 'type'=>1));
		exit;
	}

	$rows = array();
	while($row = mysql_fetch_assoc($mquery))
	{
		$rows[] = $row;
	}

	echo json_encode(array('main'=>'','data'=>$rows,'mean'=>'', 'error'=>0, 'msg'=>'', 'type'=>1));
	exit;
	
}else
{
	$mquery = mysql_query("select ".$lang." from lang where word like '".$q."' limit 1");
	$mrow = mysql_fetch_assoc($mquery);

	if(mysql_num_rows($mquery)==0)
	{
		$msg = 'No word meaning found for: '.$q;
		$pspell_array = '[]';
		
		$check_com_words = mysql_num_rows(mysql_query("select word from com_words where word like '".$q."'"));
		if($check_com_words==0 and strlen($q)<36)
		{
			$pspell_array = file_get_contents('http://sug.bdword.com/api_multiple.php?word='.urlencode($q));

			if(in_array($q, json_decode($pspell_array), true) and strlen($q)<36)
			{
				@mysql_query('insert into com_words (word) values ("'.$q.'")');
			}
		}
		
		echo json_encode(array('main'=>'','data'=>'','mean'=>'','error'=>1, 'msg'=>$msg, 'sug'=>$pspell_array, 'type'=>0));
		
		exit;
	}
	$sql = "select word, ".$lang.", id, data from word_frame where word like '".$q."' limit 1";
	$query = mysql_query($sql);
	$row = mysql_fetch_assoc($query);

	$id = $row['id'];
	$data = json_decode($row['data']);
	$mean = json_decode($row[$lang]);

	
	
	$related_query = mysql_query("select variant from variants where word like '".$q."'");
	$related_words = array();
	while($related_row=mysql_fetch_assoc($related_query)){
		if($related_row['variant']!=$q)
		{
			$related_words[] = $related_row['variant'];
		}
			
	}
	

	
	$related_words_imp = "'".implode("','",$related_words)."'";

	$related_mean_query = mysql_query("select ".$lang." as mean, word from lang where word in (".$related_words_imp.")");
	$related_mean_array = array();
	while($related_mean_row=mysql_fetch_assoc($related_mean_query)){
		$related_mean_array[$related_mean_row['word']] = $related_mean_row['mean'];
	}


	echo json_encode(array('main'=>$mrow[$lang],'data'=>$data, 'related'=>$related_mean_array,'mean'=>$mean, 'type'=>0));
	exit;
}



?>