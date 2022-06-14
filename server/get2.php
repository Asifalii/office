<?php
header('Access-Control-Allow-Origin: *');
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require('functions.php');

isUserAgent();

checkBot();

$dbhost = '127.0.0.1';
$dbuser = 'root2';
$dbpass = '#Bdw0rd3101';
$dbname = 'bdword.v3';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
mysqli_set_charset($conn, "utf8");

$q 		= str_replace(array('+','-'),' ',trim(mysqli_real_escape_string($conn, $_REQUEST['q'])));
if(preg_match('#::#', $q))
{
	$q_ex = explode('::', $q);
	$q = trim($q_ex[1]);
}
$lang 	= getLang();
$type 	= trim(mysqli_real_escape_string($conn, $_REQUEST['type']));


if($type==1)
{
	$mquery = mysqli_query($conn, "select word, `".$lang."` as `mean` from `lang` where `".$lang."` like '".$q."%' limit 10");

	if(mysqli_num_rows($mquery)==0)
	{
		$msg = 'No word meaning found for: '.$q;
		echo json_encode(array('main'=>'','data'=>'','mean'=>'','error'=>1, 'msg'=>$msg, 'type'=>1));
		exit;
	}

	$rows = array();
	while($row = mysqli_fetch_assoc($mquery))
	{
		$rows[] = $row;
	}

	echo json_encode(array('main'=>'','data'=>$rows,'mean'=>'', 'error'=>0, 'msg'=>'', 'type'=>1));
	exit;
	
}else
{
	$mquery = mysqli_query($conn, "select ".$lang." from lang where word like '".$q."' limit 1");
	$mrow = mysqli_fetch_assoc($mquery);

	if(mysqli_num_rows($mquery)==0)
	{
		$msg = 'No word meaning found for: '.$q;
		$pspell_array = '[]';
		
		$check_com_words = mysqli_num_rows(mysqli_query($conn, "select word from com_words where word like '".$q."'"));
		if($check_com_words==0 and strlen($q)<36)
		{
			$pspell_array = file_get_contents('http://sug.bdword.com/api_multiple.php?word='.urlencode($q));

			if(in_array($q, json_decode($pspell_array), true) and strlen($q)<36)
			{
				@mysqli_query($conn, 'insert into com_words (word) values ("'.$q.'")');
			}
		}
		
		echo json_encode(array('main'=>'','data'=>'','mean'=>'','error'=>1, 'msg'=>$msg, 'sug'=>$pspell_array, 'type'=>0));
		
		exit;
	}
	$sql = "select word, ".$lang.", id, data from word_frame where word like '".$q."' limit 1";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($query);

	$id = $row['id'];
	$data = json_decode($row['data']);
	$mean = json_decode($row[$lang]);
	$nex = null;
	$prev = null;
	$img_check = mysqli_fetch_assoc(mysqli_query($conn, "select nex,prev from img_words where word='".$q."' limit 1"));
	if($img_check['nex'])
	{	
		$data->img = $q;
		$nex = $img_check['nex'];
		$prev = $img_check['prev'];
	}
	
	$related_query = mysqli_query($conn,"select variant from variants where word like '".$q."'");
	$related_words = array();
	while($related_row=mysqli_fetch_assoc($related_query)){
		if($related_row['variant']!=$q)
		{
			$related_words[] = $related_row['variant'];
		}
			
	}
	

	
	$related_words_imp = "'".implode("','",$related_words)."'";

	$related_mean_query = mysqli_query($conn, "select ".$lang." as mean, word from lang where word in (".$related_words_imp.")");
	$related_mean_array = array();
	while($related_mean_row=mysqli_fetch_assoc($related_mean_query)){
		$related_mean_array[$related_mean_row['word']] = $related_mean_row['mean'];
	}


	echo json_encode(array('main'=>$mrow[$lang],'data'=>$data, 'nex'=>$nex, 'prev'=>$prev, 'related'=>$related_mean_array,'mean'=>$mean, 'type'=>0));
	exit;
}



?>