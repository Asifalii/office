<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

echo "hello 2";

die;

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (substr_count($actual_link, $_SERVER['HTTP_HOST']) > 1) {
    $redirectUrl = substr($actual_link, 0, strrpos($actual_link, 'https'));
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: ' . strtolower($redirectUrl));
}

if ($_SERVER['REQUEST_URI'] != strtolower($_SERVER['REQUEST_URI'])) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: //' . $_SERVER['HTTP_HOST'] . strtolower($_SERVER['REQUEST_URI']));
}

if (strpos($_SERVER['REQUEST_URI'], '%20')) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: //' . $_SERVER['HTTP_HOST'] . strtolower(str_replace('%20', '-', $_SERVER['REQUEST_URI'])));
}

require_once('search-functions.php');

$langArray = ['telugu', 'tamil', 'marathi', 'kannada', 'filipino', 'bengali', 'hindi', 'sinhala', 'gujarati', 'nepali', 'punjabi',
    'swahili', 'cebuano', 'urdu', 'hausa', 'malay', 'yoruba', 'afrikaans', 'amharic'];

if ($_GET['q']) {
    $lang = getLang();

    if (in_array($lang, $langArray)) {
        $cacheFile = '/mnt/volume_sgp1_01/cache/' . strtolower($lang) . '/' . strtolower($_GET['q']);
        $myfile = fopen($cacheFile, "r");

        if ($myfile == true) {
            //echo 'true';
            echo fread($myfile, filesize($cacheFile));
            fclose($myfile);
            die;
        }
    }

}else{
    $mainUrl = base_url();
    $remove = array("http://","https://");

    $mainUrl =  str_replace($remove,"",$mainUrl);

    $cacheFile = '/mnt/volume_sgp1_01/cache/index_pages/' . strtolower($mainUrl) . '.html';

    $myfile = fopen($cacheFile, "r");

    if ($myfile == true) {
        //echo 'true';
        echo fread($myfile, filesize($cacheFile));
        fclose($myfile);
        die;
    }
}

error_reporting(0);
require_once('./v5/connect.php');


redirectToLocalTranslation();

// moveHttpToHttps();

$main_array = array();
$main_array['q'] = sanitize($conn);
$main_array['baurl'] = 'https://media.english-dictionary.help/ba2/';
$main_array['movssurl'] = 'https://media.english-dictionary.help/ss/';
$main_array['ismobile'] = isMobile();
$main_array['url'] = base_url();
$main_array['baseurl'] = base_url() . '/';
$main_array['lang'] = getLang();

redirectOlds($main_array['lang']);
$p = $main_array['q'];
if ($main_array['q'] and $main_array['lang']) {

    $url= $main_array['baseurl'].'variant/'.$main_array['q'].'.txt';

    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );

    $response = file_get_contents($url, false, stream_context_create($arrContextOptions));

    if (!empty($response)) {
        $p = $response;
    }
}

$main_array['ulang'] = ucfirst($main_array['lang']);
$main_array['scriptname'] = getScriptName();
$main_array['title'] = getTitle($p, $main_array['url'], $main_array['scriptname'], $main_array['lang'], $main_array['ulang']);
$main_array['noindexstatus'] = getNoIndexStatus($p, $conn);
$main_array['noindexhtml'] = getNoIndexHTML($main_array['noindexstatus']);
$main_array['metadescription'] = getMetaDescription($main_array['lang'], $main_array['ulang'], $p);
$main_array['analyticsid'] = getAnalyticsId();
$main_array['keyword'] = getKeyword($main_array['lang']);

$main_array['canonicallink'] = getCanonicalLink($conn, $main_array['scriptname'], $main_array['lang'], $main_array['baseurl'], $p);
$main_array['googlesiteverify'] = getGoogleSiteVerify($main_array['lang']);
$main_array['iswordbanned'] = getWordBannedStatus($conn, $p);
$main_array['alladcodes'] = getAllAdCodes($main_array['ismobile'], $main_array['iswordbanned'], $main_array['scriptname'], $main_array['lang']);
$main_array['autoad'] = getAutoAd($main_array['iswordbanned']);
$main_array['logotext'] = getLogoText($main_array['lang'], $main_array['ulang']);
$main_array['devicename'] = getDevice();
$main_array['jumbodownloadbox'] = getJumboDownloadBox($main_array['lang'], $main_array['devicename'], $main_array['baseurl']);
$main_array['honetitle'] = getHOneTitle($p, $main_array['ulang']);
// $main_array['maindata'] = getMainData($conn, $main_array['q'], '0', $main_array['lang']);
$main_array['sidebarappdetails'] = getSidebarAppDetails($conn, $main_array['lang']);
$main_array['grammar'] = getGrammar($conn, $main_array['baseurl']);
$main_array['ampword'] = getAmpWord($conn, $p);

if ($main_array['lang'] == 'bengali') {
    $androidLink = "https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary";
} else {
    $androidLink = "https://play.google.com/store/apps/details?id=com.bdword.e2" . $main_array['lang'] . "dictionary";
}

?>

<!doctype html>
<html>
<style>
    @media screen and (max-width:1920px){#mobile_banner_div{display:none}#warning_div{margin-left:-12px}}

    @media screen and (max-width:906px){#mobile_banner_div{display:block}#warning_div{margin-left:-2px}.logo_div{width:75%!important}}

    .header_logo a,.header_nav_collapse,.header_wrapper .header_logo{width:auto!important}

    .logo_div{width:94%;display:flex}

    @font-face{font-family:Roboto;font-style:normal;font-weight:400;src:local('Roboto'),local('Roboto'),url(https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap) format('woff2');font-display:swap}

    h1{margin:0;padding:0;font-size:1.2rem;font-weight:500}

    h2{margin:0;padding:0;font-size:1.2rem;font-weight:500}

    .box_wrapper,.box_wrapper2{min-height:50px;overflow:hidden}

    .btn_default2 img,.btn_default3 img,.topic_link a img{margin-right:6px;float:left}

    .btn_default2 span,.btn_default3 span{line-height:30px}

    a,a:hover{text-decoration:none}

    body,html{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;height:100%}

    body{margin:0;padding:0;font-family:Tahoma,Verdana,Segoe,sans-serif!important;font-size:.95rem;color:#333;background-color:#f8f8f8;overflow-x:hidden}

    .btn_default,.custom_bgcolor{background-color:#043a54}

    .btn_default,.custom_font{font-size:.75rem}

    .custom_font,.custom_font2{color:#009385}

    a:focus,button:focus,img:focus,input:focus{outline:0}.top_margin{margin-top:15px!important}

    .bdr_radius{-webkit-border-bottom-left-radius:3px;-webkit-border-bottom-right-radius:3px;-moz-border-radius-bottomleft:3px;-moz-border-radius-bottomright:3px;border-bottom-left-radius:3px;border-bottom-right-radius:3px}.bdr_radius2{-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px}.bdr_radius3{border:1px solid #add7d3}.inner_wrapper{margin:15px 15px 0}

    .btn_default,.btn_default2{font-weight:700;color:#fff;border:none;cursor:pointer}.btn_default3,.btn_default4,.btn_default5{color:#333;border:1px solid #ddd;cursor:pointer}.align_left{float:left}.align_right{float:right}.btn_default{margin-right:3px;padding:10px 15px;text-transform:uppercase}.btn_default2,.btn_default3{padding:14px 15px;text-align:left;width:100%;text-transform:uppercase}.btn_default:hover,.btn_default_active{background-color:#00aa9a}.btn_default2{margin-bottom:15px;font-size:.95rem;background-color:#043a54;-webkit-box-shadow:0 1px 4px 0 rgba(0,0,0,.35);-moz-box-shadow:0 1px 4px 0 rgba(0,0,0,.35);box-shadow:0 1px 4px 0 rgba(0,0,0,.35)}.btn_default2 img{margin:0 5px 0 0;vertical-align:middle}.btn_default2:hover{background-color:#00aa9a}.btn_default3{margin-bottom:15px;font-size:1rem;font-weight:900;background-image:url(img/bg28.png);background-repeat:repeat;-webkit-box-shadow:0 1px 1px 0 rgba(0,0,0,.25);-moz-box-shadow:0 1px 1px 0 rgba(0,0,0,.25);box-shadow:0 1px 1px 0 rgba(0,0,0,.25)}.btn_default4,.btn_default5{padding:10px;font-size:.75rem;font-weight:700}.btn_default3 img{margin:-3px 5px 0 0;vertical-align:middle}.btn_default3:hover{background-image:url(../img/bg28-hover.png);background-repeat:repeat}.btn_default4{margin:6px 3px;background-color:#fff}.btn_default4:hover{background-color:#fafafa}.btn_default5{margin:10px 0 10px 10px;width:97%;background-color:#fff;text-align:center;text-transform:uppercase}.btn_default5:hover{background-color:#fafafa}

    #site_wrapper{width:100%;height:auto;overflow:hidden}.content_wrapper{margin:0 auto;max-width:100%;width:1140px;height:auto;position:relative}.left_content{width:65%;float:left}.right_content{width:34%;float:right}.box_wrapper{margin:4px auto 16px;width:99%;height:auto;background-color:#fff;-webkit-box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-box-shadow:0 0 4px 0 rgba(0,0,0,.25);box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper fieldset{margin:15px 15px 20px;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper fieldset legend{margin-left:10px;font-size:1.22rem;font-weight:500}.box_wrapper fieldset .fieldset_body{padding:20px 13px;overflow:hidden}.box_wrapper fieldset .fieldset_body span{float:left}

    .search_fld{width:83.5%;position:relative;top:10px;left:15px;right:0;float:left}.search_fld input[type=text]{position:relative;z-index:1;width:100%;padding:10px;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-moz-box-shadow:inset 0 0 5px #ccc;-webkit-box-shadow:inset 0 0 5px #ccc;box-shadow:inset 0 0 5px #ccc;text-transform:capitalize;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.search_fld input[type=text]:focus{border:1px solid #bbb}.search_btn{padding:19px;width:22px;height:22px;position:absolute;top:1px;right:0;z-index:2;background-color:transparent;background-image:url(img/search_icon.png);background-position:center center;border-left:1px solid #666;border-right:0;border-top:0;border-bottom:0;background-repeat:no-repeat;cursor:pointer;opacity:.35;transition:opacity .5s ease-out;-moz-transition:opacity .5s ease-out;-webkit-transition:opacity .5s ease-out;-o-transition:opacity .5s ease-out}.footer_wrapper{display:block;clear:both}.footer_wrapper,.topic_link a:first-child{border-top:1px solid #ddd}.footer_wrapper,.topic_link a{border-bottom:1px solid #ddd;overflow:hidden}.search_btn:hover{opacity:.75}.topic_link{margin:0;padding:0}.topic_link a{margin-left:3px;padding:12px 0;width:100%;color:#333;line-height:25px;display:block}.topic_link a:hover{background-color:#fafafa}.topic_link span{line-height:25px}.topic_link span img{margin-right:5px;vertical-align:middle}.box_wrapper2{margin:4px auto 17px;width:99%;height:auto;background-color:#fff;-webkit-box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-box-shadow:0 0 4px 0 rgba(0,0,0,.25);box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper2 fieldset{margin:0 0 20px;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper2 fieldset legend{margin-left:10px;font-size:1.08rem;font-weight:500}.box_wrapper2 fieldset .fieldset_body{padding:13px;overflow:hidden}

    .footer_wrapper{margin:0 auto 5px;padding:0 4px;max-width:100%;width:1124px}.footer_wrapper span{font-size:.75rem;color:#555;line-height:50px;display:block}.footer_wrapper span a{color:#333}.footer_wrapper span a:hover{color:#00aa9a}button a{color:#333;display:block}button a:hover{color:#009385;text-decoration:none!important}button a span{color:#fff}button a label{color:#333;line-height:30px}.custom_bdr{border:1px solid #aaa}.responsive_img{width:100%;max-width:100%;height:auto}.header_wrapper{position:relative;top:0;width:100%;height:auto;background-color:#043a54;overflow:hidden}.header_logo a,.header_wrapper .header_logo{padding-left:2px;color:#fff;font-size:1.5rem;font-weight:900;line-height:60px;float:left;width:10.5%}.header_wrapper .header_nav{padding-right:2px;float:right}.header_wrapper .header_nav ul{margin:0;padding:0}.header_wrapper .header_nav ul li{margin:0;padding:0;list-style-type:none;display:inline;float:left}.header_wrapper .header_nav ul li a{padding:0 15px;color:#fff;font-size:.95rem;font-weight:700;line-height:58px;text-transform:uppercase;text-align:center;border:1px solid #043a54;border-right:none;float:left}.header_wrapper .header_nav ul li a:hover{color:#fff;background-color:#00aa9a;border:1px solid #043a54;border-right:none}.header_wrapper .header_nav ul li a.active{background-color:#00aa9a}.header_nav_collapse{width:100%;display:inline-block;float:left}.header_nav_collapse ul{margin-top:3px;padding:0;width:100%;list-style:none;display:none;margin-bottom:10px}.header_nav_collapse ul li{width:100%;height:auto;position:relative;top:-3px;z-index:3;transition:all .5s;opacity:1;display:inline-block;color:#fff;border-bottom:1px solid #084a6a;background-color:#043a54;text-indent:15px}.header_nav_collapse ul li:hover{background:#00aa9a}.header_nav_collapse ul li a{padding:15px 0;color:#fff;text-decoration:none;display:block}.header_nav_collapse ul li:last-child{border-bottom:none;-webkit-border-bottom-left-radius:4px;-webkit-border-bottom-right-radius:4px;-moz-border-radius-bottomleft:4px;-moz-border-radius-bottomright:4px;border-bottom-left-radius:4px;border-bottom-right-radius:4px}.header_nav_collapse label{position:absolute;top:10px;right:0;padding:11px 9px 7px 9px;display:inline-block;border:2px solid #00a091;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px;cursor:pointer}.header_nav_collapse label:before{width:20px;height:2px;background:#fff;display:inline-block;content:"";box-shadow:0 -6px 0 0 #fff,0 -12px 0 0 #fff;transition:all .5s;opacity:1}

    /*Auto Suggest CSS*/
    .autocomplete{position:relative;display:inline-block}.autocomplete-items{position:relative;border:1px solid #ddd;border-bottom:none;border-top:none;z-index:99;top:0;left:0;right:0}.autocomplete-items div{padding:8px 10px;cursor:pointer;background-color:#fff;border-bottom:1px solid #ddd}.autocomplete-items div:hover{background-color:#fafafa}.autocomplete-items:last-child{-webkit-border-bottom-left-radius:3px;-moz-border-radius-bottomleft:3px;border-bottom-left-radius:3px;-webkit-border-bottom-right-radius:3px;-moz-border-radius-bottomright:3px;border-bottom-right-radius:3px;margin-bottom:20px}.btn_default6,h6{font-weight:700;clear:both}h6{margin:0;padding:10px 0;font-family:Roboto,sans-serif;font-size:1.15rem;color:#333;border-top:1px solid #ddd;border-bottom:1px solid #ddd}.top_margin2{margin-top:45px}.custom_font3{font-size:1.12rem;color:#009385;line-height:24px}.clear_fixdiv{margin:0;padding:0;display:block;clear:both}.btn_default6{margin-top:10px;padding:12px 24px;width:auto;font-size:.75rem;color:#fff;background-color:#043a54;text-align:center;text-transform:uppercase;border:1px solid #043045;cursor:pointer;float:right}.btn_default6:hover{background-color:#00aa9a;border:1px solid #009a8b}.box_wrapper fieldset .fieldset_body textarea{position:relative;z-index:1;width:97%;margin:0;padding:10px;font-family:Roboto,sans-serif;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-top-left-radius:3px;-moz-border-radius-topleft:3px;border-top-left-radius:3px;-webkit-border-top-right-radius:3px;-moz-border-radius-topright:3px;border-top-right-radius:3px;-webkit-border-bottom-right-radius:3px;-moz-border-radius-bottomright:3px;border-bottom-right-radius:3px;-moz-box-shadow:inset 0 0 5px #ccc;-webkit-box-shadow:inset 0 0 5px #ccc;box-shadow:inset 0 0 5px #ccc;display:block}.box_wrapper fieldset .fieldset_body textarea:focus{border:1px solid #bbb;outline:0}.gif_img{width:100%;min-width:100%;height:auto;border:2px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.text_color{color:#fff}.pagination{margin:0 15px 25px 0;display:inline-block;float:right;clear:both}.pagination a{margin-left:3px;color:#333;float:left;padding:5px 10px;text-decoration:none;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.pagination a.active{background-color:#009385;color:#fff;border:1px solid #01877a}.pagination a:hover:not(.active){background-color:#fafafa;border:1px solid #ddd}.pagination{margin:0 15px 25px 0;display:inline-block;float:right;clear:both}.pagination a{margin-left:3px;color:#333;float:left;padding:5px 10px;text-decoration:none;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.pagination a.active{background-color:#009385;color:#fff;border:1px solid #01877a}.pagination a:hover:not(.active){background-color:#fafafa;border:1px solid #ddd}.btn_active{background-color:#fafafa}.inner_details{line-height:22px}.inner_details span{width:100%;padding:15px 0;border-bottom:1px solid #eaeaea;clear:both}.inner_details label{font-weight:500;color:#009385;text-transform:capitalize}.inner_details span:first-child{padding-top:0}.inner_details a{color:#333;text-decoration:none}.inner_details a:hover{color:#009385;text-decoration:underline;cursor:pointer}.inner_details .label_font{margin-right:5px;font-weight:500;color:#009385;float:left}.img_align{display:inline-flex;line-height:28px}.img_align img{margin:0 8px}.align_text{font-weight:500;line-height:28px;float:left}.align_text2{margin:0 8px;color:#333;line-height:28px;float:left}.line_height{line-height:35px}.float_left{float:left}.float_div{width:50%;float:left}.custom_margin{margin-bottom:8px}

    .custom_margin2{margin-bottom:20px;clear:both}.custom_margin3{margin-top:8px!important;float:left;clear:both}.accordion_collapse{overflow:hidden;clear:both}.accordion_collapse h4{margin:0;padding:8px;border:1px solid #eaeaea;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px;background-color:#fafafa;outline:0;cursor:pointer}.custom-accordion-content{padding:15px 8px;display:block}.icon_right{font-size:.8rem;color:#009385!important;float:right}.dic_img img{width:340px;height:auto;padding:15px 10px 10px 10px;border:1px dashed #ddd}.h_line{margin:0 0 15px 0;border-top:1px solid #eaeaea;clear:both}.h_line2{margin:15px 0 15px 0;border-top:1px solid #eaeaea;clear:both}.alert_text{color:#e90505}.success_text{color:#009d2c}.contact{margin:0;padding:0;display:block;overflow:hidden}.contact p{margin:0;padding:0}.contact input[type=text]{margin-bottom:12px;width:100%;padding:10px;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-moz-box-shadow:inset 0 0 3px #ccc;-webkit-box-shadow:inset 0 0 3px #ccc;box-shadow:inset 0 0 3px #ccc;text-transform:capitalize;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.contact input[type=text]:focus{border:1px solid #bbb}.contact textarea{margin-bottom:12px!important;width:100%!important;padding:10px;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-moz-box-shadow:inset 0 0 3px #ccc!important;-webkit-box-shadow:inset 0 0 3px #ccc!important;box-shadow:inset 0 0 3px #ccc!important;text-transform:capitalize;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.contact textarea:focus{border:1px solid #bbb}.custom_font4{color:#333;font-size:1.12rem;font-weight:500}::-webkit-input-placeholder{text-transform:none}::-moz-placeholder{text-transform:none}:-ms-input-placeholder{text-transform:none}:-moz-placeholder{text-transform:none}.cursor_link{cursor:pointer}.btn_pre{background-color:#009385;border:1px solid #01877a;float:left}.btn_pre:hover{background-color:#fff;border:1px solid #ddd}.btn_next{background-color:#009385;border:1px solid #01877a;float:right}.btn_next:hover{background-color:#fff;border:1px solid #ddd}.btn_next a,.btn_pre a{padding:8px 12px;color:#fff;font-size:.925rem;font-weight:700;text-decoration:none}.btn_next a:hover,.btn_pre a:hover{text-decoration:none}.desc_text p{margin:0;padding:0;clear:both}.desc_text a{color:#009385}.texture_btn{background-image:url(img/bg28.png);background-repeat:repeat}.btn_bdrcolor1{border-color:#bcc4c8}.btn_bdrcolor2{border-color:#ffc2af}.btn_bdrcolor3{border-color:#49d5c8}.btn_activebg{background-image:url(img/bg28-hover.png);background-repeat:repeat}.words_category{margin-bottom:10px;overflow:hidden;clear:both}.words_category:last-child{margin-bottom:0}.words_category h5{margin:0;padding:5px;font-size:1rem;font-weight:700;color:#009385}.words_category h5 img{vertical-align:middle}.words_category label{margin:0;padding:10px 10px 10px 10px;color:#333;background-color:#f8f8f8;cursor:pointer;display:block}.words_category .category_cards{margin:0}.words_category .category_cards a{width:49.35%;padding:10px;border:1px solid #ddd;border-bottom:5px solid #ededed;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;box-sizing:border-box;float:left;overflow:hidden}.category_cards a:hover{border:1px solid #ccc;border-bottom:5px solid #ccc}.words_category .category_cards:nth-child(even) a{float:right}.custom_color3{color:#043a54!important}.custom_color4{color:#ff8a00!important}.custom_color5{color:#0096ff!important}.custom_dbstyle{margin:0}.custom_dbstyle ol,.custom_dbstyle span{line-height:normal!important;clear:both!important}.custom_dbstyle ol,.custom_dbstyle p,.custom_dbstyle span{padding:0;font-family:Roboto,sans-serif!important;font-size:.95rem!important;color:#333!important}.custom_dbstyle{margin:0}.custom_dbstyle p{margin:0 0 15px!important}.custom_dbstyle ol{margin:0 15px 15px!important}.custom_dbstyle ol li{margin:0;padding:0}.custom_dbstyle span{margin:0 0 15px!important}.jumbotron h2{display:none}.custom_dbstyle table{width:94%!important;margin:0 0 5px!important;table-layout:auto!important;border:0!important;font-weight:500!important}.custom_dbstyle table td{padding:5px!important}.custom_dbstyle ul{margin:0!important;padding:0!important;overflow:hidden!important}.custom_dbstyle ul li{margin:0!important;padding:0!important;list-style-type:none!important}

    /*CSS by Sajjad*/
    .icon_button{border:0;background-color:transparent;padding:0;margin:0}.modal-header{border-bottom:1px solid #e5e5e5}.modal-header .close{position:absolute;right:12px;top:12px}.modal-title{margin:15px 0 0}@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto}}.modal-content{padding:10px}.modal-content .modal-header{border-bottom:none}.modal-content .modal-body{padding:0 8px}.modal-content .modal-footer{border-top:none;padding:7px}.modal-content .modal-footer button{margin:0;width:auto;position:relative;right:2px;bottom:0}.modal-content .modal-body+.modal-footer{padding-top:0}.modal,.modal-open{overflow:hidden}.modal,.modal-backdrop{top:0;right:0;bottom:0;left:0}.modal{display:none;position:fixed;z-index:1050;-webkit-overflow-scrolling:touch;outline:0}.modal.fade .modal-dialog{-webkit-transform:translate(0,-25%);-ms-transform:translate(0,-25%);-o-transform:translate(0,-25%);transform:translate(0,-25%);-webkit-transition:-webkit-transform .3s ease-out;-o-transition:-o-transform .3s ease-out;transition:transform .3s ease-out}.modal.in .modal-dialog{-webkit-transform:translate(0,0);-ms-transform:translate(0,0);-o-transform:translate(0,0);transform:translate(0,0)}.modal-open .modal{overflow-x:hidden;overflow-y:auto}.modal-dialog{position:relative;width:auto;margin:10px}.modal-content{position:relative;background-color:#fff;border:1px solid #999;border:1px solid rgba(0,0,0,.2);border-radius:6px;-webkit-box-shadow:0 3px 9px rgba(0,0,0,.5);box-shadow:0 3px 9px rgba(0,0,0,.5);-webkit-background-clip:padding-box;background-clip:padding-box;outline:0}.modal-backdrop{position:fixed;z-index:1040;background-color:#000}.modal-backdrop.fade{opacity:0}.modal-backdrop.in{opacity:.5}.modal-header{padding:10px}.modal-header button{border:0;background-color:transparent;font-size:30px}.modal-body{position:relative}.modal-footer{padding:15px;text-align:right;border-top:1px solid #e5e5e5}.modal-footer .btn+.btn{margin-left:5px;margin-bottom:0}.modal-footer .btn-group .btn+.btn{margin-left:-1px}.modal-footer .btn-block+.btn-block{margin-left:0}.modal-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto}.modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5)}.modal-sm{width:300px}}

    @media (min-width:992px){.modal-lg{width:900px}}@media only screen and (max-width:1024px){#site_wrapper{margin:0 auto;width:95%;padding:10px 0}.small_viewport_mergin{margin-left:28px;float:none;clear:both}.footer_wrapper{width:99%}.box_wrapper fieldset{margin:20px 0;border:0}.box_wrapper2 fieldset{padding:0;border:0}.box_wrapper2 fieldset .fieldset_body{padding:3px}.box_wrapper2 fieldset legend{margin-left:0}.header_wrapper{-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.header_logo a,.header_wrapper .header_logo{padding-left:7px}.header_nav_collapse label{right:15px}.header_nav_collapse ul{margin-top:0}.search_fld{margin:0;width:91%;left:14px}.header_wrapper{padding-bottom:20px}.header_wrapper .header_logo{display:none}.mobile_logo{display:block!important}.header_nav_collapse ul{margin-top:15px}.header_nav_collapse ul li:last-child{margin-bottom:-15px}.autocomplete-items:last-child{margin-bottom:5px}}@media only screen and (max-width:1023px){.gallery_meaning .div_panel{margin:5px 0;width:100%}}@media only screen and (max-width:854px){.search_fld{margin:0;width:89%;left:14px}.dic_img img{width:75%;height:auto}}

    @media only screen and (max-width:800px){.box_wrapper fieldset .fieldset_body textarea,.btn_default5{width:95%}}@media only screen and (max-width:768px){.box_wrapper fieldset .fieldset_body textarea{width:95%}.dic_img img{padding:0;width:100%;height:auto;border:0}.search_fld{width:89%}}@media only screen and (max-width:667px){.search_fld{margin:0;width:87%;left:14px}}@media only screen and (max-width:640px){.header_nav{display:none}.header_nav_collapse{display:inline}.header_nav_collapse ul li{width:100%}#menu{display:none}.btn_default3 img{width:30px;height:30px}.small_viewport_mergin{float:left}.btn_default5{width:94%}.search_fld{margin:0;width:87%;left:14px}.dic_img img{padding:0;width:100%;height:auto;border:0}}@media only screen and (max-width:600px){.box_wrapper fieldset .fieldset_body textarea{width:93%}.float_div{width:100%}.search_fld{margin:0;width:85%;left:14px}.dic_img img{padding:0;width:100%;height:auto;border:0}}

    @media only screen and (max-width:480px){.header_nav{display:none}.header_nav_collapse{display:inline}#menu{display:none}.left_content{width:100%;float:none;display:block}.box_wrapper fieldset legend{margin-left:0;font-size:1.16rem}.box_wrapper fieldset .fieldset_body{padding:10px 3px}.btn_default4{margin:3px;padding:8px}.btn_default5{width:98%;margin:20px 3px 10px 5px;padding:8px}.topic_link a{padding:10px 0}.small_viewport_mergin{margin-left:28px;float:left}.right_content{width:100%;float:none;display:block}.btn_default2{padding:10px}.btn_default3{padding:10px;font-size:.93rem}.btn_default3 img{width:30px;height:30px}.footer_wrapper{padding:8px 4px}.footer_wrapper span{float:none;line-height:25px}.search_fld{margin:0;width:82%;left:14px}.dic_img img{padding:0;width:100%;height:auto;border:0}.words_category{margin-bottom:0}.words_category .category_cards a{margin-bottom:10px;width:100%}}@media only screen and (max-width:414px){.box_wrapper fieldset .fieldset_body textarea{width:93%}.btn_default5{width:97%}.search_fld{margin:0;width:79%;left:14px}}@media only screen and (max-width:375px){.box_wrapper fieldset .fieldset_body textarea{width:92%}.dic_img img{padding:0;width:100%;height:auto;border:0}.search_fld{width:77%}}

    @media only screen and (max-width:320px){.btn_default5{width:96%}.search_fld{margin:0;width:74%;left:14px}}.icon-android{background-repeat:no-repeat;display:inline-block;background-image:url(/imgs/android-icon.png);background-position:0 0;width:30px;height:30px}.icon-ios{background-repeat:no-repeat;display:inline-block;background-image:url(/imgs/ios-icon.png);background-position:0 0;width:30px;height:30px}.icon-chrome{background-repeat:no-repeat;display:inline-block;background-image:url(/imgs/chrome-icon.png);background-position:0 0;width:30px;height:30px}.left_padding{padding-left:10px}.card{box-shadow:0 4px 8px 0 rgba(0,0,0,.2);transition:.3s;width:100%}.card:hover{box-shadow:0 8px 16px 0 rgba(0,0,0,.2)}.movdict_container{padding:2px 16px}

</style>

<head>

    <?= $main_array['noindexhtml'] ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="<?= $main_array['googlesiteverify'] ?>"/>
    <title><?= str_replace("Bengali", "Bangla", $main_array['title']) ?></title>

    <meta name="keyword" content="<?= str_replace("bengali", "bangla", $main_array['keyword']) ?>">
    <meta name="description" content="<?= str_replace("Bengali", "Bangla", $main_array['metadescription']) ?>">

    <?php if ($main_array['ampword'] != '') { ?>
        <!--link rel="amphtml" href="<?= $main_array['baseurl'] ?>amp/index.php?q=<?= $main_array['ampword'] ?>"-->
    <?php } ?>

    <link rel="canonical" href="<?= str_replace("Bengali", "Bangla", $main_array['canonicallink']) ?>"/>

    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title"
          content="English :: <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?> Online Dictionary"/>
    <meta property="og:description"
          content="English to <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?> Dictionary (Free). You can get meaning of any English word very easily. It has auto-suggestion feature which will save you a lot of time getting any meaning. We have a Chrome Extension and an Android App"/>
    <meta property="og:url" content="<?= $main_array['url'] ?>"/>
    <meta property="og:site_name"
          content="English :: <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?> Online Dictionary"/>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <link rel="shortcut icon" href="img/favicon.png">

    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $main_array['analyticsid'] ?>"></script>
    <script>
        function gtag(){dataLayer.push(arguments)}window.dataLayer=window.dataLayer||[],gtag("js",new Date);
        gtag('config', '<?=$main_array['analyticsid']?>');

        <?php
        if(isset($_GET['q'])){?>
        //var url_string=window.location.href,url=new URL(url_string),a=url.searchParams.get("q"),t=[];null!=localStorage.getItem("search_history")&&(t=JSON.parse(localStorage.getItem("search_history"))),t.indexOf(a) !== -1 && t.splice(t.indexOf(a), 1),t.push(a),localStorage.setItem("search_history",JSON.stringify(t.filter(onlyUnique1)));
        <?php  }  ?>

        function show_history(){document.getElementById("q").value="";var e=JSON.parse(localStorage.getItem("search_history"));if(Object.keys(e).forEach(t=>!e[t]&&void 0!==e[t]&&delete e[t]),e.reverse(),e.length>0){var t=document.getElementById("myInputautocomplete-list");for(var n in t.innerHTML="",e)if(e.hasOwnProperty(n)){if(n>4)break;var o=document.createElement("DIV");o.innerHTML=e[n],o.onclick=function(){document.new_form.q.value=this.innerHTML,redirectUrl()},document.getElementById("myInputautocomplete-list").appendChild(o)}}if(e.length>5){document.getElementById("myInputautocomplete-list");t.innerHTML1="";var r=document.createElement("DIV");r.innerHTML='<a href="search_history.php" style="display: block"> See More...</a>',document.getElementById("myInputautocomplete-list").appendChild(r)}}function onlyUnique1(e,t,n){return n.indexOf(e)===t}
        function redirectUrl(){
            var word = document.getElementById("q").value;
            var redirect_url = main_domain() + "/english-to-" + lang() + "-meaning-" + word.toLowerCase();
            location.replace(redirect_url);
        }
    </script>

    <?php
    // echo $main_array['alladcodes']['mobile_head'];
    if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false):
        echo $main_array['autoad'];
    endif;
    ?>

</head>

<body>

<script>

    function textToSpeech(e){speechSynthesis.speak(new SpeechSynthesisUtterance(e))}document.onclick=function(e){"q"!=e.target.id&&(document.getElementById("myInputautocomplete-list").innerHTML="")};

</script>

<?php if (!empty($androidLink)) { ?>
    <div class="android_banner" id="mobile_banner_div"
         style="position: fixed; bottom:-15px;margin-left:0px; z-index: 9999999999; width: 100%;">
        <button class="btn_default2 bdr_radius2" style="text-align: center;">
            <a href="<?php echo $androidLink; ?>" target="_blank">
                <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="img/android-icon.png" alt="icon" width="30px" height="30px" style="position:absolute;" loading="lazy">
                <span style="padding-left:35px;">Go To Android App</span>
            </a>
        </button>
    </div>
<?php } ?>

<!--Site Wrapper-->
<div id="site_wrapper">
    <div class="header_wrapper">
        <?php
        function UR_exists($url)
        {
            $headers = get_headers($url);
            return stripos($headers[0], "200 OK") ? true : false;
        }

        $url = $main_array['baseurl'] . "site_logo/" . $main_array['lang'] . ".webp";
        $langLogo = $main_array['baseurl'] . "site_logo/" . $main_array['lang'] . ".png";

        if (strpos($main_array['baseurl'], 'dictionary')) {
            $mobile = $main_array['baseurl'] . "mobile_logo/dictionary.webp";
            $mobileLangLogo = $main_array['baseurl'] . "mobile_logo/dictionary.png";
        } else {
            $mobile = $main_array['baseurl'] . "mobile_logo/" . $main_array['lang'] . ".webp";;
            $mobileLangLogo = $main_array['baseurl'] . "mobile_logo/" . $main_array['lang'] . ".png";;
        }


        if (UR_exists($url)){ ?>
        <div class="content_wrapper" style="margin-top: 5px;">
            <?php }else{ ?>
            <div class="content_wrapper">
                <?php } ?>
                <div class="logo_div">
                    <div class="header_logo">
                        <a href="<?= $main_array['baseurl'] ?>"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $url ?>"
                                                                     onerror="this.onerror=null; this.src='<?= $langLogo ?>'"
                                                                     alt="<?= strtoupper($main_array['logotext']) ?>" height="55px" style="margin-bottom: -15px;" loading="lazy"></a>
                    </div>

                    <div class="mobile_logo" style="display: none">
                        <a href="<?= $main_array['baseurl'] ?>"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $mobile ?>"
                                                                     onerror="this.onerror=null; this.src='<?= $mobileLangLogo ?>'"
                                                                     alt="<?= strtoupper($main_array['logotext']) ?>" height="55px" style="margin-bottom: -15px;padding-left: 5px;padding-top: 5px;" loading="lazy"></a>
                    </div>

                    <div class="search_fld" style="width: 100%;">
                        <form autocomplete="off" name="new_form" action="#" id="new_form">
                            <input type="text" id="q" name="q" value="<?= $main_array['q'] ?>" onfocus="show_history()"
                                   autocomplete="off" required placeholder="Translate word"
                                   onKeyPress="edValueKeyPress()" onKeyUp="edValueKeyPress()"/>
                            <button type="submit" class="search_btn" onclick="redirectUrl()"></button>

                            <div id="myInputautocomplete-list" class="autocomplete-items">

                            </div>
                        </form>
                    </div>
                </div>
                <div style="width: 100%;">
                    <div class="header_nav_collapse">
                        <label onclick="showHideMenu()"></label>
                        <ul id="menu">
                            <li>
                                <a href="<?= $main_array['baseurl'] ?>">Home</a>
                            </li>
                            <li>
                                <a href="<?= $main_array['baseurl'] ?>read-text.php">Read Text</a>
                            </li>
                            <li>
                                <a href="<?= $main_array['baseurl'] ?>vocabulary-game.php">Games</a>
                            </li>
                            <li>
                                <a href="<?= $main_array['baseurl'] ?>learn-ten-words-everyday.php">Words Everyday</a>
                            </li>
                            <li>
                                <a href="<?= $main_array['baseurl'] ?><?= $main_array['lang'] ?>-to-english-dictionary"
                                   title="<?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?> to English Dictionary"><?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?>
                                    to
                                    English Dictionary</a>
                            </li>
                            <li>
                                <a href="<?= $main_array['baseurl'] ?>browse-words.php" title="Browse English Words">Browse
                                    Words</a>
                            </li>
                            <!--li>
                        	<a href="<?= $main_array['baseurl'] ?>word-history.php" title="Browse Word History">Word History</a>
                        </li-->
                            <li>
                                <a href="<?= $main_array['baseurl'] ?>favourite-words.php"
                                   title="Browse Favorite Words">Favorite
                                    Words</a>
                            </li>
                            <li>
                                <a href="<?= $main_array['baseurl'] ?>search_history.php"
                                   title="Browse Word Search History">Word Search History</a>
                            </li>
                            <li>
                                <a href="<?= $main_array['baseurl'] ?>blogs.php" title="Blogs List">Blogs</a>
                            </li>
                            <li>
                                <a href="<?= $main_array['baseurl'] ?>contact-us.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="content_wrapper top_margin">
            <div class="left_content">

                <?php
                if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false):

                    echo ($main_array['ismobile']) ? $main_array['alladcodes']['300'] : '';
                    echo (!$main_array['ismobile']) ? $main_array['alladcodes']['body_top'] : '';

                endif;
                ?>

                <?php

                if ($main_array['q'] and $main_array['lang']) {

                    $q = $main_array['q'];

                    ?>
                    <div class="box_wrapper">

                        <fieldset>
                            <?= str_replace("Bengali", "Bangla", $main_array['honetitle']) ?>

                            <div class="fieldset_body inner_details" style="font-size: initial">


                                <?php

                                if (!empty($p) && ($p != $q)) {
                                    echo '<h1><div id="warning_div" style="color: #009394;"><b>"'.$q.'"</b> derived from <b>"'.$p.'"</b></div></h1>';
                                    $q = $p;
                                }

                                $y_bengali = mysqli_fetch_assoc(mysqli_query($conn, "select details from y_" . $main_array['lang'] . " where word='" . $q . "' limit 1"));
                                $y_bengali_details = json_decode($y_bengali['details'], true);


                                if (isset($y_bengali_details) && sizeof($y_bengali_details) > 0) {

                                $mquery = mysqli_query($conn, 'select mean from `x_' . $main_array['lang'] . '` where word=\'' . $q . '\' limit 1');

                                $get_root_query = mysqli_fetch_assoc(mysqli_query($conn, 'select root from v3_word_list where word=\'' . $q . '\' limit 1'));

                                if ($get_root_query['root']) {
                                    $q = $get_root_query['root'];
                                }

                                $mrow = mysqli_fetch_assoc($mquery);

                                $sql = 'select word, ' . $main_array['lang'] . ', id, data from v3_word_frame where word=\'' . $q . '\' limit 1';

                                $query = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($query);


                                $id = $row['id'];
                                $data = json_decode($row['data']);
                                $mean = json_decode($row[$main_array['lang']]);
                                $nex = null;
                                $prev = null;
                                $ba_img = null;
                                $img_check = mysqli_fetch_assoc(mysqli_query($conn, 'select nex,prev,height,width from img_words where word=\'' . $q . '\' limit 1'));
                                if ($img_check['nex']) {
                                    $ba_img = $q;
                                    $nex = $img_check['nex'];
                                    $prev = $img_check['prev'];
                                    $height = $img_check['height'];
                                    $width = $img_check['width'];
                                }

                                echo '<span><div class="align_text  custom_font2">' . ucfirst($q) . ' : </div><div class="align_text2">' . $mrow['mean'] . '</div>
									<label class="img_align">Pronunciation: <button class="icon_button" onclick="textToSpeech(\'' . $q . '\')"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" height="35px" width="35px" data-src="img/microphone1.png" title="Say The Word" loading="lazy"></button></label>
		                           <label class="img_align">Add to Favorite: <button class="icon_button" onclick="calFavs(\'' . $q . '\', 1)"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" height="35px" width="35px" data-src="img/heart-add.png" title="Add To Favorites" loading="lazy"></button></label></span>';


                                if($ba_img and $main_array['lang'] == 'bengali'){ ?>
                                <span><div class="h_line"></div>
                                        <label>Bangla Academy Ovidhan :</label>
                                        <div class="h_line2"></div>
                                        <div class="dic_img">
                                            <img
                                                    src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                    data-src="<?= $main_array['baurl'].strtoupper($ba_img).'.JPG'.'.webp' ?>"
                                                    onerror="this.onerror=null; this.src='<?= $main_array['baurl'].strtoupper($ba_img).'.JPG' ?>'"
                                                    alt="<?= $q ?>" height="<?= $height.'px'?>" width="<?= $width.'px'?>" title="<?= $q ?>" loading="lazy">
									<?php  }
                                    // bn
                                    $mean_array = get_object_vars($mean);


                                    $details = $y_bengali_details;

                                    if ((isset($details['result']) && $details['result'] != null) || (isset($details['m']) && $details['m'] != null && sizeof($details['m']) > 0)) {

                                        foreach ($details as $key => $value) {

                                            if ($key != 'result') {

                                                if ($key == 'm') {

                                                    if (isset($value) && $value != null && sizeof($value) > 0) {

                                                        echo '<span><label>Details : </label>';

                                                        echo implode(', ', $value);

                                                        echo '</span>';

                                                    }

                                                } else {

                                                    echo '<span><label>' . $key . ' : </label>';

                                                    echo implode(', ', $value);

                                                    echo '</span>';

                                                }

                                            }

                                        }

                                    }

                                    // show top meaning


                                    $total_words = explode(' ', $q);
                                    $total_words_cnt = count($total_words);
                                    if ($total_words > 1) {
                                        $ta_array = array();
                                        foreach ($total_words as $ta) {
                                            $ta_array[] = mysqli_real_escape_string($conn, $ta);
                                        }

                                        // show extra meaning for phrases

                                        $extra_sql = mysqli_query($conn, 'select word, mean from `x_' . $main_array['lang'] . '` where word in (\'' . implode('\',\'', $ta_array) . '\') limit ' . $total_words_cnt);
                                        while ($extra_row = mysqli_fetch_assoc($extra_sql)) {
                                            echo '<span><a href="' . $main_array['url'] . '/english-to-' . $main_array['lang'] . '-meaning-' . strtolower($extra_row['word']) . '" title="English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' meaning of ' . $extra_row['word'] . '"><label>' . ucfirst($extra_row['word']) . '</label></a> - ' . $extra_row['mean'] . '</span>';
                                        }

                                    }

                                    // related

                                    $variantWord = $main_array['baseurl'].'word_variant/'.$q.'.txt';

                                    $arrContextOptions=array(
                                        "ssl"=>array(
                                            "verify_peer"=>false,
                                            "verify_peer_name"=>false,
                                        ),
                                    );

                                    $variantWordresponse = explode(',',file_get_contents($variantWord, false, stream_context_create($arrContextOptions)));

                                    $related_words= [];
                                    if (!empty($variantWordresponse)) {
                                        foreach ($variantWordresponse as $row){
                                            if($row != $q){
                                                $related_words[] = $row;
                                            }

                                        }
                                    }

                                    $related_words = array_slice($related_words, 0, 5, true);

                                    $related_words_imp = "'" . implode("','", $related_words) . "'";

                                    $related_mean_query = mysqli_query($conn, "select " . $main_array['lang'] . " as mean, word from lang where word in (" . $related_words_imp . ")");
                                    $related_mean_array = array();
                                    while ($related_mean_row = mysqli_fetch_assoc($related_mean_query)) {
                                        echo '<span><label>' . ucfirst($related_mean_row['word']) . ' :: </label>' . $related_mean_row['mean'] . '</span>';
                                    }

                                    // related ends

                                    // next prev
                                    echo '<span><div class="custom_margin2"></div>';
                                    //echo ($prev)?'<button class="btn_pre bdr_radius2"><a title="English to '.$ulang.' meaning of '.$prev.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$main_array['lang'].'-meaning-'.$prev.'">&leftarrow; '.ucfirst($prev).'</a>':'';
                                    echo ($prev) ? '<button class="btn_pre bdr_radius2"><a title="English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' meaning of ' . $prev . '" class="btn btn-raised btn-primary" href="' . $main_array['baseurl'] . '?q=' . $prev . '">&leftarrow; ' . ucfirst($prev) . '</a>' : '';

                                    //echo ($nex)?'<button class="btn_next bdr_radius2"><a title="English to '.$ulang.' meaning of '.$nex.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$main_array['lang'].'-meaning-'.$nex.'">'.$nex.' &rightarrow;</a></button>':'';
                                    echo ($nex) ? '<button class="btn_next bdr_radius2"><a title="English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' meaning of ' . $nex . '" class="btn btn-raised btn-primary" href="' . $main_array['baseurl'] . '?q=' . $nex . '">' . $nex . ' &rightarrow;</a></button>' : '';

                                    echo '<div style="clear:both;">&nbsp;</div>';

                                    // echo $main_array['alladcodes']['300_2'];

                                    echo '<div class="custom_margin3"></div></span>';

                                    // see also in

                                    echo '<span><label>Other Refferences :</label>
								<button class="btn_default4 bdr_radius2 custom_bdr">
									<a href="http://the-definition.com/dictionary/' . $q . '" target="_blank">The Definition</a>
								</button>
								<button class="btn_default4 bdr_radius2 custom_bdr">
									<a href="http://dictionary.reference.com/browse/' . $q . '?s=t" target="_blank">Dictionary.com</a>
								</button>
                                <button class="btn_default4 bdr_radius2 custom_bdr">
									<a href="http://www.merriam-webster.com/dictionary/' . $q . '" target="_blank">Merriam Webster</a>
								</button>
                                <button class="btn_default4 bdr_radius2 custom_bdr">
									<a href="http://en.wikipedia.org/wiki/' . $q . '" target="_blank">Wikipedia</a>
								</button>';

                                    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                    echo '<span><label style="vertical-align: 10px;">Share This Meaning :</label>
							
									<a href="http://www.facebook.com/sharer.php?u=' . $actual_link . '" title="Facebook" target="_blank" style="font-size:15px;color:#0778E8;padding-right: 5px;">
									<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="social_icon/facebook.jpg" alt="Facebook" style="height: 30px;width: 30px;border: 0;" width="30px" height="30px" loading="lazy"></a>
									
									<a href="http://twitter.com/share?url=' . $actual_link . '&text=Simple Share Buttons&hashtags=simplesharebuttons" title="Twitter" target="_blank" style="font-size:15px;color:#50ABF1;padding-right: 5px;">
									<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="social_icon/twitter.jpg" style="height: 30px;width: 30px;border: 0;" alt="Twitter" width="30px" height="30px" loading="lazy"></a>
									
									<a href="http://www.linkedin.com/shareArticle?mini=true&url=' . $actual_link . '" target="_blank" title="Linkedin" style="font-size:15px;color:#0077B5;padding-right: 5px;">
									<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="social_icon/linkedin.png" style="height: 30px;width: 30px;border: 0;" alt="Linkedin" width="30px" height="30px" loading="lazy"></a>
									
									<a href="mailto:?Subject=English To ' . ucfirst($main_array['lang']) . ' Dictionary&Body=I%20saw%20this%20and%20thought%20of%20you!%20' . $actual_link . '" title="Gmail" target="_blank" style="font-size:15px;color:#CE493B;padding-right: 5px;">
									<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="social_icon/mail.jpg" style="height: 30px;width: 30px;border: 0;" alt="Gmail" width="30px" height="30px" loading="lazy"></a>
									
									<a href="https://www.addtoany.com/share?url=' . $actual_link . '%2F&amp;title=English%20To%20' . ucfirst(str_replace("Bengali", "Bangla", $main_array['ulang'])) . '%20Dictionary" target="_blank" title="More Share" style="font-size:15px;color:#F7664A;">
									<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="social_icon/more.png" style="height: 30px;width: 30px;border: 0;" alt="Share More" width="30px" height="30px" loading="lazy"></a>
							
								';


                                    // en
                                    if ($data->eng != null) {

                                        $eng = '';
                                        $i = 0;

                                        foreach ($data->eng as $key => $val) {
                                            $i++;
                                            if ($i > 1) {
                                                $eng .= '<br />';
                                            }

                                            $eng .= '<strong class="custom_font2 custom_margin3">' . ucfirst($key) . '</strong>';

                                            $j = 0;
                                            foreach ($val as $v) {
                                                $j++;
                                                $eng .= '<span>(' . $j . ') ' . $v . '</span>';

                                                if ($j > 15) {
                                                    break;
                                                }

                                            }

                                        }

                                    }


                                    // examples
                                    if ($data->examples && count($data->examples) > 0) {

                                        $examples = '';
                                        $i = 0;

                                        foreach ($data->examples as $val) {
                                            $i++;
                                            if ($i > 1) {
                                                //$examples .= '<br />';
                                            }

                                            $examples .= '<span>(' . $i . ') ' . $val . '</span>';
                                            if ($i > 15) {
                                                break;
                                            }
                                        }

                                    }


                                    ?>

                                    <span>
               <div class="accordion_collapse">
                                <h4 onclick="showHideAccordion()" class="custom-accordion-header">Show English Meaning <div
                                            class="icon_right">(+)</div></h4>
                                <div id="accordion" class="custom-accordion-content">
                                    <?php echo $eng; ?>
                                </div>
                              </div>

               <div class="custom_margin"></div>

               <div class="accordion_collapse">
                                <h4 onclick="showHideAccordion2()" class="custom-accordion-header">Show Examples <div
                                            class="icon_right">(+)</div></h4>
                                <div id="accordion2" class="custom-accordion-content">
                                    <?php echo $examples; ?>
                                </div>
                               </div>
        </span>

                                            <!--phrases-->
                                    <div class="custom_margin2"></div>

                                    <?php if ($data->phrase && count($data->phrase) > 0) {
                                        echo '<div><strong>Related Words</strong></div>';

                                        $i = 0;
                                        foreach ($data->phrase as $key => $val) {

                                            if (isset($mean_array[trim($val)])) {
                                                $i++;

                                                echo '<span><div class="label_font">(' . $i . ') ' . $val . ' :: </div>' . $mean_array[trim($val)] . '</span>';
                                            }
                                            if ($i > 15) {
                                                break;
                                            }
                                        }

                                    } ?>


                                    <span>
		<!--synonyms-->

		<?php if ($data->syn) {
            echo '<div class="float_div"><div class="line_height"><strong>Synonyms</strong></div>';


            $i = 0;
            foreach ($data->syn as $key => $val) {

                echo "<div class='line_height'><strong>" . ucfirst($key) . "</strong></div>";

                foreach ($val as $k => $v) {
                    $i++;
                    if (isset($mean_array[trim($v)]))
                        echo '<div class="label_font line_height">' . $i . '. ' . $v . ' :: </div><div class="line_height">' . $mean_array[trim($v)] . '</div>';
                }


            }


            echo '</div>';
        } ?>

		<!--antonyms-->
		<?php if ($data->anto && count($data->anto) > 0) {
            echo '<div class="float_div"><div class="line_height"><strong>Antonyms</strong></div>';

            $i = 0;
            foreach ($data->anto as $key => $val) {
                if ($mean_array[$val]) {
                    $i++;
                    if ($i > 1) {
                        //echo '<hr>';
                    }
                    //if($mean_array[$v] != '')
                    echo '<div class="label_font line_height">' . $i . '. ' . $val . ' :: </div><div class="line_height">' . $mean_array[$val] . '</div>';
                }
                if ($i > 15) {
                    break;
                }
            }


            echo '</div>';
        } ?>
		</span>

                                            <!--variants-->

                                    <span>
		<?php if ($data->variants && count($data->variants) > 0) {
            echo '<div class="custom_font2 custom_margin"><strong>Different Forms</strong></div>';

            echo '<div class="jumbo_details variants">';
            echo implode(', ', $data->variants);
            echo '</div>';
        }

        // similar
        if (isset($data->similar)) {
            echo '<div class="custom_font2 custom_margin"><strong>Similar Words</strong></div>';

            echo '<div class="jumbo_details similar">';
            echo implode(', ', $data->similar);
            echo '</div>';
        } ?>

		</span>

                                    <?php
                                    } else {

                                        // echo 'select mean from x_'.$main_array['lang'].' where word=\''.$q.'\' limit 1';

                                        $x_bengali_query = mysqli_query($conn, 'select mean from x_' . $main_array['lang'] . ' where word=\'' . $q . '\' limit 1');

                                        $x_bengali = ($x_bengali_query) ? mysqli_fetch_assoc($x_bengali_query) : null;

                                        // echo "<pre>";
                                        // print_r($x_bengali);

                                        if (isset($x_bengali['mean']) && sizeof($x_bengali) > 0) {

                                            //show single $x_bengali['mean']

                                            $variants['word'] = $p;
                                            $y_bengali = mysqli_fetch_assoc(mysqli_query($conn, "select details from y_" . $main_array['lang'] . " where word='" . $variants['word'] . "' limit 1"));

                                            $mquery = mysqli_query($conn, "select mean from x_" . $main_array['lang'] . " where word='" . $q . "' limit 1");

                                            $get_root_query = mysqli_fetch_assoc(mysqli_query($conn, 'select root from v3_word_list where word=\'' . $q . '\' limit 1'));

                                            // echo $get_root_query['root'];die;

                                            if ($get_root_query['root']) {
                                                $q = $get_root_query['root'];
                                            }

                                            $mrow = mysqli_fetch_assoc($mquery);

                                            $sql = 'select word, ' . $main_array['lang'] . ', id, data from v3_word_frame where word=\'' . $q . '\' limit 1';

                                            $query = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($query);


                                            $id = $row['id'];
                                            $data = json_decode($row['data']);
                                            $mean = json_decode($row[$main_array['lang']]);
                                            $nex = null;
                                            $prev = null;
                                            $ba_img = null;
                                            $img_check = mysqli_fetch_assoc(mysqli_query($conn, 'select nex,prev,height,width from img_words where word=\'' . $q . '\' limit 1'));
                                            if ($img_check['nex']) {
                                                $ba_img = $q;
                                                $nex = $img_check['nex'];
                                                $prev = $img_check['prev'];
                                                $height = $img_check['height'];
                                                $width = $img_check['width'];
                                            }

                                            if($ba_img and $lang == 'bengali'){?>
                                                <span><div class="h_line"></div><label>Bangla Academy Ovidhan :</label>
                                            <div class="h_line2"></div><div class="dic_img">
                                                <img
                                                        src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                        data-src="<?= $main_array['movssurl'].strtoupper($ba_img).'.JPG'.'.webp' ?>"
                                                        onerror="this.onerror=null; this.src='<?= $main_array['movssurl'].strtoupper($ba_img).'.JPG' ?>'"
                                                        alt="<?= $q ?>" height="<?= $height.'px'?>" width="<?= $width.'px'?>"  title="<?= $q ?>" loading="lazy">
									</div></span>
                                            <?php  }

                                            // bn
                                            if (isset($mean))
                                                $mean_array = get_object_vars($mean);

                                            if (isset($y_bengali['details']))
                                                $details = json_decode($y_bengali['details'], true);

                                            echo '<span><label>English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' Meaning :<label></span>';

                                            if ((isset($details['result']) && $details['result'] != null) || (isset($details['m']) && $details['m'] != null && sizeof($details['m']) > 0)) {

                                                foreach ($details as $key => $value) {

                                                    if ($key != 'result') {

                                                        if ($key == 'm') {

                                                            if (isset($value) && $value != null && sizeof($value) > 0) {

                                                                echo '<span><label>Details : </label>';

                                                                echo implode(', ', $value);

                                                                echo '</span>';

                                                            }

                                                        } else {

                                                            echo '<span><label>' . $key . ' : </label>';

                                                            echo implode(', ', $value);

                                                            echo '</span>';

                                                        }

                                                    }

                                                }

                                            }

                                            // show top meaning

                                            echo '<span><div class="align_text  custom_font2">' . ucfirst($q) . ' : </div><div class="align_text2">' . $mrow['mean'] . '</div><label class="img_align"> Word Pronounce: <button class="icon_button" onclick="textToSpeech(\'' . $q . '\')"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" height="26px" width="26px" data-src="img/microphone1.png" loading="lazy"></button></label>
		                           <label class="img_align">Store Favourite: <button class="icon_button" onclick="calFavs(\'' . $q . '\', 1)"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" height="26px" width="26px" data-src="img/heart-add.png" loading="lazy"></button></label></span>';

                                            $total_words = explode(' ', $q);
                                            $total_words_cnt = count($total_words);
                                            if ($total_words > 1) {
                                                $ta_array = array();
                                                foreach ($total_words as $ta) {
                                                    $ta_array[] = mysqli_real_escape_string($conn, $ta);
                                                }

                                                // show extra meaning for phrases

                                                $extra_sql = mysqli_query($conn, "select word, mean from x_" . $main_array['lang'] . " where word in ('" . implode("','", $ta_array) . "') limit " . $total_words_cnt);
                                                while ($extra_row = mysqli_fetch_assoc($extra_sql)) {
                                                    echo '<span><a href="' . $main_array['url'] . '/english-to-' . $main_array['lang'] . '-meaning-' . strtolower($extra_row['word']) . '" title="English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' meaning of ' . $extra_row['word'] . '"><label>' . ucfirst($extra_row['word']) . '</label></a> - ' . $extra_row['mean'] . '</span>';
                                                }

                                            }

                                            // related

                                            $variantWord = $main_array['baseurl'].'word_variant/'.$q.'.txt';

                                            $arrContextOptions=array(
                                                "ssl"=>array(
                                                    "verify_peer"=>false,
                                                    "verify_peer_name"=>false,
                                                ),
                                            );

                                            $variantWordresponse = explode(',',file_get_contents($variantWord, false, stream_context_create($arrContextOptions)));

                                            $related_words= [];
                                            if (!empty($variantWordresponse)) {
                                                foreach ($variantWordresponse as $row){
                                                    if($row != $q){
                                                        $related_words[] = $row;
                                                    }

                                                }
                                            }

                                            $related_words = array_slice($related_words, 0, 5, true);
                                            $related_words_count = count($related_words);
                                            $related_words_imp = "'" . implode("','", $related_words) . "'";

                                            $related_mean_query = mysqli_query($conn, "select " . $main_array['lang'] . " as mean, word from lang where word in (" . $related_words_imp . ") limit " . $related_words_count);
                                            $related_mean_array = array();
                                            while ($related_mean_row = mysqli_fetch_assoc($related_mean_query)) {
                                                echo '<span><label>' . ucfirst($related_mean_row['word']) . ' :: </label>' . $related_mean_row['mean'] . '</span>';
                                            }

                                            // related ends

                                            // next prev
                                            echo '<span><div class="custom_margin2"></div>';
                                            //echo ($prev)?'<button class="btn_pre bdr_radius2"><a title="English to '.$ulang.' meaning of '.$prev.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$main_array['lang'].'-meaning-'.$prev.'">&leftarrow; '.ucfirst($prev).'</a>':'';
                                            echo ($prev) ? '<button class="btn_pre bdr_radius2"><a title="English to ' . $ulang . ' meaning of ' . $prev . '" class="btn btn-raised btn-primary" href="' . $base_url . '?q=' . $prev . '">&leftarrow; ' . ucfirst($prev) . '</a>' : '';
                                            //echo ($nex)?'<button class="btn_next bdr_radius2"><a title="English to '.$ulang.' meaning of '.$nex.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$main_array['lang'].'-meaning-'.$nex.'">'.$nex.' &rightarrow;</a></button>':'';
                                            echo ($nex) ? '<button class="btn_next bdr_radius2"><a title="English to ' . $ulang . ' meaning of ' . $nex . '" class="btn btn-raised btn-primary" href="' . $base_url . '?q=' . $nex . '">' . $nex . ' &rightarrow;</a></button>' : '';

                                            echo '<div class="custom_margin3"></div></span>';

                                            // see also in

                                            echo '<span><label>Other Refferences :</label>
								<button class="btn_default4 bdr_radius2 custom_bdr">
									<a href="http://the-definition.com/dictionary/' . $q . '" target="_blank">The Definition</a>
								</button>
								<button class="btn_default4 bdr_radius2 custom_bdr">
									<a href="http://dictionary.reference.com/browse/' . $q . '?s=t" target="_blank">Dictionary.com</a>
								</button>
                                <button class="btn_default4 bdr_radius2 custom_bdr">
									<a href="http://www.merriam-webster.com/dictionary/' . $q . '" target="_blank">Merriam Webster</a>
								</button>
                                <button class="btn_default4 bdr_radius2 custom_bdr">
									<a href="http://en.wikipedia.org/wiki/' . $q . '" target="_blank">Wikipedia</a>
								</button>';

                                            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                            echo '<span><label style="vertical-align: 10px;">Share This Meaning :</label>
							
									<a href="http://www.facebook.com/sharer.php?u=' . $actual_link . '" title="Facebook" target="_blank" style="font-size:15px;color:#0778E8;padding-right: 5px;">
									<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="social_icon/facebook.jpg" style="height: 30px;width: 30px;border: 0;" alt="icon" width="30px" height="30px" loading="lazy"></a>
									
									<a href="http://twitter.com/share?url=' . $actual_link . '&text=Simple Share Buttons&hashtags=simplesharebuttons" title="Twitter" target="_blank" style="font-size:15px;color:#50ABF1;padding-right: 5px;">
									<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="social_icon/twitter.jpg" style="height: 30px;width: 30px;border: 0;" alt="icon" width="30px" height="30px" loading="lazy"></a>
									
									<a href="http://www.linkedin.com/shareArticle?mini=true&url=' . $actual_link . '" target="_blank" title="Linkedin" style="font-size:15px;color:#0077B5;padding-right: 5px;">
									<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="social_icon/linkedin.png" style="height: 30px;width: 30px;border: 0;" alt="icon" width="30px" height="30px" loading="lazy"></a>
									
									<a href="mailto:?Subject=English To ' . ucfirst($main_array['lang']) . ' Dictionary&Body=I%20saw%20this%20and%20thought%20of%20you!%20' . $actual_link . '" title="Gmail" target="_blank" style="font-size:15px;color:#CE493B;padding-right: 5px;">
									<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="social_icon/mail.jpg" style="height: 30px;width: 30px;border: 0;" alt="icon" width="30px" height="30px" loading="lazy"></a>
									
									<a href="https://www.addtoany.com/share?url=' . $actual_link . '%2F&amp;title=English%20To%20' . ucfirst($main_array['lang']) . '%20Dictionary" target="_blank" title="More Share" style="font-size:15px;color:#F7664A;">
									<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="social_icon/more.png" style="height: 30px;width: 30px;border: 0;" alt="icon" width="30px" height="30px" loading="lazy"></a>
							
								';


                                            // en
                                            $eng = '';
                                            if (isset($data->eng)) {


                                                $i = 0;

                                                foreach ($data->eng as $key => $val) {
                                                    $i++;
                                                    if ($i > 1) {
                                                        $eng .= '<br />';
                                                    }

                                                    $eng .= '<strong class="custom_font2 custom_margin3">' . ucfirst($key) . '</strong>';

                                                    $j = 0;
                                                    foreach ($val as $v) {
                                                        $j++;
                                                        $eng .= '<span>(' . $j . ') ' . $v . '</span>';

                                                        if ($j > 15) {
                                                            break;
                                                        }

                                                    }

                                                }

                                            }

                                            $examples = '';
                                            // examples
                                            if (isset($data->examples)) {


                                                $i = 0;

                                                foreach ($data->examples as $val) {
                                                    $i++;
                                                    if ($i > 1) {
                                                        //$examples .= '<br />';
                                                    }

                                                    $examples .= '<span>(' . $i . ') ' . $val . '</span>';
                                                    if ($i > 15) {
                                                        break;
                                                    }
                                                }

                                            }

                                            ?>


                                        <span>

			<?php if ($eng != '') { ?>

                <div class="accordion_collapse">
					<h4 onclick="showHideAccordion()" class="custom-accordion-header">Show English Meaning</h4>
						<div id="accordion" class="custom-accordion-content">
							<?php echo $eng; ?>
						</div>
					</div>
                <div class="custom_margin"></div>

            <?php } ?>
                                                <?php if ($examples != '') { ?>

                                                    <div class="accordion_collapse">
					<h4 onclick="showHideAccordion2()" class="custom-accordion-header">Show Examples</h4>
					<div id="accordion2" class="custom-accordion-content">
						<?php echo $examples; ?>
					</div>
                </div>

                                                <?php } ?>

        </span>


                                        <!--phrases-->
                                        <div class="custom_margin2"></div>

                                        <?php
                                            if (isset($data->phrase) && count($data->phrase) > 0) {
                                                echo '<div><strong>Related Words</strong></div>';

                                                $i = 0;
                                                foreach ($data->phrase as $key => $val) {
                                                    if ($mean_array[$val]) {
                                                        $i++;
                                                        if ($i > 1) {
                                                            echo '<hr>';
                                                        }
                                                        echo '<span><div class="label_font">(' . $i . ') ' . $val . ' :: </div>' . $mean_array[$val] . '</span>';
                                                    }
                                                    if ($i > 15) {
                                                        break;
                                                    }
                                                }

                                            } ?>


                                        <span>
		<!--synonyms-->

		<?php if (isset($data->syn)) {
            echo '<div class="float_div"><div class="line_height"><strong>Synonyms</strong></div>';


            $i = 0;
            foreach ($data->syn as $key => $val) {

                echo "<div class='line_height'><strong>" . ucfirst($key) . "</strong></div>";

                foreach ($val as $v) {
                    $i++;

                    if (isset($mean_array[$v]))
                        echo '<div class="label_font line_height">' . $i . '. ' . $v . ' :: </div><div class="line_height">' . $mean_array[$v] . '</div>';
                }


            }


            echo '</div>';
        } ?>

		<!--antonyms-->
		<?php if (isset($data->anto) && count($data->anto) > 0) {
            echo '<div class="float_div"><div class="line_height"><strong>Antonyms</strong></div>';

            $i = 0;
            foreach ($data->anto as $key => $val) {
                if ($mean_array[$val]) {
                    $i++;
                    if ($i > 1) {
                        //echo '<hr>';
                    }
                    //if($mean_array[$v] != '')
                    echo '<div class="label_font line_height">' . $i . '. ' . $val . ' :: </div><div class="line_height">' . $mean_array[$val] . '</div>';
                }
                if ($i > 15) {
                    break;
                }
            }


            echo '</div>';
        } ?>
		</span>

                                        <!--variants-->

                                        <span>
		<?php if (isset($data->variants) && count($data->variants) > 0) {
            echo '<div class="custom_font2 custom_margin"><strong>Different Forms</strong></div>';

            //echo '<div class="jumbo_details variants">';
            echo implode(', ', $data->variants);
            //echo '</div>';
        }

        // similar
        if (isset($data->similar)) {
            echo '<div class="custom_font2 custom_margin"><strong>Similar Words</strong></div>';

            //echo '<div class="jumbo_details similar">';
            echo implode(', ', $data->similar);
            //echo '</div>';
        } ?>

		</span>
                                        <?php } else {


                                            $variants['word'] = $p;

                                            if (isset($variants['word']) && sizeof($variants['word']) > 0) {
                                                $y_bengali = mysqli_fetch_assoc(mysqli_query($conn, "select details from y_" . $main_array['lang'] . " where word='" . $variants['word'] . "' limit 1"));

                                                //if(isset(json_decode($y_bengali['details'],true)) && sizeof(json_decode($y_bengali['details'],true)) > 0){
                                                if (sizeof(json_decode($y_bengali['details'], true)) > 0) {
                                                    $mquery = mysqli_query($conn, "select mean from x_" . $main_array['lang'] . " where word='" . $q . "' limit 1");

                                                    $get_root_query = mysqli_fetch_assoc(mysqli_query($conn, 'select root from v3_word_list where word="' . $q . '"'));

                                                    // echo $get_root_query['root'];die;

                                                    if ($get_root_query['root']) {
                                                        $q = $get_root_query['root'];
                                                    }

                                                    $mrow = mysqli_fetch_assoc($mquery);

                                                    $sql = 'select word, ' . $main_array['lang'] . ', id, data from v3_word_frame where word="' . $q . '" limit 1';

                                                    $query = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_assoc($query);


                                                    $id = $row['id'];
                                                    $data = json_decode($row['data']);
                                                    $mean = json_decode($row[$lang]);
                                                    $nex = null;
                                                    $prev = null;
                                                    $ba_img = null;
                                                    $img_check = mysqli_fetch_assoc(mysqli_query($conn, 'select nex,prev,height,width from img_words where word="' . $q . '" limit 1'));
                                                    if ($img_check['nex']) {
                                                        $ba_img = $q;
                                                        $nex = $img_check['nex'];
                                                        $prev = $img_check['prev'];
                                                        $height = $img_check['height'];
                                                        $width = $img_check['width'];
                                                    }

                                                    // img
                                                    echo ($ba_img and $lang == 'bengali') ? '<span><div class="h_line"></div><label>Bangla Academy Ovidhan :</label><div class="h_line2"></div><div class="dic_img">
		<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $url . '/word/' . strtoupper($ba_img) . '.JPG" title="' . $q . '" alt="' . $q . '" loading="lazy"></div></span>' : '';

                                                    // bn
                                                    $mean_array = get_object_vars($mean);

                                                    $details = json_decode($y_bengali['details'], true);

                                                    echo '<span><label>English to ' . str_replace("Bengali", "Bangla", $ulang) . ' Meaning :<label></span>';

                                                    if ((isset($details['result']) && $details['result'] != null) || (isset($details['m']) && $details['m'] != null && sizeof($details['m']) > 0)) {

                                                        foreach ($details as $key => $value) {

                                                            if ($key != 'result') {

                                                                if ($key == 'm') {

                                                                    if (isset($value) && $value != null && sizeof($value) > 0) {

                                                                        echo '<span><label>Details : </label>';

                                                                        echo implode(', ', $value);

                                                                        echo '</span>';

                                                                    }

                                                                } else {

                                                                    echo '<span><label>' . $key . ' : </label>';

                                                                    echo implode(', ', $value);

                                                                    echo '</span>';

                                                                }

                                                            }

                                                        }

                                                    }

                                                    // show top meaning

                                                    echo '<span><div class="align_text  custom_font2">' . ucfirst($q) . ' : </div><div class="align_text2">' . $mrow['mean'] . '</div><label class="img_align"> Word Pronounce: <button class="icon_button" onclick="textToSpeech(\'' . $q . '\')"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" height="26px" width="26px" data-src="img/microphone1.png" loading="lazy"></button></label>
		                           <label class="img_align">Store Favourite: <button class="icon_button" onclick="calFavs(\'' . $q . '\', 1)"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" height="26px" width="26px" data-src="img/heart-add.png" loading="lazy"></button></label></span>';

                                                    $total_words = explode(' ', $q);
                                                    $total_words_cnt = count($total_words);
                                                    if ($total_words > 1) {
                                                        $ta_array = array();
                                                        foreach ($total_words as $ta) {
                                                            $ta_array[] = mysqli_real_escape_string($conn, $ta);
                                                        }

                                                        // show extra meaning for phrases

                                                        $extra_sql = mysqli_query($conn, 'select word, mean from x_' . $main_array['lang'] . ' where word in ("' . implode('","', $ta_array) . '") limit ' . $total_words_cnt);
                                                        while ($extra_row = mysqli_fetch_assoc($extra_sql)) {
                                                            echo '<span><a href="' . $base_url . '/english-to-' . $main_array['lang'] . '-meaning-' . strtolower($extra_row['word']) . '" title="English to ' . str_replace("Bengali", "Bangla", $ulang) . ' meaning of ' . $extra_row['word'] . '"><label>' . ucfirst($extra_row['word']) . '</label></a> - ' . $extra_row['mean'] . '</span>';
                                                        }

                                                    }

                                                    // related

                                                    $variantWord = $main_array['baseurl'].'word_variant/'.$q.'.txt';

                                                    $arrContextOptions=array(
                                                        "ssl"=>array(
                                                            "verify_peer"=>false,
                                                            "verify_peer_name"=>false,
                                                        ),
                                                    );

                                                    $variantWordresponse = explode(',',file_get_contents($variantWord, false, stream_context_create($arrContextOptions)));

                                                    $related_words= [];
                                                    if (!empty($variantWordresponse)) {
                                                        foreach ($variantWordresponse as $row){
                                                            if($row != $q){
                                                                $related_words[] = $row;
                                                            }

                                                        }
                                                    }

                                                    $related_words = array_slice($related_words, 0, 5, true);

                                                    $related_words_imp = "'" . implode("','", $related_words) . "'";

                                                    $related_mean_query = mysqli_query($conn, "select " . $main_array['lang'] . " as mean, word from lang where word in (" . $related_words_imp . ")");
                                                    $related_mean_array = array();
                                                    while ($related_mean_row = mysqli_fetch_assoc($related_mean_query)) {
                                                        echo '<span><label>' . ucfirst($related_mean_row['word']) . ' :: </label>' . $related_mean_row['mean'] . '</span>';
                                                    }

                                                    // related ends

                                                    // next prev
                                                    echo '<span><div class="custom_margin2"></div>';
                                                    //echo ($prev)?'<button class="btn_pre bdr_radius2"><a title="English to '.$ulang.' meaning of '.$prev.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$main_array['lang'].'-meaning-'.$prev.'">&leftarrow; '.ucfirst($prev).'</a>':'';
                                                    echo ($prev) ? '<button class="btn_pre bdr_radius2"><a title="English to ' . str_replace("Bengali", "Bangla", $ulang) . ' meaning of ' . $prev . '" class="btn btn-raised btn-primary" href="' . $base_url . '?q=' . $prev . '">&leftarrow; ' . ucfirst($prev) . '</a>' : '';

                                                    //echo ($nex)?'<button class="btn_next bdr_radius2"><a title="English to '.$ulang.' meaning of '.$nex.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$main_array['lang'].'-meaning-'.$nex.'">'.$nex.' &rightarrow;</a></button>':'';
                                                    echo ($nex) ? '<button class="btn_next bdr_radius2"><a title="English to ' . str_replace("Bengali", "Bangla", $ulang) . ' meaning of ' . $nex . '" class="btn btn-raised btn-primary" href="' . $base_url . '?q=' . $nex . '">' . $nex . ' &rightarrow;</a></button>' : '';


                                                    echo '<div class="custom_margin3"></div></span>';

                                                    // see also in

                                                    echo '<span><label>Other Refferences :</label>
								<button class="btn_default4 bdr_radius2 custom_bdr">
									<a href="http://the-definition.com/dictionary/' . $q . '" target="_blank">The Definition</a>
								</button>
								<button class="btn_default4 bdr_radius2 custom_bdr">
									<a href="http://dictionary.reference.com/browse/' . $q . '?s=t" target="_blank">Dictionary.com</a>
								</button>
                                <button class="btn_default4 bdr_radius2 custom_bdr">
									<a href="http://www.merriam-webster.com/dictionary/' . $q . '" target="_blank">Merriam Webster</a>
								</button>
                                <button class="btn_default4 bdr_radius2 custom_bdr">
									<a href="http://en.wikipedia.org/wiki/' . $q . '" target="_blank">Wikipedia</a>
								</button>';


                                                    // en
                                                    if ($data->eng && count($data->eng) > 0) {

                                                        $eng = '';
                                                        $i = 0;

                                                        foreach ($data->eng as $key => $val) {
                                                            $i++;
                                                            if ($i > 1) {
                                                                $eng .= '<br />';
                                                            }

                                                            $eng .= '<strong class="custom_font2 custom_margin3">' . ucfirst($key) . '</strong>';

                                                            $j = 0;
                                                            foreach ($val as $v) {
                                                                $j++;
                                                                $eng .= '<span>(' . $j . ') ' . $v . '</span>';

                                                                if ($j > 15) {
                                                                    break;
                                                                }

                                                            }

                                                        }

                                                    }


                                                    // examples
                                                    if ($data->examples && count($data->examples) > 0) {

                                                        $examples = '';
                                                        $i = 0;

                                                        foreach ($data->examples as $val) {
                                                            $i++;
                                                            if ($i > 1) {
                                                                //$examples .= '<br />';
                                                            }

                                                            $examples .= '<span>(' . $i . ') ' . $val . '</span>';
                                                            if ($i > 15) {
                                                                break;
                                                            }
                                                        }

                                                    }

                                                    ?>

                                                    <span>
               <div class="accordion_collapse">
                                <h4 onclick="showHideAccordion()"
                                    class="custom-accordion-header">Show English Meaning</h4>
                                <div id="accordion" class="custom-accordion-content">
                                    <?php echo $eng; ?>
                                </div>
                              </div>

               <div class="custom_margin"></div>

               <div class="accordion_collapse">
                                <h4 onclick="showHideAccordion2()" class="custom-accordion-header">Show Examples</h4>
                                <div id="accordion2" class="custom-accordion-content">
                                    <?php echo $examples; ?>
                                </div>
                               </div>
        </span>

                                                <!--phrases-->
                                                <div class="custom_margin2"></div>

                                                <?php if ($data->phrase && count($data->phrase) > 0) {
                                                        echo '<div><strong>Related Words</strong></div>';

                                                        $i = 0;
                                                        foreach ($data->phrase as $key => $val) {
                                                            if ($mean_array[$val]) {
                                                                $i++;
                                                                if ($i > 1) {
                                                                    echo '<hr>';
                                                                }
                                                                echo '<span><div class="label_font">(' . $i . ') ' . $val . ' :: </div>' . $mean_array[$val] . '</span>';
                                                            }
                                                            if ($i > 15) {
                                                                break;
                                                            }
                                                        }

                                                    } ?>


                                                <span>
		<!--synonyms-->

		<?php if ($data->syn && count($data->syn) > 0) {
            echo '<div class="float_div"><div class="line_height"><strong>Synonyms</strong></div>';


            $i = 0;
            foreach ($data->syn as $key => $val) {

                echo "<div class='line_height'><strong>" . ucfirst($key) . "</strong></div>";

                foreach ($val as $v) {
                    $i++;
                    if ($i > 1) {
                        //echo '<hr>';
                    }

                    if ($mean_array[$v] != '')
                        echo '<div class="label_font line_height">' . $i . '. ' . $v . ' :: </div><div class="line_height">' . $mean_array[$v] . '</div>';
                }


            }


            echo '</div>';
        } ?>

		<!--antonyms-->
		<?php if ($data->anto && count($data->anto) > 0) {
            echo '<div class="float_div"><div class="line_height"><strong>Antonyms</strong></div>';

            $i = 0;
            foreach ($data->anto as $key => $val) {
                if ($mean_array[$val]) {
                    $i++;
                    if ($i > 1) {
                        //echo '<hr>';
                    }
                    //if($mean_array[$v] != '')
                    echo '<div class="label_font line_height">' . $i . '. ' . $val . ' :: </div><div class="line_height">' . $mean_array[$val] . '</div>';
                }
                if ($i > 15) {
                    break;
                }
            }


            echo '</div>';
        } ?>
		</span>

                                                <!--variants-->

                                                <span>
		<?php if ($data->variants && count($data->variants) > 0) {
            echo '<div class="custom_font2 custom_margin"><strong>Different Forms</strong></div>';

            //echo '<div class="jumbo_details variants">';
            echo implode(', ', $data->variants);
            //echo '</div>';
        }

        // similar
        if ($data->similar && count($data->similar) > 0) {
            echo '<div class="custom_font2 custom_margin"><strong>Similar Words</strong></div>';

            //echo '<div class="jumbo_details similar">';
            echo implode(', ', $data->similar);
            //echo '</div>';
        } ?>

		</span>
                                                <?php } else {
                                                    //show details(word frame)
                                                }
                                            } else {
                                                echo '<span><div class="alert_text">No word meaning found for: ' . $q . '</div><div class="custom_margin3"></div><div class="h_line"></div>';

                                                function clean($string)
                                                {
                                                    $string = str_replace(' ', '-', $string);

                                                    return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
                                                }

                                                $word = clean($q);
                                                $url = $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'];

                                                $web = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');

                                                $sql = "select * from missing_words where word = '" . $word . "'";
                                                $query = mysqli_query($conn, $sql);
                                                $result = mysqli_fetch_assoc($query);

                                                if (empty($result)) {
                                                    $sql = "INSERT INTO missing_words (word,web)
                                                    VALUES ('" . $word .
                                                        "','" . $web . "')";

                                                    if ($conn->query($sql) === TRUE) {

                                                    }
                                                }

                                                $pspell_array = [];

                                                $pspell_array = getSuggestionForWrongWord($q);


                                                if (count($pspell_array) > 0) {
                                                    echo '<div class="custom_font3">Did you mean ' . $pspell_array[0] . '?</div></span>';

                                                    foreach ($pspell_array as $pa) {
                                                        //echo '<span><a href="'.$url.'/english-to-'.$main_array['lang'].'-meaning-'.$pa.'">'.$pa.'</a></span>';
                                                        echo '<span><a href="' . $main_array['baseurl'] . '?q=' . $pa . '">' . $pa . '</a></span>';
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    // show meaning [ends]

                                    ?>



                                            <?php
                                            if ($q) {

// Show movdicts


                                                $movdict_query = mysqli_query($conn, 'select dict_word_list.word, subtitle.end_time, subtitle.text, subtitle.mname, subtitle.mtitle from dict_word_list left join subtitle on dict_word_list.sid=subtitle.id where dict_word_list.word=\'' . $q . '\' order by rand() limit 5');

                                                if (mysqli_num_rows($movdict_query) > 0) {

                                                    echo '<span><div class="custom_font2 custom_margin"><strong>Word Example from TV Shows</strong></div>';

                                                    echo "<p>The best way to learn proper English is to read news report, and watch news on TV. Watching TV shows is a great way to learn casual English, slang words, understand culture reference and humor. If you have already watched these shows then you may recall the words used in the following dialogs.</p>";

                                                    while ($movdict_row = mysqli_fetch_assoc($movdict_query)) {

                                                        $movdict_img_list = $main_array['movssurl'] . $movdict_row['mname'] . '-' . str_replace(',', '.', $movdict_row['end_time']) . '.jpeg';
                                                        $movdict_sub_text = str_replace('\N', '<br />', str_replace($q, '<b>' . strtoupper($q) . '</b>', $movdict_row['text']));
                                                        $movdict_mname = $movdict_row['mtitle']; ?>


                                                        <div class="card">
                                            <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                 data-src="<?= $movdict_img_list. '.webp' ?>"
                                                 onerror="this.onerror=null; this.src='<?= $movdict_img_list ?>'"
                                                 alt="<?= addslashes($movdict_row['text']) ?>"
                                                 title="<?= addslashes($movdict_row['text']) ?>" style="width: 100%;padding-left: 0px;
													padding-top: 0px;border: 0;" loading="lazy">
										<div class="movdict_container">
											<p style='margin-bottom:-30px;'><?= $movdict_sub_text ?></p>
											<h4 style='background: #f8f8f8; padding: 10px 16px; width: 100%;
											position: relative;top: 23px; left: -16px;'><b><?= $movdict_mname?></b></h4>
										</div>
										</div>
                                                        <br>

                                                    <?php      }

                                                    echo "</span>";

                                                }

                                                ?>


                                    <div class="custom_margin2"></div>
                                                <div class="custom_font2">
                                        <strong>English to <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?>
                                            Dictionary: <?= $q ?></strong>
                                    </div>
                                                <p>Meaning and definitions of <?= $q ?>, translation
                                        in <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?>
                                        language for <?= $q ?> with similar and opposite words. Also find spoken
                                        pronunciation of <?= $q ?>
                                        in <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?> and in English
                                        language.</p>

                                                <div class="custom_font2">
                                        <strong>Tags for the entry "<?= $q ?>"</strong>
                                    </div>
                                                <p>What <?= $q ?> means
                                        in <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?>
                                        , <?= $q ?> meaning
                                        in <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?>, <?= $q ?>
                                        definition, examples and pronunciation
                                        of <?= $q ?> in <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?>
                                        language.</p>
                                                <?php
                                            }
                                            ?>

                            </div>
                        </fieldset>


                    </div>
                <?php }
                //   else{
                ?>


                <!--Specific Page Content-->
                <?php

                require_once('index_fixed_content_v5.php');

                ?>

                <?php //} ?>


            </div>

            <?php
            include('right-content_v5.php');
            mysqli_close($conn);
            ?>

        </div>


        <div class="footer_wrapper">
		<span class="align_left">&copy; 2018-<?= date('Y') ?>
		| <a href="<?= base_url() ?>"><strong>English-<?= ucfirst(str_replace("Bengali", "Bangla", $main_array['ulang'])) ?> Dictionary</strong></a>
		| All Rights Reserved by <a href="https://www.bdword.com/"><strong>BD WORD</strong></a> </span>
            <span class="align_right">
            	<a href="<?php echo $base_url; ?>about-us.php">About Us</a>&nbsp;|&nbsp;
                <a href="<?php echo $base_url; ?>privacy.php">Privacy</a>&nbsp;|&nbsp;
                <a href="<?php echo $base_url; ?>disclaimer.php">Disclaimer</a>&nbsp;|&nbsp;
                <a href="<?php echo $base_url; ?>contact-us.php">Contact</a>
        	</span>
        </div>
    </div>
    <script async type="text/javascript" src="js/responsivejs.js"></script>


    <script type="text/javascript">

        function onlyUnique(n,e,i){return i.indexOf(n)===e}

        function calFavs(e,a){var t=[];null!=localStorage.getItem("favs")&&(t=JSON.parse(localStorage.getItem("favs"))),1==a?t.push(e):t.indexOf(e)>=0&&t.splice(t.indexOf(e),1),localStorage.setItem("favs",JSON.stringify(t.filter(onlyUnique))),alert("'"+e+"' has been added to the Favorite List.")}

        function lang(){var i=[];i["test.bdword.com"]="bengali",i["bengali.bdword.com"]="bengali",i["v2.english-telugu.net"]="telugu",i["v2.english-tamil.net"]="tamil",i["v2.english-tamil.net"]="tamil",i["www.bdword.com"]="bengali",i["www.english-gujarati.com"]="gujarati",i["www.english-hindi.net"]="hindi",i["www.english-kannada.com"]="kannada",i["www.english-marathi.net"]="marathi",i["www.english-nepali.com"]="nepali",i["www.english-punjabi.net"]="punjabi",i["www.english-tamil.net"]="tamil",i["www.english-telugu.net"]="telugu",i["www.english-arabic.org"]="arabic",i["www.english-malay.net"]="malay",i["www.english-thai.net"]="thai",i["www.english-welsh.net"]="welsh";var n=location.host.split(".");return"english-dictionary"==n[1]?n[0]:i[location.host]}

        function main_domain(){return location.protocol+"//"+location.host}

        function getUniqueValuesWithCase(e,t){let n=[];return[...new Set(t?e:e.filter(e=>{let t="string"==typeof e?e.toLowerCase():e;if(-1===n.indexOf(t))return n.push(t),e}))]}

        function showAllStorageData(a){var t="";if(t="",null!=(r=JSON.parse(localStorage.getItem(a)))){var r=(r=getUniqueValuesWithCase(r,!1)).filter(function(i){return null!=i});for(i=0;i<r.length&&!(i>9);i++)0!=r[i]&&null!=r[i]&&(t+='<span style="padding:5px 0px; overflow:hidden; display:block;">',t+='<div style="float:left" class="label_font"><a href="'+main_domain()+"/english-to-"+lang()+"-meaning-"+r[i]+'">'+capitalizeFirstLetter(r[i])+"</a></div>",t+="</span>")}return"word_history"==a&&(t+="<div class='clear_fixdiv'></div><button style='margin: 10px 0px 0px 0px;float: right;' class='btn_default4 bdr_radius2 custom_bdr'><a href='word-history.php'>SEE ALL</a></button>"),"favs"==a&&(null!=r?(r.length>10&&(t+="<div class='clear_fixdiv'></div><button style='margin: 10px 0px 0px 0px;float: right;' class='btn_default4 bdr_radius2 custom_bdr'><a href='favourite-words.php'>SEE ALL</a></button>"),0==r.length&&(t+="<div class='clear_fixdiv'>Currently you do not have any favorite word. Please click on the heart icon to add words in your favorite list</div>")):t+="<div class='clear_fixdiv'>Currently you do not have any favorite word. Please click on the heart icon to add words in your favorite list</div>"),"search_history"==a&&(null!=r?(r.length>10&&(t+="<div class='clear_fixdiv'></div><button style='margin: 10px 0px 0px 0px;float: right;' class='btn_default4 bdr_radius2 custom_bdr'><a href='search_history.php'>SEE ALL</a></button>"),0==r.length&&(t+="<div class='clear_fixdiv'>You have no word in search history!</div>")):t+="<div class='clear_fixdiv'>You have no word in search history!</div>"),t}


        // document.getElementById("load_history").innerHTML = showAllStorageData('word_history');
        document.getElementById("load_favourite").innerHTML = showAllStorageData('favs');
        document.getElementById("load_search").innerHTML = showAllStorageData('search_history');

        //Header Nav Collapse JS
        function showHideMenu(){var e=document.getElementById("menu");"block"===e.style.display?e.style.display="none":e.style.display="block"}function capitalizeFirstLetter(e){return e.charAt(0).toUpperCase()+e.slice(1)}

        //Accordion JS
        function showHideAccordion(){var o=document.getElementById("accordion");"block"===o.style.display?o.style.display="none":o.style.display="block"}function showHideAccordion2(){var o=document.getElementById("accordion2");"block"===o.style.display?o.style.display="none":o.style.display="block"}function showHideAccordion3(){var o=document.getElementById("accordion3");"block"===o.style.display?o.style.display="none":o.style.display="block"}function showHideAccordion4(){var o=document.getElementById("accordion4");"block"===o.style.display?o.style.display="none":o.style.display="block"}function showHideAccordion5(){var o=document.getElementById("accordion5");"block"===o.style.display?o.style.display="none":o.style.display="block"}function showHideAccordion6(){var o=document.getElementById("accordion6");"block"===o.style.display?o.style.display="none":o.style.display="block"}function showHideAccordion7(){var o=document.getElementById("accordion7");"block"===o.style.display?o.style.display="none":o.style.display="block"}

        //Show Hide JS
        function show(){document.getElementById("opener").style.display="none",document.getElementById("closer").style.display="inline"}function hide(){document.getElementById("closer").style.display="none",document.getElementById("opener").style.display="inline"}function edValueKeyPress(){var e=document.getElementById("q"),n=e.value;e.value.length<2&&(document.getElementById("myInputautocomplete-list").innerHTML="");e.value.length>2&&load("getEngSug.php?q="+n,n,function(e){var t=document.getElementById("myInputautocomplete-list");t.innerHTML="";var o=JSON.parse(e.responseText);if(void 0===o||0==o.length)load("wrong_word.php?q="+n,n,function(e){var o=JSON.parse(e.responseText);if(void 0===o||0==o.length);else{var l=o.filter((e,n,t)=>t.indexOf(e)===n);for(var i in t.innerHTML="",l)if(l.hasOwnProperty(i)&&l[i].length==n.length){var r=document.createElement("DIV");r.innerHTML=capitalizeFirstLetter(l[i]),r.onclick=function(){document.new_form.q.value=this.innerHTML,redirectUrl()},document.getElementById("myInputautocomplete-list").appendChild(r)}}});else for(var l in o)if(o.hasOwnProperty(l)){var i=document.createElement("DIV");i.innerHTML=capitalizeFirstLetter(o[l]),i.onclick=function(){document.new_form.q.value=this.innerHTML,redirectUrl()},document.getElementById("myInputautocomplete-list").appendChild(i)}})}

        function load(t,e,n){var a,r="q="+e;if("undefined"!=typeof XMLHttpRequest)a=new XMLHttpRequest;else for(var X=["MSXML2.XmlHttp.5.0","MSXML2.XmlHttp.4.0","MSXML2.XmlHttp.3.0","MSXML2.XmlHttp.2.0","Microsoft.XmlHttp"],M=0,f=X.length;M<f;M++)try{a=new ActiveXObject(X[M]);break}catch(t){}a.onreadystatechange=function(){if(a.readyState<4)return;if(200!==a.status)return;4===a.readyState&&n(a)},a.open("POST",t,!0),a.send(r)}

    </script>


</body>

</html>

<script>
    function init() {
        var imgDefer = document.getElementsByTagName('img');
        for (var i = 0; i < imgDefer.length; i++) {
            if (imgDefer[i].getAttribute('data-src')) {
                imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));
            }
        }
    }

    window.onload = init;
</script>

<?php if ($main_array['q'] and $main_array['lang']) {
    $lang = $main_array['lang'];
    $p = strtolower(str_replace(' ', '-', $main_array['q']));
    ?>
    <script>
        var lang =  '<?= $lang ?>';
        var q =  '<?= $p ?>';
        var url1 = 'english-to-' + lang + '-meaning-' + q;
        var new_url = '/' + url1;
        window.history.pushState('data', 'Title', new_url);
    </script>
<?php }?>
