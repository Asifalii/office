<?php

$dbhost = '127.0.0.1';
$dbuser = 'root2';
$dbpass = '#Bdw0rd3101';
$dbname = 'bdword.v3';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
mysqli_set_charset($conn, "utf8");


//$dbhost = 'localhost';
//$dbuser = 'bdword';
//$dbpass = '#Bdw0rd3101';

//$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
if(! $conn ){
     die('Could not connects : ' . mysqli_error());
}

//mysqli_select_db($conn,"bdword.v3");

//mysqli_set_charset($conn,"utf8");

?>