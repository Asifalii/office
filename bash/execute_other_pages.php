<?php

$file = file_get_contents('/var/www/html/server/bash/allurls.txt');

$file_ex = explode('\r\n', $file);

echo "<pre>";

print_r($file_ex);

?>