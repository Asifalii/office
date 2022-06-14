<?php 
header('Access-Control-Allow-Origin: *');
require_once('connect4.php');
$q = $_REQUEST['word'];
$lang = $_REQUEST['lang'];
$mquery = mysqli_query($conn, "select word, `mean` from `x_" . $lang . "` where `mean`='" . $q . "' limit 10");
$rows = array();
while($r=mysqli_fetch_assoc($mquery))
{
    $rows[] = $r['word'] . ' :: ' . $r['mean']; 
}
    
header('Content-Type: application/text');
echo json_encode($rows);

?>




