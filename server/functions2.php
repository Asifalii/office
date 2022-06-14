<?php
session_start();

require_once('db_functions.php');

function isUserAgent()
{
	if(!$_SERVER["HTTP_USER_AGENT"])
	{
		die("nothing!");
	}
}


function base_url(){
  return sprintf(
    "%s://%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['HTTP_HOST']
  );
}

function redirectOlds(){

	$urlex = explode('.', $_SERVER['HTTP_HOST']);

	$lang_by_url = array(
		'bengali' 			=> 'www.bdword.com',
		'arabic'			=> 'www.english-arabic.org',
		'gujarati'			=> 'www.english-gujarati.com',
		'hindi'				=> 'www.english-hindi.net',
		'kannada'			=> 'www.english-kannada.com',
		'malay'				=> 'www.english-malay.net',
		'marathi'			=> 'www.english-marathi.net',
		'nepali'			=> 'www.english-nepali.com',
		'punjabi'			=> 'www.english-punjabi.net',
		'tamil'				=> 'www.english-tamil.net',
		'telugu'			=> 'www.english-telugu.net',
		'thai'				=> 'www.english-thai.net',
		'welsh'				=> 'www.english-welsh.net'
	);
	
	$lang_keys = array(
		'bengali',
		'arabic',
		'gujarati',
		'hindi',
		'kannada',
		'malay',
		'marathi',
		'nepali',
		'punjabi',
		'tamil',
		'telugu',
		'thai',
		'welsh'
	);

	if($_GET['lang'] && $_GET['q'] && getLang()!=$_GET['lang'])
	{
		$red_url = 'https://'.$_GET['lang'].'.english-dictionary.help/english-to-'.strtolower($_GET['lang']).'-meaning-'.urlencode($_GET['q']);
	
		
		if(in_array($_GET['lang'], $lang_keys))
		{
					

			$red_url = 'https://'.$lang_by_url[$_GET['lang']].'/english-to-'.strtolower($_GET['lang']).'-meaning-'.urlencode($_GET['q']);
		}
		
		header("HTTP/1.1 301 Moved Permanently"); 
		header('Location: '.$red_url);
		exit;
	}
	if($_GET['lang'] && empty($_GET['q']) && getLang()!=$_GET['lang'])
	{
		$red_url = 'https://'.$_GET['lang'].'.english-dictionary.help';
		if(in_array($_GET['lang'], $lang_keys))
		{
			$red_url = 'https://'.$lang_by_url[$_GET['lang']];
		}
		header("HTTP/1.1 301 Moved Permanently"); 
		header('Location: '.$red_url);
		exit;
	}
	
	if($_GET['p'] AND $_GET['cat'] AND getScriptName()=='single')
	{
		$red_url = base_url().'/post/'.$_GET['p'].'/'.$_GET['cat'];

		header("HTTP/1.1 301 Moved Permanently"); 
		header('Location: '.$red_url);
		exit;
	}
	
	
	
}

function getURI()
{
	return strtolower(trim($_SERVER['REQUEST_URI'],'/'));
}

function sanitize($q)
{
	connect();
	$q = str_replace('+','',strtolower(trim(str_replace(array('+','-'),' ',mysql_escape_string($q)))));
	
	$row = mysql_fetch_assoc(mysql_query('select root from v3_word_list where word="'.$q.'" limit 1'));
	
	if($row['root']){
		return $row['root'];
	}else{
		return $q;
	}
}

function getLang(){
	
	
	if($_SERVER['HTTP_HOST']=='test.bdword.com'){
		return 'bengali';
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
	
	$host = explode('.', $_SERVER['HTTP_HOST']);
	
	if($host[1] == 'english-dictionary')
	{
		return $host[0];
	}
	
	return $lang_by_url[$_SERVER['HTTP_HOST']];
}

function analyticsId(){
	
	$lang_by_url = array(
		'www.bdword.com'					=> 'UA-17262903-1',
		'www.english-arabic.org'			=> 'UA-79524050-1',
		'www.english-gujarati.com'			=> 'UA-79524050-2',
		'www.english-hindi.net'				=> 'UA-79524050-3',
		'www.english-kannada.com'			=> 'UA-79524050-4',
		'www.english-malay.net'				=> 'UA-79524050-5',
		'www.english-marathi.net'			=> 'UA-79524050-6',
		'www.english-nepali.com'			=> 'UA-79524050-7',
		'www.english-punjabi.net'			=> 'UA-79524050-8',
		'www.english-tamil.net'				=> 'UA-79524050-9',
		'www.english-telugu.net'			=> 'UA-79524050-10',
		'www.english-thai.net'				=> 'UA-79524050-11',
		'www.english-welsh.net'				=> 'UA-79524050-12',

		'v2.bdword.com'						=>	'bengali',
		'v2.english-tamil.net'				=> 'tamil',
		'v2.english-telugu.net'				=> 'telugu',
		
	);
	
	$host = explode('.', $_SERVER['HTTP_HOST']);
	
	if($host[1] == 'english-dictionary')
	{
		return 'UA-17262903-1';
	}
	
	return $lang_by_url[$_SERVER['HTTP_HOST']];
}

function getScriptName(){

	return strtolower(str_replace('.php','',trim($_SERVER['DOCUMENT_URI'],'/')));
}

function getTitle($q, $url){

	$url = str_replace(array('https://','www.'),'',$url);
	$sn = getScriptName();
	$lang = getLang();
	$ulang = ucfirst($lang);
	
	
	
	$title = 'English to '.$ulang.' And '.$ulang.' to English Dictionary';

	if($lang=='bengali'){
		$title = 'English to Bangla Online Dictionary | ইংরেজি ও বাংলা অভিধান ';
	}
	
	switch($sn)
	{
		case 'about-us':
			$title = 'About Us';
		break;
		
		case 'browse':
			$title = 'Browse Words by English and '.$ulang;
		break;
		
		case 'contact':
			$title = 'Contact Us';
		break;
		
		case 'disclaimer':
			$title = 'Disclaimer';
		break;
		
		case 'error':
			$title = 'An Error Occured';
		break;
		
		case 'learn-ten-words-everyday':
			$title = 'Learn ten words everyday';
		break;
		
		case 'learning-materials':
			$title = 'Learning Materials';
		break;
		
		case 'privacy':
			$title = 'Read our privacy policy';
		break;
		
		case 'read-text':
			$title = 'Read Text :: English to '.$ulang;
		break;
		
		case 'single':
			$title = 'Single Post';
			if($_GET['url']){
				$uex = explode('/',$_GET['url']);
				if($uex[2]){
					$title = $uex[2];
				}
			}
			
		break;
		
		case 'vocabulary-game':
			$title = 'Play Vocabulary Game and memorize word meaning';
		break;
		
		case 'favorite':
			$title = 'Your Favorite Words';
		break;
		
		case 'history':
			$title = 'Get word search history';
		break;
		
		case 'index':

			if($q)
			{
				if (preg_match("/^[a-z]$/", $_GET['q'][0]))
				{
					$title = $q.' - English to '.$ulang.' Meaning of '.$q.' - '.$url;
				}else{
					$title = $q.' - '.$ulang.' to English Meaning of '.$q.' - '.$url;
				}
			}
		break;
		
		case 'search':
			if($_GET['q'])
			{
				$title = 'English to '.$ulang.' Meaning of '.$_GET['q'];
			}
		break;
		
		default:
			$title = 'English to '.$ulang.' And '.$ulang.' to English Dictionary';
		break;
	}

	return $title;
	
}


function canonical(){

	$sn = getScriptName();
	$lang = getLang();
	$base_url = base_url();
	switch($sn)
	{
		
		case 'index': 
			$url = $base_url;
			
			if($_GET['q'])
			{	
				if (preg_match("/^[a-z]$/", $_GET['q'][0]))
				{
					$url = $base_url.'/english-to-'.$lang.'-meaning-'.sanitize($_GET['q']);
				}else
				{
					$url = $base_url.'/'.$lang.'-to-english-meaning-'.sanitize($_GET['q']);
				}
			}
			
		break;
		
		case 'search': 
			$url = $base_url;
			
			if($_GET['q'])
			{	
				if (preg_match("/^[a-z]$/", $_GET['q'][0]))
				{
					$url = $base_url.'/english-to-'.$lang.'-meaning-'.sanitize($_GET['q']);
				}else
				{
					$url = $base_url.'/'.$lang.'-to-english-meaning-'.sanitize($_GET['q']);
				}
			}
			
		break;
		
		case 'about-us':
			$url = $base_url.'/about-us';
		break;
		
		case 'browse':
			$url = $base_url.'/browse-words';
		break;
		
		case 'contact':
			$url = $base_url.'/contact-us';
		break;
		
		case 'disclaimer':
			$url = $base_url.'/disclaimer';
		break;
		
		case 'error':
			$url = $base_url.'/browse-words';
		break;
		
		case 'learn-ten-words-everyday':
			$url = $base_url.'/learn-ten-words-everyday';
		break;
		
		case 'learning-materials':
			$url = $base_url.'/learning-materials';
		break;
		
		case 'privacy':
			$url = $base_url.'/privacy';
		break;
		
		case 'read-text':
			$url = $base_url.'/read-text';
		break;
		
		case 'single':
			$url = $base_url.'/post';
			if($_GET['url']){
				$uex = explode('/',$_GET['url']);
				if($uex[2]){
					$url = $base_url.$uex[2];
				}
			}
			
		break;
		
		case 'vocabulary-game':
			$url = $base_url.'/vocabulary-game';
		break;
		
		case 'favorite':
			$url = $base_url.'/favorite-words';
		break;
		
		case 'history':
			$url = $base_url.'/word-history';
		break;
		
		case 'learn-common-translations':
			$url = $base_url.'/learn-common-translations.php';
		break;
		
		case 'topic-wise-words':
			$url = $base_url.'/learn-common-translations.php';
		break;
		
		case 'learn-3000-plus-common-words':
			$url = $base_url.'/learn-3000-plus-common-words.php';
		break;
		
		case 'learn-common-gre-words':
			$url = $base_url.'/learn-common-gre-words.php';
		break;
		
		default:
			$url = $base_url;
		break;
	}

	return $url;
	
}

function isMobile(){
	if(preg_match("/(android|avantgo|ipad|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]))
	{
		return true;
	}else{
		return false;
	}
}

function checkBot()
{
	
	if(strpos($_SERVER['HTTP_USER_AGENT'],"Googlebot") === false or 
	strpos($_SERVER['HTTP_USER_AGENT'],"Mediapartners-Google") === false or 
	strpos($_SERVER['HTTP_USER_AGENT'],"AdsBot-Google") === false or 
	strpos($_SERVER['HTTP_USER_AGENT'],"Googlebot-Mobile") === false or 
	strpos($_SERVER['HTTP_USER_AGENT'],"Googlebot-Image") === false or 
	strpos($_SERVER['HTTP_USER_AGENT'],"Baiduspider") === false or 
	strpos($_SERVER['HTTP_USER_AGENT'],"Bingbot") === false or 
	strpos($_SERVER['HTTP_USER_AGENT'],"YahooSeeker") === false)
	{
		$_SESSION[$_SERVER['REMOTE_ADDR']]++;

		if($_SESSION[$_SERVER['REMOTE_ADDR']]>200)
		{
			echo json_encode(array('main'=>'','data'=>'','mean'=>'', 'error'=>2, 'msg'=>'You have crossed the translation limit of maximum 200 words per day.', 'type'=>1));
			exit;
		}
	}
}

function restrictAd($q)
{

	if(!preg_match("/@/",$_SERVER['REQUEST_URI']) AND !in_array($q, array("sex","suck","fuck","kiss","penis","vagina","fucking","pussy","scandal","rape","teen","masterbation","orgasm","coitus","fornication","adult","adultery","breast","penetrate","dick","fuckin","heap","lust","love","sexual","exotic","erotic","seduce","seduction","anal","pass","password","username","email","fucked","cock sucking","sucking","faggot","nigger","masturbation","bitch","cum","porn","pornography","sperm","masturbation","masturbate","masturbating","masturbated","masturbates","onanism"))){
		return true;
	}else
	{
		return false;
	}
	
}

function showAds($q, $area)
{
	if($_GET['msg']=='not-found')
	{
		return '';
	}
	$code = '';
	
	$top_slot_id = '1847329881';
	$mid_slot_id = '6432811883';
		
	$sn = getScriptName();

	if(getLang()=='bengali' AND $sn=='index')
	{
		$top_slot_id = '2002612288';
		$mid_slot_id = '4956078682';
	}
	
	if(restrictAd($q))
	{
		switch($area)
		{
			case 'mobile-head':
			
				if(isMobile())
				{
					$code = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({
						google_ad_client: "ca-pub-2642708445471409",
						enable_page_level_ads: true
						});
					</script>';
				}else
				{
					$code = '';
				}
			break;
			
			case 'body-top':
				$code = '<style>
				.top_res_1 { width: 320px; height: 100px; }
				@media(min-width: 500px) { .top_res_1 { width: 468px; height: 60px; } }
				@media(min-width: 800px) { .top_res_1 { width: 728px; height: 90px; } }
				</style>
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- top-res -->
				<ins class="adsbygoogle top_res_1"
					 style="display:inline-block"
					 data-ad-client="ca-pub-2642708445471409"
					 data-ad-slot="'.$top_slot_id.'"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script><br>';
				
				// if(isMobile())
				// {
					// $code = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
								// <!-- Mobile -->
								// <ins class="adsbygoogle"
									 // style="display:inline-block;width:320px;height:100px"
									 // data-ad-client="ca-pub-2642708445471409"
									 // data-ad-slot="4493956287"></ins>
								// <script>
								// (adsbygoogle = window.adsbygoogle || []).push({});
								// </script><br>';
				// }
			break;
			case '300':
				$code = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- top-res-middle -->
				<ins class="adsbygoogle"
					 style="display:block"
					 data-ad-client="ca-pub-2642708445471409"
					 data-ad-slot="'.$mid_slot_id.'"
					 data-ad-format="auto"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script><br>';
				
			break;
			
			case '300_2':
				$code = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- bdword-bn-300-250 -->
				<ins class="adsbygoogle"
					 style="display:inline-block;width:300px;height:250px"
					 data-ad-client="ca-pub-2642708445471409"
					 data-ad-slot="0201440774"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script><br>';
				
			break;
			
			case '336':
				$code = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- 336-red -->
						<ins class="adsbygoogle"
							 style="display:inline-block;width:336px;height:280px"
							 data-ad-client="ca-pub-2642708445471409"
							 data-ad-slot="3618946282"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script><br>';
				
			break;
			
			default:
				$code = '';
			break;
		}
	}
	return $code;
}

function getHrefLang()
{
	$array = array("afrikaans"=>"af", "albanian"=>"sq", "amharic"=>"am", "arabic"=>"ar", "armenian"=>"hy", "azerbaijani"=>"az", "basque"=>"eu", "belarusian"=>"be", "bengali"=>"bn", "bosnian"=>"bs", "bulgarian"=>"bg", "catalan"=>"ca", "cebuano"=>"ceb", "chichewa"=>"ny", "chinese"=>"zh-CN", "corsican"=>"co", "croatian"=>"hr", "czech"=>"cs", "danish"=>"da", "dutch"=>"nl", "esperanto"=>"eo", "estonian"=>"et", "filipino"=>"tl", "finnish"=>"fi", "french"=>"fr", "frisian"=>"fy", "galician"=>"gl", "georgian"=>"ka", "german"=>"de", "greek"=>"el", "gujarati"=>"gu", "haitian"=>"ht", "hausa"=>"ha", "hawaiian"=>"haw", "hebrew"=>"iw", "hindi"=>"hi", "hmong"=>"hmn", "hungarian"=>"hu", "icelandic"=>"is", "igbo"=>"ig", "indonesian"=>"id", "irish"=>"ga", "italian"=>"it", "japanese"=>"ja", "javanese"=>"jw", "kannada"=>"kn", "kazakh"=>"kk", "khmer"=>"km", "korean"=>"ko", "kurmanji"=>"ku", "kyrgyz"=>"ky", "lao"=>"lo", "latin"=>"la", "latvian"=>"lv", "lithuanian"=>"lt", "luxembourgish"=>"lb", "macedonian"=>"mk", "malagasy"=>"mg", "malay"=>"ms", "malayalam"=>"ml", "maltese"=>"mt", "maori"=>"mi", "marathi"=>"mr", "mongolian"=>"mn", "burmese"=>"my", "nepali"=>"ne", "norwegian"=>"no", "pashto"=>"ps", "persian"=>"fa", "polish"=>"pl", "portuguese"=>"pt", "punjabi"=>"pa", "romanian"=>"ro", "russian"=>"ru", "samoan"=>"sm", "scots-gaelic"=>"gd", "serbian"=>"sr", "sesotho"=>"st", "shona"=>"sn", "sindhi"=>"sd", "sinhala"=>"si", "slovak"=>"sk", "slovenian"=>"sl", "somali"=>"so", "spanish"=>"es", "sundanese"=>"su", "swahili"=>"sw", "swedish"=>"sv", "tajik"=>"tg", "tamil"=>"ta", "telugu"=>"te", "thai"=>"th", "turkish"=>"tr", "ukrainian"=>"uk", "urdu"=>"ur", "uzbek"=>"uz", "vietnamese"=>"vi", "welsh"=>"cy", "xhosa"=>"xh", "yiddish"=>"yi", "yoruba"=>"yo", "zulu"=>"zu");
	
	$lang = getLang();
	if($array[$lang])
	{
		return $array[$lang];
	}
	
	return 'en';
}

function getHrefLang2()
{
	
	$lang_by_url = array(
		'www.bdword.com',
		'www.english-arabic.org',
		'www.english-gujarati.com',
		'www.english-hindi.net',
		'www.english-kannada.com',
		'www.english-malay.net',
		'www.english-marathi.net',
		'www.english-nepali.com',
		'www.english-punjabi.net',
		'www.english-tamil.net',
		'www.english-telugu.net',
		'www.english-thai.net',
		'www.english-welsh.net'
	);
	
	$array = array("afrikaans"=>"af", "albanian"=>"sq", "amharic"=>"am", "arabic"=>"ar", "armenian"=>"hy", "azerbaijani"=>"az", "basque"=>"eu", "belarusian"=>"be", "bengali"=>"bn", "bosnian"=>"bs", "bulgarian"=>"bg", "catalan"=>"ca", "cebuano"=>"ceb", "chichewa"=>"ny", "chinese"=>"zh-CN", "corsican"=>"co", "croatian"=>"hr", "czech"=>"cs", "danish"=>"da", "dutch"=>"nl", "esperanto"=>"eo", "estonian"=>"et", "filipino"=>"tl", "finnish"=>"fi", "french"=>"fr", "frisian"=>"fy", "galician"=>"gl", "georgian"=>"ka", "german"=>"de", "greek"=>"el", "gujarati"=>"gu", "haitian"=>"ht", "hausa"=>"ha", "hawaiian"=>"haw", "hebrew"=>"iw", "hindi"=>"hi", "hmong"=>"hmn", "hungarian"=>"hu", "icelandic"=>"is", "igbo"=>"ig", "indonesian"=>"id", "irish"=>"ga", "italian"=>"it", "japanese"=>"ja", "javanese"=>"jw", "kannada"=>"kn", "kazakh"=>"kk", "khmer"=>"km", "korean"=>"ko", "kurmanji"=>"ku", "kyrgyz"=>"ky", "lao"=>"lo", "latin"=>"la", "latvian"=>"lv", "lithuanian"=>"lt", "luxembourgish"=>"lb", "macedonian"=>"mk", "malagasy"=>"mg", "malay"=>"ms", "malayalam"=>"ml", "maltese"=>"mt", "maori"=>"mi", "marathi"=>"mr", "mongolian"=>"mn", "burmese"=>"my", "nepali"=>"ne", "norwegian"=>"no", "pashto"=>"ps", "persian"=>"fa", "polish"=>"pl", "portuguese"=>"pt", "punjabi"=>"pa", "romanian"=>"ro", "russian"=>"ru", "samoan"=>"sm", "scots-gaelic"=>"gd", "serbian"=>"sr", "sesotho"=>"st", "shona"=>"sn", "sindhi"=>"sd", "sinhala"=>"si", "slovak"=>"sk", "slovenian"=>"sl", "somali"=>"so", "spanish"=>"es", "sundanese"=>"su", "swahili"=>"sw", "swedish"=>"sv", "tajik"=>"tg", "tamil"=>"ta", "telugu"=>"te", "thai"=>"th", "turkish"=>"tr", "ukrainian"=>"uk", "urdu"=>"ur", "uzbek"=>"uz", "vietnamese"=>"vi", "welsh"=>"cy", "xhosa"=>"xh", "yiddish"=>"yi", "yoruba"=>"yo", "zulu"=>"zu");
	
	$lang = getLang();
	$url = base_url();
	if($array[$lang] && !in_array($_SERVER['HTTP_HOST'], $lang_by_url))
	{
		return '<link rel="alternate" href="'.$url.'" hreflang="'.$array[$lang].'" />';
	}
	
	return '';
}

function googleSiteVerify()
{
	$lang = getLang();
	$webmaster_id = array(
		'arabic'			=> 'vYS2sLocPMRzbRv-SYyfc7GeUT_1FfszJqBurJIa6Uc',
		'gujarati'			=> 'lHHYBQpg7lf8hLoRNpu1aPO35U36_xvq8ucyCEcmCcY',
		'hindi'				=> 'PlirFPnzgNvVlPMWbVsAORv-CXqwyRLOdEKeiIDkZr8',
		'kannada'			=> '8z27f7qJKcXs2PWA6sBx9SS2saqkFTIFbqPtbN-Ol80',
		'malay'				=> 'C6sno1Xq3tAfKHsZAR0cawNTpqiJGXbpcM8hMX-If_4',
		'marathi'			=> '19-UOjenucUnvgAGCazcEKWhHKQu9C_3K138IaYP6aw',
		'nepali'			=> 'j5LoTsmkSvUHmybLb3PnamQcGoAJHst8z0QVDLeDMBM',
		'punjabi'			=> 'I3nBRdEGxZUaYUJ8rwTknQULK0YWHjXUyajwwKz9R2M',
		'tamil'				=> 'gyS0p4e2iE3euY0wDynn-0CyGsMMOGQV_l_9ry7A1T8',
		'telugu'			=> 'dXbMwSUlX6JQcxjmtAf8nz_LTRgTEwrdDxBImpaKV7k',
		'thai'				=> 'nO85DOA1A-qS9U3rUmZPA7tafgQNF2e1G5Xi_uIYJ7s',
		'welsh'				=> 'MYyER_jZPQn2wOE_qYzUrC-Xf6sUBzi_Xts79dm0ph0'
	);
	
	if($webmaster_id[$lang])
	{
		return $webmaster_id[$lang];
	}else
	{
		return '-CFrcPgOTFdQlz-3bz0K8XedhyUElAg0_oiSXBFNmdQ';
	}
	
} 



function fourZeroFour()
{
	if(getScriptName()=='index')
	{
		// header("HTTP/1.0 404 Not Found");
		// return '<meta name="robots" content="noindex">';
	}
		
	return '';
}

function inWordList($q, $lang)
{
	connect();
	$mquery = mysql_query("select ".$lang." from lang where word='".$q."' limit 1");

	if(mysql_num_rows($mquery)>0)
	{
		return true;
	}else{
		return false;
	}
	
}

function activeIndex($q)
{
	connect();
	$mquery = mysql_query("select word from variants where word='".$q."' limit 1");

	if(mysql_num_rows($mquery)==0 OR $_SERVER['HTTP_HOST']=='test.bdword.com')
	{
		// return '<meta name="robots" content="noindex">';
	}
}

function getData($q, $type){
	
connectWithCharSet();

$q 		= trim(mysql_real_escape_string($q));
$lang 	= getLang();
$type 	= trim(mysql_real_escape_string($type));

if(preg_match('#::#', $q))
{
	$q_ex = explode('::', $q);
	$q = trim($q_ex[1]);
}

if($type==1)
{
	$mquery = mysql_query("select word, `".$lang."` as `mean` from `lang` where `".$lang."`='".$q."' limit 10");

	if(mysql_num_rows($mquery)==0)
	{
		$msg = 'No word meaning found for: '.$q;
		echo json_encode(array('main'=>'','data'=>'','mean'=>'','error'=>1, 'msg'=>$msg, 'type'=>1));
		exit;
	}

	$rows = array();
	while($row = mysql_fetch_assoc($mquery))
	{
		$rows[] = $row;
	}

	return json_encode(array('main'=>'','data'=>$rows,'mean'=>'', 'error'=>0, 'msg'=>'', 'type'=>1));
	exit;
	
}else
{
	$mquery = mysql_query("select ".$lang." from lang where word='".$q."' limit 1");
	$mrow = mysql_fetch_assoc($mquery);

	if(mysql_num_rows($mquery)==0)
	{
		$msg = 'No word meaning found for: '.$q;
		$pspell_array = '[]';
		
		$pspell_array = file_get_contents('http://sug.bdword.com/api_multiple.php?word='.urlencode($q));

		if(in_array($q, json_decode($pspell_array), true) and strpos($q, " ") == false)
		{
			@mysql_query('insert into com_words (word) values ("'.$q.'")');
		}
		
		return json_encode(array('main'=>'','data'=>'','mean'=>'','error'=>1, 'msg'=>$msg, 'sug'=>$pspell_array, 'type'=>0));
		
		exit;
	}
	$sql = 'select word, '.$lang.', id, data from word_frame where word="'.$q.'" limit 1';
	$query = mysql_query($sql);
	$row = mysql_fetch_assoc($query);

	$id = $row['id'];
	$data = json_decode($row['data']);
	$mean = json_decode($row[$lang]);


	if($lang=='bengali')
	{
		$img_check = mysql_num_rows(mysql_query('select word from img_words where word="'.$q.'" limit 1'));
		if($img_check){
			$data->img = $q;
		}
	}
	
	$related_query = mysql_query('select variant from variants where word="'.$q.'"');
	$related_words = array();
	while($related_row=mysql_fetch_assoc($related_query)){
		if($related_row['variant']!=$q)
		{
			$related_words[] = $related_row['variant'];
		}
			
	}
	

	
	$related_words_imp = "'".implode("','",$related_words)."'";

	$related_mean_query = mysql_query("select ".$lang." as mean, word from lang where word in (".$related_words_imp.")");
	$related_mean_array = array();
	while($related_mean_row=mysql_fetch_assoc($related_mean_query)){
		$related_mean_array[$related_mean_row['word']] = $related_mean_row['mean'];
	}


	return json_encode(array('main'=>$mrow[$lang],'data'=>$data, 'related'=>$related_mean_array,'mean'=>$mean, 'type'=>0));
	exit;
}
	
}


function findDevice(){
    $iPod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $iPhone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $iPad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    if($iPad||$iPhone||$iPod){
        return 'ios';
    }else if($android){
        return 'android';
    }else{
        return 'pc';
    }
}

function PageCreator($perPage, $tableName, $pageName)
{

	connectWithCharSet();
	
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$startAt = $perPage * ($page - 1);

	$query = "SELECT COUNT(*) as total FROM $tableName";
	$r = mysql_fetch_assoc(mysql_query($query));

	$totalPages = ceil($r['total'] / $perPage);

	$links = '<ul class="pagination">';
	
	for ($i = 1; $i <= $totalPages; $i++)
	{
		$links .= ($i != $page ) 
				? "<li><a href='$pageName?page=$i'>$i</a></li>"
				: "<li class='active'><a>Page $page</a></li>";
	}

	$links .= '</ul>';
	
	$query = "SELECT * FROM $tableName
	ORDER BY id DESC LIMIT $startAt, $perPage";
	
	$r = mysql_query($query);

	$pageContent = '<h3><b>PAGE #'.$page.'</b></h3><hr>';
	
	
	$pageContent .= '<div>';
	if($page>1){
		$pageContent .= '<a class="btn btn-raised btn-primary pull-left" href="'.$pageName.'?page='.($page-1).'">Previous</a>';
	}
	if($page<$totalPages){
		$pageContent .= '<a class="btn btn-raised btn-primary pull-right" href="'.$pageName.'?page='.($page+1).'">Next</a>';
	}
	$pageContent .= '<div style="clear: both;">&nbsp;</div>';
	$pageContent .= '</div>';
	
	while($row=mysql_fetch_assoc($r))
	{
		$pageContent .= "<div style='font-size:18px;'>".$row['id'].". ".$row['sentence']."<br>".$row['trans']."</div><hr>";
	}
	
	$pageContent .= $links;
	
	return $pageContent;

}

function PageShortIntro($limit, $tableName, $pageName, $infoTitle)
{
	connectWithCharSet();
	$content = '<legend>'.$infoTitle.'</legend><div class="fieldset_body inner_details">';
	
	$content .= '';
	
	$query = mysql_query('SELECT sentence, trans FROM `'.$tableName.'` ORDER BY RAND() LIMIT '.$limit) or die(mysql_error());
	$i = 1;
	while($row=mysql_fetch_assoc($query))
	{
		
		$content .= "<span><div class='label_font'>".$row['sentence']." : </div> ".$row['trans']."</span>";
		$i++;
	}
	
	$content .= '</div><button class="btn_default5 bdr_radius2"><a href="'.$pageName.'">More</a></button>';
	
	return $content;
}

function GetAllTopics($pageName, $activeTopic)
{
	connect();
	$query = mysql_query('select distinct topic from TopicWiseWords');
	$topics = '';
	while($row=mysql_fetch_assoc($query))
	{
		$topics .= '<a class="btn btn-raised '.(($activeTopic!=$row['topic'])?'':'btn-primary').'" href="'.$pageName.'?topic='.$row['topic'].'">'.$row['topic'].'</a>&nbsp;&nbsp;';
	}
	return $topics.'<hr>';
}
						
function TopicWiseWords($perPage, $tableName, $pageName, $topic)
{

	connect();
	
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$startAt = $perPage * ($page - 1);

	$query = "SELECT COUNT(*) as total FROM $tableName WHERE topic='".$topic."'";
	$r = mysql_fetch_assoc(mysql_query($query));

	$totalPages = ceil($r['total'] / $perPage);

	$links = '<ul class="pagination">';
	
	for ($i = 1; $i <= $totalPages; $i++)
	{
		$links .= ($i != $page ) 
				? "<li><a href='$pageName?page=$i&topic=$topic'>$i</a></li>"
				: "<li class='active'><a>Page $page</a></li>";
	}

	$links .= '</ul>';
	
	$query = "SELECT * FROM $tableName WHERE topic='".$topic."' ORDER BY id ASC LIMIT $startAt, $perPage";
	
	$r = mysql_query($query);

	$pageContent = '<h3><b>'.$topic.':: PAGE #'.$page.'</b></h3><hr>';
	
	
	$pageContent .= '<div>';
	if($page>1){
		$pageContent .= '<a class="btn btn-raised btn-primary pull-left" href="'.$pageName.'?page='.($page-1).'&topic='.$topic.'">Previous</a>';
	}
	if($page<$totalPages){
		$pageContent .= '<a class="btn btn-raised btn-primary pull-right" href="'.$pageName.'?page='.($page+1).'&topic='.$topic.'">Next</a>';
	}
	$pageContent .= '<div style="clear: both;">&nbsp;</div>';
	$pageContent .= '</div>';
	$i = ($page * $perPage) - $perPage;
	while($row=mysql_fetch_assoc($r))
	{
		$i++;
		$pageContent .= '<div style="font-size:18px;cursor:pointer;" onclick="show_meaning(\''.$row['word'].'\')">'.$i.'. '.$row['word'].'</div><hr>';
	}
	
	$pageContent .= $links;
	
	return $pageContent;

}


function Common3000Words($perPage, $tableName, $pageName, $topic)
{

	connect();
	
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$startAt = $perPage * ($page - 1);

	$query = "SELECT COUNT(*) as total FROM `$tableName` WHERE topic='".$topic."'";
	$r = mysql_fetch_assoc(mysql_query($query));

	$totalPages = ceil($r['total'] / $perPage);

	$links = '<ul class="pagination">';
	
	for ($i = 1; $i <= $totalPages; $i++)
	{
		$links .= ($i != $page ) 
				? "<li><a href='$pageName?page=$i&topic=$topic'>$i</a></li>"
				: "<li class='active'><a>Page $page</a></li>";
	}

	$links .= '</ul>';
	
	$query = "SELECT * FROM `$tableName` WHERE topic='".$topic."' ORDER BY id ASC LIMIT $startAt, $perPage";
	
	$r = mysql_query($query);

	$pageContent = '<h3><b>'.$topic.':: PAGE #'.$page.'</b></h3><hr>';
	
	
	$pageContent .= '<div>';
	if($page>1){
		$pageContent .= '<a class="btn btn-raised btn-primary pull-left" href="'.$pageName.'?page='.($page-1).'&topic='.$topic.'">Previous</a>';
	}
	if($page<$totalPages){
		$pageContent .= '<a class="btn btn-raised btn-primary pull-right" href="'.$pageName.'?page='.($page+1).'&topic='.$topic.'">Next</a>';
	}
	$pageContent .= '<div style="clear: both;">&nbsp;</div>';
	$pageContent .= '</div>';
	$i = ($page * $perPage) - $perPage;
	while($row=mysql_fetch_assoc($r))
	{
		$i++;
		$pageContent .= '<div style="font-size:18px;cursor:pointer;" onclick="show_meaning(\''.$row['word'].'\')">'.$i.'. '.$row['word'].'</div><hr>';
	}
	
	$pageContent .= $links;
	
	return $pageContent;

}

function Common3000WordsShort($pageName, $activeTopic)
{
	connect();
	$query = mysql_query('select distinct topic from `3000`');
	$topics = '';
	while($row=mysql_fetch_assoc($query))
	{
		$topics .= '<a class="btn btn-raised '.(($activeTopic!=$row['topic'])?'':'btn-primary').'" href="'.$pageName.'?topic='.$row['topic'].'">'.$row['topic'].'</a>&nbsp;&nbsp;';
	}
	return $topics.'<hr>';
}

function getGrammar()
{
	$content = '';
	connect();

	$sql = 'select id,title,data from blogs where cat=2';

	$get_blogs = mysql_query($sql);


	while($blog_row=mysql_fetch_assoc($get_blogs))
	{
		$url_title = str_replace(' ','-',strtolower($blog_row['title']));
		
		$content .= '<a title="'.$blog_row['title'].'" href="'.$url.'/post/'.$blog_row['id'].'/2/'.$url_title.'"><amp-img src="./v3/img/direction_arrow2.png" width="22" height="22" alt="icon"></amp-img><span>'.ucwords(strtolower($blog_row['title'])).'</span></a>';
	}
	
	return $content;
}

function CommonGREWords($perPage, $tableName, $pageName, $topic)
{

	connect();
	
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$startAt = $perPage * ($page - 1);

	$query = "SELECT COUNT(*) as total FROM `$tableName` WHERE topic='".$topic."'";
	$r = mysql_fetch_assoc(mysql_query($query));

	$totalPages = ceil($r['total'] / $perPage);

	$links = '<ul class="pagination">';
	
	for ($i = 1; $i <= $totalPages; $i++)
	{
		$links .= ($i != $page ) 
				? "<li><a href='$pageName?page=$i&topic=$topic'>$i</a></li>"
				: "<li class='active'><a>Page $page</a></li>";
	}

	$links .= '</ul>';
	
	$query = "SELECT * FROM `$tableName` WHERE topic='".$topic."' ORDER BY id ASC LIMIT $startAt, $perPage";
	
	$r = mysql_query($query);

	$pageContent = '<h3><b>'.$topic.':: PAGE #'.$page.'</b></h3><hr>';
	
	
	$pageContent .= '<div>';
	if($page>1){
		$pageContent .= '<a class="btn btn-raised btn-primary pull-left" href="'.$pageName.'?page='.($page-1).'&topic='.$topic.'">Previous</a>';
	}
	if($page<$totalPages){
		$pageContent .= '<a class="btn btn-raised btn-primary pull-right" href="'.$pageName.'?page='.($page+1).'&topic='.$topic.'">Next</a>';
	}
	$pageContent .= '<div style="clear: both;">&nbsp;</div>';
	$pageContent .= '</div>';
	$i = ($page * $perPage) - $perPage;
	while($row=mysql_fetch_assoc($r))
	{
		$i++;
		$pageContent .= '<div style="font-size:18px;cursor:pointer;" onclick="show_meaning(\''.$row['word'].'\')">'.$i.'. '.$row['word'].'</div><hr>';
	}
	
	$pageContent .= $links;
	
	return $pageContent;

}

function CommonGREWordsShort($pageName, $activeTopic)
{
	connect();
	$query = mysql_query('select distinct topic from `3000`');
	$topics = '';
	while($row=mysql_fetch_assoc($query))
	{
		$topics .= '<a class="btn btn-raised '.(($activeTopic!=$row['topic'])?'':'btn-primary').'" href="'.$pageName.'?topic='.$row['topic'].'">'.$row['topic'].'</a>&nbsp;&nbsp;';
	}
	return $topics.'<hr>';
}

?>