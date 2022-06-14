<?php
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
}

$q = $_GET['word'];
include('./v5/local_db.php');
$fields = array('Serial', 'Word'); 
$excelData = implode("\t", array_values($fields)) . "\n"; 
$title = "word_".$q;
$sql = "SELECT DISTINCT(word) FROM missing_words WHERE word LIKE '".$q."%'";
$fileName = $title.".xlsx"; 
$query = mysqli_query($conn, $sql);
$i=0; 
while ($row = mysqli_fetch_assoc($query)) {
	$i++; 
	 $rowData = array($i,$row['word']); 
        array_walk($rowData, 'filterData'); 
        $excelData .= implode("\t", array_values($rowData)) . "\n"; 
}
 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
header("Content-Type: application/vnd.ms-excel"); 
echo $excelData; 
?>