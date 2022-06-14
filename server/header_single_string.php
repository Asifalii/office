<?php
require_once('functions.php');
$contentUrl = 'https://content2.mcqstudy.com/bw-static-files/';

if (isset($_GET['q']) && $_GET['q'] != null) {
    $q = sanitize($_GET['q'], $conn);
} else {
    $q = '';
}

if (!empty($argv[1])) {
    $_GET['lang'] = $argv[1];
}


if (preg_match('#::#', $q)) {
    $q_ex = explode('::', $q);
    $q = trim($q_ex[1]);
}

$info = array();
$url = 'https://'.array_search($_GET['lang'],getLanguageArray());
$lang = $_GET['lang'];
$ulang = ucfirst($lang);
$inWordList = true;
$p = '';
$base_url = $url . '/';
$scriptname = getScriptName();
$ismobile = isMobile();
$iswordbanned = getWordBannedStatus($conn, $p);
$alladcodes = getAllAdCodes($ismobile, $iswordbanned, $scriptname, $lang);
$autoad = getAutoAd($iswordbanned);
$analyticsid = getAnalyticsId(array_search($lang,getLanguageArray()));

if($scriptname == 'learn-ten-words-everyday' || $scriptname == 'vocabulary-game'){
	if (!empty($argv[2])) {
    $_GET['season'] = $argv[2];
	}

	if (!empty($argv[3])) {
	   $_GET['episode'] = $argv[3];
	}
}

if($scriptname == 'topic-wise-words' || $scriptname == 'learn-3000-plus-common-words' || $scriptname == 'learn-common-gre-words'){
	if (!empty($argv[2])) {
    $_GET['topic'] = $argv[2];
	}

	if (!empty($argv[3])) {
	   $_GET['page'] = $argv[3];
	}
}

if($scriptname == 'browse-words'){
	if (!empty($argv[2])) {
    $_GET['word'] = $argv[2];
	}

	if (!empty($argv[3])) {
	   $_GET['start_with'] = $argv[3];
	}
}

if($scriptname == 'blank-quiz' || $scriptname == 'learn-common-translations'){
	if (!empty($argv[2])) {
    $_GET['page'] = $argv[2];
	}
}

if($scriptname == 'post'){
	if (!empty($argv[2])) {
    $_GET['post_id'] = $argv[2];
	}
}

$canonical = getCanonicalLink($conn, $scriptname, $lang, $base_url, $p);
$titleArray = parse_url($canonical);
if(isset($titleArray['path'])){
	$title = str_replace('-',' ', $titleArray['path']);
	$title = str_replace('/','', $title);
	$title = str_replace('toefl','TOEFL', $title);
	$title = str_replace('gre','GRE', $title);
	$title = ucwords($title);
}else{
	$title = 'English to ' . str_replace("Bengali", "Bangla", $lang) . ' And ' . str_replace("Bengali", "Bangla", $lang) . ' to English Dictionary';

}
$isMobile = isMobile();
$apiurl = 'https://server2.mcqstudy.com/';

$header_big_html = '';

$keyword = getKeyword($lang);
$m_des = getMetaDescription($lang, $ulang);

$header_big_html = '<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="'.googleSiteVerify().'"/>


    <title>'.$title.'</title>


    <meta name="keyword" content="'.str_replace("bengali", "bangla", $keyword).'">
    <meta name="description" content="'.str_replace("Bengali", "Bangla", $m_des).'">
    <link rel="canonical" href="'.$canonical.'"/>

    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="English :: '.str_replace("Bengali", "Bangla", $ulang).' Online Dictionary"/>
    <meta property="og:description"
          content="English to '.str_replace("Bengali", "Bangla", $ulang).' Dictionary (Free). You can get meaning of any English word very easily. It has auto-suggestion feature which will save you a lot of time getting any meaning. We have a Chrome Extension and an Android App"/>
    <meta property="og:url" content="'.$canonical.'"/>
    <meta property="og:site_name"
          content="English :: '.str_replace("Bengali", "Bangla", $ulang) .' Online Dictionary"/>

    <link rel="shortcut icon" href="'.$contentUrl.'img/favicon.png">
    <link rel="stylesheet" href="'.$contentUrl.'css/single_pages_css.css">
	<script async src="https://www.googletagmanager.com/gtag/js?id='.$analyticsid .'"></script>
    ';

        $header_big_html .= "
        <script>
            function gtag(){dataLayer.push(arguments)}window.dataLayer=window.dataLayer||[],gtag('js',new Date);
        gtag('config', '".$analyticsid."');
        

        document.onclick = function (e) {

            if (e.target.id != 'q') {
                var div = document.getElementById('myInputautocomplete-list');
                div.innerHTML = '';
            }
        }
        </script>
    ";

$header_big_html .= $alladcodes['auto'];
$header_big_html .= '</head>


<body>

<div id="site_wrapper">
    <div class="header_wrapper">';
        
       // function UR_exists($url)
        //{
          //  $headers = get_headers($url);
         //   return stripos($headers[0], "200 OK") ? true : false;
       // }

        $url = $contentUrl . "site_logo/" . $lang . ".webp";
        $langLogo = $contentUrl . "site_logo/" . $lang . ".png";

        if (strpos($base_url, "dictionary")) {
            $mobile = $contentUrl . "mobile_logo/dictionary.webp";
            $mobileLangLogo = $contentUrl . "mobile_logo/dictionary.png";
        } else {
            $mobile = $contentUrl . "mobile_logo/" . $lang . ".webp";;
            $mobileLangLogo = $contentUrl . "mobile_logo/" . $lang . ".png";
        }

        $header_big_html .= '
        <div class="content_wrapper">

        <div class="logo_div">
            <div class="header_logo">
                <a href="'.$base_url.'">
                    <img src="'.$url.'" onerror="this.onerror=null; this.src=\''.$langLogo.'\'" alt="'.(($lang == 'bengali') ? 'BDWORD' : strtoupper($ulang)).'" height="55px" style="margin-bottom: -15px;">
                </a>
            </div>

            <div class="mobile_logo" style="display: none">
                <a href="'.$base_url.'">
                    <img src="'.$mobile.'" onerror="this.onerror=null; this.src=\''.$mobileLangLogo.'\'" alt="'.(($lang == 'bengali') ? 'BDWORD' : strtoupper($ulang)).'" height="55px" style="margin-bottom: -15px; padding-left: 5px;padding-top: 5px;">
                </a>
            </div>

            <div class="search_fld" style="width: 100%;">
                
                <form autocomplete="off" name="new_form" action="#" id="new_form">
                    <input type="text" id="q" name="q" value="'.((isset($_GET['q'])) ? $q : '').'"
                            onfocus="show_history()" autocomplete="off" required
                            placeholder="Translate word" onKeyPress="edValueKeyPress()"
                            onKeyUp="edValueKeyPress()"/>
                    <button type="submit" class="search_btn" onclick="return redirectUrl();"></button>

                    <div id="myInputautocomplete-list" class="autocomplete-items">

                    </div>
                </form>
            </div>
        </div>';

                $header_big_html .= "
                
                <div style='width: 100%;'>
                    <div class='header_nav_collapse'>
                        <label onclick='showHideMenu()'></label>
                        <ul id='menu'>
                            <li>
                                <a href='".$base_url."'>Home</a>
                            </li>
                            <li>
                                <a href='".$base_url."english-to-".$lang."-read-text-with-translation'>Read Text</a>
                            </li>
                            <li>
                                <a href='".$base_url."english-to-".$lang."-dictionary-vocabulary-game'>Vocabulary Games</a>
                            </li>
                            <li>
                                <a href='".$base_url."english-to-".$lang."-dictionary-learn-ten-words-everyday'>Words Everyday</a>
                            </li>
                            <li>
                                <a href='".$base_url."".$lang."-to-english-dictionary'
                                title='".str_replace('Bengali', 'Bangla', ucfirst($lang))." to English Dictionary'>".str_replace('Bengali', 'Bangla', ucfirst($lang))." to English Dictionary</a>
                            </li>
                            <li>
                                <a href='".$base_url."english-to-".$lang."-dictionary-favourite-words' title='Browse Favorite Words'>Favorite Words</a>
                            </li>
                            <li>
                                <a href='".$base_url."english-to-".$lang."-dictionary-search-history' title='Browse Word Search History'>Word Search History</a>
                            </li>
                            <li>
                                <a href='".$base_url."english-to-".$lang."-dictionary-browse-all-blogs' title='Blogs List'>Blogs</a>
                            </li>
                            <li>
                                <a href='".$base_url."english-to-".$lang."-dictionary-contact-us'>Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                ";
                
                
            $header_big_html .= '</div>
        </div>

        <div class="content_wrapper top_margin">
            <div class="left_content">';



return $header_big_html;

?>