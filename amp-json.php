<?php

set_time_limit(0);

if($_GET['msg']=='not-found'){
	header("HTTP/1.0 404 Not Found");
}
require('functions.php');
redirectOlds();
$q 				= sanitize($_GET['q']);

if(preg_match('#::#', $q))
{
	$q_ex = explode('::', $q);
	$q = trim($q_ex[1]);
}

$info 			= array();
$url 			= base_url();
$lang 			= getLang();
$ulang 			= ucfirst($lang);
$inWordList 	= true;
	
$isMobile 		= isMobile();

connectWithCharSet();


$dir = 'word/';
            $files = scandir($dir);
          
            foreach ($files as $file) {
                    if ($file != '.' && $file != '..') {
						
					
						$word = strtolower(substr($file, 0, strrpos($file, '.')));
						
						//print $word;
						
						//exit();

                            $info = getimagesize($dir . $file);
                            $width = $info[0];
                            $height = $info[1];
							
							
							$sql = "UPDATE img_words_temp SET height = '$height', width = '$width' WHERE word = '$word'";
						
							mysql_query($sql);
						
							
							/*if ($conn->query($sql) === TRUE) {
								echo "New record created successfully";
							} else {
								echo "Error: " . $sql . "<br>" . $conn->error;
							}
							
							$conn->close();*/
							
							
							//exit();
                    }
            }



?>