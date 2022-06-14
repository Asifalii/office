<?php 
//set_time_limit(0);
require_once('./v5/connect.php');

//$word = 'cat';
//$url = 'https://zulu.english-dictionary.help/?q='. $word;
//$html = file_get_contents($url);
//$cache_filename = "./cache/".md5($url);
//$file = fopen ( $cache_filename, 'w' );
//fwrite ( $file, $html );
//fclose ( $file );
//die;

		//$lang = 'yoruba_copy';

		  //$x_word = mysqli_query($conn, "SELECT DISTINCT(word) FROM x_yoruba_copy");
		 // $y_word = mysqli_query($conn, "SELECT DISTINCT(word) FROM y_yoruba_copy");
		 // $variant_word = mysqli_query($conn, "SELECT DISTINCT(variant) FROM variants_copy");
		 $word = mysqli_query($conn, "SELECT DISTINCT(word) FROM word_list Limit 1");
		  


		//  $x_word_list = array_column(mysqli_fetch_all($x_word, MYSQLI_ASSOC),'word');
		//  $y_word_list = array_column(mysqli_fetch_all($y_word, MYSQLI_ASSOC),'word');
		//  $variant_word_list = array_column(mysqli_fetch_all($variant_word, MYSQLI_ASSOC),'variant');
		$word = array_column(mysqli_fetch_all($word, MYSQLI_ASSOC),'word');

		foreach($word as $w){

			$singleQuotePosition = strpos($w, '\'');
			if($singleQuotePosition==false){
				echo exec("php index_cache.php '&lang=bengali&q=common'");
			}
				
		}

        
		
		//	$final_list = array_merge($x_word_list,$y_word_list, $variant_word_list);		
		
							

?>