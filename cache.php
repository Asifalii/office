<?php 
function cache_page($content) {
	//path location where the cache file should be placed
	$fileName = $_SERVER['DOCUMENT_ROOT'].$_SERVER["REQUEST_URI"];
	if(false !== ($f = @fopen($fileName, 'w'))) {
      fwrite($f, $content);
      fclose($f);
    }
    return $content.'';
}
// Start the output buffer for cache with callback on buffer-flush
 ob_start('cache_page');

?>