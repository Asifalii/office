<?php
set_time_limit(0);

$lang = $_GET['lang'];

if($lang)
{
	require_once('../connect.php');

	$query = mysql_query("select alls,id from words where added=0");
	while($row=mysql_fetch_assoc($query))
	{
		$file = store($row['alls'], $lang);
		$id = $row['id'];
		$mean = mysql_real_escape_string($file);

		mysql_query('update words set '.$lang.'="'.$mean.'", added=1 where id='.$id.' limit 1');
	}

	// mysql_query('update words set added=0');

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