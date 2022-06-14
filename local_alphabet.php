<?php
ini_set('max_execution_time', 0);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once('./v5/connect.php');
$lang = 'czech';
$path = '/var/www/html/server/main/local/'.$lang;
	if (!file_exists($path)) {
		mkdir($path, 0777, true);
	}
	
$main_loop_query = mysqli_fetch_all(mysqli_query($conn, 'SELECT distinct(left(mean,1)) as letter 
												FROM y_'.$lang.'_master
												where mean is not null and left(mean,1) != "Ã"
												order by letter'));

$array = array_column($main_loop_query, 0);	

$letter = [];
foreach($array as $row){
	if(!preg_match("/[a-z,A-Z]/i", $row)){
		$letter[] = $row;
	}
}	
																								
$final = [];
for($i =7; $i<27; $i++){
	$final[] = $letter[$i];
}
file_put_contents('/var/www/html/server/main/'.$lang.'.txt', implode(',',$final));	
foreach($final as $row){
	$query = mysqli_fetch_all(mysqli_query($conn, 'SELECT mean as letter 
				FROM y_'.$lang.'_master
				where left(mean,1) = trim("'.$row.'") and mean not LIKE "[^a-zA-Z]"'));
	
	$result = array_column($query, 0);
	file_put_contents('/var/www/html/server/main/local/'.$lang.'/'.$row.'.txt', implode(',',$result));	
}


die;
						
	echo '<pre>';
	print_r($letter);
	die;											
