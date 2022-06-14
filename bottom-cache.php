<?php
$content = ob_get_contents();

ob_end_clean();
$file = fopen ( $cache_filename, 'w' );
fwrite ( $file, $content );
fclose ( $file );
echo gzencode($content);
?>
