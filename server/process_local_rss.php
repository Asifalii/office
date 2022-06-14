<?php
require_once('./v5/connect.php');
ini_set('max_execution_time', 0);

$lang_by_url = array(
    'afrikaans.english-dictionary.help' => 'afrikaans',
    'albanian.english-dictionary.help' => 'albanian',
    'amharic.english-dictionary.help' => 'amharic',
    'armenian.english-dictionary.help' => 'armenian',
    'azerbaijani.english-dictionary.help' => 'azerbaijani',
    'basque.english-dictionary.help' => 'basque',
    'belarusian.english-dictionary.help' => 'belarusian',
    'bosnian.english-dictionary.help' => 'bosnian',
    'bulgarian.english-dictionary.help' => 'bulgarian',
    'catalan.english-dictionary.help' => 'catalan',
    'cebuano.english-dictionary.help' => 'cebuano',
    'chichewa.english-dictionary.help' => 'chichewa',
    'chinese.english-dictionary.help' => 'chinese',
    'corsican.english-dictionary.help' => 'corsican',
    'croatian.english-dictionary.help' => 'croatian',
    'czech.english-dictionary.help' => 'czech',
    'danish.english-dictionary.help' => 'danish',
    'dutch.english-dictionary.help' => 'dutch',
    'esperanto.english-dictionary.help' => 'esperanto',
    'estonian.english-dictionary.help' => 'estonian',
    'filipino.english-dictionary.help' => 'filipino',
    'finnish.english-dictionary.help' => 'finnish',
    'french.english-dictionary.help' => 'french',
    'frisian.english-dictionary.help' => 'frisian',
    'galician.english-dictionary.help' => 'galician',
    'georgian.english-dictionary.help' => 'georgian',
    'german.english-dictionary.help' => 'german',
    'greek.english-dictionary.help' => 'greek',
    'gujarati.english-dictionary.help' => 'gujarati',
    'haitian.english-dictionary.help' => 'haitian',
    'hausa.english-dictionary.help' => 'hausa',
    'hawaiian.english-dictionary.help' => 'hawaiian',
    'hebrew.english-dictionary.help' => 'hebrew',
    'hmong.english-dictionary.help' => 'hmong',
    'hungarian.english-dictionary.help' => 'hungarian',
    'icelandic.english-dictionary.help' => 'icelandic',
    'igbo.english-dictionary.help' => 'igbo',
    'indonesian.english-dictionary.help' => 'indonesian',
    'irish.english-dictionary.help' => 'irish',
    'italian.english-dictionary.help' => 'italian',
    'japanese.english-dictionary.help' => 'japanese',
    'javanese.english-dictionary.help' => 'javanese',
    'kazakh.english-dictionary.help' => 'kazakh',
    'khmer.english-dictionary.help' => 'khmer',
    'korean.english-dictionary.help' => 'korean',
    'kurmanji.english-dictionary.help' => 'kurmanji',
    'kyrgyz.english-dictionary.help' => 'kyrgyz',
    'lao.english-dictionary.help' => 'lao',
    'latin.english-dictionary.help' => 'latin',
    'latvian.english-dictionary.help' => 'latvian',
    'lithuanian.english-dictionary.help' => 'lithuanian',
    'luxembourgish.english-dictionary.help' => 'luxembourgish',
    'macedonian.english-dictionary.help' => 'macedonian',
    'malagasy.english-dictionary.help' => 'malagasy',
    'malayalam.english-dictionary.help' => 'malayalam',
    'maltese.english-dictionary.help' => 'maltese',
    'maori.english-dictionary.help' => 'maori',
    'marathi.english-dictionary.help' => 'marathi',
    'mongolian.english-dictionary.help' => 'mongolian',
    'burmese.english-dictionary.help' => 'burmese',
    'norwegian.english-dictionary.help' => 'norwegian',
    'pashto.english-dictionary.help' => 'pashto',
    'persian.english-dictionary.help' => 'persian',
    'polish.english-dictionary.help' => 'polish',
    'portuguese.english-dictionary.help' => 'portuguese',
    'romanian.english-dictionary.help' => 'romanian',
    'russian.english-dictionary.help' => 'russian',
    'samoan.english-dictionary.help' => 'samoan',
    'serbian.english-dictionary.help' => 'serbian',
    'shona.english-dictionary.help' => 'shona',
    'sindhi.english-dictionary.help' => 'sindhi',
    'sinhala.english-dictionary.help' => 'sinhala',
    'slovak.english-dictionary.help' => 'slovak',
    'slovenian.english-dictionary.help' => 'slovenian',
    'somali.english-dictionary.help' => 'somali',
    'spanish.english-dictionary.help' => 'spanish',
    'sundanese.english-dictionary.help' => 'sundanese',
    'swahili.english-dictionary.help' => 'swahili',
    'swedish.english-dictionary.help' => 'swedish',
    'tajik.english-dictionary.help' => 'tajik',
    'turkish.english-dictionary.help' => 'turkish',
    'ukrainian.english-dictionary.help' => 'ukrainian',
    'urdu.english-dictionary.help' => 'urdu',
    'uzbek.english-dictionary.help' => 'uzbek',
    'vietnamese.english-dictionary.help' => 'vietnamese',
    'xhosa.english-dictionary.help' => 'xhosa',
    'yiddish.english-dictionary.help' => 'yiddish',
    'yoruba.english-dictionary.help' => 'yoruba',
    'zulu.english-dictionary.help' => 'zulu',
    'www.bdword.com' => 'bengali',
    'www.english-hindi.net' => 'hindi',
    'www.english-tamil.net' => 'tamil',
    'www.english-telugu.net' => 'telugu',
    'www.english-gujarati.com' => 'gujarati',
    'www.english-marathi.net' => 'marathi',
    'www.english-kannada.com' => 'kannada',
    'www.english-thai.net' => 'thai',
    'www.english-welsh.net' => 'welsh',
  //  'www.english-arabic.org' => 'arabic',
    'www.english-malay.net' => 'malay',
    'www.english-nepali.com' => 'nepali',
    'www.english-punjabi.net' => 'punjabi',
);
 
	$lang_by_url = array_flip($lang_by_url);
	
	foreach($lang_by_url as $key=>$value){
		
		$path = '/var/www/html/server/local_rss/'.$key;
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}
	
		$base_url ='https://'. $value.'/';
		$lang = $key;
			 
		$yest = date('Y-m-d',strtotime("-1 days"));

		$i=0;
		$j=0;
		$query = mysqli_query($conn,"select mean from y_".$lang."_master where mean != '' and mean is not null");
		
		$input_array = array();
		while($row=mysqli_fetch_assoc($query))
		{
			$input_array[] = strtolower(str_replace(' ','-',$row['mean']));
		}
		
		$input_array = array_filter($input_array);
		
		$array_chunk = array_chunk($input_array,50000);

		for($i=0;$i<count($array_chunk);$i++)
		{

			$xml = '';
			$xml .= '<?xml version="1.0" encoding="UTF-8"?>';
			$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

			for($j=0;$j<count($array_chunk[$i]);$j++){

				$xml .= '<url>'; 
				$xml .= '<loc>'.$base_url.$lang.'-to-english-meaning-'.htmlspecialchars($array_chunk[$i][$j]).'</loc>'; 
				$xml .= '<priority>0.8</priority>'; 
				$xml .= '<changefreq>weekly</changefreq>'; 
				$xml .= '</url>'; 
			}

			$xml .= '</urlset>'; 
			file_put_contents('/var/www/html/server/local_rss/'.$lang.'/local-rss-sitemap-'.$i.'.xml', $xml);

		}		
	}
	
   

?>