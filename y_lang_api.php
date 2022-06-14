<?php 
require_once('./v5/connect.php');

if($_GET['user'] == '@ppuser' && $_GET['pass'] == 'E@z8k>jP'){
	$lang = $_GET['lang'];

	if($lang){
		$query = "SELECT data,attr,ids FROM y_lang_".$lang;
		$result = mysqli_query($conn, $query);
		$y_array = mysqli_fetch_all($result,MYSQLI_ASSOC);

		echo json_encode($y_array);
	}
}
?>