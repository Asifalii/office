<?php 
require_once('./v5/connect.php');

if($_GET['user'] == '@ppuser' && $_GET['pass'] == 'E@z8k>jP'){

		$query = "SELECT k FROM k_v";
		$result = mysqli_query($conn, $query);
		$x_array = array_column(mysqli_fetch_all($result,MYSQLI_ASSOC),'k');

		echo json_encode($x_array);
}

?>