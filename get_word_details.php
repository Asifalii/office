<?php
require_once('./v5/connect.php');
$q = $_GET['q'];
$lang = $_GET['lang'];

if($q and $lang){
	
	$sql1 = mysqli_fetch_assoc(mysqli_query($conn, "select mean from x_" . $lang . " where word='" . $q . "' limit 1"));
    $result['meaning'] = $sql1['mean'];
	
		if(empty($result['meaning'])){
			$url= 'variant/'.$q.'.txt';
			$arrContextOptions=array(
				"ssl"=>array(
					"verify_peer"=>false,
					"verify_peer_name"=>false,
				),
			);
			$response = file_get_contents($url, false, stream_context_create($arrContextOptions));

		if (!empty($response)) {
			$q = $response;
		}
		
		$sql1 = mysqli_fetch_assoc(mysqli_query($conn, "select mean from x_" . $lang . " where word='" . $q . "' limit 1"));
		$result['meaning'] = $sql1['mean'];
	}
	
	$sql = mysqli_fetch_assoc(mysqli_query($conn, "select details from y_" . $lang . " where word='" . $q . "' limit 1"));
    $result['details'] = json_decode($sql['details'],true);
	
	$partsOfSpeech = ['noun','pronoun','verb','adjective','adverb','preposition','conjunction','interjection'];
	
	foreach($partsOfSpeech as $row){
		if(empty($result['details'][$row])){
			$result['details'][$row] = 'null';
		}
	}
	echo json_encode($result);
}
?>