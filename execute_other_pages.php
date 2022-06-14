<?php

if (!empty($argv[1])) {
    $_GET['lang'] = $argv[1];
} 

$file = file_get_contents('/var/www/html/server/bash/allurls.txt');

$file_ex = explode('\r\n', $file);

foreach($file_ex as $k=>$v){

    $v_ex = explode('******', $v);

    $command = str_replace("'$'\n'","",$v_ex[0]);
    $filename = str_replace("'$'\n'","",$v_ex[1]);

    $html = shell_exec($command);

    file_put_contents('/mnt/volume_sgp1_05/all_cache_files/'.$_GET['lang'].'/'.$filename, $html);

}



?>