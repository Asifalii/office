<?php 

    $file = "error.html";

    // Name of the gz file we're creating
    $gzfile = "error.html.gz";

    // Open the gz file (w9 is the highest compression)
    $fp = gzopen ($gzfile, 'w9');

    // Compress the file
    gzwrite ($fp, file_get_contents($file));

    // Close the gz file and we're done
    gzclose($fp);

?>