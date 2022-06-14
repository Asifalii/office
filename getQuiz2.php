<?php
header('Access-Control-Allow-Origin: *');
require('functions.php');
$id = (int)$_REQUEST['id'];
$sid = (int)$_REQUEST['sid'];
$lang = $_REQUEST['lang'];

if($id)
{
	require('connect4.php');
	
	$limit = 10;
	$start = (($id-1)) * $limit + ($sid * 500);

	$sql = "select word,".$lang." as details from text where `".$lang."`!='' limit ".$start.", ".$limit;

	$query = mysqli_query($conn, $sql);
	$alls = array();
	while($row = mysqli_fetch_assoc($query))
	{
		$all = array();
		$quiz = array();
		$ans = '';
		$all['main'] = $row['word'];
		
		$all_ex = explode('@@@', $row['details']);
		$i = 0;
		foreach($all_ex as $allex)
		{
			$a_ex = explode('###',$allex);
			if($i==0)
			{
				$ans = $a_ex[1];
			}
			$quiz[] = $a_ex[1];
			$i++;
		}
		shuffle($quiz);
		$all['quiz'] = $quiz;
		$all['ans'] = $ans;
		
		$alls[] = $all;
	}
	
	echo json_encode($alls);
	exit;
	
}

?>