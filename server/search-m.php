<?php
require('functions.php');
redirectOlds();
header("HTTP/1.1 301 Moved Permanently"); 
header('Location: '.base_url().'/english-to-'.getLang().'-meaning-'.$_GET['q']);

exit;

?>