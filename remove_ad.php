<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


if (!empty($argv[1])) {

    $_GET['lang'] = $argv[1];

}

if (!empty($argv[1])) {

    $_GET['word'] = $argv[2];

}

require_once('connect3.php');

$word = $_GET['word'];
$lang = $_GET['lang'];

if(!$lang || !$word){
die('parameters missing');
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  
$sql = "INSERT INTO restrictad (word) VALUES ('".$word."')";

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


$file = file_get_contents('/mnt/volume_sgp1_05/all_cache_files/'.$lang.'/english-to-'.$lang.'-meaning-'.$word);

$file = str_replace('<script data-ad-client="ca-pub-2642708445471409" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>','',$file);
$file = str_replace('<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>','',$file);
$file = str_replace('data-ad-client="ca-pub-2642708445471409"','',$file);
$file = str_replace('class="adsbygoogle"','',$file);
$file = str_replace('data-ad-slot="6432811883"','',$file);
$file = str_replace('data-ad-format="rectangle"','',$file);

$file = str_replace('<script data-ad-client="ca-pub-2642708445471409" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js" type="ee6e349c4cb48ce41d6df17e-text/javascript"></script>','',$file);

$file = str_replace('(adsbygoogle = window.adsbygoogle || []).push({});','',$file);

file_put_contents('/mnt/volume_sgp1_05/all_cache_files/'.$lang.'/english-to-'.$lang.'-meaning-'.$word, $file);



?>