<?php
header("HTTP/1.1 200 OK");
//header("Content-Type: application/json"); 
header("Content-Encoding: gzip");

$cache_filename = ($_SERVER['PHP_SELF']) . "?" . $_SERVER['QUERY_STRING'];
$cache_filename = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$cache_filename = "./cache/".md5($cache_filename);
$cache_limit_in_mins = 60 * 60; // It's one hour

if (file_exists($cache_filename))
{
    $secs_in_min = 60;
    $diff_in_secs = (time() - ($secs_in_min * $cache_limit_in_mins)) - filemtime($cache_filename);
    if ( $diff_in_secs < 0 )
    {
        print file_get_contents($cache_filename);
		die;
        exit();
    }
}
ob_start("ob_gzhandler");
?>
