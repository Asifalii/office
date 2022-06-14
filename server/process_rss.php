<?php
require_once('./v5/connect.php');

if (!empty($argv[1])) {

    $_GET['lang'] = $argv[1];

}
      
    $lang_by_url = array(
        'www.bdword.com'					=> 'bengali',
        'www.english-arabic.org'			=> 'arabic',
        'www.english-gujarati.com'			=> 'gujarati',
        'www.english-hindi.net'				=> 'hindi',
        'www.english-kannada.com'			=> 'kannada',
        'www.english-malay.net'				=> 'malay',
        'www.english-marathi.net'			=> 'marathi',
        'www.english-nepali.com'			=> 'nepali',
        'www.english-punjabi.net'			=> 'punjabi',
        'www.english-tamil.net'				=> 'tamil',
        'www.english-telugu.net'			=> 'telugu',
        'www.english-thai.net'				=> 'thai',
        'www.english-welsh.net'				=> 'welsh'
        
    );
      
    $lang_by_url = array_flip($lang_by_url);
    $lang = $_GET['lang'];

    $base_url = 'https://'.(($lang_by_url[$lang])?$lang_by_url[$lang]:$lang.'.english-dictionary.help').'/';
    $yest = date('Y-m-d',strtotime("-1 days"));

    $i=0;
    $j=0;
    $query = mysqli_query($conn,"select word from y_".$lang."_master");
    
    $input_array = array();
    while($row=mysqli_fetch_assoc($query))
    {
        $input_array[] = strtolower(str_replace(' ','-',$row['word']));
    }

    $array_chunk = array_chunk($input_array,50000);

    for($i=0;$i<count($array_chunk);$i++)
    {

        $xml = '';
        $xml .= '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        for($j=0;$j<count($array_chunk[$i]);$j++){
			$url = $base_url.'english-to-'.$lang.'-meaning-'.$array_chunk[$i][$j];
			$headers=get_headers($url, 1);
			if ($headers[0]!='HTTP/1.1 200 OK')
			{
				echo $url;
				die;
			}
            $xml .= '<url>'; 
            $xml .= '<loc>'.$base_url.'english-to-'.$lang.'-meaning-'.$array_chunk[$i][$j].'</loc>'; 
            $xml .= '<priority>0.8</priority>'; 
            $xml .= '<changefreq>weekly</changefreq>'; 
            $xml .= '</url>'; 
        }

        $xml .= '</urlset>'; 

        file_put_contents('/mnt/volume_sgp1_05/all_cache_files/'.$lang.'/sitemaps/rss-sitemap-'.$i.'.xml', $xml);

    }




?>