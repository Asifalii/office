<?php

$dbhost = 'localhost';
$dbuser = 'root2';
$dbpass = '#Bdw0rd3101';
// $dbpass = 'ea1392de21ec0dbd0e9d1bc79fea146a40867099790f0721';

$dbname = 'bdword.v3';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
mysqli_set_charset($conn, "utf8");

?>