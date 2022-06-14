

<?php
ini_set("auto_detect_line_endings", true);

$file = file_get_contents("as.csv", "r");


$file_lines = preg_split("/\\r\\n|\\r|\\n/", $file);

// print_r($file_lines);

for($i=0; $i<count($file_lines); $i++){


    $each_line = explode(",", $file_lines[$i]);

    // echo $each_line[0].'-->'.$each_line[1];
    echo "INSERT INTO phrase(word, text) VALUES('".$each_line[0]."','".$each_line[1]."');\n";
   
}


?>
