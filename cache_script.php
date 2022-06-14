<?php
ini_set('max_execution_time', '0');
require_once('./v5/connect.php'); 
$alpha = array('welsh','zulu','yoruba','xhosa','uzbek','swahili',
		'sundanese','spanish','somali','slovenian','slovak','shona','samoan','norwegian','malagasy'
		,'javanese','indonesian','hmong','filipino','dutch','afrikaans','albanian',
		'basque','cebuano','chichewa');
// do not add ads on 'contact-us','about-us','privacy', 'error'

$allowed_pages = ['index', 'read-text','favourite-words','search_history','blogs','contact-us','about-us','privacy' ,'disclaimer','learn-prepositions-by-photos','commonly-confused-words','form-of-verbs','300-plus-toefl-words','learn-ten-words-everyday','vocabulary-game','blank-quiz','topic-wise-words','learn-3000-plus-common-words','post', 'learn-common-gre-words','learn-common-translations','local_lang','error', 'local'];
//$allowed_pages = ['index'];

if(!empty($argv[1])){
	$_GET['lang'] = $argv[1];
}

$lang = $_GET['lang'];

if(in_array('index', $allowed_pages)){
	$index_html = shell_exec("php index_cache.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/index.html", $index_html);
}

if(in_array('error', $allowed_pages)){
	$index_html = shell_exec("php cache_error.php '".$lang."'");
	// echo $index_html;
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/error.html", $index_html);
}

if(in_array('read-text', $allowed_pages)){
	$index_html = shell_exec("php read-text.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-read-text-with-translation", $index_html);
}
if(in_array('favourite-words', $allowed_pages)){
	$index_html = shell_exec("php favourite-words.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-favourite-words", $index_html);
}
if(in_array('search_history', $allowed_pages)){
	$index_html = shell_exec("php search_history.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-search-history", $index_html);
}
if(in_array('blogs', $allowed_pages)){
	$index_html = shell_exec("php blogs.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-browse-all-blogs", $index_html);
}
if(in_array('contact-us', $allowed_pages)){
	$index_html = shell_exec("php contact-us.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-contact-us", $index_html);
}
if(in_array('about-us', $allowed_pages)){
	$index_html = shell_exec("php about-us.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-about-us", $index_html);
}
if(in_array('privacy', $allowed_pages)){
	$index_html = shell_exec("php privacy.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-privacy", $index_html);
}
if(in_array('disclaimer', $allowed_pages)){
	$index_html = shell_exec("php disclaimer.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-disclaimer", $index_html);
}
if(in_array('learn-prepositions-by-photos', $allowed_pages)){
	$index_html = shell_exec("php learn-prepositions-by-photos.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-learn-prepositions", $index_html);
}
if(in_array('commonly-confused-words', $allowed_pages)){
	$index_html = shell_exec("php commonly-confused-words.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-commonly-confused-words", $index_html);
}
if(in_array('form-of-verbs', $allowed_pages)){
	$index_html = shell_exec("php form-of-verbs.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-form-of-verbs", $index_html);
}
if(in_array('300-plus-toefl-words', $allowed_pages)){
	$index_html = shell_exec("php 300-plus-toefl-words.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-300-plus-toefl-words", $index_html);
}
if(in_array('blogs', $allowed_pages)){

	$query = "SELECT id,title,subject FROM blog_info WHERE lang = 'all' OR lang = '" . strtolower($lang) . "'";
	$result = mysqli_query($conn, $query);
	$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
	foreach($result as $blog){
		$index_html = shell_exec("php blog.php '".$lang."' '".$blog['id']."'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-blog-".$blog['id'], $index_html);
	}
}

if(in_array('blank-quiz', $allowed_pages)){

	foreach(range('1','38') as $fill){
		$index_html = shell_exec("php blank-quiz.php '".$lang."' '".$fill."'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-fill-in-the-blanks-page-".$fill, $index_html);	
	}

}

if(in_array('topic-wise-words', $allowed_pages)){

$query = "SELECT a.`topic`,CEILING(COUNT(a.id)/30) AS total FROM TopicWiseWords AS a
GROUP BY a.`topic`";
$result = mysqli_query($conn, $query);
$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
	foreach($result as $topic){
		$index_html = shell_exec("php topic-wise-words.php '".$lang."' '".$topic['topic']."'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-topic-wise-words-".$topic['topic'], $index_html);

		foreach(range('1',$topic['total']) as $row){
			$index_html = shell_exec("php topic-wise-words.php '".$lang."' '".$topic['topic']."' '".$row."'");
			file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-topic-wise-words-".$topic['topic']."-page-".$row, $index_html);
		}
	}
}
if(in_array('learn-3000-plus-common-words', $allowed_pages)){
	$index_html = shell_exec("php learn-3000-plus-common-words.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-learn-3000-plus-common-words", $index_html);
	
$query = "SELECT a.`topic`,CEILING(COUNT(a.id)/20) AS total FROM `3000` AS a
GROUP BY a.`topic`";
$result = mysqli_query($conn, $query);
$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach($result as $topic){
	$index_html = shell_exec("php learn-3000-plus-common-words.php '".$lang."' '".strtolower($topic['topic'])."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-learn-3000-plus-common-words-".strtolower($topic['topic']), $index_html);

	foreach(range('1',$topic['total']) as $row){
		$index_html = shell_exec("php learn-3000-plus-common-words.php '".$lang."' '".strtolower($topic['topic'])."' '".$row."'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-learn-3000-plus-common-words-".strtolower($topic['topic'])."-page-".$row, $index_html);
	}
}
}
if(in_array('post', $allowed_pages)){

	if($lang == 'bengali'){
		$index_html = shell_exec("php post.php '".$lang."' '25' '2' 'agreement-of-verb-with-subjects'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-grammar-agreement-of-verb-with-subjects", $index_html);

		$index_html = shell_exec("php post.php '".$lang."' '26' '2' 'agreement-of-verb-with-subjects'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-grammar-sentence-simple-complex-compound", $index_html);

		$index_html = shell_exec("php post.php '".$lang."' '27' '2' 'agreement-of-verb-with-subjects'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-right-grammar-form-of-verbs", $index_html);

		$index_html = shell_exec("php post.php '".$lang."' '28' '2' 'agreement-of-verb-with-subjects'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-grammar-narration", $index_html);

		$index_html = shell_exec("php post.php '".$lang."' '29' '2' 'agreement-of-verb-with-subjects'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-grammar-gender", $index_html);

		$index_html = shell_exec("php post.php '".$lang."' '30' '2' 'agreement-of-verb-with-subjects'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-grammar-number", $index_html);

		$index_html = shell_exec("php post.php '".$lang."' '31' '2' 'agreement-of-verb-with-subjects'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-grammar-articles", $index_html);

		$index_html = shell_exec("php post.php '".$lang."' '32' '2' 'agreement-of-verb-with-subjects'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-grammar-voice", $index_html);

		$index_html = shell_exec("php post.php '".$lang."' '33' '2' 'agreement-of-verb-with-subjects'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-grammar-tense", $index_html);

		$index_html = shell_exec("php post.php '".$lang."' '34' '2' 'agreement-of-verb-with-subjects'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-grammar-parts-of-speech", $index_html);

		$index_html = shell_exec("php post.php '".$lang."' '35' '2' 'agreement-of-verb-with-subjects'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-grammar-sentence", $index_html);

	}
}
if(in_array('learn-common-gre-words', $allowed_pages)){
	$index_html = shell_exec("php learn-common-gre-words.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-learn-common-gre-words", $index_html);

	$query = "SELECT a.`topic`,CEILING(COUNT(a.id)/20) AS total FROM `gre` AS a GROUP BY a.`topic`";
	$result = mysqli_query($conn, $query);
	$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
	foreach($result as $topic){
		$index_html = shell_exec("php learn-common-gre-words.php '".$lang."' '".strtolower($topic['topic'])."'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-learn-common-gre-words-".strtolower($topic['topic']), $index_html);

		foreach(range('1',$topic['total']) as $row){
			$index_html = shell_exec("php learn-common-gre-words.php '".$lang."' '".strtolower($topic['topic'])."' '".$row."'");
			file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-learn-common-gre-words-".strtolower($topic['topic'])."-page-".$row, $index_html);
		}
	}
}

if(in_array('learn-common-translations', $allowed_pages)){
	$index_html = shell_exec("php learn-common-translations.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-learn-translations", $index_html);
	foreach(range('1','17') as $row){
		$index_html = shell_exec("php learn-common-translations.php '".$lang."' '".$row."'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-learn-translations-page-".$row, $index_html);
	}
}

if(in_array('local_lang', $allowed_pages)){
	//$index_html = shell_exec("php local_lang.php '".$lang."'");
	//file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/".$lang."-to-english-meaning", $index_html);

	//$index_html = shell_exec("php local.php '".$lang."'");
	//file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/".$lang."-to-english-dictionary", $index_html);
}

if(in_array('local', $allowed_pages)){
	$index_html = shell_exec("php local.php '".$lang."'");
	file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/".$lang."-to-english-dictionary", $index_html);

	
	foreach(range('a','z') as $row){
		$index_html = shell_exec("php local1.php '".$lang."' '".$row."'");
		file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/english-to-".$lang."-dictionary-letter-".$row, $index_html);
	}
	
	if(in_array($lang, $alpha)){
		foreach(range('a','z') as $row){
			$index_html = shell_exec("php local_ap.php '".$lang."' '".$row."'");
			file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/".$lang."-to-english-dictionary-letter-".$row, $index_html);
		}
	}else{
		$other = file_get_contents('https://content2.mcqstudy.com/main/' . $lang . '.txt');
		$other = explode(',', $other);
		if($other){
			$other = array_filter($other);
			foreach($other as $row1){
				$index_html = shell_exec("php local1.php '".$lang."' '".$row1."'");
				file_put_contents("/mnt/volume_sgp1_05/all_cache_files/".$lang."/".$lang."-to-english-dictionary-letter-".$row1, $index_html);
			}
		}
		
	}
	

}

?>


	
