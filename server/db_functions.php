<?php

function connect(){
	mysql_connect('localhost','bdword','#Bdw0rd3101');
	mysql_select_db('bdword.v3');
}

function connectWithCharSet(){
	mysql_connect('localhost','bdword','#Bdw0rd3101');
	mysql_select_db('bdword.v3');
	mysql_set_charset("utf8");
}

?>