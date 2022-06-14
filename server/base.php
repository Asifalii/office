<?php
session_start();
// $base_url = "http://localhost/bdword_theme/";

function base_url(){
  return sprintf(
    "%s://%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['HTTP_HOST']
  );
}

$base_url = base_url();

$_SESSION["ad_count"] = $_SESSION["ad_count"] + 1;

$ad_group = "google";

if($_SESSION["ad_count"]%3==0){

	// $ad_group = "media";
	$ad_group = "google";

}

$isMobile = 0;

if(preg_match("/(android|avantgo|ipad|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])){
	$isMobile = 1;
}

$ads = true;

?>