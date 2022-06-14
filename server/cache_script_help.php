<?php
ini_set('max_execution_time', '0');
set_time_limit(0);
require_once('./v5/connect.php'); 

$allowed_pages = ['read-text','favourite-words','search_history','blogs','contact-us','about-us','privacy'
,'disclaimer','learn-prepositions-by-photos','commonly-confused-words','form-of-verbs','300-plus-toefl-words'
,'learn-ten-words-everyday','vocabulary-game','blank-quiz','topic-wise-words','learn-3000-plus-common-words','post',
'learn-common-gre-words','learn-common-translations','local_lang','error', 'local'];

// $allowed_pages = ['local'];


if(!empty($argv[1])){
	$_GET['lang'] = $argv[1];
}

$lang = $_GET['lang'];

echo "php index_cache.php '".$lang."'******index.html\n";

if(in_array('error', $allowed_pages)){
echo "php cache_error.php '".$lang."'******error.html\n";
}

if(in_array('read-text', $allowed_pages)){
//read text
echo "php read-text.php '".$lang."'******english-to-".$lang."-read-text-with-translation\n";
}
if(in_array('favourite-words', $allowed_pages)){
//favourite words
echo "php favourite-words.php '".$lang."'******english-to-".$lang."-dictionary-favourite-words\n";
}
if(in_array('search_history', $allowed_pages)){
//search history
echo "php search_history.php '".$lang."'******english-to-".$lang."-dictionary-search-history\n";
}
if(in_array('blogs', $allowed_pages)){
//blogs
echo "php blogs.php '".$lang."'******english-to-".$lang."-dictionary-browse-all-blogs\n";
}
if(in_array('contact-us', $allowed_pages)){
//contact-us
echo "php contact-us.php '".$lang."'******english-to-".$lang."-dictionary-contact-us\n";
}
if(in_array('about-us', $allowed_pages)){
//about-us
echo "php about-us.php '".$lang."'******english-to-".$lang."-dictionary-about-us\n";
}
if(in_array('privacy', $allowed_pages)){
//privacy
echo "php privacy.php '".$lang."'******english-to-".$lang."-dictionary-privacy\n";
}
if(in_array('disclaimer', $allowed_pages)){
//disclaimer
echo "php disclaimer.php '".$lang."'******english-to-".$lang."-dictionary-disclaimer\n";
}
if(in_array('learn-prepositions-by-photos', $allowed_pages)){
//learn-prepositions-by-photos
echo "php learn-prepositions-by-photos.php '".$lang."'******english-to-".$lang."-dictionary-learn-prepositions\n";
}
if(in_array('commonly-confused-words', $allowed_pages)){
//commonly-confused-words
echo "php commonly-confused-words.php '".$lang."'******english-to-".$lang."-dictionary-commonly-confused-words\n";
}
if(in_array('form-of-verbs', $allowed_pages)){
//form-of-verbs
echo "php form-of-verbs.php '".$lang."'******english-to-".$lang."-dictionary-form-of-verbs\n";
}
if(in_array('300-plus-toefl-words', $allowed_pages)){
//300-plus-toefl-words
echo "php 300-plus-toefl-words.php '".$lang."'******english-to-".$lang."-dictionary-300-plus-toefl-words\n";
}
if(in_array('blogs', $allowed_pages)){
//single blogs
$query = "SELECT id,title,subject FROM blog_info WHERE lang = 'all' OR lang = '" . strtolower($lang) . "'";
$result = mysqli_query($conn, $query);
$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach($result as $blog){
echo "php blog.php '".$lang."' '".$blog['id']."'******english-to-".$lang."-dictionary-blog-".$blog['id']."\n";		
}
}
if(in_array('learn-ten-words-everyday', $allowed_pages)){
//learn words
echo "php learn-ten-words-everyday.php '".$lang."'******english-to-".$lang."-dictionary-learn-ten-words-everyday\n";
foreach(range('1','24') as $learn){
echo "php learn-ten-words-everyday.php '".$lang."' '".$learn."'******english-to-".$lang."-dictionary-learn-ten-words-everyday-season-".$learn."\n";	
	if($learn == 24){
echo "php learn-ten-words-everyday.php '".$lang."' '".$learn."' '1'******english-to-".$lang."-dictionary-learn-ten-words-everyday-season-".$learn."-episode-1\n";		
	}else{
		foreach(range('1','50') as $learn1){
echo "php learn-ten-words-everyday.php '".$lang."' '".$learn."' '".$learn1."'******english-to-".$lang."-dictionary-learn-ten-words-everyday-season-".$learn."-episode-".$learn1."\n";		
		}
	}
}
}
if(in_array('vocabulary-game', $allowed_pages)){			
//vocabulary-game
echo "php vocabulary-game.php '".$lang."'******english-to-".$lang."-dictionary-vocabulary-game\n";
foreach(range('1','24') as $voca){
echo "php vocabulary-game.php '".$lang."' '".$voca."'******english-to-".$lang."-dictionary-vocabulary-game-season-".$voca."\n";	
	if($voca == 24){
echo "php vocabulary-game.php '".$lang."' '".$voca."' '1'******english-to-".$lang."-dictionary-vocabulary-game-season-".$voca."-episode-1\n";		
	}else{
		foreach(range('1','50') as $voca1){
echo "php vocabulary-game.php '".$lang."' '".$voca."' '".$voca1."'******english-to-".$lang."-dictionary-vocabulary-game-season-".$voca."-episode-".$voca1."\n";		
		}
	}
}
}
if(in_array('blank-quiz', $allowed_pages)){
//fill in the blanks
foreach(range('1','38') as $fill){
echo "php blank-quiz.php '".$lang."' '".$fill."'******english-to-".$lang."-dictionary-fill-in-the-blanks-page-".$fill."\n";		
}
}
if(in_array('topic-wise-words', $allowed_pages)){
//Topic wise words
$query = "SELECT a.`topic`,CEILING(COUNT(a.id)/30) AS total FROM TopicWiseWords AS a
GROUP BY a.`topic`";
$result = mysqli_query($conn, $query);
$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach($result as $topic){
echo "php topic-wise-words.php '".$lang."' '".$topic['topic']."'******english-to-".$lang."-dictionary-topic-wise-words-".$topic['topic']."\n";		

	foreach(range('1',$topic['total']) as $row){
echo "php topic-wise-words.php '".$lang."' '".$topic['topic']."' '".$row."'******english-to-".$lang."-dictionary-topic-wise-words-".$topic['topic']."-page-".$row."\n";			
	}
}
}
if(in_array('learn-3000-plus-common-words', $allowed_pages)){
//Learn 3000 plus words
echo "php learn-3000-plus-common-words.php '".$lang."'******english-to-".$lang."-dictionary-learn-3000-plus-common-words\n";
	
$query = "SELECT a.`topic`,CEILING(COUNT(a.id)/20) AS total FROM `3000` AS a
GROUP BY a.`topic`";
$result = mysqli_query($conn, $query);
$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach($result as $topic){
echo "php learn-3000-plus-common-words.php '".$lang."' '".strtolower($topic['topic'])."'******english-to-".$lang."-dictionary-learn-3000-plus-common-words-".strtolower($topic['topic'])."\n";

	foreach(range('1',$topic['total']) as $row){
echo "php learn-3000-plus-common-words.php '".$lang."' '".strtolower($topic['topic'])."' '".$row."'******english-to-".$lang."-dictionary-learn-3000-plus-common-words-".strtolower($topic['topic'])."-page-".$row."\n";
	}
}
}
if(in_array('post', $allowed_pages)){
//Learn grammar
if($lang == 'bengali'){
echo "php post.php '".$lang."' '25' '2' 'agreement-of-verb-with-subjects'******english-to-".$lang."-dictionary-grammar-agreement-of-verb-with-subjects\n";		
echo "php post.php '".$lang."' '26' '2' 'sentence-simple-complex-compound'******english-to-".$lang."-dictionary-grammar-sentence-simple-complex-compound\n";		
echo "php post.php '".$lang."' '27' '2' 'right-form-of-verbs'******english-to-".$lang."-dictionary-right-grammar-form-of-verbs\n";		
echo "php post.php '".$lang."' '28' '2' 'narration'******english-to-".$lang."-dictionary-grammar-narration\n";		
echo "php post.php '".$lang."' '29' '2' 'gender'******english-to-".$lang."-dictionary-grammar-gender\n";		
echo "php post.php '".$lang."' '30' '2' 'number'******english-to-".$lang."-dictionary-grammar-number\n";		
echo "php post.php '".$lang."' '31' '2' 'articles'******english-to-".$lang."-dictionary-grammar-articles\n";		
echo "php post.php '".$lang."' '32' '2' 'voice'******english-to-".$lang."-dictionary-grammar-voice\n";
echo "php post.php '".$lang."' '33' '2' 'tense'******english-to-".$lang."-dictionary-grammar-tense\n";		
echo "php post.php '".$lang."' '34' '2' 'parts-of-speech'******english-to-".$lang."-dictionary-grammar-parts-of-speech\n";		
echo "php post.php '".$lang."' '35' '2' 'sentence'******english-to-".$lang."-dictionary-grammar-sentence\n";		
}
}
if(in_array('learn-common-gre-words', $allowed_pages)){
//Learn gre words
echo "php learn-common-gre-words.php '".$lang."'******english-to-".$lang."-dictionary-learn-common-gre-words\n";		

$query = "SELECT a.`topic`,CEILING(COUNT(a.id)/20) AS total FROM `gre` AS a GROUP BY a.`topic`";
$result = mysqli_query($conn, $query);
$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach($result as $topic){
echo "php learn-common-gre-words.php '".$lang."' '".strtolower($topic['topic'])."'******english-to-".$lang."-dictionary-learn-common-gre-words-".strtolower($topic['topic'])."\n";		

	foreach(range('1',$topic['total']) as $row){
echo "php learn-common-gre-words.php '".$lang."' '".strtolower($topic['topic'])."' '".$row."'******english-to-".$lang."-dictionary-learn-common-gre-words-".strtolower($topic['topic'])."-page-".$row."\n";			
}
}
}

if(in_array('learn-common-translations', $allowed_pages)){
//Learn Translations
echo "php learn-common-translations.php '".$lang."'******english-to-".$lang."-dictionary-learn-translations\n";
foreach(range('1','17') as $row){
echo "php learn-common-translations.php '".$lang."' '".$row."'******english-to-".$lang."-dictionary-learn-translations-page-".$row."\n";			
}
}

if(in_array('local_lang', $allowed_pages)){

echo "php local_lang.php '".$lang."'******".$lang."-to-english-meaning\n";
echo "php local.php '".$lang."'******".$lang."-to-english-dictionary\n";
}

if(in_array('local', $allowed_pages)){
//lang dictionary
echo "php local.php '".$lang."'******".$lang."-to-english-dictionary\n";


foreach(range('a','z') as $row){
echo "php local1.php '".$lang."' '".$row."'******english-to-".$lang."-dictionary-letter-".$row."\n";

	
	$array = explode(',',file_get_contents('https://content.mcqstudy.com/bw-static-files/ta-word-list/' . strtolower($row) . '.txt'));
	$array = array_unique(array_map(function($v) { return substr($v, 0, 2); }, $array));
	$array = array_filter($array);
	foreach($array as $value){
echo "php local2.php '".$lang."' '".$value."'******english-to-".$lang."-dictionary-two-letter-".$value."\n";
	}
}
$other = file_get_contents('https://content.mcqstudy.com/words/main/' . $lang . '.txt');
$other = explode(',', $other);
$other = array_filter($other);
foreach($other as $row1){
echo "php local1.php '".$lang."' '".$row1."'******".$lang."-to-english-dictionary-letter-".$row1."\n";

	$file = '/var/www/all_static_files/local/' . strtolower($lang) . '/' . $row1.'.txt';
        $myfile = fopen($file, "r");

        if ($myfile == true) {
           
             $data =  fread($myfile, filesize($file));
             fclose($myfile);
			 $array = explode(',',$data);
			 $array = array_unique(array_map(function($v) { return mb_substr($v, 0, 2); }, $array));
			 $array = array_filter($array);
			 foreach($array as $value){
echo "php local2.php '".$lang."' '".$value."'******".$lang."-to-english-dictionary-two-letter-".$value."\n";
			}
        }
}
}

?>


	
