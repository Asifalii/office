<?php
header('Access-Control-Allow-Origin: *');
require('functions.php');
$id = (int)$_REQUEST['id'];
$lang = getLang();

if($id)
{
	require('connect4.php');
	
	$limit = 5;
	$start = ($id-1) * $limit;

	$sql = "select * from fill_blank_quiz limit ".$start.", ".$limit;

	$query = mysqli_query($conn, $sql);
	$alls = array();
	while($row = mysqli_fetch_assoc($query))
	{
		$all = array();
		$quiz = array();
		$ans = '';
		$all['main'] = $row['question'];
		
		$quiz[0]= $row['option1'];
		$quiz[1]= $row['option2'];
		$quiz[2]= $row['option3'];
		$quiz[3]= $row['option4'];
		
		shuffle($quiz);
		$all['quiz'] = $quiz;
		$all['ans'] = $row['answer'];
		
		$alls[] = $all;
	}
	
	echo json_encode($alls);
	exit;
	
}

?>