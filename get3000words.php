<?php
	require('connect.php');
         $language = $_REQUEST['language'];   
	
	$sql = "SELECT DISTINCT(word) FROM `3000` ORDER BY RAND() LIMIT 10";

	$query = mysqli_query($conn, $sql);
	$alls = array();
	while($row = mysqli_fetch_assoc($query))
	{
		$alls[] = $row['word'];
	}
	
	$mean = array();
            $query = mysqli_query($conn, "select `" . $language . "` as mean, word from v3_word_mean where word in ('" . implode("','", $alls) . "')");
            while ($row = mysqli_fetch_assoc($query)) {

                $mean[$row['word']] = $row['mean'];
            }

	
	//echo '<pre>';
	//print_r($mean);
	//die;
	echo json_encode($mean);
	exit;

?>