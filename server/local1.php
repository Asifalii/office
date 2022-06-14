<?php
 error_reporting(0);
if (!empty($argv[1])) {
    $_GET['lang'] = $argv[1];
}

if (!empty($argv[2])) {
    $_GET['word'] = $argv[2];
}

require('functions.php');

$contentUrl = 'https://content2.mcqstudy.com/bw-static-files/';

if (isset($_GET['q']) && $_GET['q'] != null) {

     $q = sanitize($_GET['q'], $conn);

} else {
    $q = '';
}


if (preg_match('#::#', $q)) {
    $q_ex = explode('::', $q);
    $q = trim($q_ex[1]);
}

$word = $_GET['word'];
$info = array();
$url = 'https://'.array_search($_GET['lang'],getLanguageArray());
$translate = array_search($_GET['lang'],getTranslateText());
$lang = $_GET['lang'];
$ulang = ucfirst($lang);
$inWordList = true;

$base_url = $url . '/';

$scriptname = getScriptName();
$p = '';
$canonical = getCanonicalLink($conn, $scriptname, $lang, $base_url, $p);
$isMobile = isMobile();
$apiurl = 'https://server2.mcqstudy.com/';
$iswordbanned = getWordBannedStatus($conn, $p);
$alladcodes = getAllAdCodes($isMobile, $iswordbanned, $scriptname, $lang);
$autoad = getAutoAd($iswordbanned);
$analyticsid = getAnalyticsId(array_search($lang,getLanguageArray()));
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="<?= googleSiteVerify() ?>"/>


    <title><?= getTitle($q, $url) ?></title>

    <?php
    $local_lang = ($lang == 'bengali') ? 'Popular as ইংরেজি বাংলা অভিধান' : '';

    $m_des = 'English To ' . ucfirst($lang) . ' - Official ' . ucfirst($lang) . ' Dictionary Specially, ' . ucfirst($lang) . ' To English Dictionary &
Dictionary English To ' . ucfirst($lang) . ' Site Are Ready To Instant Result English To ' . ucfirst($lang) . ' Translator & ' . ucfirst($lang) . ' To English Translation Online FREE.
English To ' . ucfirst($lang) . ' Translation Online Tool And ' . ucfirst($lang) . ' to English Translation App Are Available On Play Store.
English To ' . ucfirst($lang) . ' Dictionary Are Ready To Translate To ' . ucfirst($lang) . ' Any Words With Totally Free.
Also Available Different ' . ucfirst($lang) . ' keyboard layout To Typing ' . ucfirst($lang) . ' To English Translate And English To ' . ucfirst($lang) . ' Converter. ' . "Let's Enjoy It...";


    $keyword = 'english to ' . $lang . ', english to ' . $lang . ' translator, ' . $lang . ' to english translation, translate to ' . $lang . ', ' . $lang . ' to english translate, english to ' . $lang . ' dictionary, english to ' . $lang . ' converter, ' . $lang . ' to english dictionary, dictionary english to ' . $lang . ', english to ' . $lang . ' meaning, translate eng to ' . $lang . ', english to ' . $lang . ' translation online, ' . $lang . ' to english meaning, ' . $lang . ' to english translation online, eng to ' . $lang . ' translate, ' . $lang . ' to english translation app, ' . $lang . ' dictionary';

    ?>
    <meta name="keyword" content="<?= str_replace("bengali", "bangla", $keyword) ?>">
    <meta name="description" content="<?= str_replace("Bengali", "Bangla", $m_des) ?>">
    <link rel="canonical" href="<?= $base_url. $lang .'-to-english-dictionary-letter-' . $_GET['word'] ?>"/>

    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="English :: <?= $ulang ?> Online Dictionary"/>
    <meta property="og:description"
          content="English to <?= $ulang ?> Dictionary (Free). You can get meaning of any English word very easily. It has auto-suggestion feature which will save you a lot of time getting any meaning. We have a Chrome Extension and an Android App"/>
    <meta property="og:url" content="<?= $base_url. $lang .'-to-english-dictionary-letter-' . $_GET['word'] ?>"/>
    <meta property="og:site_name" content="<?= $ulang ?> :: English Online Dictionary"/>


    <link rel="shortcut icon" href="<?= $contentUrl?>img/favicon.png">

	<script async src='https://www.googletagmanager.com/gtag/js?id=<?= $analyticsid ?>'></script>

       <script>
           function gtag(){dataLayer.push(arguments)}window.dataLayer=window.dataLayer||[],gtag('js',new Date);
        gtag('config', '<?= $analyticsid ?>');
        </script>

    <?php
    $k_array = array(
        "arabic" => array("ARABIC"),
        "armenian_eastern" => array("ARMENIAN_EASTERN", "ARMENIAN_WESTERN"),
        "basque" => array("BASQUE"),
        "belarusian" => array("BELARUSIAN"),
        "bengali" => array("BENGALI_PHONETIC"),
        "bosnian" => array("BOSNIAN"),
        "brazilian" => array("BRAZILIAN_PORTUGUESE"),
        "bulgarian" => array("BULGARIAN"),
        "catalan" => array("CATALAN"),
        "cherokee" => array("CHEROKEE"),
        "croatian" => array("CROATIAN"),
        "czech" => array("CZECH", "CZECH_QWERTZ"),
        "danish" => array("DANISH"),
        "dutch" => array("DUTCH"),
        "english" => array("ENGLISH"),
        "estonian" => array("ESTONIAN"),
        "ethiopic" => array("ETHIOPIC"),
        "finnish" => array("FINNISH"),
        "french" => array("FRENCH"),
        "galician" => array("GALICIAN"),
        "georgian" => array("GEORGIAN_QWERTY", "GEORGIAN_TYPEWRITER"),
        "german" => array("GERMAN"),
        "greek" => array("GREEK"),
        "gujarati" => array("GUJARATI_PHONETIC"),
        "hebrew" => array("HEBREW"),
        "hindi" => array("HINDI", "DEVANAGARI_PHONETIC"),
        "nepali" => array("HINDI"),
        "hungarian" => array("HUNGARIAN_101"),
        "icelandic" => array("ICELANDIC"),
        "italian" => array("ITALIAN"),
        "kannada" => array("KANNADA_PHONETIC"),
        "kazakh" => array("KAZAKH"),
        "khmer" => array("KHMER"),
        "korean" => array("KOREAN"),
        "kyrgyz" => array("KYRGYZ"),
        "lao" => array("LAO"),
        "latvian" => array("LATVIAN"),
        "lithuanian" => array("LITHUANIAN"),
        "macedonian" => array("MACEDONIAN"),
        "malayalam" => array("MALAYALAM_PHONETIC"),
        "maltese" => array("MALTESE"),
        "mongolian" => array("MONGOLIAN_CYRILLIC"),
        "montenegrin" => array("MONTENEGRIN"),
        "norwegian" => array("NORWEGIAN"),
        "pashto" => array("PASHTO"),
        "persian" => array("PERSIAN"),
        "polish" => array("POLISH"),
        "portuguese" => array("PORTUGUESE"),
        "romani" => array("ROMANI"),
        "romanian" => array("ROMANIAN"),
        "russian" => array("RUSSIAN"),
        "serbian" => array("SERBIAN_CYRILLIC", "SERBIAN_LATIN"),
        "sinhala" => array("SINHALA"),
        "slovak" => array("SLOVAK", "SLOVAK_QWERTY"),
        "slovenian" => array("SLOVENIAN"),
        "spanish" => array("SPANISH"),
        "swedish" => array("SWEDISH"),
        "tamil" => array("TAMIL_PHONETIC"),
        "tatar" => array("TATAR"),
        "telugu" => array("TELUGU_PHONETIC"),
        "thai" => array("THAI"),
        "turkish_f" => array("TURKISH_F", "TURKISH_Q"),
        "uighur" => array("UIGHUR"),
        "ukrainian" => array("UKRAINIAN_101"),
        "urdu" => array("URDU"),
        "uzbek" => array("UZBEK_CYRILLIC_PHONETIC", "UZBEK_LATIN", "UZBEK_CYRILLIC_TYPEWRITTER", "SOUTHERN_UZBEK"),
        "vietnamese" => array("VIETNAMESE_TCVN", "VIETNAMESE_TELEX", "VIETNAMESE_VIQR"),
        "albanian" => array("ALBANIAN"));
    ?>
    <?php

    if (in_array($lang, array_keys($k_array)) && isset($_GET['keyboard_status']) && !$_GET['keyboard_status']) {
        ?>
        <script type="text/javascript" src="<?= $contentUrl?>keyboard/jsapi.js"></script>
        <link href="<?= $contentUrl?>keyboard/keyboard.css?asfas=1asasf" type="text/css" rel="stylesheet">
        <script src="<?= $contentUrl?>keyboard/keyboard.I.js?asf=1234asfasasf" type="text/javascript"></script>
        <script type="text/javascript">

            function onLoad() {
                var kbd = new google.elements.keyboard.Keyboard(
                    [google.elements.keyboard.LayoutCode.<?=($_GET['keyboard']) ? $_GET['keyboard'] : $k_array[$lang][0]?>],
                    ['qb']);
            }

            google.setOnLoadCallback(onLoad);
        </script>
        <?php
    }
    ?>
    <style>
        h1{margin:0;padding:0;font-size:1.2rem;font-weight:500}h2{margin:0;padding:0;font-size:1.2rem;font-weight:500}.box_wrapper,.box_wrapper2{min-height:50px;overflow:hidden}.btn_default2 img,.btn_default3 img,.topic_link a img{margin-right:6px;float:left}.btn_default2 span,.btn_default3 span{line-height:30px}a,a:hover{text-decoration:none}body,html{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;height:100%}body{margin:0;padding:0;font-family:Tahoma,Verdana,Segoe,sans-serif!important;font-size:.95rem;color:#333;background-color:#f8f8f8;overflow-x:hidden}.btn_default,.custom_bgcolor{background-color:#043a54}.btn_default,.custom_font{font-size:.75rem}.custom_font,.custom_font2{color:#009385}a:focus,button:focus,img:focus,input:focus{outline:0}.top_margin{margin-top:15px!important}.bdr_radius{-webkit-border-bottom-left-radius:3px;-webkit-border-bottom-right-radius:3px;-moz-border-radius-bottomleft:3px;-moz-border-radius-bottomright:3px;border-bottom-left-radius:3px;border-bottom-right-radius:3px}.bdr_radius2{-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px}.bdr_radius3{border:1px solid #add7d3}.inner_wrapper{margin:15px 15px 0}.btn_default,.btn_default2{font-weight:700;color:#fff;border:none;cursor:pointer}.btn_default3,.btn_default4,.btn_default5{color:#333;border:1px solid #ddd;cursor:pointer}.align_left{float:left}.align_right{float:right}.btn_default{margin-right:3px;padding:10px 15px;text-transform:uppercase}.btn_default2,.btn_default3{padding:14px 15px;text-align:left;width:100%;text-transform:uppercase}.btn_default:hover,.btn_default_active{background-color:#00aa9a}.btn_default2{margin-bottom:15px;font-size:.95rem;background-color:#043a54;-webkit-box-shadow:0 1px 4px 0 rgba(0,0,0,.35);-moz-box-shadow:0 1px 4px 0 rgba(0,0,0,.35);box-shadow:0 1px 4px 0 rgba(0,0,0,.35)}.btn_default2 img{margin:0 5px 0 0;vertical-align:middle}.btn_default2:hover{background-color:#00aa9a}.btn_default3{margin-bottom:15px;font-size:1rem;font-weight:900;background-image:url(https://content2.mcqstudy.com/bw-static-files/img/bg28.png);background-repeat:repeat;-webkit-box-shadow:0 1px 1px 0 rgba(0,0,0,.25);-moz-box-shadow:0 1px 1px 0 rgba(0,0,0,.25);box-shadow:0 1px 1px 0 rgba(0,0,0,.25)}.btn_default4,.btn_default5{padding:10px;font-size:.75rem;font-weight:700}.btn_default3 img{margin:-3px 5px 0 0;vertical-align:middle}.btn_default3:hover{background-image:url(https://content2.mcqstudy.com/bw-static-files/img/bg28-hover.png);background-repeat:repeat}.btn_default4{margin:6px 3px;background-color:#fff}.btn_default4:hover{background-color:#fafafa}.btn_default5{margin:10px 0 10px 10px;width:97%;background-color:#fff;text-align:center;text-transform:uppercase}.btn_default5:hover{background-color:#fafafa}#site_wrapper{width:100%;height:auto;overflow:hidden}.content_wrapper{margin:0 auto;max-width:100%;width:1140px;height:auto;position:relative}.left_content{width:65%;float:left}.right_content{width:34%;float:right}.box_wrapper{margin:4px auto 16px;width:99%;height:auto;background-color:#fff;-webkit-box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-box-shadow:0 0 4px 0 rgba(0,0,0,.25);box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper fieldset{margin:15px 15px 20px;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper fieldset legend{margin-left:10px;font-size:1.22rem;font-weight:500}.box_wrapper fieldset .fieldset_body{padding:20px 13px;overflow:hidden}.box_wrapper fieldset .fieldset_body span{float:left}.search_fld{width:83.5%;position:relative;top:10px;left:15px;right:0;float:left}.search_fld input[type=text]{position:relative;z-index:1;width:100%;padding:10px;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-moz-box-shadow:inset 0 0 5px #ccc;-webkit-box-shadow:inset 0 0 5px #ccc;box-shadow:inset 0 0 5px #ccc;text-transform:capitalize;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.search_fld input[type=text]:focus{border:1px solid #bbb}.search_btn{padding:19px;width:22px;height:22px;position:absolute;top:1px;right:0;z-index:2;background-color:transparent;background-image:url(https://content2.mcqstudy.com/bw-static-files/img/search_icon.png);background-position:center center;border-left:1px solid #666;border-right:0;border-top:0;border-bottom:0;background-repeat:no-repeat;cursor:pointer;opacity:.35;transition:opacity .5s ease-out;-moz-transition:opacity .5s ease-out;-webkit-transition:opacity .5s ease-out;-o-transition:opacity .5s ease-out}.footer_wrapper{display:block;clear:both}.footer_wrapper,.topic_link a:first-child{border-top:1px solid #ddd}.footer_wrapper,.topic_link a{border-bottom:1px solid #ddd;overflow:hidden}.search_btn:hover{opacity:.75}.topic_link{margin:0;padding:0}.topic_link a{margin-left:3px;padding:12px 0;width:100%;color:#333;line-height:25px;display:block}.topic_link a:hover{background-color:#fafafa}.topic_link span{line-height:25px}.topic_link span img{margin-right:5px;vertical-align:middle}.box_wrapper2{margin:4px auto 17px;width:99%;height:auto;background-color:#fff;-webkit-box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-box-shadow:0 0 4px 0 rgba(0,0,0,.25);box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper2 fieldset{margin:0 0 20px;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper2 fieldset legend{margin-left:10px;font-size:1.08rem;font-weight:500}.box_wrapper2 fieldset .fieldset_body{padding:13px;overflow:hidden}.footer_wrapper{margin:0 auto 5px;padding:0 4px;max-width:100%;width:1124px}.footer_wrapper span{font-size:.75rem;color:#555;line-height:50px;display:block}.footer_wrapper span a{color:#333}.footer_wrapper span a:hover{color:#00aa9a}button a{color:#333;display:block}button a:hover{color:#009385;text-decoration:none!important}button a span{color:#fff}button a label{color:#333;line-height:30px}.custom_bdr{border:1px solid #aaa}.responsive_img{width:100%;max-width:100%;height:auto}.header_wrapper{position:relative;top:0;width:100%;height:60px;background-color:#043a54}.header_logo a,.header_wrapper .header_logo{padding-left:2px;color:#fff;font-size:1.5rem;font-weight:900;line-height:60px;float:left width: 10.5%}.header_wrapper .header_nav{padding-right:2px;float:right}.header_wrapper .header_nav ul{margin:0;padding:0}.header_wrapper .header_nav ul li{margin:0;padding:0;list-style-type:none;display:inline;float:left}.header_wrapper .header_nav ul li a{padding:0 15px;color:#fff;font-size:.95rem;font-weight:700;line-height:58px;text-transform:uppercase;text-align:center;border:1px solid #043a54;border-right:none;float:left}.header_wrapper .header_nav ul li a:hover{color:#fff;background-color:#00aa9a;border:1px solid #043a54;border-right:none}.header_wrapper .header_nav ul li a.active{background-color:#00aa9a}.header_nav_collapse{width:100%;display:inline-block}.header_nav_collapse ul{margin-top:3px;padding:0;width:100%;list-style:none;display:none}.header_nav_collapse ul li{width:100%;height:auto;position:relative;top:-3px;z-index:3;transition:all .5s;opacity:1;display:inline-block;color:#fff;border-bottom:1px solid #084a6a;background-color:#043a54;text-indent:15px}.header_nav_collapse ul li:hover{background:#00aa9a}.header_nav_collapse ul li a{padding:15px 0;color:#fff;text-decoration:none;display:block}.header_nav_collapse ul li:last-child{border-bottom:none;-webkit-border-bottom-left-radius:4px;-webkit-border-bottom-right-radius:4px;-moz-border-radius-bottomleft:4px;-moz-border-radius-bottomright:4px;border-bottom-left-radius:4px;border-bottom-right-radius:4px}.header_nav_collapse label{position:absolute;top:10px;right:0;padding:11px 9px 7px 9px;display:inline-block;border:2px solid #00a091;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px;cursor:pointer}.header_nav_collapse label:before{width:20px;height:2px;background:#fff;display:inline-block;content:"";box-shadow:0 -6px 0 0 #fff,0 -12px 0 0 #fff;transition:all .5s;opacity:1}.autocomplete{position:relative;display:inline-block}.autocomplete-items{position:absolute;border:1px solid #ddd;border-bottom:none;border-top:none;z-index:99;top:41px;left:0;right:0}.autocomplete-items div{padding:8px 10px;cursor:pointer;background-color:#fff;border-bottom:1px solid #ddd}.autocomplete-items div:hover{background-color:#fafafa}.autocomplete-items:last-child{-webkit-border-bottom-left-radius:3px;-moz-border-radius-bottomleft:3px;border-bottom-left-radius:3px;-webkit-border-bottom-right-radius:3px;-moz-border-radius-bottomright:3px;border-bottom-right-radius:3px}.btn_default6,h6{font-weight:700;clear:both}h6{margin:0;padding:10px 0;font-family:Roboto,sans-serif;font-size:1.15rem;color:#333;border-top:1px solid #ddd;border-bottom:1px solid #ddd}.top_margin2{margin-top:45px}.custom_font3{font-size:1.12rem;color:#009385;line-height:24px}.clear_fixdiv{margin:0;padding:0;display:block;clear:both}.btn_default6{margin-top:10px;padding:12px 24px;width:auto;font-size:.75rem;color:#fff;background-color:#043a54;text-align:center;text-transform:uppercase;border:1px solid #043045;cursor:pointer;float:right}.btn_default6:hover{background-color:#00aa9a;border:1px solid #009a8b}.box_wrapper fieldset .fieldset_body textarea{position:relative;z-index:1;width:97%;margin:0;padding:10px;font-family:Roboto,sans-serif;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-top-left-radius:3px;-moz-border-radius-topleft:3px;border-top-left-radius:3px;-webkit-border-top-right-radius:3px;-moz-border-radius-topright:3px;border-top-right-radius:3px;-webkit-border-bottom-right-radius:3px;-moz-border-radius-bottomright:3px;border-bottom-right-radius:3px;-moz-box-shadow:inset 0 0 5px #ccc;-webkit-box-shadow:inset 0 0 5px #ccc;box-shadow:inset 0 0 5px #ccc;display:block}.box_wrapper fieldset .fieldset_body textarea:focus{border:1px solid #bbb;outline:0}.gif_img{width:100%;min-width:100%;height:auto;border:2px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.text_color{color:#fff}.pagination{margin:0 15px 25px 0;display:inline-block;float:right;clear:both}.pagination a{margin-left:3px;color:#333;float:left;padding:5px 10px;text-decoration:none;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.pagination a.active{background-color:#009385;color:#fff;border:1px solid #01877a}.pagination a:hover:not(.active){background-color:#fafafa;border:1px solid #ddd}.pagination{margin:0 15px 25px 0;display:inline-block;float:right;clear:both}.pagination a{margin-left:3px;color:#333;float:left;padding:5px 10px;text-decoration:none;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.pagination a.active{background-color:#009385;color:#fff;border:1px solid #01877a}.pagination a:hover:not(.active){background-color:#fafafa;border:1px solid #ddd}.btn_active{background-color:#fafafa}.inner_details{line-height:22px}.inner_details span{width:100%;padding:15px 0;border-bottom:1px solid #eaeaea;clear:both}.inner_details label{font-weight:500;color:#009385;text-transform:capitalize}.inner_details span:first-child{padding-top:0}.inner_details a{color:#333;text-decoration:none}.inner_details a:hover{color:#009385;text-decoration:underline;cursor:pointer}.inner_details .label_font{margin-right:5px;font-weight:500;color:#009385;float:left}.img_align{display:inline-flex;line-height:28px}.img_align img{margin:0 8px}.align_text{font-weight:500;line-height:28px;float:left}.align_text2{margin:0 8px;color:#333;line-height:28px;float:left}.line_height{line-height:35px}.float_left{float:left}.float_div{width:50%;float:left}.custom_margin{margin-bottom:8px}.custom_margin2{margin-bottom:20px;clear:both}.custom_margin3{margin-top:8px!important;float:left;clear:both}.accordion_collapse{overflow:hidden;clear:both}.accordion_collapse h4{margin:0;padding:8px;border:1px solid #eaeaea;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px;background-color:#fafafa;outline:0;cursor:pointer}.custom-accordion-content{padding:15px 8px;display:none}.icon_right{font-size:.8rem;color:#009385!important;float:right}.dic_img img{width:340px;height:auto;padding:15px 10px 10px 10px;border:1px dashed #ddd}.h_line{margin:0 0 15px 0;border-top:1px solid #eaeaea;clear:both}.h_line2{margin:15px 0 15px 0;border-top:1px solid #eaeaea;clear:both}.alert_text{color:#e90505}.success_text{color:#009d2c}.contact{margin:0;padding:0;display:block;overflow:hidden}.contact p{margin:0;padding:0}.contact input[type=text]{margin-bottom:12px;width:100%;padding:10px;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-moz-box-shadow:inset 0 0 3px #ccc;-webkit-box-shadow:inset 0 0 3px #ccc;box-shadow:inset 0 0 3px #ccc;text-transform:capitalize;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.contact input[type=text]:focus{border:1px solid #bbb}.contact textarea{margin-bottom:12px!important;width:100%!important;padding:10px;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-moz-box-shadow:inset 0 0 3px #ccc!important;-webkit-box-shadow:inset 0 0 3px #ccc!important;box-shadow:inset 0 0 3px #ccc!important;text-transform:capitalize;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.contact textarea:focus{border:1px solid #bbb}.custom_font4{color:#333;font-size:1.12rem;font-weight:500}::-webkit-input-placeholder{text-transform:none}::-moz-placeholder{text-transform:none}:-ms-input-placeholder{text-transform:none}:-moz-placeholder{text-transform:none}.cursor_link{cursor:pointer}.btn_pre{background-color:#009385;border:1px solid #01877a;float:left}.btn_pre:hover{background-color:#fff;border:1px solid #ddd}.btn_next{background-color:#009385;border:1px solid #01877a;float:right}.btn_next:hover{background-color:#fff;border:1px solid #ddd}.btn_next a,.btn_pre a{padding:8px 12px;color:#fff;font-size:.925rem;font-weight:700;text-decoration:none}.btn_next a:hover,.btn_pre a:hover{text-decoration:none}.desc_text p{margin:0;padding:0;clear:both}.desc_text a{color:#009385}.texture_btn{background-image:url(https://content2.mcqstudy.com/bw-static-files/img/bg28.png);background-repeat:repeat}.btn_bdrcolor1{border-color:#bcc4c8}.btn_bdrcolor2{border-color:#ffc2af}.btn_bdrcolor3{border-color:#49d5c8}.btn_activebg{background-image:url(https://content2.mcqstudy.com/bw-static-files/img/bg28-hover.png);background-repeat:repeat}.words_category{margin-bottom:10px;overflow:hidden;clear:both}.words_category:last-child{margin-bottom:0}.words_category h5{margin:0;padding:5px;font-size:1rem;font-weight:700;color:#009385}.words_category h5 img{vertical-align:middle}.words_category label{margin:0;padding:10px 10px 10px 10px;color:#333;background-color:#f8f8f8;cursor:pointer;display:block}.words_category .category_cards{margin:0}.words_category .category_cards a{width:49.35%;padding:10px;border:1px solid #ddd;border-bottom:5px solid #ededed;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;box-sizing:border-box;float:left;overflow:hidden}.category_cards a:hover{border:1px solid #ccc;border-bottom:5px solid #ccc}.words_category .category_cards:nth-child(even) a{float:right}.custom_color3{color:#043a54!important}.custom_color4{color:#ff8a00!important}.custom_color5{color:#0096ff!important}.custom_dbstyle{margin:0}.custom_dbstyle ol,.custom_dbstyle span{line-height:normal!important;clear:both!important}.custom_dbstyle ol,.custom_dbstyle p,.custom_dbstyle span{padding:0;font-family:Roboto,sans-serif!important;font-size:.95rem!important;color:#333!important}.custom_dbstyle{margin:0}.custom_dbstyle p{margin:0 0 15px!important}.custom_dbstyle ol{margin:0 15px 15px!important}.custom_dbstyle ol li{margin:0;padding:0}.custom_dbstyle span{margin:0 0 15px!important}.jumbotron h2{display:none}.custom_dbstyle table{width:94%!important;margin:0 0 5px!important;table-layout:auto!important;border:0!important;font-weight:500!important}.custom_dbstyle table td{padding:5px!important}.custom_dbstyle ul{margin:0!important;padding:0!important;overflow:hidden!important}.custom_dbstyle ul li{margin:0!important;padding:0!important;list-style-type:none!important}.icon_button{border:0;background-color:transparent;padding:0;margin:0}.modal-header{border-bottom:1px solid #e5e5e5}.modal-header .close{position:absolute;right:12px;top:12px}.modal-title{margin:15px 0 0}@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto}}.modal-content{padding:10px}.modal-content .modal-header{border-bottom:none}.modal-content .modal-body{padding:0 8px}.modal-content .modal-footer{border-top:none;padding:7px}.modal-content .modal-footer button{margin:0;width:auto;position:relative;right:2px;bottom:0}.modal-content .modal-body+.modal-footer{padding-top:0}.modal,.modal-open{overflow:hidden}.modal,.modal-backdrop{top:0;right:0;bottom:0;left:0}.modal{display:none;position:fixed;z-index:1050;-webkit-overflow-scrolling:touch;outline:0}.modal.fade .modal-dialog{-webkit-transform:translate(0,-25%);-ms-transform:translate(0,-25%);-o-transform:translate(0,-25%);transform:translate(0,-25%);-webkit-transition:-webkit-transform .3s ease-out;-o-transition:-o-transform .3s ease-out;transition:transform .3s ease-out}.modal.in .modal-dialog{-webkit-transform:translate(0,0);-ms-transform:translate(0,0);-o-transform:translate(0,0);transform:translate(0,0)}.modal-open .modal{overflow-x:hidden;overflow-y:auto}.modal-dialog{position:relative;width:auto;margin:10px}.modal-content{position:relative;background-color:#fff;border:1px solid #999;border:1px solid rgba(0,0,0,.2);border-radius:6px;-webkit-box-shadow:0 3px 9px rgba(0,0,0,.5);box-shadow:0 3px 9px rgba(0,0,0,.5);-webkit-background-clip:padding-box;background-clip:padding-box;outline:0}.modal-backdrop{position:fixed;z-index:1040;background-color:#000}.modal-backdrop.fade{opacity:0}.modal-backdrop.in{opacity:.5}.modal-header{padding:10px}.modal-header button{border:0;background-color:transparent;font-size:30px}.modal-body{position:relative}.modal-footer{padding:15px;text-align:right;border-top:1px solid #e5e5e5}.modal-footer .btn+.btn{margin-left:5px;margin-bottom:0}.modal-footer .btn-group .btn+.btn{margin-left:-1px}.modal-footer .btn-block+.btn-block{margin-left:0}.modal-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto}.modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5)}.modal-sm{width:300px}}@media (min-width:992px){.modal-lg{width:900px}}@media only screen and (max-width:1024px){#site_wrapper{margin:0 auto;width:95%;padding:10px 0}.small_viewport_mergin{margin-left:28px;float:none;clear:both}.footer_wrapper{width:99%}.box_wrapper fieldset{margin:20px 0;border:0}.box_wrapper2 fieldset{padding:0;border:0}.box_wrapper2 fieldset .fieldset_body{padding:3px}.box_wrapper2 fieldset legend{margin-left:0}.header_wrapper{-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.header_logo a,.header_wrapper .header_logo{padding-left:7px}.header_nav_collapse label{right:15px}.header_nav_collapse ul{margin-top:0}.search_fld{margin:0;width:91%;left:14px}}@media only screen and (max-width:1023px){.gallery_meaning .div_panel{margin:5px 0;width:100%}}@media only screen and (max-width:854px){.search_fld{margin:0;width:89%;left:14px}.dic_img img{width:75%;height:auto}}@media only screen and (max-width:800px){.box_wrapper fieldset .fieldset_body textarea,.btn_default5{width:95%}}@media only screen and (max-width:768px){.box_wrapper fieldset .fieldset_body textarea{width:95%}.dic_img img{padding:0;width:100%;height:auto;border:0}.search_fld{width:89%}}@media only screen and (max-width:667px){.search_fld{margin:0;width:87%;left:14px}}@media only screen and (max-width:640px){.header_nav{display:none}.header_nav_collapse{display:inline}.header_nav_collapse ul li{width:100%}#menu{display:none}.btn_default3 img{width:30px;height:30px}.small_viewport_mergin{float:left}.btn_default5{width:94%}.search_fld{margin:0;width:87%;left:14px}.dic_img img{padding:0;width:100%;height:auto;border:0}}@media only screen and (max-width:600px){.box_wrapper fieldset .fieldset_body textarea{width:93%}.float_div{width:100%}.search_fld{margin:0;width:85%;left:14px}.dic_img img{padding:0;width:100%;height:auto;border:0}}@media only screen and (max-width:480px){.header_nav{display:none}.header_nav_collapse{display:inline}#menu{display:none}.left_content{width:100%;float:none;display:block}.box_wrapper fieldset legend{margin-left:0;font-size:1.16rem}.box_wrapper fieldset .fieldset_body{padding:10px 3px}.btn_default4{margin:3px;padding:8px}.btn_default5{width:98%;margin:20px 3px 10px 5px;padding:8px}.topic_link a{padding:10px 0}.small_viewport_mergin{margin-left:28px;float:left}.right_content{width:100%;float:none;display:block}.btn_default2{padding:10px}.btn_default3{padding:10px;font-size:.93rem}.btn_default3 img{width:30px;height:30px}.footer_wrapper{padding:8px 4px}.footer_wrapper span{float:none;line-height:25px}.search_fld{margin:0;width:82%;left:14px}.dic_img img{padding:0;width:100%;height:auto;border:0}}@media only screen and (max-width:414px){.box_wrapper fieldset .fieldset_body textarea{width:93%}.btn_default5{width:97%}.search_fld{margin:0;width:79%;left:14px}}@media only screen and (max-width:375px){.box_wrapper fieldset .fieldset_body textarea{width:92%}.dic_img img{padding:0;width:100%;height:auto;border:0}.search_fld{width:77%}}@media only screen and (max-width:320px){.btn_default5{width:96%}.search_fld{margin:0;width:74%;left:14px}}.logo_div{width:94%;display:flex}@media screen and (max-width:906px){.logo_div{width:75%!important}}@media only screen and (max-width:1024px){.header_wrapper .header_logo{display:none}.mobile_logo{display:block!important}}
    </style>
	
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-2642708445471409",
            enable_page_level_ads: true
        });
    </script>
</head>
<body>
<?php
$url = $contentUrl . "site_logo/" . $lang . ".webp";
$langLogo = $contentUrl . "site_logo/" . $lang . ".png";

if (strpos($base_url, 'dictionary')) {
    $mobile = $contentUrl . "mobile_logo/dictionary.webp";
    $mobileLangLogo = $contentUrl . "mobile_logo/dictionary.png";
} else {
    $mobile = $contentUrl . "mobile_logo/" . $lang . ".webp";;
    $mobileLangLogo = $contentUrl . "mobile_logo/" . $lang . ".png";;
}
?>

<script>
    function textToSpeech(word) {
        speechSynthesis.speak(new SpeechSynthesisUtterance(word));
    }
	
	document.onclick = function (e) {
        "qb" != e.target.id && (document.getElementById("myInputautocomplete-list").innerHTML = "")
    };
</script>
<!--Site Wrapper-->
<div id="site_wrapper">
    <div class="header_wrapper">
        <div class="content_wrapper">
            <div class="logo_div">
                <div class="header_logo">
                    <a href="<?= $base_url ?>"><img src="<?= $url ?>"
                                             onerror="this.onerror=null; this.src='<?= $langLogo ?>'"
                                             alt="<?= ($lang == 'bengali') ? 'BDWORD' : strtoupper($lang) ?>"
                                             height="55px" style="margin-bottom: -15px;" loading="lazy"></a>
                </div>

                <div class="mobile_logo" style="display: none">
                    <a href="<?= $base_url ?>"><img src="<?= $mobile ?>"
                                             onerror="this.onerror=null; this.src='<?= $mobileLangLogo ?>'"
                                             alt="<?= ($lang == 'bengali') ? 'BDWORD' : strtoupper($ulang) ?>" height="55px" style="padding-left: 5px;padding-top: 2px;" loading="lazy"></a>
                </div>

                <script>

                    function showHideNav() {
                        if ($('.navbar-collapse').hasClass('collapse') == true) {
                            $('.navbar-collapse').removeClass('collapse');
                        } else {
                            $('.navbar-collapse').addClass('collapse');
                        }
                    }

                    function submit_search_local(val) {
						
						var replaced = val.split(' ').join('%20');
						t = [];
						var word = val;
						null != localStorage.getItem("<?= $lang ?>_local_history") && (t = JSON.parse(localStorage.getItem("<?= $lang ?>_local_history"))), t.indexOf(word) !== -1 && t.splice(t.indexOf(word), 1), t.push(word), localStorage.setItem("<?= $lang ?>_local_history", JSON.stringify(t.filter(onlyUnique)));
									
                        window.location.replace(
                            '<?=$base_url?><?=$lang?>-to-english-meaning-' + replaced,
                            '_self '
                        );

                    }
					
					function show_local_history() {
					document.getElementById("qb").value = "";
					var e = JSON.parse(localStorage.getItem("<?= $lang ?>_local_history"));
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
					var lang1 = '<?= $lang ?>';
					t = [];
					var word = document.getElementById("qb").value;
					null != localStorage.getItem("<?= $lang ?>_local_history") && (t = JSON.parse(localStorage.getItem("<?= $lang ?>_local_history"))), t.indexOf(word) !== -1 && t.splice(t.indexOf(word), 1), t.push(word), localStorage.setItem("<?= $lang ?>_local_history", JSON.stringify(t.filter(onlyUnique)));
					var redirect_url = main_domain() + lang1 + "-to-english-meaning-" + word;
					window.location.href = redirect_url;
					return false;
				}

                </script>

                <div class="search_fld" style="width: 100%;">
                    <form autocomplete="off" name="new_form" action="#" id="new_form">
                        <input type="text" value="<?= $q; ?>" class="main-search" id="qb" name="word"
                               autocomplete="off" onfocus="show_local_history()"
                               required placeholder="<?= $translate?>"/>


                        <button type="submit" class="search_btn" onclick="return redirectLocalUrl();"></button>

                        <div id="myInputautocomplete-list" class="suggested_list autocomplete-items">

                        </div>
                    </form>


                    <script>
                        function changeKeyboard() {
                            var e = document.getElementById("keyboard");
                            var v = e.options[e.selectedIndex].value;
                            window.location.href = 'local.php?keyboard=' + v;
                        }

                        function changeKeyStatus() {
                            var e = document.getElementById("keyboard_status").checked;
                            if (e) {
                                window.location.href = 'local.php';
                            } else {
                                window.location.href = 'local.php?keyboard_status=false';
                            }

                        }
                    </script>
                </div>
            </div>
            <div class="header_nav_collapse">
                <label onclick="showHideMenu()"></label>
                <ul id="menu">
							<li>
                                <a href="<?= $base_url ?>">Home</a>
                            </li>
                            <li>
                                <a href="<?= $base_url ?>english-to-<?=$lang?>-read-text-with-translation">Read Text</a>
                            </li>
                            <li>
                                <a href="<?= $base_url ?>english-to-<?=$lang?>-dictionary-vocabulary-game">Games</a>
                            </li>
                            <li>
                                <a href="<?= $base_url ?>english-to-<?=$lang?>-dictionary-learn-ten-words-everyday">Words Everyday</a>
                            </li>
                            <li>
                                <a href="<?= $base_url ?><?= $lang ?>-to-english-dictionary"
                                   title="<?= str_replace("Bengali", "Bangla", $ulang) ?> to English Dictionary"><?= str_replace("Bengali", "Bangla", $ulang) ?>
                                    to English Dictionary</a>
                            </li>
                            
                            <li>
                                <a href="<?= $base_url ?>english-to-<?=$lang?>-dictionary-favourite-words" title="Browse Favorite Words">Favorite
                                    Words</a>
                            </li>
                            <li>
                                <a href="<?= $base_url ?>english-to-<?=$lang?>-dictionary-search-history"
                                   title="Browse Word Search History">Word Search History</a>
                            </li>
                            <li>
                                <a href="<?= $base_url ?>english-to-<?=$lang?>-dictionary-browse-all-blogs" title="Blogs List">Blogs</a>
                            </li>
                            <li>
                                <a href="<?= $base_url ?>english-to-<?=$lang?>-dictionary-contact-us">Contact</a>
                            </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="content_wrapper top_margin">
        <div class="left_content">
            <?php
            echo $alladcodes['300'];
            ?>
            <div class="box_wrapper">
                <fieldset class="main-area1">
				<?php if(!empty($word)){
			echo '<legend><span class="custom_font2"><h1>Filter Words :: '.ucfirst($word).'</h1></span></legend><br>';
			
			if(preg_match("/[a-z]/i", $word)){
				$array = explode(',',file_get_contents('https://content2.mcqstudy.com/bw-static-files/ta-word-list/' . strtolower($word) . '.txt'));
				$array = array_unique(array_map(function($v) { return substr($v, 0, 2); }, $array));
				$array = array_filter($array);
				foreach($array as $value) { ?>
				 <button class="btn_default4 bdr_radius2" onclick="location.href='<?= $base_url.'english-to-'.$lang.'-dictionary-two-letter-'.$value?>'"><?= $value?></button>
			<?php }	
			}else{

				$other = @file_get_contents('https://content2.mcqstudy.com/local/' . strtolower($lang).'/'.$word. '.txt');
				if(!empty($other)){
					$array = explode(',',$other);
					$array = array_unique(array_map(function($v) { return mb_substr($v, 0, 2); }, $array));
					$array = array_filter($array);
				}
						
			
			foreach($array as $value) { ?>
				 <button class="btn_default4 bdr_radius2" onclick="location.href='<?= $base_url.$lang.'-to-english-dictionary-two-letter-'.$value?>'"><?= $value?></button>
			<?php }
			}	
			?>
		
			<br>
			<br>
			<button class="btn_pre bdr_radius2 cursor_link" onclick="location.href='<?= $base_url.$lang.'-to-english-dictionary'?>'"><a>← Back</a></button>
	<?php	} ?>
				</fieldset>
            </div>
            <!--Specific Page Content-->
            <?php

            require_once('index_fixed_content.php');

            ?>

        </div>

        <?php include('right-content.php'); ?>


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
    </div>

    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

    <script type="text/javascript">
        if ("undefined" == typeof jQuery) throw new Error("Bootstrap's JavaScript requires jQuery");
        +function (t) {
            "use strict";
            var e = t.fn.jquery.split(" ")[0].split(".");
            if (e[0] < 2 && e[1] < 9 || 1 == e[0] && 9 == e[1] && e[2] < 1 || e[0] > 3) throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 4")
        }(jQuery), +function (t) {
            "use strict";

            function e(e, i) {
                return this.each(function () {
                    var s = t(this), n = s.data("bs.modal"),
                        r = t.extend({}, o.DEFAULTS, s.data(), "object" == typeof e && e);
                    n || s.data("bs.modal", n = new o(this, r)), "string" == typeof e ? n[e](i) : r.show && n.show(i)
                })
            }

            var o = function (e, o) {
                this.options = o, this.$body = t(document.body), this.$element = t(e), this.$dialog = this.$element.find(".modal-dialog"), this.$backdrop = null, this.isShown = null, this.originalBodyPad = null, this.scrollbarWidth = 0, this.ignoreBackdropClick = !1, this.options.remote && this.$element.find(".modal-content").load(this.options.remote, t.proxy(function () {
                    this.$element.trigger("loaded.bs.modal")
                }, this))
            };
            o.VERSION = "3.3.7", o.TRANSITION_DURATION = 300, o.BACKDROP_TRANSITION_DURATION = 150, o.DEFAULTS = {
                backdrop: !0,
                keyboard: !0,
                show: !0
            }, o.prototype.toggle = function (t) {
                return this.isShown ? this.hide() : this.show(t)
            }, o.prototype.show = function (e) {
                var i = this, s = t.Event("show.bs.modal", {relatedTarget: e});
                this.$element.trigger(s), this.isShown || s.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.setScrollbar(), this.$body.addClass("modal-open"), this.escape(), this.resize(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', t.proxy(this.hide, this)), this.$dialog.on("mousedown.dismiss.bs.modal", function () {
                    i.$element.one("mouseup.dismiss.bs.modal", function (e) {
                        t(e.target).is(i.$element) && (i.ignoreBackdropClick = !0)
                    })
                }), this.backdrop(function () {
                    var s = t.support.transition && i.$element.hasClass("fade");
                    i.$element.parent().length || i.$element.appendTo(i.$body), i.$element.show().scrollTop(0), i.adjustDialog(), s && i.$element[0].offsetWidth, i.$element.addClass("in"), i.enforceFocus();
                    var n = t.Event("shown.bs.modal", {relatedTarget: e});
                    s ? i.$dialog.one("bsTransitionEnd", function () {
                        i.$element.trigger("focus").trigger(n)
                    }).emulateTransitionEnd(o.TRANSITION_DURATION) : i.$element.trigger("focus").trigger(n)
                }))
            }, o.prototype.hide = function (e) {
                e && e.preventDefault(), e = t.Event("hide.bs.modal"), this.$element.trigger(e), this.isShown && !e.isDefaultPrevented() && (this.isShown = !1, this.escape(), this.resize(), t(document).off("focusin.bs.modal"), this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"), this.$dialog.off("mousedown.dismiss.bs.modal"), t.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", t.proxy(this.hideModal, this)).emulateTransitionEnd(o.TRANSITION_DURATION) : this.hideModal())
            }, o.prototype.enforceFocus = function () {
                t(document).off("focusin.bs.modal").on("focusin.bs.modal", t.proxy(function (t) {
                    document === t.target || this.$element[0] === t.target || this.$element.has(t.target).length || this.$element.trigger("focus")
                }, this))
            }, o.prototype.escape = function () {
                this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", t.proxy(function (t) {
                    27 == t.which && this.hide()
                }, this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal")
            }, o.prototype.resize = function () {
                this.isShown ? t(window).on("resize.bs.modal", t.proxy(this.handleUpdate, this)) : t(window).off("resize.bs.modal")
            }, o.prototype.hideModal = function () {
                var t = this;
                this.$element.hide(), this.backdrop(function () {
                    t.$body.removeClass("modal-open"), t.resetAdjustments(), t.resetScrollbar(), t.$element.trigger("hidden.bs.modal")
                })
            }, o.prototype.removeBackdrop = function () {
                this.$backdrop && this.$backdrop.remove(), this.$backdrop = null
            }, o.prototype.backdrop = function (e) {
                var i = this, s = this.$element.hasClass("fade") ? "fade" : "";
                if (this.isShown && this.options.backdrop) {
                    var n = t.support.transition && s;
                    if (this.$backdrop = t(document.createElement("div")).addClass("modal-backdrop " + s).appendTo(this.$body), this.$element.on("click.dismiss.bs.modal", t.proxy(function (t) {
                        return this.ignoreBackdropClick ? void (this.ignoreBackdropClick = !1) : void (t.target === t.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus() : this.hide()))
                    }, this)), n && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !e) return;
                    n ? this.$backdrop.one("bsTransitionEnd", e).emulateTransitionEnd(o.BACKDROP_TRANSITION_DURATION) : e()
                } else if (!this.isShown && this.$backdrop) {
                    this.$backdrop.removeClass("in");
                    var r = function () {
                        i.removeBackdrop(), e && e()
                    };
                    t.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", r).emulateTransitionEnd(o.BACKDROP_TRANSITION_DURATION) : r()
                } else e && e()
            }, o.prototype.handleUpdate = function () {
                this.adjustDialog()
            }, o.prototype.adjustDialog = function () {
                var t = this.$element[0].scrollHeight > document.documentElement.clientHeight;
                this.$element.css({
                    paddingLeft: !this.bodyIsOverflowing && t ? this.scrollbarWidth : "",
                    paddingRight: this.bodyIsOverflowing && !t ? this.scrollbarWidth : ""
                })
            }, o.prototype.resetAdjustments = function () {
                this.$element.css({paddingLeft: "", paddingRight: ""})
            }, o.prototype.checkScrollbar = function () {
                var t = window.innerWidth;
                if (!t) {
                    var e = document.documentElement.getBoundingClientRect();
                    t = e.right - Math.abs(e.left)
                }
                this.bodyIsOverflowing = document.body.clientWidth < t, this.scrollbarWidth = this.measureScrollbar()
            }, o.prototype.setScrollbar = function () {
                var t = parseInt(this.$body.css("padding-right") || 0, 10);
                this.originalBodyPad = document.body.style.paddingRight || "", this.bodyIsOverflowing && this.$body.css("padding-right", t + this.scrollbarWidth)
            }, o.prototype.resetScrollbar = function () {
                this.$body.css("padding-right", this.originalBodyPad)
            }, o.prototype.measureScrollbar = function () {
                var t = document.createElement("div");
                t.className = "modal-scrollbar-measure", this.$body.append(t);
                var e = t.offsetWidth - t.clientWidth;
                return this.$body[0].removeChild(t), e
            };
            var i = t.fn.modal;
            t.fn.modal = e, t.fn.modal.Constructor = o, t.fn.modal.noConflict = function () {
                return t.fn.modal = i, this
            }, t(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function (o) {
                var i = t(this), s = i.attr("href"),
                    n = t(i.attr("data-target") || s && s.replace(/.*(?=#[^\s]+$)/, "")),
                    r = n.data("bs.modal") ? "toggle" : t.extend({remote: !/#/.test(s) && s}, n.data(), i.data());
                i.is("a") && o.preventDefault(), n.one("show.bs.modal", function (t) {
                    t.isDefaultPrevented() || n.one("hidden.bs.modal", function () {
                        i.is(":visible") && i.trigger("focus")
                    })
                }), e.call(n, r, this)
            })
        }(jQuery);

        function lang_uc() {
            return lang().charAt(0).toUpperCase() + lang().slice(1);
        }

        function token() {
            return '123456';
        }

        Object.size = function (obj) {
            var size = 0, key;
            for (key in obj) {
                if (obj.hasOwnProperty(key)) size++;
            }
            return size;
        };

        function onlyUnique(value, index, self) {
            return self.indexOf(value) === index;
        }

        function lang() {

           return '<?= $lang ?>';
        }


        function limit() {
            return 10
        }

        function showHistory() {
            var a = "";
            a = '<div class="list-group">';
            var e = $.parseJSON(localStorage.getItem("word_history"));
            return null != localStorage.getItem("word_history") && $.each(e.reverse(), function (e, t) {
                return a += '<div class="list-group-item"><div class="history-row">', a += '<h4 class="list-group-item-heading pull-left"><a href="' + main_domain() + "/english-to-" + lang() + "-meaning-" + t + '">' + t + "</a></h4>", a += '<div class="list-group-item-text pull-right history-remove-btn" onclick="calHistory(\'' + t + '\', 0)"><img src="https://content2.mcqstudy.com/bw-static-files/imgs/clear.png" loading="lazy"/></div>', a += '<div class="clear">&nbsp;</div>', a += "</div></div>", e < limit()
            }), null != localStorage.getItem("word_history") && e.length > limit() && (a += '<a href="' + main_domain() + '/word-history" style="display: block" class="btn btn-primary btn-raised">See More</a>'), a += "</div>", null == localStorage.getItem("word_history") ? "<p>Any word you search will appear here.</p>" : a
        }

        function calHistory(a, e) {
            var t = [];
            if (null != localStorage.getItem("word_history") && (t = $.parseJSON(localStorage.getItem("word_history"))), 1 == e ? t.push(a) : t.indexOf(a) >= 0 && t.splice(t.indexOf(a), 1), localStorage.setItem("word_history", JSON.stringify(t.filter(onlyUnique))), $(".load_search_history").html(showHistory()), 0 == e) {
                var i = 1 == e ? "added" : "removed";
                $("#complete-dialog").modal("show"), $(".modal-title").text(a), $(".modal-body").html("'" + a + "' is <b>" + i + "</b> to your favorite word list.")
            }
        }


        function run_ajax($q, type, content_area) {

            console.log('q-->' + $q);

            $.ajax({
                type: 'get',
                url: '<?= $apiurl ?>get2.php',
                data: {token: token(), q: $q, lang: lang(), type: type},
                success: function (data) {
                    var $mean = "<div class='box_wrapper' style='-webkit-box-shadow: none;-mozbox-shadow: none; box-shadow: none;width: 100%;'><fieldset style='margin:0px;'><div class='fieldset_body inner_details'>";
                    var obj = jQuery.parseJSON(data);

                    if (obj['error'] == 2) {
                        window.location.href = '<?= $apiurl ?>captcha.php?q=' + $q;
                        return;
                    }

                    if (obj['main']) {
                        calHistory($q, 1);
                        document.title = 'English to ' + lang_uc() + ' meaning: ' + $q + ' - ' + obj['main'];
                        //$mean += '<h2 class="pull-left">'+$q+' <button class="btn btn-raised sound-button" onclick="responsiveVoice.speak(\''+$q+'\')"><img src="https://content2.mcqstudy.com/bw-static-files/imgs/play.png" loading="lazy"/></button>&nbsp;&nbsp;<button class="btn btn-raised sound-button fav-button" onclick="calFavs(\''+$q+'\', 1)"><img src="https://content2.mcqstudy.com/bw-static-files/imgs/favorite.png" loading="lazy"/></button> : '+obj['main']+'</h2><div class="clear">&nbsp;</div>';


                        $mean += '<span><div class="align_text  custom_font2">' + $q + ' : </div><div class="align_text2">' + obj['main'] + '</div><label class="img_align"> Pronunciation:<button class="icon_button" onclick="textToSpeech(\'' + $q + '\')"><img src="https://content2.mcqstudy.com/bw-static-files/stage/img/play-icon.png" loading="lazy"/></button></label><label class="img_align">Add to Favorite: <button class="icon_button" onclick="calFavs(\'' + $q + '\', 1)"><img src="https://content2.mcqstudy.com/bw-static-files/stage/img/favourite-icon.png" loading="lazy"/></button></label></span>'

                        $mean += '<span><div>';
                        if (obj['related']) {
                            $.each(obj['related'], function (key2, val2) {
                                $i++;
                                $mean += '<div class="label_font line_height">' + key2 + ' :: </div><div class="line_height">' + val2 + '</div>';
                            });
                        }

                        $mean += '</div></span>';

                    }


                    $mean += '<div class="custom_margin2"></div>';

                    if (obj['prev']) {
                        $mean += '<button class="btn_pre bdr_radius2"><a href="' + main_domain() + '/english-to-' + lang() + '-meaning-' + obj['prev'] + '">← Previous</a></button>';
                        /*if(obj['nex']==null){
                            $mean += '<div style="clear:both;"></div><hr>';
                        }*/
                    }


                    if (obj['nex']) {
                        $mean += '<button class="btn_next bdr_radius2"><a href="' + main_domain() + '/english-to-' + lang() + '-meaning-' + obj['nex'] + '">Next →</a></button>';
                        //$mean += '<div style="clear:both;"></div><hr>';
                    }

                    if (obj['error'] == 1) {

                        if (obj['sug'] != null && obj['sug'] != '[]') {
                            $mean += '<h2>Did you mean?</h2><hr>';
                            var sug = jQuery.parseJSON(obj['sug']);
                            $.each(sug, function (key, val) {
                                $mean += '<a style="display:block;" href="' + main_domain() + '/english-to-' + lang() + '-meaning-' + val + '">' + val + '</a><hr>';
                            });
                        }

                        $(content_area).html('<h3>' + obj['msg'] + '</h3><hr>' + $mean);


                        return;
                    }


                    if (obj['type'] == 1 && obj['data'] != null && obj['data'][0] != null) {
                        document.title = lang_uc() + ' to English meaning: ' + $q;
                        $mean += '<div>' + lang_uc() + ' to English Menaing: ' + $q + '</div>';

                        $mean += '<div>';
                        var $i = 0;
                        $.each(obj['data'], function (key, val) {
                            $i++;
                            $mean += '<p>' + $i + '. ' + val['mean'] + ' = ' + val['word'] + '</p>';
                        });


                        $mean += '</div>';


                    }

                    if (obj['main']) {
                        $mean += '<span>';
                        $mean += '<label>Other Refferences :</label>';
                        $mean += '<button class="btn_default4 bdr_radius2"><a href="http://translate.google.com/#en/bn/' + $q + '" target="_blank">Google Translator</a></button><button class="btn_default4 bdr_radius2"><a class="btn btn-primary" href="http://the-definition.com/dictionary/' + $q + '" target="_blank">The Definition</a></button><button class="btn_default4 bdr_radius2"><a href="http://dictionary.reference.com/browse/' + $q + '?s=t" target="_blank">Dictionary.com</a></button><button class="btn_default4 bdr_radius2"><a href="http://www.merriam-webster.com/dictionary/' + $q + '" target="_blank">Merriam Webster</a></button><button class="btn_default4 bdr_radius2"><a href="http://en.wikipedia.org/wiki/' + $q + '" target="_blank">Wikipedia</a></button>';
                        $mean += '</div>';
                    }


                    if (obj['mean'] != null && obj['data']['img'] != null && lang() == 'bengali') {
                        $mean += '<div>Bangla Academy Ovidhan</div>';
                        var img_mean = obj['data']['img'];
                        if ($q == 'into') {
                            img_mean = 'into';
                        }
                        $mean += '<div>';
                        $mean += '<img src="//www.bdword.com/word/' + obj['data']['img'].toUpperCase() + '.JPG" title="' + img_mean + '" alt="' + img_mean + '" />';
                        $mean += '</div>';


                    }

                    if (obj['mean'] != null && Object.size(obj['data']['mean']) > 0) {
                        $mean += '<span><label>English to ' + lang_uc() + ' Meaning</label></span><div class="custom_margin2"></div>';

                        //$mean += '<div class="jumbo_details bn_meaning">';
                        var i = 0;
                        $.each(obj['data']['mean'], function (key, val) {
                            i++;
                            if (i > 1) {
                                //$mean += '<hr>';
                            }
                            var $mean_array = [];

                            $.each(val, function (key, val) {
                                if (obj['mean'][val] != undefined) {
                                    $mean_array.push(obj['mean'][val]);
                                }
                            });

                            $mean += ((key != 'main') ? '<span><label><b>' + key + ':</b></label> ' : '') + $mean_array.filter(onlyUnique).join(', ') + '</span>';


                        });

                        //$mean += '</span>';
                    }


                    // eng meaning
                    if (obj['mean'] != null && Object.size(obj['data']['eng']) > 0) {

                        var $pop_eng_mean = '';
                        var i = 0;

                        $mean += '<div class="custom_margin2"></div><span><div class="accordion_collapse"><h4 onclick="showHideAccordion()" class="custom-accordion-header">Show English Meaning<div class="icon_right">(+)</div></h4><div id="accordion" class="custom-accordion-content">';

                        $.each(obj['data']['eng'], function (key, val) {

                            i++;
                            if (i > 1) {
                                $pop_eng_mean += '<hr>';
                            }

                            $pop_eng_mean += '<b>' + $q + ' [' + key + ']</b>';
                            $pop_eng_mean += '<p>';

                            $i = 0;
                            $.each(val, function (key, val) {
                                $i++;

                                $pop_eng_mean += '<p>' + $i + '. ' + val + '</p>';
                            });


                            $pop_eng_mean += '</p>';

                        });

                        $pop_eng_mean = $pop_eng_mean.replace(/'/g, "&quot");

                        console.log($pop_eng_mean);

                        $mean += $pop_eng_mean;

                        //$mean += '<button class="btn btn-raised" onclick="showEngMeanPop(\'English Meaning :: '+$q+'\',\''+$pop_eng_mean+'\')">Show English Meaning</button>&nbsp;&nbsp;';

                        $mean += '</div></div></span>';


                    }

                    // examples
                    if (obj['mean'] != null && Object.size(obj['data']['examples']) > 0) {

                        $i = 0;


                        $mean += '<div class="custom_margin2"></div><span><div class="accordion_collapse"><h4 onclick="showHideAccordion2()" class="custom-accordion-header">Show English Meaning<div class="icon_right">(+)</div></h4><div id="accordion2" class="custom-accordion-content">';

                        var $pop_examples = '';
                        $.each(obj['data']['examples'], function (key, val) {
                            $i++;
                            if ($i > 1) {
                                //$pop_examples += '<hr>';
                            }

                            $pop_examples += '<p>' + $i + '. ' + val + '</p>';

                        });

                        $pop_examples = $pop_examples.replace(/'/g, "&quot");

                        $mean += $pop_examples;

                        //$mean += '<button class="btn btn-raised" onclick="showEngMeanPop(\'Examples :: '+$q+'\',\''+$pop_examples+'\')">Show Examples</button>';

                        $mean += '</div></div></span>';
                    }


                    // phrases
                    if (obj['mean'] != null && Object.size(obj['data']['phrase']) > 0) {
                        //$mean += '<br><div class="jumbo_title" data-target="phrases">Related Phrases</div>';
                        $mean += '<div class="custom_margin2"></div><span><div class="accordion_collapse"><h4 onclick="showHideAccordion3()" class="custom-accordion-header" data-target="phrases">Related Phrases<div class="icon_right">(+)</div></h4><div id="accordion3" class="custom-accordion-content">';
                        $i = 0;
                        //$mean += '<div class="jumbo_details phrases">';

                        $.each(obj['data']['phrase'], function (key, val) {

                            if (obj['mean'][val] != undefined) {
                                $i++;
                                if ($i > 1) {
                                    //$mean += '<hr>';
                                }
                                $mean += '<p>' + $i + '. <a href="' + main_domain() + '/english-to-' + lang() + '-meaning-' + val + '">' + val + '</a> = ' + obj['mean'][val] + '</p>';
                            }

                        });
                        $mean += '</div></div></span>';
                    }


                    // synonyms
                    if (obj['mean'] != null && Object.size(obj['data']['syn']) > 0) {
                        //$mean += '<br><div class="jumbo_title" data-target="phrases">Synonyms</div>';
                        $mean += '<div class="custom_margin2"></div><span><div class="accordion_collapse"><h4 onclick="showHideAccordion4()" class="custom-accordion-header" data-target="phrases">Synonyms<div class="icon_right">(+)</div></h4><div id="accordion4" class="custom-accordion-content">';
                        $i = 0;

                        //$mean += '<div class="jumbo_details synonyms">';
                        $.each(obj['data']['syn'], function (key, val) {

                            if (obj['mean'][val] != undefined) {
                                $i++;
                                if ($i > 1) {
                                    //$mean += '<hr>';
                                }

                                $mean += '<p>' + $i + '. <a href="' + main_domain() + '/english-to-' + lang() + '-meaning-' + val + '">' + val + '</a> = ' + obj['mean'][val] + '</p>';
                            }

                        });
                        $mean += '</div></div></span>';
                    }

                    // antonyms
                    if (obj['mean'] != null && Object.size(obj['data']['anto']) > 0) {
                        //$mean += '<br><div class="jumbo_title" data-target="phrases">Antonyms</div>';
                        $mean += '<div class="custom_margin2"></div><span><div class="accordion_collapse"><h4 onclick="showHideAccordion5()" class="custom-accordion-header" data-target="phrases">Antonyms<div class="icon_right">(+)</div></h4><div id="accordion5" class="custom-accordion-content">';
                        $i = 0;

                        $mean += '<div class="jumbo_details antonyms">';
                        $.each(obj['data']['anto'], function (key, val) {

                            if (obj['mean'][val] != undefined) {
                                $i++;
                                if ($i > 1) {
                                    //$mean += '<hr>';
                                }
                                $mean += '<p>' + $i + '. <a href="' + main_domain() + '/english-to-' + lang() + '-meaning-' + val + '">' + val + '</a> = ' + obj['mean'][val] + '</p>';
                            }

                        });
                        $mean += '</div></div></span>';
                    }

                    // variants
                    if (obj['mean'] != null && Object.size(obj['data']['variants']) > 0) {
                        //$mean += '<br><div class="jumbo_title" data-target="phrases">Different forms</div>';
                        $mean += '<div class="custom_margin2"></div><span><div class="accordion_collapse"><h4 onclick="showHideAccordion6()" class="custom-accordion-header" data-target="phrases">Different forms<div class="icon_right">(+)</div></h4><div id="accordion6" class="custom-accordion-content">';

                        //$mean += '<div class="jumbo_details variants">';
                        $mean += '<p>' + obj['data']['variants'].join(', ') + '</p>';
                        $mean += '</div></div></span>';
                    }

                    // similar
                    if (obj['mean'] != null && Object.size(obj['data']['similar']) > 0) {
                        //$mean += '<br><div class="jumbo_title" data-target="phrases">Similar Words</div>';
                        $mean += '<div class="custom_margin2"></div><span><div class="accordion_collapse"><h4 onclick="showHideAccordion7()" class="custom-accordion-header" data-target="phrases">Similar Words<div class="icon_right">(+)</div></h4><div id="accordion7" class="custom-accordion-content">';

                        //$mean += '<div class="jumbo_details similar">';
                        $mean += '<p>' + obj['data']['similar'].join(', ') + '</p>';
                        $mean += '</div></div></span>';
                    }


                    $mean += '</div></fieldset></div>';

                    // Show everything
                    $(content_area).html($mean);

                },
                error: function () {
                    console.log('error');
                }
            });

        }

        function show_meaning(v) {
           // var url1 = 'english-to-' + lang() + '-meaning-' + v;
          //  var new_url = '/' + url1;
          //  window.history.pushState('data', 'Title', new_url);

            var $q = v;
            var type = 1;

            if ($q.charAt(0).match(/[a-z]/i)) {
                type = 0;
                $q = v.replace(/\W/g, '').replace('_', '').replace(' ', '').toLowerCase();
                $('.page-title').text('Read Text :: English to ' + lang_uc());
            } else {
                $q = v.replace('_', '').replace(',', '').replace('?', '').replace('???', '').replace('!', '').replace('\'', '').replace('"', '');
                $('.page-title').text('Read Text :: ' + lang_uc + ' to English');
            }

            $('#complete-dialog').modal('show');
            if (type == 0) {
                $('.modal-title').text($q.charAt(0).toUpperCase() + $q.slice(1));
            } else {
                $('.modal-title').text($q);
            }

            $('.modal-body').html('<div class="loader"><img style="width:50px;" src="https://content2.mcqstudy.com/bw-static-files/imgs/loader.gif" loading="lazy"/></div>');

            run_ajax($q, type, '.modal-body');
        }

        

        function main_domain() {
            return '<?= $base_url;?>';
        }

        
        $('#qb').on('keyup', function () {

            var search_term = $('#qb').val();
			var searchWord = search_term.slice(0, 2);
			var searchLength = search_term.length;
            var firstChar = search_term.charAt(0).toLowerCase();
           
            if (searchLength > 2) {
                $.ajax({
                    type: 'post',
                    data: {q: searchWord, lang: '<?=$lang?>'},
                    url: '<?= $apiurl ?>searchLangApi.php',
                    success: function (data) {
					

                        $('.suggested_list').html('');
                       if (data != '' && data != null) {
							var array = data.filter(onlyUnique);
							var step = 0;
							$.each(array, function (i, val) {
								if (val.slice(0, searchLength) == search_term && step < 16) {
									$('.suggested_list').append('<div onclick="submit_search_local(\'' + val + '\')">' + val + '</div>');
									step++;
								}
							 
                            });
                        }

                    }
                });
            } else {
                $('.suggested_list').html('');
            }

        });

        WebFontConfig = {
            google: {families: ['Roboto:300,400,500,700']}
        };
        (function () {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                '://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })(); </script>
    <?php include('footer.php'); ?>
