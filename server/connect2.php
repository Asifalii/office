<?php
$dbhost = '127.0.0.1';
$dbuser = 'root2';
$dbpass = '#Bdw0rd3101';
$dbname = 'bdword.v3';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
mysqli_set_charset($conn, "utf8");

//mysql_connect('localhost','bdword','#Bdw0rd3101');
//mysql_select_db('bdword.v3');
?>