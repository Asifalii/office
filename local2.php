<?php
//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);
error_reporting(0);
$q = '';
if(!empty($argv[1])){
	$_GET['lang'] = $argv[1];
}

$lang = $_GET['lang'];

require('functions.php');

foreach(range('a','z') as $row){
        
       $filedata =  file_get_contents('/var/www/bw-static-files/ta-word-list/' . strtolower($row) . '.txt');

        $array = explode(',', $filedata);

        $array = array_unique(array_map(function($v) { return substr($v, 0, 2); }, $array));
        $array = array_filter($array);
        foreach($array as $value){

            $this_html = get_html($value, $lang, $conn, '');
            file_put_contents('/mnt/volume_sgp1_05/all_cache_files/'.$lang.'/english-to-'.$lang.'-dictionary-two-letter-'.str_replace(' ','-',$value), $this_html);

        }
}

function get_html($get_top_word, $get_top_lang, $conn, $q){

    $_GET['lang'] = $get_top_lang;
    $_GET['word'] = $get_top_word;

    $big_html = '';

    $contentUrl = 'https://content2.mcqstudy.com/bw-static-files/';


    if (!empty($argv[1])) {
        $_GET['lang'] = $argv[1];
    }

    if (!empty($argv[2])) {
        $_GET['word'] = $argv[2];
    }

    if(!isset($_GET['lang'])){
        $_GET['lang'] = 'bengali';
    }

    $word = $start_with = (isset($_GET['word'])?$_GET['word']:'');
    $info = array();
    $url = 'https://'.array_search($_GET['lang'],getLanguageArray());
	$translate = array_search($_GET['lang'],getTranslateText());
    $lang = $_GET['lang'];
    $ulang = ucfirst($lang);
    $inWordList = true;
	$isMobile = isMobile();
	$iswordbanned = getWordBannedStatus($conn, $q);
	$scriptname = getScriptName();
	$alladcodes = getAllAdCodes($isMobile, $iswordbanned, $scriptname, $lang);
	$autoad = getAutoAd($iswordbanned);
	$analyticsid = getAnalyticsId(array_search($lang,getLanguageArray()));


    $base_url = $url . '/';

    $p = '';
    $scriptname = 'local2.php';
    // $canonical = getCanonicalLink($conn, $scriptname, $lang, $base_url, $p);
    $apiurl = 'https://server2.mcqstudy.com/';

$big_html .= '
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="'.googleSiteVerify().'"/>


    <title></title>';

    
    $local_lang = ($lang == 'bengali') ? 'Popular as ইংরেজি বাংলা অভিধান' : '';

    $m_des = 'English To ' . ucfirst($lang) . ' - Official ' . ucfirst($lang) . ' Dictionary Specially, ' . ucfirst($lang) . ' To English Dictionary & Dictionary English To ' . ucfirst($lang) . ' Site Are Ready To Instant Result English To ' . ucfirst($lang) . ' Translator & ' . ucfirst($lang) . ' To English Translation Online FREE.
    English To ' . ucfirst($lang) . ' Translation Online Tool And ' . ucfirst($lang) . ' to English Translation App Are Available On Play Store.
    English To ' . ucfirst($lang) . ' Dictionary Are Ready To Translate To ' . ucfirst($lang) . ' Any Words With Totally Free.
    Also Available Different ' . ucfirst($lang) . ' keyboard layout To Typing ' . ucfirst($lang) . ' To English Translate And English To ' . ucfirst($lang) . ' Converter. ' . "Let's Enjoy It...";


    $keyword = 'english to ' . $lang . ', english to ' . $lang . ' translator, ' . $lang . ' to english translation, translate to ' . $lang . ', ' . $lang . ' to english translate, english to ' . $lang . ' dictionary, english to ' . $lang . ' converter, ' . $lang . ' to english dictionary, dictionary english to ' . $lang . ', english to ' . $lang . ' meaning, translate eng to ' . $lang . ', english to ' . $lang . ' translation online, ' . $lang . ' to english meaning, ' . $lang . ' to english translation online, eng to ' . $lang . ' translate, ' . $lang . ' to english translation app, ' . $lang . ' dictionary';

    $big_html .= '
    <meta name="keyword" content="'.str_replace("bengali", "bangla", $keyword).'">
    <meta name="description" content="'.str_replace("Bengali", "Bangla", $m_des).'">
    <link rel="canonical" href="'.$base_url.'english-to-'.$lang.'-dictionary-two-letter-'.$word.'"/>

    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="English :: '.$ulang.' Online Dictionary"/>
    <meta property="og:description"
          content="English to '.$ulang.' Dictionary (Free). You can get meaning of any English word very easily. It has auto-suggestion feature which will save you a lot of time getting any meaning. We have a Chrome Extension and an Android App"/>
    <meta property="og:url" content="'.$base_url.'english-to-'.$lang.'-dictionary-two-letter-'.$word.'"/>
    <meta property="og:site_name" content="'.$ulang.' :: English Online Dictionary"/>


    <link rel="shortcut icon" href="'.$contentUrl.'img/favicon.png">
	<script async src="https://www.googletagmanager.com/gtag/js?id='. $analyticsid .'"></script>';
	
	$big_html .= "<script>
        function gtag(){dataLayer.push(arguments)}window.dataLayer=window.dataLayer||[],gtag('js',new Date);
        gtag('config', '".$analyticsid."');
		</script>";      
    
    $big_html .= '
    <link rel="stylesheet" href="'.$contentUrl.'css/local_page_style.css">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-2642708445471409",
            enable_page_level_ads: true
        });
    </script>
</head>';


$url = $contentUrl . "site_logo/" . $lang . ".webp";
$langLogo = $contentUrl . "site_logo/" . $lang . ".png";

if (strpos($base_url, 'dictionary')) {
    $mobile = $contentUrl . "mobile_logo/dictionary.webp";
    $mobileLangLogo = $contentUrl . "mobile_logo/dictionary.png";
} else {
    $mobile = $contentUrl . "mobile_logo/" . $lang . ".webp";;
    $mobileLangLogo = $contentUrl . "mobile_logo/" . $lang . ".png";;
}

$big_html .= '
<script>
    function textToSpeech(word) {
        speechSynthesis.speak(new SpeechSynthesisUtterance(word));
    }
	
	document.onclick = function (e) {
        "qb" != e.target.id && (document.getElementById("myInputautocomplete-list").innerHTML = "")
    };
</script>

<body>';

$big_html .= '

<div id="site_wrapper">
    <div class="header_wrapper">
        <div class="content_wrapper">
            <div class="logo_div">
                <div class="header_logo">
                    <a href="'.$base_url.'"><img src="'.$url.'"
                                             onerror="this.onerror=null; this.src=\''.$langLogo.'\'"
                                             alt="'.(($lang == 'bengali') ? 'BDWORD' : strtoupper($lang)).'"
                                             height="55px" style="margin-bottom: -15px;" loading="lazy"></a>
                </div>

                <div class="mobile_logo" style="display: none">
                    <a href="'.$base_url.'"><img src="'.$mobile.'"
                                             onerror="this.onerror=null; this.src=\''.$mobileLangLogo.'\'"
                                             alt="'.(($lang == 'bengali') ? 'BDWORD' : strtoupper($ulang)).'" height="55px" style="padding-left: 5px;padding-top: 2px;" loading="lazy"></a>
                </div>

                <script>

                    function showHideNav() {
                        if ($(".navbar-collapse").hasClass("collapse") == true) {
                            $(".navbar-collapse").removeClass("collapse");
                        } else {
                            $(".navbar-collapse").addClass("collapse");
                        }
                    }

                    function submit_search_local(val) {
						
						var replaced = val.split(" ").join("%20");
						t = [];
						var word = val;
						null != localStorage.getItem("'.$lang.'_local_history") && (t = JSON.parse(localStorage.getItem("'.$lang.'_local_history"))), t.indexOf(word) !== -1 && t.splice(t.indexOf(word), 1), t.push(word), localStorage.setItem("'.$lang.'_local_history", JSON.stringify(t.filter(onlyUnique)));
						
						window.location.replace(
                            "'.$base_url.'english-to-'.$lang.'-meaning-" + val.replace(" ", "-"),
                            "_self"
                        );

                    }
					
					function show_local_history() {
					document.getElementById("qb").value = "";
					var e = JSON.parse(localStorage.getItem("'.$lang.'_local_history"));
					if (Object.keys(e).forEach(t => !e[t] && void 0 !== e[t] && delete e[t]), e.reverse(), e.length > 0) {
						var t = document.getElementById("myInputautocomplete-list");
						for (var n in t.innerHTML = "", e) if (e.hasOwnProperty(n)) {
							if (n > 4) break;
							var o = document.createElement("DIV");
							o.innerHTML = e[n], o.onclick = function () {
								document.new_form.word.value = this.innerHTML, redirectLocalUrl()
							}, document.getElementById("myInputautocomplete-list").appendChild(o)
						}
					}
				}
				
				function redirectLocalUrl() {
					var lang1 = "'.$lang.'";
					t = [];
					var word = document.getElementById("qb").value;
					null != localStorage.getItem("'.$lang.'_local_history") && (t = JSON.parse(localStorage.getItem("'.$lang.'_local_history"))), t.indexOf(word) !== -1 && t.splice(t.indexOf(word), 1), t.push(word), localStorage.setItem("'.$lang.'_local_history", JSON.stringify(t.filter(onlyUnique)));
					var redirect_url = main_domain() + lang1 + "-to-english-meaning-" + word;
					window.location.href = redirect_url;
					return false;
				}

                </script>

                <div class="search_fld" style="width: 100%;">
                    <form autocomplete="off" name="new_form" action="#" id="new_form">
                        <input type="text" value="'.$q.'" class="main-search" id="qb" name="word"
                               autocomplete="off" onfocus="show_local_history()"
                               required placeholder="'. $translate.'"/>

						<input type="hidden" id="localLang" value="'.$lang.'">
                        <button type="submit" class="search_btn" onclick="return redirectLocalUrl();"></button>

                        <div id="myInputautocomplete-list" class="suggested_list autocomplete-items">

                        </div>
                    </form>


                    <script>
                        function changeKeyboard() {
                            var e = document.getElementById("keyboard");
                            var v = e.options[e.selectedIndex].value;
                            window.location.href = "local.php?keyboard=" + v;
                        }

                        function changeKeyStatus() {
                            var e = document.getElementById("keyboard_status").checked;
                            if (e) {
                                window.location.href = "local.php";
                            } else {
                                window.location.href = "local.php?keyboard_status=false";
                            }

                        }
                    </script>
                </div>
            </div>';

            $big_html .= '
            <div class="header_nav_collapse">
                <label onclick="showHideMenu()"></label>
                <ul id="menu">
                    <li>
                                <a href="'.$base_url.'">Home</a>
                            </li>
                            <li>
                                <a href="'.$base_url.'english-to-'.$lang.'-read-text-with-translation">Read Text</a>
                            </li>
                            <li>
                                <a href="'.$base_url.'english-to-'.$lang.'-dictionary-vocabulary-game">Games</a>
                            </li>
                            <li>
                                <a href="'.$base_url.'english-to-'.$lang.'-dictionary-learn-ten-words-everyday">Words Everyday</a>
                            </li>
                            <li>
                                <a href="'.$base_url.''.$lang.'-to-english-dictionary"
                                   title="'.str_replace("Bengali", "Bangla", $ulang).' to English Dictionary">'.str_replace("Bengali", "Bangla", $ulang).'
                                    to English Dictionary</a>
                            </li>
                           
                            <li>
                                <a href="'.$base_url.'english-to-'.$lang.'-dictionary-favourite-words" title="Browse Favorite Words">Favorite
                                    Words</a>
                            </li>
                            <li>
                                <a href="'.$base_url.'english-to-'.$lang.'-dictionary-search-history"
                                   title="Browse Word Search History">Word Search History</a>
                            </li>
                            <li>
                                <a href="'.$base_url.'english-to-'.$lang.'-dictionary-browse-all-blogs" title="Blogs List">Blogs</a>
                            </li>
                            <li>
                                <a href="'.$base_url.'english-to-'.$lang.'-dictionary-contact-us">Contact</a>
                            </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="content_wrapper top_margin">
        <div class="left_content">';

           
            $big_html .= $alladcodes['300'];
            
            $big_html .= '
            <div class="box_wrapper">
                <fieldset class="main-area">';

		
                if(empty($word) && empty($start_with))	{
                    $big_html .= '
                    <legend><span class="custom_font2"><h1>Browse Words Alphabetically</h1></span></legend><br>';
                    foreach(range('a','z') as $row){
                        $big_html .= '<button class="btn_default4 bdr_radius2" onclick="location.href=\''.$base_url.'browse-english-to-'.$lang.'-word-'.strtolower($row).'\'">'.ucfirst($row).'</button>';
                    }
                    $big_html .= '<br>';
                    $big_html .= '<br>';
                    $other = @file_get_contents('https://content2.mcqstudy.com/main/' . $lang . '.txt');
            
        
                        if(!empty($other)){
                             
                            $array = explode(',',$other);
                            foreach($array as $value) {
                                $big_html .= '<button class="btn_default4 bdr_radius2" onclick="location.href=\''.$base_url.'browse-'.$lang.'-to-english-word-'.$value.'\'">'.$value.'</button>';
                            }	
                        }			 			
                }
                
                if(!empty($word) && empty($start_with)){
                    $big_html .= '<legend><span class="custom_font2"><h1>Filter Words :: '.ucfirst($word).'</h1></span></legend><br>';
                    
                    if(preg_match("/[a-z]/i", $word)){
                        $array = explode(',',file_get_contents('/var/www/bw-static-files/ta-word-list/' . strtolower($word) . '.txt'));
                        $array = array_unique(array_map(function($v) { return substr($v, 0, 2); }, $array));
                        $array = array_filter($array);
                        
                        foreach($array as $value) {
                            $big_html .= '<button class="btn_default4 bdr_radius2" onclick="location.href=\''.$base_url.'english-to-'.$lang.'-dictionary-two-letter-'.$value.'\'">'.$value.'</button>';
                        }	
                    }else{
                        $data = file_get_contents('https://content2.mcqstudy.com/local/' . strtolower($lang) . '/' . $word.'.txt');
        
                        $array = explode(',',$data);
                        $array = array_unique(array_map(function($v) { return mb_substr($v, 0, 2); }, $array));
                        $array = array_filter($array);
                        foreach($array as $value) {
                            $big_html .= '<button class="btn_default4 bdr_radius2" onclick="location.href=\''.$base_url.$lang.'-to-english-dictionary-two-letter-'.$value.'\'">'.$value.'</button>';
                        }
                        		
                    }
                    $big_html .= '<br>';
                    $big_html .= '<br>';
                    $big_html .= '<button class="btn_pre bdr_radius2 cursor_link" onclick="location.href=\''.$base_url.'browse-'.$lang.'-to-english-words\'"><a>← Back</a></button>';
                }
                
                if(!empty($start_with)){
                    $big_html .= '<legend><span class="custom_font2"><h1>Words starting with :: '.ucfirst($start_with).'</h1></span></legend><br>
                     <div class="fieldset_body inner_details">';
                
                    if(preg_match("/[a-z]/i", $start_with)){
                        $word = substr($start_with, 0, 1);
                        $array = explode(',',file_get_contents('/var/www/bw-static-files/ta-word-list/' . strtolower($word) . '.txt'));
                        
                        $i = 1;
                        foreach($array as $row){
                            
                            if(mb_substr($row, 0, 2) == $start_with){
                                $big_html .= '<span><a href="'.$base_url.'english-to-'.$lang.'-meaning-'.strtolower(str_replace(' ', '-', $row)).'"><label class="cursor_link">'.$i.'. '.$row.'</label></a></span><br>';
                                $i++;
                            }
                            
                        }
                        $big_html .= '<button class="btn_pre bdr_radius2 cursor_link"><a href="'.$base_url.'english-to-'.$lang.'-dictionary-letter-'.$word.'">← Back</a></button>';
                    
                    }else{
        
                        $word = mb_substr($start_with, 0, 1);
                        $data = file_get_contents('https://content2.mcqstudy.com/local/' . strtolower($lang) . '/' . $word.'.txt');
        
                        $array = explode(',',$data);
                    
                        $i = 1;
                        foreach($array as $row){
                            
                            if(mb_substr($row, 0, 2) == $start_with){
                                $big_html .= '<span><a href="'.$base_url.''.$lang.'-to-english-meaning-'.strtolower(str_replace(' ', '-', $row)).'"><label class="cursor_link">'.$i.'. '.$row.'</label></a></span><br>';
                                $i++;
                            }	
                        }	
                        $big_html .= '<button class="btn_pre bdr_radius2 cursor_link"><a href="'.$base_url.''.$lang.'-to-english-dictionary-letter-'.$word.'">← Back</a></button>';
        
                    }
                    
                }
        

        

        $big_html .= '
				</fieldset>
            </div>';

        $big_html .= '</div>';

        $big_html .= include('right_content_single_string.php');

    $big_html .= '
    </div>
    </fieldset>


    <div id="complete-dialog" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="custom_font3"><label class="modal-title"></label></div>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_default4 bdr_radius2" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>';

    $big_html .= '<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>';

   $big_html .= '<script src="' . $apiurl . 'local_page_js.js?v=12"></script>';
    // $big_html .= '<script src="http://174.138.22.171/server/local_page_js.js?v=2"></script>';

    $big_html .= include('footer_single_string.php'); 
    return $big_html;

}

?>
