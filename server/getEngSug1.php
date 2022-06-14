$fileName = "https://content2.mcqstudy.com/sugfiles/word_".$q.".txt";
$rows = file_get_contents($fileName);

if($rows){
	$rows = str_replace('"', '', $rows);
	$rows = str_replace('[', '', $rows);
	$rows = str_replace(']', '', $rows);
	$rows = explode(',', $rows);
}
header('Content-Type: application/json');
echo json_encode($rows);