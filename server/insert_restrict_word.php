<?php

$password = $_GET['pass'];
$word = $_GET['word'];

	if($password != 'FMrRkAvRrEZd8U4x'){
		die('No Permission found');
	}

	require_once('./v5/connect.php');
	$sql = "select * from restrictad where word = '".$word."'";
	$query = mysqli_query($conn, $sql);
	$result = mysqli_fetch_assoc($query);

if (!empty($result)) {
	die('already exists!!');
}else{
	$sql = "INSERT INTO restrictad (word)
			VALUES ('" . $word ."')";
   
	if ($conn->query($sql) === TRUE) { 
		echo 'Data insert successfull!';
	}else{
		die('Data insert failed!!');
	}  
}

?>
