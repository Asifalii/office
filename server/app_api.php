<?php 
require_once('./v5/connect.php');

$query = "SELECT * FROM app_list_word WHERE status = 1 ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);

$array['group_key'] = 'word_details'; 
$array['group_msg'] = $row[1];

 echo json_encode($array);
?>