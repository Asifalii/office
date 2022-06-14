<?php
require('connect.php');
$total = mysql_num_rows(mysql_query('select * from '.$_GET['lang']));
echo $total;
?>