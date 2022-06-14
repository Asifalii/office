<?php
$word = urldecode($_GET['word']);
$lang = $_GET['lang'];
$pspell_link = pspell_new("en");

$word_ex = explode(' ', $word);

$word = $word_ex[0];

$lang_by_url = array(
        'afrikaans'=>'afrikaans.english-dictionary.help',
       'albanian'=> 'albanian.english-dictionary.help',
        'amharic'=>'amharic.english-dictionary.help',
        'armenian'=>'armenian.english-dictionary.help',
        'azerbaijani'=>'azerbaijani.english-dictionary.help',
        'basque'=>'basque.english-dictionary.help',
        'belarusian'=>'belarusian.english-dictionary.help',
        'bosnian'=>'bosnian.english-dictionary.help',
        'bulgarian'=>'bulgarian.english-dictionary.help',
        'catalan'=>'catalan.english-dictionary.help',
        'cebuano'=>'cebuano.english-dictionary.help',
       'chichewa'=> 'chichewa.english-dictionary.help',
       'chinese'=> 'chinese.english-dictionary.help',
       'corsican'=> 'corsican.english-dictionary.help',
        'croatian'=>'croatian.english-dictionary.help',
       'czech'=> 'czech.english-dictionary.help',
        'danish'=>'danish.english-dictionary.help',
       'dutch'=> 'dutch.english-dictionary.help',
       'esperanto'=> 'esperanto.english-dictionary.help',
       'estonian'=> 'estonian.english-dictionary.help',
       'filipino'=> 'filipino.english-dictionary.help',
       'finnish'=> 'finnish.english-dictionary.help',
       'french'=> 'french.english-dictionary.help',
       'frisian'=> 'frisian.english-dictionary.help',
       'galician'=> 'galician.english-dictionary.help',
       'georgian'=> 'georgian.english-dictionary.help',
       'german'=> 'german.english-dictionary.help',
      'greek'=>  'greek.english-dictionary.help',
       'gujarati'=> 'gujarati.english-dictionary.help',
       'haitian'=> 'haitian.english-dictionary.help' ,
       'hausa'=> 'hausa.english-dictionary.help',
       'hawaiian'=> 'hawaiian.english-dictionary.help' ,
       'hebrew'=> 'hebrew.english-dictionary.help',
       'hmong'=> 'hmong.english-dictionary.help' ,
       'hungarian'=> 'hungarian.english-dictionary.help',
       'icelandic'=> 'icelandic.english-dictionary.help',
       'igbo'=> 'igbo.english-dictionary.help',
       'indonesian'=> 'indonesian.english-dictionary.help',
       'irish'=> 'irish.english-dictionary.help',
       'italian'=> 'italian.english-dictionary.help',
       'japanese'=> 'japanese.english-dictionary.help' ,
       'javanese'=> 'javanese.english-dictionary.help' ,
       'kazakh'=> 'kazakh.english-dictionary.help',
       'khmer'=> 'khmer.english-dictionary.help',
       'korean'=> 'korean.english-dictionary.help' ,
       'kurmanji'=> 'kurmanji.english-dictionary.help',
       'kyrgyz'=> 'kyrgyz.english-dictionary.help' ,
       'lao'=> 'lao.english-dictionary.help' ,
       'latin'=> 'latin.english-dictionary.help',
       'latvian'=> 'latvian.english-dictionary.help',
       'lithuanian'=> 'lithuanian.english-dictionary.help',
       'luxembourgish'=> 'luxembourgish.english-dictionary.help' ,
       'macedonian'=> 'macedonian.english-dictionary.help' ,
      'malagasy'=>  'malagasy.english-dictionary.help',
      'malayalam'=>  'malayalam.english-dictionary.help',
      'maltese'=>  'maltese.english-dictionary.help',
		'maori'=>'maori.english-dictionary.help',
       'marathi'=> 'marathi.english-dictionary.help',
      'mongolian'=>  'mongolian.english-dictionary.help',
    'burmese'=>    'burmese.english-dictionary.help',
      'norwegian'=>  'norwegian.english-dictionary.help',
	'pashto'=>'pashto.english-dictionary.help' ,
      'persian'=>  'persian.english-dictionary.help' ,
      'polish'=>  'polish.english-dictionary.help',
      'portuguese'=>  'portuguese.english-dictionary.help',
     'romanian'=>   'romanian.english-dictionary.help' ,
     'russian'=>   'russian.english-dictionary.help',
     'samoan'=>   'samoan.english-dictionary.help' ,
     'scots-gaelic'=>   'scots-gaelic.english-dictionary.help',
      'serbian'=>  'serbian.english-dictionary.help' ,
      'shona'=>  'shona.english-dictionary.help',
      'sindhi'=>  'sindhi.english-dictionary.help' ,
      'sinhala'=>  'sinhala.english-dictionary.help',
      'slovak'=>  'slovak.english-dictionary.help' ,
      'slovenian'=>  'slovenian.english-dictionary.help',
      'somali'=>  'somali.english-dictionary.help' ,
      'spanish'=>  'spanish.english-dictionary.help',
      'sundanese'=>  'sundanese.english-dictionary.help',
      'swahili'=>  'swahili.english-dictionary.help',
      'swedish'=>  'swedish.english-dictionary.help',
      'tajik'=>  'tajik.english-dictionary.help',
      'turkish'=>  'turkish.english-dictionary.help',
      'ukrainian'=>  'ukrainian.english-dictionary.help',
      'urdu'=>  'urdu.english-dictionary.help',
      'uzbek'=>  'uzbek.english-dictionary.help' ,
      'vietnamese'=>  'vietnamese.english-dictionary.help',
      'xhosa'=>  'xhosa.english-dictionary.help',
      'yiddish'=>  'yiddish.english-dictionary.help',
       'yoruba'=> 'yoruba.english-dictionary.help' ,
      'zulu'=>  'zulu.english-dictionary.help',

       'bengali'=> 'www.bdword.com',
      'hindi'=>  'www.english-hindi.net' ,
       'tamil'=> 'www.english-tamil.net',
       'telugu'=> 'www.english-telugu.net' ,
       'gujarati'=> 'www.english-gujarati.com',
       'marathi'=> 'www.english-marathi.net',
       'kannada'=> 'www.english-kannada.com',
       'thai'=> 'www.english-thai.net',
       'welsh'=> 'www.english-welsh.net',
       'arabic'=> 'www.english-arabic.org',
       'malay'=> 'www.english-malay.net' ,
		'nepali'=>'www.english-nepali.com',
    );
	
if (!pspell_check($pspell_link, ucfirst($word)))
{
	
	
	 $suggestions_pre = pspell_suggest($pspell_link, $word);
		
		$suggestions = array();
		
		foreach($suggestions_pre as $pre_sug)
		{
			if(strlen($pre_sug)>3 and !preg_match("#\'#",$pre_sug) and  !preg_match("#\s#",$pre_sug) and !preg_match("#\-#",$pre_sug) )
			{
				$suggestions[] = $pre_sug;
			}
		}
	
	
		for($i=0;$i<count($suggestions);$i++)
		{
			$sug_word_list .= "<a target='_blank' style='color:#d9534f;' href='https://$lang_by_url[$lang]/?q=$suggestions[$i]'>".$suggestions[$i]."</a><br>";
	
		}
		
	echo $sug_word_list;
		
}else{

	echo 1;

}

?>