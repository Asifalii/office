<?php
error_reporting(0);

$dbhost = 'localhost';
$dbuser = 'root2';
$dbpass = '#Bdw0rd3101';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
 
if(! $conn ){
     die('Could not connect: ' . mysqli_error());
}

mysqli_select_db($conn,"bdword.v3");

$lang = mysqli_real_escape_string($conn, trim($_REQUEST['lang']));

$ulang = ucfirst($lang);

$q = mysqli_real_escape_string($conn, trim(strtolower($_REQUEST['q'])));


$base_url = sprintf("%s://%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', $_SERVER['HTTP_HOST']);


?>
<meta charset="utf8">

<?php
	$variant_row = mysqli_fetch_assoc(mysqli_query($conn,'select word from variants where variant like "'.$q.'" limit 1'));

	
	if(count($variant_row)>0){
		
		$q = $variant_row['word'];
		
	}
	
	
	$y_bengali = mysqli_fetch_assoc(mysqli_query($conn,"select details from y_".$lang." where word='".$q."' limit 1"));
	$y_bengali_details = json_decode($y_bengali['details'],true);
	
	
	if(count($y_bengali_details) > 0){
						
		$get_root_query = mysqli_fetch_assoc(mysqli_query($conn,'select root from v3_word_list where word="'.$q.'" limit 1'));
				
		if($get_root_query['root']){
			$q = $get_root_query['root'];
		}
		
		$sql = 'select word, '.$lang.', id, data from v3_word_frame where word="'.$q.'" limit 1';

		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);

	
		$id = $row['id'];
		$data = json_decode($row['data']);
		$mean = json_decode($row[$lang]);
		$nex = null;
		$prev = null;
		$ba_img = null;
		$img_check = mysqli_fetch_assoc(mysqli_query($conn,'select nex,prev,height,width from img_words where word="'.$q.'" limit 1'));
		if($img_check['nex'])
		{	
			$ba_img = $q;
			$nex = $img_check['nex'];
			$prev = $img_check['prev'];
			$height = $img_check['height'];
			$width = $img_check['width'];
		}
		
		
		// bn
		$mean_array = get_object_vars($mean);
		
		$details = $y_bengali_details;
		
		echo '<p style="font-weight:bold; font-size:14px;">English to '.$ulang.' Meaning</p><hr style="border: 0; border-top: 1px solid #eee; margin: 10px 0;"/>';
		
		if((isset($details['result']) && $details['result'] != null) || (isset($details['m']) && $details['m'] != null && sizeof($details['m']) > 0)){
			
			foreach($details as $key => $value){
				
				if($key != 'result'){
					
					if($key == 'm'){
					
						if(isset($value) && $value != null && sizeof($value) > 0){
				
							echo '<p style="font-weight: bold;">Details : </p>';
							
							echo '<p>'.implode(', ',$value).'</p><hr style="border: 0; border-top: 1px solid #eee; margin: 10px 0;"/>';
							
				
						}
					
					}else{
						
						
							echo '<p style="font-weight: bold;">'.$key.'</p>';
							
							echo '<p>'.implode(', ',$value).'</p><hr style="border: 0; border-top: 1px solid #eee; margin: 10px 0;"/>';
						
					}
					
				}
				
			}
			
		}
		
	}else{
		
		$mquery = mysqli_query($conn,"select mean from x_".$lang." where word='".$q."' limit 1");
		if(mysqli_num_rows($conn, $mquery)>0){
			$mrow = mysqli_fetch_assoc($mquery);

			echo '<p style="font-weight:bold; font-size:14px;">English to '.$ulang.' Meaning</p><hr style="border: 0; border-top: 1px solid #eee; margin: 10px 0;"/>';
			echo $mrow['mean'];

			
		}else{
			showSugError($conn, $q, $lang);
		}
			
			
		
		
	}
		
	echo "<center><a target='_blank' href='https://".getBaseURL($lang)."/english-to-".$lang."-meaning-".$q."' style='display: inline-block; padding: 5px 12px !important; margin-bottom: 0 !important; font-size: 14px !important; font-weight: 400; line-height: 1.42857143; text-align: center; white-space: nowrap; vertical-align: middle; -ms-touch-action: manipulation; touch-action: manipulation; cursor: pointer; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; background-image: none; border: 1px solid transparent; border-radius: 4px;color: #fff; background-color: #337ab7; border-color: #2e6da4;'>See Details</a></center>";
	
	function showSugError($conn, $q, $lang){
		
		$pspell_link = pspell_new('en');
		$word = $q;
		
		$text = '';
		
		if (!pspell_check($pspell_link, ucfirst($word)))
		{
			
			 $suggestions_pre = pspell_suggest($pspell_link, $word);
				
				$suggestions = array();
				
				foreach($suggestions_pre as $pre_sug)
				{
					if(strlen($pre_sug)>3 and !preg_match("#\'#",$pre_sug) and  !preg_match("#\s#",$pre_sug) and !preg_match("#\-#",$pre_sug) )
					{
						$suggestions[] = $pre_sug;
					}
				}
				
				$sug_word_list = '';
			
				for($i=0;$i<count($suggestions);$i++)
				{
					$sug_word_list .= "<a target='_blank' style='color:#d9534f;' href='".$base_url."index.php?q=$suggestions[$i]&lang=$lang'>".$suggestions[$i]."</a><br>";
				
				}
				
				if($sug_word_list!=''){
										
					echo $sug_word_list;
				}else{
					echo '<p style="color:#d9534f; font-weight:bold;">Sorry We did not find the word meaning.</p>';
				}
				
		}else{
			echo '<p style="color:#d9534f; font-weight:bold;">Sorry We did not find the word meaning.</p>';
		}
		
	}
	
function getBaseURL($lang){
	
	
	$lang_by_url = array(
		'bengali'	=> 'www.bdword.com',
		'arabic'	=> 'www.english-arabic.org',
		'gujarati'	=> 'www.english-gujarati.com',
		'hindi'		=> 'www.english-hindi.net',
		'kannada'	=> 'www.english-kannada.com',
		'malay'		=> 'www.english-malay.net',
		'marathi'	=> 'www.english-marathi.net',
		'nepali'	=> 'www.english-nepali.com',
		'punjabi'	=> 'www.english-punjabi.net',
		'tamil'		=> 'www.english-tamil.net',
		'telugu'	=> 'www.english-telugu.net',
		'thai'		=> 'www.english-thai.net',
		'welsh'		=> 'www.english-welsh.net'
		
	);
	
	if($lang_by_url[$lang]!=null){
		return $lang_by_url[$lang];
	}else{
		return $lang.'.english-dictionary.help';
	}
}
	
	
?>

	
