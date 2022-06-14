<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
header('Access-Control-Allow-Origin: *');
require_once('connect4.php');
$q = strtolower(mysqli_real_escape_string($conn, trim($_REQUEST['q'])));


$query = mysqli_query($conn, "select word from word_sug where word like '".$q."%' limit 10");

$rows = array();
while($r=mysqli_fetch_assoc($query))
{
    $rows[] = $r['word'];
}
header('Content-Type: application/json');
echo json_encode($rows);


//$word = strtolower(trim($_REQUEST['q']));
//$file = "./word_sugg_list/word_".((strlen($word) > 8)? substr($word,0,8): $word).".txt";

//$result = [];
//if(file_exists($file)){
//	$result = file_get_contents($file);
//}
//header('Content-Type: application/json');
//if(!empty($result)){
//	$result = json_decode($result, true);
//	array_unshift($result, $word);
//	echo json_encode(array_unique($result));
//}else{
//	echo json_encode($result);
	//$pspell_link = pspell_new("en");
   // $suggestions_pre = pspell_suggest($pspell_link, $word);

  //  foreach ($suggestions_pre as $pre_sug) {
    //    if (strlen($pre_sug) > 3 and !preg_match("#\'#", $pre_sug) and !preg_match("#\s#", $pre_sug) and !preg_match("#\-#", $pre_sug)) {
      //      $result[] = $pre_sug;
    //    }
  //  }
	
//	echo json_encode(array_slice($result, 0, 10));
//}

?>