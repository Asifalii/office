<?php

ini_set('memory_limit', '32M');
ini_set('max_execution_time', '0');
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

error_reporting(0);

// echo "<pre>";
// print_r($argv);die;

$cache_lang_array = array(
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
    'www.english-arabic.org' => 'arabic',
    'www.english-malay.net' => 'malay',
    'www.english-nepali.com' => 'nepali',
    'www.english-punjabi.net' => 'punjabi'
);

$cache_lang_array = array_flip($cache_lang_array);

// foreach($cache_lang_array as $langKey=>$row34343243){
// mkdir('./cache_scripts/search_pages/'. $langKey);
// }
// echo "<pre>";
// print_r($cache_lang_array);
// die;



// foreach($cache_lang_array as $langKey=>$row34343243){

    //mkdir('./cache_scripts/search_pages/'. $langKey);
    //$_GET['lang'] = $langKey;

    // echo "<pre>";
    // print_r($argv);
    // die;

    if (!empty($argv[1])) {

        $_GET['lang'] = $argv[1];
        $_GET['q'] = $argv[2];
    
    }
    
    
    $_SERVER['HTTP_HOST'] = $_GET['lang'];
    $_SERVER['HTTP_USER_AGENT'] = 'android';
    $_SERVER['DOCUMENT_URI'] = 'index.php';
    
    $apiurl = 'https://server2.mcqstudy.com/';
    
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    
    if (strpos($user_agent, 'Safari') !== false) {
        $imageFormat = 'jpg';
        $logoFormat = 'png';
    } else {
        $imageFormat = 'webp';
        $logoFormat = 'webp';
    }
    
    
    require_once('connect.php');
    require_once('search-functions.php');
   
    $is_test = false;
    
    if ($_GET['q'] && $_GET['lang']) {
    
        $is_test = false;
        $_GET['q'] = str_replace('-', ' ', $_GET['q']);
        $main_loop_query = mysqli_query($conn, 'select word from y_' . $_GET['lang'] . '_master where word="' . $_GET['q'] . '" limit 1');
        
    } else {
        $main_loop_query = mysqli_query($conn, 'select word from y_' . $_GET['lang'] . '_master');
    }
    
    while ($main_loop_row = mysqli_fetch_assoc($main_loop_query)) {
       
        // main loop starts
            $_GET['q'] = strtolower($main_loop_row['word']);
    
            $main_array = array();
    
            $main_array['baurl'] = 'https://server2.mcqstudy.com/ba2/';
            $main_array['movssurl'] = 'https://server2.mcqstudy.com/ss/';
            $contentUrl = 'https://server2.mcqstudy.com/bw-static-files/';
    
    
            $main_array['q'] = str_replace('+', '', strtolower(trim(str_replace(array('+', '-'), ' ', mysqli_real_escape_string($conn, $_GET['q'])))));
    
    
            $main_array['ismobile'] = isMobile();
    
    
            $main_array['lang'] = $_GET['lang'];
            $main_array['url'] = 'https://' . array_search($_GET['lang'], getLanguageArray());
            $main_array['baseurl'] = $main_array['url'] . '/';
    
            $main_array['ulang'] = ucfirst($main_array['lang']);
            $main_array['scriptname'] = getScriptName();
            $main_array['title'] = getTitle($main_array['q'], $main_array['url'], $main_array['scriptname'], $main_array['lang'], $main_array['ulang']);
            $main_array['metadescription'] = getMetaDescription($main_array['lang'], $main_array['ulang'], $main_array['q']);
            $main_array['analyticsid'] = getAnalyticsId(array_search($_GET['lang'], getLanguageArray()));
            $main_array['keyword'] = getKeyword($main_array['lang']);
            //echo "<pre>";
            //var_dump($main_array['keyword']);
    
            $main_array['canonicallink'] = getCanonicalLink($conn, $main_array['scriptname'], $main_array['lang'], $main_array['baseurl'], $main_array['q']);
            $main_array['googlesiteverify'] = getGoogleSiteVerify($main_array['lang']);
            $main_array['iswordbanned'] = getWordBannedStatus($conn, $main_array['q']);
            $main_array['alladcodes'] = getAllAdCodes($main_array['ismobile'], $main_array['iswordbanned'], $main_array['scriptname'], $main_array['lang']);
            $main_array['autoad'] = getAutoAd($main_array['iswordbanned']);
            $main_array['logotext'] = getLogoText($main_array['lang'], $main_array['ulang']);
            $main_array['devicename'] = getDevice();
            $main_array['jumbodownloadbox'] = getJumboDownloadBox($main_array['lang'], $main_array['devicename'], $main_array['baseurl']);
            $main_array['honetitle'] = getHOneTitle($main_array['q'], $main_array['ulang']);
    
            $main_array['sidebarappdetails'] = getSidebarAppDetails($conn, $main_array['lang']);
            
            if ($main_array['lang'] == 'bengali') {
                $androidLink = "https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary";
            } else {
                $androidLink = "https://play.google.com/store/apps/details?id=com.bdword.e2" . $main_array['lang'] . "dictionary";
            }
    
            $big_html = '';
    
    
            $big_html .= "
        <!doctype html>
        <html>
        <style>
            @media screen and (max-width:1920px){#mobile_banner_div{display:none}#warning_div{margin-left:-12px}}
    
            @media screen and (max-width:906px){#mobile_banner_div{display:block}#warning_div{margin-left:-2px}.logo_div{width:75%!important}}
    
            .header_logo a,.header_nav_collapse,.header_wrapper .header_logo{width:auto!important}
    
            .logo_div{width:94%;display:flex}
    
            @font-face{font-family:Roboto;font-style:normal;font-weight:400;src:local('Roboto'),local('Roboto'),url(https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap) format('woff2');font-display:swap}
    
            h1{margin:0;padding:0;font-size:1.2rem;font-weight:500; word-break: initial;}
    
            h2{margin:0;padding:0;font-size:1.2rem;font-weight:500;}
    
            .box_wrapper{word-break: break-all;}
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
    
            .btn_default,.btn_default2{font-weight:700;color:#fff;border:none;cursor:pointer}.btn_default3,.btn_default4,.btn_default5{color:#333;border:1px solid #ddd;cursor:pointer}.align_left{float:left}.align_right{float:right}.btn_default{margin-right:3px;padding:10px 15px;text-transform:uppercase}.btn_default2,.btn_default3{padding:14px 15px;text-align:left;width:100%;text-transform:uppercase}.btn_default:hover,.btn_default_active{background-color:#00aa9a}.btn_default2{margin-bottom:15px;font-size:.95rem;background-color:#043a54;-webkit-box-shadow:0 1px 4px 0 rgba(0,0,0,.35);-moz-box-shadow:0 1px 4px 0 rgba(0,0,0,.35);box-shadow:0 1px 4px 0 rgba(0,0,0,.35)}.btn_default2 img{margin:0 5px 0 0;vertical-align:middle}.btn_default2:hover{background-color:#00aa9a}.btn_default3{margin-bottom:15px;font-size:1rem;font-weight:900;background-image:url(https://server2.mcqstudy.com/bw-static-files/img/bg28.png);background-repeat:repeat;-webkit-box-shadow:0 1px 1px 0 rgba(0,0,0,.25);-moz-box-shadow:0 1px 1px 0 rgba(0,0,0,.25);box-shadow:0 1px 1px 0 rgba(0,0,0,.25)}.btn_default4,.btn_default5{padding:10px;font-size:.75rem;font-weight:700}.btn_default3 img{margin:-3px 5px 0 0;vertical-align:middle}.btn_default3:hover{background-image:url(https://server2.mcqstudy.com/bw-static-files/img/bg28-hover.png);background-repeat:repeat}.btn_default4{margin:6px 3px;background-color:#fff}.btn_default4:hover{background-color:#fafafa}.btn_default5{margin:10px 0 10px 10px;width:97%;background-color:#fff;text-align:center;text-transform:uppercase}.btn_default5:hover{background-color:#fafafa}
    
            #site_wrapper{width:100%;height:auto;overflow:hidden}.content_wrapper{margin:0 auto;max-width:100%;width:1140px;height:auto;position:relative}.left_content{width:65%;float:left}.right_content{width:34%;float:right}.box_wrapper{margin:4px auto 16px;width:99%;height:auto;background-color:#fff;-webkit-box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-box-shadow:0 0 4px 0 rgba(0,0,0,.25);box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper fieldset{margin:15px 15px 20px;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper fieldset legend{margin-left:10px;font-size:1.22rem;font-weight:500}.box_wrapper fieldset .fieldset_body{padding:20px 13px;overflow:hidden}.box_wrapper fieldset .fieldset_body span{float:left}
    
            .search_fld{width:83.5%;position:relative;top:10px;left:15px;right:0;float:left}.search_fld input[type=text]{position:relative;z-index:1;width:100%;padding:10px;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-moz-box-shadow:inset 0 0 5px #ccc;-webkit-box-shadow:inset 0 0 5px #ccc;box-shadow:inset 0 0 5px #ccc;text-transform:capitalize;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.search_fld input[type=text]:focus{border:1px solid #bbb}.search_btn{padding:19px;width:22px;height:22px;position:absolute;top:1px;right:0;z-index:2;background-color:transparent;background-image:url(https://server2.mcqstudy.com/bw-static-files/img/search_icon.png);background-position:center center;border-left:1px solid #666;border-right:0;border-top:0;border-bottom:0;background-repeat:no-repeat;cursor:pointer;opacity:.35;transition:opacity .5s ease-out;-moz-transition:opacity .5s ease-out;-webkit-transition:opacity .5s ease-out;-o-transition:opacity .5s ease-out}.footer_wrapper{display:block;clear:both}.footer_wrapper,.topic_link a:first-child{border-top:1px solid #ddd}.footer_wrapper,.topic_link a{border-bottom:1px solid #ddd;overflow:hidden}.search_btn:hover{opacity:.75}.topic_link{margin:0;padding:0}.topic_link a{margin-left:3px;padding:12px 0;width:100%;color:#333;line-height:25px;display:block}.topic_link a:hover{background-color:#fafafa}.topic_link span{line-height:25px}.topic_link span img{margin-right:5px;vertical-align:middle}.box_wrapper2{margin:4px auto 17px;width:99%;height:auto;background-color:#fff;-webkit-box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-box-shadow:0 0 4px 0 rgba(0,0,0,.25);box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper2 fieldset{margin:0 0 20px;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper2 fieldset legend{margin-left:10px;font-size:1.08rem;font-weight:500}.box_wrapper2 fieldset .fieldset_body{padding:13px;overflow:hidden}
    
            .footer_wrapper{margin:0 auto 5px;padding:0 4px;max-width:100%;width:1124px}.footer_wrapper span{font-size:.75rem;color:#555;line-height:50px;display:block}.footer_wrapper span a{color:#333}.footer_wrapper span a:hover{color:#00aa9a}button a{color:#333;display:block}button a:hover{color:#009385;text-decoration:none!important}button a span{color:#fff}button a label{color:#333;line-height:30px}.custom_bdr{border:1px solid #aaa}.responsive_img{width:100%;max-width:100%;height:auto}.header_wrapper{position:relative;top:0;width:100%;height:auto;background-color:#043a54;overflow:hidden}.header_logo a,.header_wrapper .header_logo{padding-left:2px;color:#fff;font-size:1.5rem;font-weight:900;line-height:60px;float:left;width:10.5%}.header_wrapper .header_nav{padding-right:2px;float:right}.header_wrapper .header_nav ul{margin:0;padding:0}.header_wrapper .header_nav ul li{margin:0;padding:0;list-style-type:none;display:inline;float:left}.header_wrapper .header_nav ul li a{padding:0 15px;color:#fff;font-size:.95rem;font-weight:700;line-height:58px;text-transform:uppercase;text-align:center;border:1px solid #043a54;border-right:none;float:left}.header_wrapper .header_nav ul li a:hover{color:#fff;background-color:#00aa9a;border:1px solid #043a54;border-right:none}.header_wrapper .header_nav ul li a.active{background-color:#00aa9a}.header_nav_collapse{width:100%;display:inline-block;float:left}.header_nav_collapse ul{margin-top:3px;padding:0;width:100%;list-style:none;display:none;margin-bottom:10px}.header_nav_collapse ul li{width:100%;height:auto;position:relative;top:-3px;z-index:3;transition:all .5s;opacity:1;display:inline-block;color:#fff;border-bottom:1px solid #084a6a;background-color:#043a54;text-indent:15px}.header_nav_collapse ul li:hover{background:#00aa9a}.header_nav_collapse ul li a{padding:15px 0;color:#fff;text-decoration:none;display:block}.header_nav_collapse ul li:last-child{border-bottom:none;-webkit-border-bottom-left-radius:4px;-webkit-border-bottom-right-radius:4px;-moz-border-radius-bottomleft:4px;-moz-border-radius-bottomright:4px;border-bottom-left-radius:4px;border-bottom-right-radius:4px}.header_nav_collapse label{position:absolute;top:10px;right:0;padding:11px 9px 7px 9px;display:inline-block;border:2px solid #00a091;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px;cursor:pointer}.header_nav_collapse label:before{width:20px;height:2px;background:#fff;display:inline-block;content:'';box-shadow:0 -6px 0 0 #fff,0 -12px 0 0 #fff;transition:all .5s;opacity:1}
    
            /*Auto Suggest CSS*/
            .autocomplete{position:relative;display:inline-block}.autocomplete-items{position:relative;border:1px solid #ddd;border-bottom:none;border-top:none;z-index:99;top:0;left:0;right:0}.autocomplete-items div{padding:8px 10px;cursor:pointer;background-color:#fff;border-bottom:1px solid #ddd}.autocomplete-items div:hover{background-color:#fafafa}.autocomplete-items:last-child{-webkit-border-bottom-left-radius:3px;-moz-border-radius-bottomleft:3px;border-bottom-left-radius:3px;-webkit-border-bottom-right-radius:3px;-moz-border-radius-bottomright:3px;border-bottom-right-radius:3px;margin-bottom:20px}.btn_default6,h6{font-weight:700;clear:both}h6{margin:0;padding:10px 0;font-family:Roboto,sans-serif;font-size:1.15rem;color:#333;border-top:1px solid #ddd;border-bottom:1px solid #ddd}.top_margin2{margin-top:45px}.custom_font3{font-size:1.12rem;color:#009385;line-height:24px}.clear_fixdiv{margin:0;padding:0;display:block;clear:both}.btn_default6{margin-top:10px;padding:12px 24px;width:auto;font-size:.75rem;color:#fff;background-color:#043a54;text-align:center;text-transform:uppercase;border:1px solid #043045;cursor:pointer;float:right}.btn_default6:hover{background-color:#00aa9a;border:1px solid #009a8b}.box_wrapper fieldset .fieldset_body textarea{position:relative;z-index:1;width:97%;margin:0;padding:10px;font-family:Roboto,sans-serif;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-top-left-radius:3px;-moz-border-radius-topleft:3px;border-top-left-radius:3px;-webkit-border-top-right-radius:3px;-moz-border-radius-topright:3px;border-top-right-radius:3px;-webkit-border-bottom-right-radius:3px;-moz-border-radius-bottomright:3px;border-bottom-right-radius:3px;-moz-box-shadow:inset 0 0 5px #ccc;-webkit-box-shadow:inset 0 0 5px #ccc;box-shadow:inset 0 0 5px #ccc;display:block}.box_wrapper fieldset .fieldset_body textarea:focus{border:1px solid #bbb;outline:0}.gif_img{width:100%;min-width:100%;height:auto;border:2px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.text_color{color:#fff}.pagination{margin:0 15px 25px 0;display:inline-block;float:right;clear:both}.pagination a{margin-left:3px;color:#333;float:left;padding:5px 10px;text-decoration:none;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.pagination a.active{background-color:#009385;color:#fff;border:1px solid #01877a}.pagination a:hover:not(.active){background-color:#fafafa;border:1px solid #ddd}.pagination{margin:0 15px 25px 0;display:inline-block;float:right;clear:both}.pagination a{margin-left:3px;color:#333;float:left;padding:5px 10px;text-decoration:none;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.pagination a.active{background-color:#009385;color:#fff;border:1px solid #01877a}.pagination a:hover:not(.active){background-color:#fafafa;border:1px solid #ddd}.btn_active{background-color:#fafafa}.inner_details{line-height:22px}.inner_details span{width:100%;padding:15px 0;border-bottom:1px solid #eaeaea;clear:both}.inner_details label{font-weight:500;color:#009385;text-transform:capitalize}.inner_details span:first-child{padding-top:0}.inner_details a{color:#333;text-decoration:none}.inner_details a:hover{color:#009385;text-decoration:underline;cursor:pointer}.inner_details .label_font{margin-right:5px;font-weight:500;color:#009385;float:left}.img_align{display:inline-flex;line-height:28px}.img_align img{margin:0 8px}.align_text{font-weight:500;line-height:28px;float:left}.align_text2{margin:0 8px;color:#333;line-height:28px;float:left}.line_height{line-height:35px}.float_left{float:left}.float_div{width:50%;float:left}.custom_margin{margin-bottom:8px}

            .custom_margin2{margin-bottom:20px;clear:both}.custom_margin3{margin-top:8px!important;float:left;clear:both}.accordion_collapse{overflow:hidden;clear:both}.accordion_collapse h4{margin:0;padding:8px;border:1px solid #eaeaea;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px;background-color:#fafafa;outline:0;cursor:pointer}.custom-accordion-content{padding:15px 8px;display:block}.icon_right{font-size:.8rem;color:#009385!important;float:right}.dic_img img{width:340px;height:auto;padding:15px 10px 10px 10px;border:1px dashed #ddd}.h_line{margin:0 0 15px 0;border-top:1px solid #eaeaea;clear:both}.h_line2{margin:15px 0 15px 0;border-top:1px solid #eaeaea;clear:both}.alert_text{color:#e90505}.success_text{color:#009d2c}.contact{margin:0;padding:0;display:block;overflow:hidden}.contact p{margin:0;padding:0}.contact input[type=text]{margin-bottom:12px;width:100%;padding:10px;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-moz-box-shadow:inset 0 0 3px #ccc;-webkit-box-shadow:inset 0 0 3px #ccc;box-shadow:inset 0 0 3px #ccc;text-transform:capitalize;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.contact input[type=text]:focus{border:1px solid #bbb}.contact textarea{margin-bottom:12px!important;width:100%!important;padding:10px;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-moz-box-shadow:inset 0 0 3px #ccc!important;-webkit-box-shadow:inset 0 0 3px #ccc!important;box-shadow:inset 0 0 3px #ccc!important;text-transform:capitalize;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.contact textarea:focus{border:1px solid #bbb}.custom_font4{color:#333;font-size:1.12rem;font-weight:500}::-webkit-input-placeholder{text-transform:none}::-moz-placeholder{text-transform:none}:-ms-input-placeholder{text-transform:none}:-moz-placeholder{text-transform:none}.cursor_link{cursor:pointer}.btn_pre{background-color:#009385;border:1px solid #01877a;float:left}.btn_pre:hover{background-color:#fff;border:1px solid #ddd}.btn_next{background-color:#009385;border:1px solid #01877a;float:right}.btn_next:hover{background-color:#fff;border:1px solid #ddd}.btn_next a,.btn_pre a{padding:8px 12px;color:#fff;font-size:.925rem;font-weight:700;text-decoration:none}.btn_next a:hover,.btn_pre a:hover{text-decoration:none}.desc_text p{margin:0;padding:0;clear:both}.desc_text a{color:#009385}.texture_btn{background-image:url(https://server2.mcqstudy.com/bw-static-files/img/bg28.png);background-repeat:repeat}.btn_bdrcolor1{border-color:#bcc4c8}.btn_bdrcolor2{border-color:#ffc2af}.btn_bdrcolor3{border-color:#49d5c8}.btn_activebg{background-image:url(https://server2.mcqstudy.com/bw-static-files/img/bg28-hover.png);background-repeat:repeat}.words_category{margin-bottom:10px;overflow:hidden;clear:both}.words_category:last-child{margin-bottom:0}.words_category h5{margin:0;padding:5px;font-size:1rem;font-weight:700;color:#009385}.words_category h5 img{vertical-align:middle}.words_category label{margin:0;padding:10px 10px 10px 10px;color:#333;background-color:#f8f8f8;cursor:pointer;display:block}.words_category .category_cards{margin:0}.words_category .category_cards a{width:49.35%;padding:10px;border:1px solid #ddd;border-bottom:5px solid #ededed;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;box-sizing:border-box;float:left;overflow:hidden}.category_cards a:hover{border:1px solid #ccc;border-bottom:5px solid #ccc}.words_category .category_cards:nth-child(even) a{float:right}.custom_color3{color:#043a54!important}.custom_color4{color:#ff8a00!important}.custom_color5{color:#0096ff!important}.custom_dbstyle{margin:0}.custom_dbstyle ol,.custom_dbstyle span{line-height:normal!important;clear:both!important}.custom_dbstyle ol,.custom_dbstyle p,.custom_dbstyle span{padding:0;font-family:Roboto,sans-serif!important;font-size:.95rem!important;color:#333!important}.custom_dbstyle{margin:0}.custom_dbstyle p{margin:0 0 15px!important}.custom_dbstyle ol{margin:0 15px 15px!important}.custom_dbstyle ol li{margin:0;padding:0}.custom_dbstyle span{margin:0 0 15px!important}.jumbotron h2{display:none}.custom_dbstyle table{width:94%!important;margin:0 0 5px!important;table-layout:auto!important;border:0!important;font-weight:500!important}.custom_dbstyle table td{padding:5px!important}.custom_dbstyle ul{margin:0!important;padding:0!important;overflow:hidden!important}.custom_dbstyle ul li{margin:0!important;padding:0!important;list-style-type:none!important}
    
            /*CSS by Sajjad*/
            .icon_button{border:0;background-color:transparent;padding:0;margin:0}.modal-header{border-bottom:1px solid #e5e5e5}.modal-header .close{position:absolute;right:12px;top:12px}.modal-title{margin:15px 0 0}@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto}}.modal-content{padding:10px}.modal-content .modal-header{border-bottom:none}.modal-content .modal-body{padding:0 8px}.modal-content .modal-footer{border-top:none;padding:7px}.modal-content .modal-footer button{margin:0;width:auto;position:relative;right:2px;bottom:0}.modal-content .modal-body+.modal-footer{padding-top:0}.modal,.modal-open{overflow:hidden}.modal,.modal-backdrop{top:0;right:0;bottom:0;left:0}.modal{display:none;position:fixed;z-index:1050;-webkit-overflow-scrolling:touch;outline:0}.modal.fade .modal-dialog{-webkit-transform:translate(0,-25%);-ms-transform:translate(0,-25%);-o-transform:translate(0,-25%);transform:translate(0,-25%);-webkit-transition:-webkit-transform .3s ease-out;-o-transition:-o-transform .3s ease-out;transition:transform .3s ease-out}.modal.in .modal-dialog{-webkit-transform:translate(0,0);-ms-transform:translate(0,0);-o-transform:translate(0,0);transform:translate(0,0)}.modal-open .modal{overflow-x:hidden;overflow-y:auto}.modal-dialog{position:relative;width:auto;margin:10px}.modal-content{position:relative;background-color:#fff;border:1px solid #999;border:1px solid rgba(0,0,0,.2);border-radius:6px;-webkit-box-shadow:0 3px 9px rgba(0,0,0,.5);box-shadow:0 3px 9px rgba(0,0,0,.5);-webkit-background-clip:padding-box;background-clip:padding-box;outline:0}.modal-backdrop{position:fixed;z-index:1040;background-color:#000}.modal-backdrop.fade{opacity:0}.modal-backdrop.in{opacity:.5}.modal-header{padding:10px}.modal-header button{border:0;background-color:transparent;font-size:30px}.modal-body{position:relative}.modal-footer{padding:15px;text-align:right;border-top:1px solid #e5e5e5}.modal-footer .btn+.btn{margin-left:5px;margin-bottom:0}.modal-footer .btn-group .btn+.btn{margin-left:-1px}.modal-footer .btn-block+.btn-block{margin-left:0}.modal-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto}.modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5)}.modal-sm{width:300px}}
    
            @media (min-width:992px){.modal-lg{width:900px}}@media only screen and (max-width:1024px){#site_wrapper{margin:0 auto;width:95%;padding:10px 0}.small_viewport_mergin{margin-left:28px;float:none;clear:both}.footer_wrapper{width:99%}.box_wrapper fieldset{margin:20px 0;border:0}.box_wrapper2 fieldset{padding:0;border:0}.box_wrapper2 fieldset .fieldset_body{padding:3px}.box_wrapper2 fieldset legend{margin-left:0}.header_wrapper{-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.header_logo a,.header_wrapper .header_logo{padding-left:7px}.header_nav_collapse label{right:15px}.header_nav_collapse ul{margin-top:0}.search_fld{margin:0;width:91%;left:14px}.header_wrapper{padding-bottom:20px}.header_wrapper .header_logo{display:none}.mobile_logo{display:block!important}.header_nav_collapse ul{margin-top:15px}.header_nav_collapse ul li:last-child{margin-bottom:-15px}.autocomplete-items:last-child{margin-bottom:5px}}@media only screen and (max-width:1023px){.gallery_meaning .div_panel{margin:5px 0;width:100%}}@media only screen and (max-width:854px){.search_fld{margin:0;width:89%;left:14px}.dic_img img{width:75%;height:auto}}
    
            @media only screen and (max-width:800px){.box_wrapper fieldset .fieldset_body textarea,.btn_default5{width:95%}}@media only screen and (max-width:768px){.box_wrapper fieldset .fieldset_body textarea{width:95%}.dic_img img{padding:0;width:100%;height:auto;border:0}.search_fld{width:89%}}@media only screen and (max-width:667px){.search_fld{margin:0;width:87%;left:14px}}@media only screen and (max-width:640px){.header_nav{display:none}.header_nav_collapse{display:inline}.header_nav_collapse ul li{width:100%}#menu{display:none}.btn_default3 img{width:30px;height:30px}.small_viewport_mergin{float:left}.btn_default5{width:94%}.search_fld{margin:0;width:87%;left:14px}.dic_img img{padding:0;width:100%;height:auto;border:0}}@media only screen and (max-width:600px){.box_wrapper fieldset .fieldset_body textarea{width:93%}.float_div{width:100%}.search_fld{margin:0;width:85%;left:14px}.dic_img img{padding:0;width:100%;height:auto;border:0}}
    
            @media only screen and (max-width:480px){.header_nav{display:none}.header_nav_collapse{display:inline}#menu{display:none}.left_content{width:100%;float:none;display:block}.box_wrapper fieldset legend{margin-left:0;font-size:1.16rem}.box_wrapper fieldset .fieldset_body{padding:10px 3px}.btn_default4{margin:3px;padding:8px}.btn_default5{width:98%;margin:20px 3px 10px 5px;padding:8px}.topic_link a{padding:10px 0}.small_viewport_mergin{margin-left:28px;float:left}.right_content{width:100%;float:none;display:block}.btn_default2{padding:10px}.btn_default3{padding:10px;font-size:.93rem}.btn_default3 img{width:30px;height:30px}.footer_wrapper{padding:8px 4px}.footer_wrapper span{float:none;line-height:25px}.search_fld{margin:0;width:82%;left:14px}.dic_img img{padding:0;width:100%;height:auto;border:0}.words_category{margin-bottom:0}.words_category .category_cards a{margin-bottom:10px;width:100%}}@media only screen and (max-width:414px){.box_wrapper fieldset .fieldset_body textarea{width:93%}.btn_default5{width:97%}.search_fld{margin:0;width:79%;left:14px}}@media only screen and (max-width:375px){.box_wrapper fieldset .fieldset_body textarea{width:92%}.dic_img img{padding:0;width:100%;height:auto;border:0}.search_fld{width:77%}}
    
            @media only screen and (max-width:320px){.btn_default5{width:96%}.search_fld{margin:0;width:74%;left:14px}}.icon-android{background-repeat:no-repeat;display:inline-block;background-image:url(https://server2.mcqstudy.com/bw-static-files/imgs/android-icon.png);background-position:0 0;width:30px;height:30px}.icon-ios{background-repeat:no-repeat;display:inline-block;background-image:url(https://server2.mcqstudy.com/bw-static-files/imgs/ios-icon.png);background-position:0 0;width:30px;height:30px}.icon-chrome{background-repeat:no-repeat;display:inline-block;background-image:url(https://server2.mcqstudy.com/bw-static-files/imgs/chrome-icon.png);background-position:0 0;width:30px;height:30px}.left_padding{padding-left:10px}.card{box-shadow:0 4px 8px 0 rgba(0,0,0,.2);transition:.3s;width:100%}.card:hover{box-shadow:0 8px 16px 0 rgba(0,0,0,.2)}.movdict_container{padding:2px 16px}
    
        </style>
    
        <head>
            <meta charset='utf-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta name='google-site-verification' content='" . $main_array['googlesiteverify'] . "'/>
            <title>" . str_replace('Bengali', 'Bangla', $main_array['title']) . "</title>
            <meta name='keyword' content='" . str_replace('bengali', 'bangla', $main_array['keyword']) . "'>
            <meta name='description' content='" . str_replace('Bengali', 'Bangla', $main_array['metadescription']) . "'>
            <link rel='canonical' href='" . str_replace('Bengali', 'Bangla', $main_array['canonicallink']) . "'/>
            <meta name='viewport' content='width=device-width,minimum-scale=1,initial-scale=1'>
            <meta property='og:locale' content='en_US'/>
            <meta property='og:type' content='website'/>
            <meta property='og:title' content='English ::" . str_replace('Bengali', 'Bangla', $main_array['ulang']) . " Online Dictionary'/>
            <meta property='og:description' content='English to " . str_replace('Bengali', 'Bangla', $main_array['ulang']) . " Dictionary (Free). You can get meaning of any English word very easily. It has auto-suggestion feature which will save you a lot of time getting any meaning. We have a Chrome Extension and an Android App'/>
            <meta property='og:url' content='" . $main_array['url'] . "'/>
            <meta property='og:site_name' content='English :: " . str_replace('Bengali', 'Bangla', $main_array['ulang']) . " Online Dictionary'/>
            <meta http-equiv='Cache-Control' content='no-cache, no-store, must-revalidate'>
            <meta http-equiv='Pragma' content='no-cache'>
            <meta http-equiv='Expires' content='0'>
            <link rel='shortcut icon' href='" . $contentUrl . "img/favicon.png'>
            <script>
    
                function show_history(){document.getElementById('q').value='';var e=JSON.parse(localStorage.getItem('search_history'));if(Object.keys(e).forEach(t=>!e[t]&&void 0!==e[t]&&delete e[t]),e.reverse(),e.length>0){var t=document.getElementById('myInputautocomplete-list');for(var n in t.innerHTML='',e)if(e.hasOwnProperty(n)){if(n>4)break;var o=document.createElement('DIV');o.innerHTML=e[n],o.onclick=function(){document.new_form.q.value=this.innerHTML,redirectUrl()},document.getElementById('myInputautocomplete-list').appendChild(o)}}if(e.length>5){document.getElementById('myInputautocomplete-list');t.innerHTML1='';var r=document.createElement('DIV');
                    r.innerHTML='<a href=\'" . $main_array['baseurl'] . "english-to-" . $main_array['lang'] . "-dictionary-search-history\' style=\'display: block\'> See More...</a>',document.getElementById('myInputautocomplete-list').appendChild(r)}}function onlyUnique1(e,t,n){return n.indexOf(e)===t}
                function redirectUrl(){
                    t = [];
                    var word = document.getElementById('q').value;
                    null != localStorage.getItem('search_history') && (t = JSON.parse(localStorage.getItem('search_history'))), t.indexOf(word) !== -1 && t.splice(t.indexOf(word), 1), t.push(word), localStorage.setItem('search_history', JSON.stringify(t.filter(onlyUnique1)));
                    var redirect_url = main_domain() + '/english-to-' + lang() + '-meaning-' + word.replace(/\s+/g, '-').toLowerCase();
                    window.location.href = redirect_url;
                    return false;
                }
            </script>";
    
            // echo $big_html;
    
            // $big_html .= $main_array['alladcodes']['auto'];
    
    
            $big_html .= "
            
        </head>
        <body>
    
        <script>function textToSpeech(e){speechSynthesis.speak(new SpeechSynthesisUtterance(e))}document.onclick=function(e){'q'!=e.target.id&&(document.getElementById('myInputautocomplete-list').innerHTML='')};</script>";
    
            if (!empty($androidLink)) {
                $big_html .= "
            <div class='android_banner' id='mobile_banner_div' style='position: fixed; bottom:-15px;margin-left:0px; z-index: 9999999999; width: 100%;'>
            <button class='btn_default2 bdr_radius2' style='text-align: center;'>
                <a href='" . $androidLink . "' target='_blank'>
                    <img src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src='" . $contentUrl . "img/android-icon.png' alt='icon' width='30px' height='30px' style='position:absolute;' loading='lazy'>
                    <span style='padding-left:35px;'>Go To Android App</span>
                </a>
            </button>
            </div>
            ";
            }
    
        // echo $big_html;
    
    
            $big_html .= "<div id='site_wrapper'>
            <div class='header_wrapper'>";
    
            $url = $contentUrl . "site_logo/" . $main_array['lang'] . ".webp";
            $langLogo = $contentUrl . "site_logo/" . $main_array['lang'] . ".png";
    
            if (strpos($main_array['baseurl'], 'dictionary')) {
                $mobile = $contentUrl . "mobile_logo/dictionary.webp";
                $mobileLangLogo = $contentUrl . "mobile_logo/dictionary.png";
            } else {
                $mobile = $contentUrl . "mobile_logo/" . $main_array['lang'] . "";
                $mobileLangLogo = $contentUrl . "mobile_logo/" . $main_array['lang'] . ".png";;
            }
    
    
            $big_html .= "<div class='content_wrapper'>";
    
            $big_html .= "<div class='logo_div'>
                            <div class='header_logo'>
                                <a href='" . $main_array['baseurl'] . "'>";
                                
            $big_html .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
                data-src="' . $url . '"
                onerror="this.onerror=null; this.src=';
                $big_html .= "'" . $langLogo . "'";
                $big_html .= '" 
                alt="'.strtoupper($main_array['logotext']) .'"
                title="'.strtoupper($main_array['logotext']) .'"
                style="margin-bottom: -15px;"
                height="55px" loading="lazy">';
                            
            $big_html .= "</a>
                            </div>
    
                            <div class='mobile_logo' style='display: none'>
                                <a href='" . $main_array['baseurl'] . "'><img src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src='" . $mobile . "' onerror=\"this.onerror=null; this.src='" . $mobileLangLogo . "'\" alt='" . strtoupper($main_array['logotext']) . "' height='55px' style='margin-bottom: -15px;padding-left: 5px;padding-top: 5px;' loading='lazy'></a>
                            </div>
    
                            <div class='search_fld' style='width: 100%;'>
                                <form autocomplete='off' name='new_form' action='#' id='new_form'>
                                    <input type='text' id='q' name='q' value=\"" . stripslashes($main_array['q']) . "\" onfocus='show_history()' autocomplete='off' required placeholder='Translate word' onKeyPress='edValueKeyPress()' onKeyUp='edValueKeyPress()'/>
                                    <button type='submit' class='search_btn' onclick='return redirectUrl();'></button>
    
                                    <div id='myInputautocomplete-list' class='autocomplete-items'>
    
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div style='width: 100%;'>
                            <div class='header_nav_collapse'>
                                <label onclick='showHideMenu()'></label>
                                <ul id='menu'>
                                    <li>
                                        <a href='" . $main_array['baseurl'] . "'>Home</a>
                                    </li>
                                    <li>
                                        <a href='" . $main_array['baseurl'] . "english-to-" . $main_array['lang'] . "-read-text-with-translation'>Read Text</a>
                                    </li>
                                    <li>
                                        <a href='" . $main_array['baseurl'] . "english-to-" . $main_array['lang'] . "-dictionary-vocabulary-game'>Vocabulary Games</a>
                                    </li>
                                    <li>
                                        <a href='" . $main_array['baseurl'] . "english-to-" . $main_array['lang'] . "-dictionary-learn-ten-words-everyday'>Words Everyday</a>
                                    </li>
                                    <li>
                                        <a href='" . $main_array['baseurl'] . "" . $main_array['lang'] . "-to-english-dictionary'
                                        title='" . str_replace('Bengali', 'Bangla', $main_array['ulang']) . " to English Dictionary'>" . str_replace('Bengali', 'Bangla', $main_array['ulang']) . " to English Dictionary</a>
                                    </li>
                                    
                                    <li>
                                        <a href='" . $main_array['baseurl'] . "english-to-" . $main_array['lang'] . "-dictionary-favourite-words' title='Browse Favorite Words'>Favorite Words</a>
                                    </li>
                                    <li>
                                        <a href='" . $main_array['baseurl'] . "english-to-" . $main_array['lang'] . "-dictionary-search-history' title='Browse Word Search History'>Word Search History</a>
                                    </li>
                                    <li>
                                        <a href='" . $main_array['baseurl'] . "english-to-" . $main_array['lang'] . "-dictionary-browse-all-blogs' title='Blogs List'>Blogs</a>
                                    </li>
                                    <li>
                                        <a href='" . $main_array['baseurl'] . "english-to-" . $main_array['lang'] . "-dictionary-contact-us'>Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class='content_wrapper top_margin'>
                    <div class='left_content'>";
    
            $big_html .= $main_array['alladcodes']['300'];
    
            if ($main_array['q'] and $main_array['lang']) {
    
                $q = $main_array['q'];
    
    
                $big_html .= "       <div class='box_wrapper'>
    
                                <fieldset>
                                    " . str_replace('Bengali', 'Bangla', stripslashes($main_array['honetitle'])) . "
    
                                    <div class='fieldset_body inner_details' style='font-size: initial'>";
                $y_bengali_master_query = "";
                if ($main_array['lang'] == 'bengali') {
                    $y_bengali_master_query = "select details, mean, nex, prev, height, width from y_" . $main_array['lang'] . "_master where word='" . $q . "' limit 1";
                } else {
                    $y_bengali_master_query = "select details, mean, nex, prev from y_" . $main_array['lang'] . "_master where word='" . $q . "' limit 1";
                }
    

                $y_bengali = mysqli_fetch_assoc(mysqli_query($conn, $y_bengali_master_query));
    
                $y_bengali_details = json_decode($y_bengali['details'], true);
                $sql = 'select word, ' . $main_array['lang'] . ', id, data, synonym2 from v3_word_frame where word=\'' . $q . '\' limit 1';
                

    
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($query);
    
                $id = $row['id'];
                $data = json_decode($row['data']);
                $mean = json_decode($row[$main_array['lang']]);
                $nex = $y_bengali['nex'];
                $prev = $y_bengali['prev'];
                $ba_img = $q;
                if ($main_array['lang'] == 'bengali') {
                    $img_height = $y_bengali['height'];
                    $img_width = $y_bengali['width'];
                }
    
    
                $mean_array = (isset($mean)) ? get_object_vars($mean) : array();
    
                $big_html .= '<span><div class="align_text  custom_font2">' . ucfirst(stripslashes($q)) . ' : </div><div class="align_text2">' . $y_bengali['mean'] . '</div>
                                            <label class="img_align">Pronunciation: <button class="icon_button" onclick="textToSpeech(\'' . $q . '\')"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" height="35px" width="35px" data-src="' . $contentUrl . 'img/microphone1.png" title="Say The Word" loading="lazy"></button></label>
                                        <label class="img_align">Add to Favorite: <button class="icon_button" onclick="calFavs(\'' . $q . '\', 1)"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" height="35px" width="35px" data-src="' . $contentUrl . 'img/heart-add.png" title="Add To Favorites" loading="lazy"></button></label></span>';
    
    
                ?>
    
                <?php
                if ($main_array['lang'] == 'bengali' && $img_height) {
    
    
                    $big_html .= "<span>
                                            <label>Bangla Academy Ovidhan :</label>
                                            <div class='dic_img'>";
    
                    $picture = $main_array['baurl'] . strtoupper($ba_img);
    
                    $big_html .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
                                                                data-src="' . $picture . '.JPG.webp" 
                                                                onerror="this.onerror=null; this.src=';
    
                    $big_html .= "'" . $picture . ".JPG'";
                    $big_html .= '"	alt="' . $q . '" title="' . $q . '" height="' . $img_height . 'px"  width="' . $img_width . 'px" loading="lazy">';
                    $big_html .= "</div>
                                        </span>";
    
                }
    
                //echo $big_html;
    
                if (isset($mean_array)) {
    
                    $details = $y_bengali_details;
    
                    if ((isset($details['result']) && $details['result'] != null) || (isset($details['m']) && $details['m'] != null && sizeof($details['m']) > 0)) {
    
                        foreach ($details as $key => $value) {
    
                            if ($key != 'result') {
    
                                if ($key == 'm') {
    
                                    if (isset($value) && $value != null && sizeof($value) > 0) {
    
                                        $big_html .= '<span style="word-break: initial;"><label>Details : </label>';
    
                                        $big_html .= implode(', ', $value);
    
                                        $big_html .= '</span>';
    
                                    }
    
                                } else {
    
                                    $big_html .= '<span style="word-break: initial;"><label>' . $key . ' : </label>';
    
                                    $big_html .= implode(', ', $value);
    
                                    $big_html .= '</span>';
    
                                }
    
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
                        $big_html .= '<span><a href="' . $main_array['url'] . '/english-to-' . $main_array['lang'] . '-meaning-' . strtolower($extra_row['word']) . '" title="English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' meaning of ' . $extra_row['word'] . '"><label>' . ucfirst($extra_row['word']) . '</label></a> - ' . $extra_row['mean'] . '</span>';
                    }
    
                }

               // asif_pharses start

         

               // asif_pharses End
    
    
                // related
    
                $related_words = array();
    
                $variants_query = mysqli_query($conn, "select variant from variants where word='" . $q . "'");
                while ($variants_row = mysqli_fetch_assoc($variants_query)) {
                    $related_words[] = $variants_row['variant'];
                }
    
                $related_words_imp = "'" . implode("','", $related_words) . "'";
    
                $related_mean_query = mysqli_query($conn, "select " . $main_array['lang'] . " as mean, word from lang where word in (" . $related_words_imp . ")");
                $related_mean_array = array();
                while ($related_mean_row = mysqli_fetch_assoc($related_mean_query)) {
                    $big_html .= '<span><label>' . ucfirst($related_mean_row['word']) . ' :: </label>' . $related_mean_row['mean'] . '</span>';
                }
    
                // related ends
    
                $big_html .= '<span><div class="custom_margin2"></div>';
    
                $big_html .= ($prev) ? '<button class="btn_pre bdr_radius2"><a title="English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' meaning of ' . $prev . '" class="btn btn-raised btn-primary" href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-meaning-' . $prev . '">&leftarrow; ' . ucfirst($prev) . '</a>' : '';
    
                $big_html .= ($nex) ? '<button class="btn_next bdr_radius2"><a title="English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' meaning of ' . $nex . '" class="btn btn-raised btn-primary" href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-meaning-' . $nex . '">' . $nex . ' &rightarrow;</a></button>' : '';
    
                $big_html .= '<div style="clear:both;">&nbsp;</div>';
    
                $big_html .= '<div class="custom_margin3"></div></span>';
    
                $big_html .= '<span><label>Other References :</label>
                                            <button class="btn_default4 bdr_radius2 custom_bdr">
                                                <a href="http://the-definition.com/dictionary/' . stripslashes($q) . '" target="_blank">The Definition</a>re
                                            </button>
                                            <button class="btn_default4 bdr_radius2 custom_bdr">
                                                <a href="http://dictionary.reference.com/browse/' . stripslashes($q) . '?s=t" target="_blank">Dictionary.com</a>
                                            </button>
                                            <button class="btn_default4 bdr_radius2 custom_bdr">
                                                <a href="http://www.merriam-webster.com/dictionary/' . stripslashes($q) . '" target="_blank">Merriam Webster</a>
                                            </button>
                                            <button class="btn_default4 bdr_radius2 custom_bdr">
                                                <a href="http://en.wikipedia.org/wiki/' . stripslashes($q) . '" target="_blank">Wikipedia</a>
                                            </button>';
       
                $actual_link = $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-meaning-' . str_replace(' ', '-', stripslashes($main_array['q']));
    
                $big_html .= '<span><label style="vertical-align: 10px;">Share This Meaning :</label>
                                    
                                            <a href="http://www.facebook.com/sharer.php?u=' . $actual_link . '" title="Facebook" target="_blank" style="font-size:15px;color:#0778E8;padding-right: 5px;">
                                            <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl . 'social_icon/facebook.jpg" alt="Facebook" style="height: 30px;width: 30px;border: 0;" width="30px" height="30px" loading="lazy"></a>
                                            
                                            <a href="http://twitter.com/share?url=' . $actual_link . '&text=English To ' . ucfirst($main_array['lang']) . ' Dictionary" title="Twitter" target="_blank" style="font-size:15px;color:#50ABF1;padding-right: 5px;">
                                            <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl . 'social_icon/twitter.jpg" alt="Twitter" style="height: 30px;width: 30px;border: 0;" width="30px" height="30px" loading="lazy"></a>
                                            
                                            <a href="http://www.linkedin.com/shareArticle?mini=true&url=' . $actual_link . '" target="_blank" title="Linkedin" style="font-size:15px;color:#0077B5;padding-right: 5px;">
                                            <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl . 'social_icon/linkedin.png" alt="Linkedin" style="height: 30px;width: 30px;border: 0;" width="30px" height="30px" loading="lazy"></a>
                                            
                                            <a href="mailto:?Subject=English To ' . ucfirst($main_array['lang']) . ' Dictionary&Body=I%20saw%20this%20and%20thought%20of%20you!%20' . $actual_link . '" title="Gmail" target="_blank" style="font-size:15px;color:#CE493B;padding-right: 5px;">
                                            <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl . 'social_icon/mail.jpg" alt="Gmail" style="height: 30px;width: 30px;border: 0;" width="30px" height="30px" loading="lazy"></a>
                                            
                                            <a href="https://www.addtoany.com/share?url=' . $actual_link . '%2F&amp;title=English%20To%20' . ucfirst(str_replace("Bengali", "Bangla", $main_array['ulang'])) . '%20Dictionary" target="_blank" title="More Share" style="font-size:15px;color:#F7664A;">
                                            <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl . 'social_icon/more.png" alt="Share More" style="height: 30px;width: 30px;border: 0;" width="30px" height="30px" loading="lazy"></a>';
    
    
                // en
                if (isset($data) && $data->eng != null) {
    
                    $eng = '';
                    $i = 0;
    
                    foreach ($data->eng as $key => $val) {
                        
                        $i++;
                        if ($i > 1) {
                            $eng .= '<br />';
                        }
    
                        $eng .= '<strong class="custom_font2 custom_margin3">' . ucfirst($key) . '</strong>';
    
                        $j = 0;
                        foreach ($val as $posKey => $v) {
    
                            if($posKey != 0){
                                $j++;
                                $eng .= '<span>(' . $j . ') ' . ucfirst(trim($v)) . '</span>';
            
                                if ($j > 15) {
                                    break;
                                }
                            }
                            
                        }
    
                    }
    
                }
            
                // examples
                if (isset($data) && $data->examples && count($data->examples) > 0) {
    
                    $examples = '';
                    $i = 0;
    
                    foreach ($data->examples as $val) {
                        $i++;
                        if ($i > 1) {
                            //$examples .= '<br />';
                        }
    
                        $examples .= '<span>(' . $i . ') ' . ucfirst(trim($val)) . '</span>';
                        if ($i > 15) {
                            break;
                        }
                    }
    
                }
    
                $big_html .= "<span>";
    
                if (isset($eng)) {
    
                    $big_html .= "  <div class='accordion_collapse' style = 'word-break: initial;'>
                                                                <h4 onclick='showHideAccordion()' class='custom-accordion-header'>Show English Meaning <div class='icon_right'>(+)</div></h4>
                                                                <div id='accordion' class='custom-accordion-content'>" . $eng . "
                                                                </div>
                                                            </div>
                                        
                                                            <div class='custom_margin'></div>";
    
                }
    
    
                if (isset($examples)) {
    
                    $big_html .= "  <div class='accordion_collapse' style = 'word-break: initial;'>
                                                                <h4 onclick='showHideAccordion2()' class='custom-accordion-header'>Show Examples <div
                                                                            class='icon_right'>(+)</div></h4>
                                                                <div id='accordion2' class='custom-accordion-content'>
                                                                    " . $examples . "
                                                                </div>
                                                            </div>
                                                            
                                                            </span>
    
                                                            <div class='custom_margin2'></div>";
    
                }
    
    
                if (isset($data->phrase) && count($data->phrase) > 0) {
                    $big_html .= '<div><strong>Related Words</strong></div>';
    
                    $i = 0;
                    foreach ($data->phrase as $key => $val) {
    
                        if (isset($mean_array[trim($val)])) {
                            $i++;
    
                            $big_html .= '<span><div class="label_font">(' . $i . ') ' . $val . ' :: </div>' . $mean_array[trim($val)] . '</span>';
                        }
                        if ($i > 15) {
                            break;
                        }
                    }
    
                }
    
    
                $big_html .= "<span>";
    
                $big_html .= "<!--synonyms-->";

                if (isset($data->syn)) {
                    $big_html .= '<div class="float_div"><div class="line_height"><strong>Synonyms</strong></div>';
    
                    $i = 0;
                    foreach ($data->syn as $key => $val) {
    
                        $big_html .= "<div class='line_height'><strong>" . ucfirst($key) . "</strong></div>";
                        if(!empty($val)){
                            foreach ($val as $k => $v) {
                                $i++;
                                if (isset($mean_array[trim($v)])){
                                    $big_html .= '<div class="label_font line_height">' . $i . '. ' . $v . ' :: </div><div class="line_height">' . $mean_array[trim($v)] . '</div>';
                                }
                            }
                        }

    
    
                    }
    
    
                    $big_html .= '</div>';
                }else{
                    if(!empty($row['synonym2'])){
                        $synArray = explode(',', $row['synonym2']);
    
                        $big_html .= '<div class="float_div"><div class="line_height"><strong>Synonyms</strong></div>';
    
                        $i = 0;
                        foreach ($synArray as $k => $v) {
                                $i++;
                                $big_html .= '<div class="label_font line_height">' . $i . '. ' . $v . '</div><div class="line_height">&nbsp;&nbsp;</div>';
                            }
                        $big_html .= '</div>';
                    }
                }
    
    
                $big_html .= "<!--antonyms-->";
    
                if (isset($data->anto) && count($data->anto) > 0) {
                    $big_html .= '<div class="float_div"><div class="line_height"><strong>Antonyms</strong></div>';
                    $antoArray = (array) $data->anto;
                    $antoArray = array_unique($antoArray);
                    $i = 0;
                    foreach ($antoArray as $key => $val) {
                        if ($mean_array[$val]) {
                            $i++;
                            if ($i > 1) {
                                //echo '<hr>';
                            }
                            //if($mean_array[$v] != '')
                            $big_html .= '<div class="label_font line_height">' . $i . '. ' . $val . ' :: </div><div class="line_height">' . $mean_array[$val] . '</div>';
                        }else{
                            $i++;
                            $big_html .= '<div class="label_font line_height">' . $i . '. ' . $val . '</div><div class="line_height">&nbsp;&nbsp;</div>';
                        }
                        if ($i > 15) {
                            break;
                        }
                    }
    
    
                    $big_html .= '</div>';
                }
    
                $big_html .= "</span>
    
                                            <!--variants-->
    
                                            <span>";
    
                if (isset($data->variants) && count($data->variants) > 0) {
                    $big_html .= '<div class="custom_font2 custom_margin"><strong>Different Forms</strong></div>';
    
                    $big_html .= '<div class="jumbo_details variants">';
                    $big_html .= implode(', ', $data->variants);
                    $big_html .= '</div>';
                }
    
                // similar
                if (isset($data->similar)) {
                    $big_html .= '<div class="custom_font2 custom_margin"><strong>Similar Words</strong></div>';
    
                    $big_html .= '<div class="jumbo_details similar">';
                    $big_html .= implode(', ', $data->similar);
                    $big_html .= '</div>';
                }
    
    
                $big_html .= "</span>";
    
    
                // show meaning [ends]
    
    
                if ($q) {
    
                    // Show movdicts
    
    
                    $movdict_query = mysqli_query($conn, 'select dict_word_list.word, subtitle.end_time, subtitle.text, subtitle.mname, subtitle.mtitle from dict_word_list left join subtitle on dict_word_list.sid=subtitle.id where dict_word_list.word=\'' . $q . '\' order by rand() limit 5');
    
                    if (mysqli_num_rows($movdict_query) > 0) {
    
                        $big_html .= '<span><div class="custom_font2 custom_margin"><strong>Word Example from TV Shows</strong></div>';
    
                        $big_html .= "<p style = 'word-break: initial;'>The best way to learn proper English is to read news report, and watch news on TV. Watching TV shows is a great way to learn casual English, slang words, understand culture reference and humor. If you have already watched these shows then you may recall the words used in the following dialogs.</p>";
    
                        while ($movdict_row = mysqli_fetch_assoc($movdict_query)) {
    
                            $movdict_img_list = $main_array['movssurl'] . $movdict_row['mname'] . '-' . str_replace(',', '.', $movdict_row['end_time']) . '.jpeg';
                            $movdict_sub_text = str_replace('\N', '<br />', str_replace($q, '<b>' . strtoupper($q) . '</b>', $movdict_row['text']));
                            $movdict_mname = $movdict_row['mtitle'];
    
    
                            $big_html .= "<div class='card'>";
                            $big_html .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
                                                                data-src="' . $movdict_img_list . '.webp"
                                                                        onerror="this.onerror=null; this.src=';
                            $big_html .= "'" . $movdict_img_list . "'";
                            $big_html .= '" 
                                                                alt="' . addslashes($movdict_row['text']) . '"
                                                                title="' . addslashes($movdict_row['text']) . '"
                                                                style="width: 100%;padding-left: 0px; padding-top: 0px;border: 0;"
                                                                width="100%" loading="lazy">';
    
    
                            $big_html .= "<p style='margin-bottom:-30px;'>" . $movdict_sub_text . "</p>
                                                                        <h4 style='background: #f8f8f8; padding: 10px 16px; width: 100%;
                                                                        position: relative;top: 23px; left: -16px;'><b>" . $movdict_mname . "</b></h4>
                                                                    </div>
                                                                <br>";
    
    
                        }
    
                        $big_html .= "</span>";
    
                    }
    
                    // echo $big_html;
    
    
                    $big_html .= "<div class='custom_margin2'></div>
                                                            <div class='custom_font2'>
                                                                <strong>English to " . str_replace('Bengali', 'Bangla', $main_array['ulang']) . " Dictionary: " . stripslashes($q) . "</strong>
                                                            </div>
                                                            <p style = 'word-break: initial;'>Meaning and definitions of " . stripslashes($q) . ", translation in " . str_replace('Bengali', 'Bangla', $main_array['ulang']) . "
                                                                language for " . stripslashes($q) . " with similar and opposite words. Also find spoken pronunciation of " . stripslashes($q) . " in " . str_replace('Bengali', 'Bangla', $main_array['ulang']) . " and in English language.
                                                            </p>
    
                                                            <div class='custom_font2'>
                                                                <strong>Tags for the entry '" . stripslashes($q) . "'</strong>
                                                            </div>
                                                            
                                                            <p style = 'word-break: initial;'>What " . stripslashes($q) . " means in " . str_replace('Bengali', 'Bangla', $main_array['ulang']) . ", " . stripslashes($q) . " meaning
                                                                in " . str_replace('Bengali', 'Bangla', $main_array['ulang']) . ", " . stripslashes($q) . "
                                                                definition, examples and pronunciation
                                                                of " . stripslashes($q) . " in " . str_replace('Bengali', 'Bangla', $main_array['ulang']) . " language.
                                                            </p>";
    
                }
    
    
                $big_html .= "               </div>
                                </fieldset></div>";
    
    
            }
  
            $big_html .= '<div class="box_wrapper">
            <fieldset>';
    
            $url1 = parse_url($main_array['baseurl']);
            $string = str_replace('www.', '', $url1['host']);
            $string = str_replace('- ', '-',
                ucwords(str_replace('-', '- ', $string)));
            $string = str_replace('. ', '.',
                ucwords(str_replace('.', '. ', $string)));
    
            if ($main_array['q'])
    
                $big_html .= '<legend class="custom_font2"><h2>' . $string . ' | English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' Dictionary</h2></legend>';
    
            else
    
                $big_html .= '<legend class="custom_font2"><h1>' . $string . ' | English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' Dictionary</h1></legend>';
    
            $big_html .= '<div class="fieldset_body inner_details"><div style="text-align: justify"><span style = "word-break: initial;"> This is not just an ordinary English to ';
    
            $big_html .= str_replace("Bengali", "Bangla", $main_array['ulang']) . ' dictionary & ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' to English dictionary. This dictionary has the largest database for word meaning. It does not only give you English to';
    
            $big_html .= str_replace("Bengali", "Bangla", $main_array['ulang']) . ' and ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' to English word meaning, it provides English to English word meaning along with Antonyms, Synonyms, Examples, Related words and Examples from your favorite TV Shows. This dictionary helps you to search quickly for ';
            $big_html .= str_replace("Bengali", "Bangla", $main_array['ulang']) . ' to English translation, English to ';
            $big_html .= str_replace("Bengali", "Bangla", $main_array['ulang']) . ' translation. It has more than 500,000 word meaning and is still growing. This English to ';
            $big_html .= str_replace("Bengali", "Bangla", $main_array['ulang']) . ' dictionary also provides you an Android application for your offline use. The dictionary has mainly three features : translate English words to ';
            $big_html .= str_replace("Bengali", "Bangla", $main_array['ulang']) . ' translate ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' words to English, copy & paste any paragraph in the Read Text box then tap on any word to get instant word meaning. This website also provides you English Grammar, TOEFL and most common words.';
            $big_html .= '</span>
                    </div>
                    <span>
                    <button class="btn_default4 bdr_radius2 custom_bdr">
                    <a href="' . $main_array['baseurl'] . $main_array['lang'] . '-to-english-dictionary"
                    title="' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' to English Dictionary">' .
                str_replace("Bengali", "Bangla", $main_array['ulang']) . ' to English Dictionary</a>
                    </button>
                    <button class="btn_default4 bdr_radius2 custom_bdr">
                    <a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-read-text-with-translation" title="Read Text">Read Text</a>
                    </button>
                    <button class="btn_default4 bdr_radius2 custom_bdr">
                    <a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-dictionary-favourite-words"
                    title="Browse Favorite Words">Favorite Words</a>
                    </button>
                    <button class="btn_default4 bdr_radius2 custom_bdr">
                    <a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-dictionary-learn-ten-words-everyday"
                    title="Learn Ten Words Everyday">Learn Words</a>
                    </button>
                    <button class="btn_default4 bdr_radius2 custom_bdr">
                    <a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-dictionary-vocabulary-game"
                    title="Play Vocabulary Games">Vocabulary Games</a>
                    </button>
                    <button class="btn_default4 bdr_radius2 custom_bdr">
                    <a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-dictionary-fill-in-the-blanks-page-1"
                    title="Learn Fill in the Blanks">Fill in the Blanks</a>
                    </button>
                    <button class="btn_default4 bdr_radius2 custom_bdr">
                    <a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-dictionary-search-history"
                    title="Browse Word Search History">Word Search History</a>
                    </button>
                    </span></div>
            </fieldset>';
    
            $big_html .= '<div><a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang']
                . '-dictionary-learn-prepositions"
                    title="Learn Prepositions by Photos">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                . 'site_image/learn-prepositions-by-photos.webp"
                        onerror="this.onerror=null; this.src=';
            $big_html .= "'" . $contentUrl . "site_image/learn-prepositions-by-photos.jpg'";
            $big_html .= '" alt="Learn Prepositions by Photos" width="100%" loading="lazy"></a></div>';
    
            $big_html .= '<div><a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang']
                . '-dictionary-commonly-confused-words"
                    title="Commonly confused words">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                . 'site_image/commonly-confused-words.webp"
                        onerror="this.onerror=null; this.src=';
            $big_html .= "'" . $contentUrl . "site_image/commonly-confused-words.jpg'";
            $big_html .= '" alt="Commonly confused words" width="100%" loading="lazy"></a></div>';
    
            $big_html .= '<div><a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang']
                . '-dictionary-form-of-verbs"
                    title="form of verbs">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                . 'site_image/form-of-verbs.webp"
                        onerror="this.onerror=null; this.src=';
            $big_html .= "'" . $contentUrl . "site_image/form-of-verbs.jpg'";
            $big_html .= '" alt="form of verbs" width="100%" loading="lazy"></a></div>';
    
            $big_html .= '<div><a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang']
                . '-dictionary-300-plus-toefl-words"
                    title="Learn 300+ TOEFL words">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                . 'site_image/tofel_words.webp"
                        onerror="this.onerror=null; this.src=';
            $big_html .= "'" . $contentUrl . "site_image/tofel_words.jpg'";
            $big_html .= '" alt="Learn 300+ TOEFL words" width="100%" loading="lazy"></a></div>';
    
            $big_html .= '<div><a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang']
                . '-dictionary-fill-in-the-blanks-page-1"
                    title="Fill in the blanks">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                . 'site_image/fill_in_the_gaps.webp"
                        onerror="this.onerror=null; this.src=';
            $big_html .= "'" . $contentUrl . "site_image/fill_in_the_gaps.jpg'";
            $big_html .= '" alt="Fill in the blanks" width="100%" loading="lazy"></a></div>';
    
            $big_html .= '<div><a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang']
                . '-dictionary-topic-wise-words-animals"
                    title="Topic Wise Words">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                . 'site_image/topic_wise_words.webp"
                        onerror="this.onerror=null; this.src=';
            $big_html .= "'" . $contentUrl . "site_image/topic_wise_words.jpg'";
            $big_html .= '" alt="Topic Wise Words" width="100%" loading="lazy"></a></div>';
    
            $big_html .= '<div><a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang']
                . '-dictionary-learn-3000-plus-common-words"
                    title="Learn 3000+ common words">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                . 'site_image/common_words.webp"
                        onerror="this.onerror=null; this.src=';
            $big_html .= "'" . $contentUrl . "site_image/common_words.jpg'";
            $big_html .= '" alt="Learn 3000+ common words" width="100%" loading="lazy"></a></div>';
    
            if ($main_array['lang'] == 'bengali' or $main_array['lang'] == 'bangla') {
                $big_html .= '<div><a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang']
                    . '-dictionary-grammar-post_id-25-cat-2"
                    title="Learn English Grammar">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                    . 'site_image/english_grammar.webp"
                        onerror="this.onerror=null; this.src=';
                $big_html .= "'" . $contentUrl . "site_image/english_grammar.jpg'";
                $big_html .= '" alt="Learn English Grammar" width="100%" loading="lazy"></a></div>';
            }
    
            $big_html .= '<div><a href="' . $main_array['baseurl'] . $main_array['lang']
                . '-to-english-dictionary" id="words_everyday"
                    title="Words Everyday">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                . 'site_image/words_everyday.webp"
                        onerror="this.onerror=null; this.src=';
            $big_html .= "'" . $contentUrl . "site_image/words_everyday.jpg'";
            $big_html .= '" alt="Words Everyday" width="100%" loading="lazy"></a></div>';
    
            $big_html .= '<div><a href="' . $main_array['baseurl'] . $main_array['lang']
                . '-to-english-dictionary" id="most_search_words"
                    title="Most Searched Words">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                . 'site_image/most_searched_words.webp"
                        onerror="this.onerror=null; this.src=';
            $big_html .= "'" . $contentUrl . "site_image/most_searched_words.jpg'";
            $big_html .= '" alt="Most Searched Words" width="100%" loading="lazy"></a></div>';
    
            $big_html .= '<div><a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang']
                . '-dictionary-learn-common-gre-words"
                    title="GRE Words">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                . 'site_image/gre_words.webp"
                        onerror="this.onerror=null; this.src=';
            $big_html .= "'" . $contentUrl . "site_image/gre_words.jpg'";
            $big_html .= '" alt="GRE words" width="100%" loading="lazy"></a></div>';
    
            if ($main_array['lang'] == 'bengali') {
                $big_html .= '<div><a href="https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary"
                    title="Android App">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                    . 'site_image/android_app.webp"
                        onerror="this.onerror=null; this.src=';
                $big_html .= "'" . $contentUrl . "site_image/android_app.jpg'";
                $big_html .= '" alt="Android App" width="100%" loading="lazy"></a></div>';
    
                $big_html .= '<div><a href="https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary"
                    title="iPhone App">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                    . 'site_image/iphone_app.webp"
                        onerror="this.onerror=null; this.src=';
                $big_html .= "'" . $contentUrl . "site_image/iphone_app.jpg'";
                $big_html .= '" alt="iPhone App" width="100%" loading="lazy"></a></div>';
            } else {
                $getAppId_query = mysqli_query($conn, 'select AppId from AppIds where Lang=\'' . $main_array['lang'] . '\' limit 1');
    
                if ($getAppId_query) {
    
                    $getAppId = mysqli_fetch_assoc($getAppId_query);
                    $appId = $getAppId['AppId'];
                    $download_link = 'https://itunes.apple.com/us/app/english-' . $main_array['lang'] . '-dictionary/id' . $appId . '?ls=1&mt=8';
    
                    $big_html .= '<div><a href="https://play.google.com/store/apps/details?id=com.bdword.e2' . $main_array['lang'] . 'dictionary"
                    title="Android App">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                        . 'site_image/android_app.webp"
                        onerror="this.onerror=null; this.src=';
                    $big_html .= "'" . $contentUrl . "site_image/android_app.jpg'";
                    $big_html .= '" alt="Android App" width="100%" loading="lazy"></a></div>';
    
                    $big_html .= '<div><a href="' . $download_link . '"
                    title="iPhone App">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                        . 'site_image/iphone_app.webp"
                        onerror="this.onerror=null; this.src=';
                    $big_html .= "'" . $contentUrl . "site_image/iphone_app.jpg'";
                    $big_html .= '" alt="iPhone App" width="100%" loading="lazy"></a></div>';
                }
            }
    
            if ($main_array['lang'] == 'bengali') {
                $big_html .= '<div><a href="https://chrome.google.com/webstore/detail/bdword-english-to-bengali/cogjmeckpkinhnidokapabgaoelhkbcl"
                    title="Chrome Extension">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                    . 'site_image/chrome_extension.webp"
                        onerror="this.onerror=null; this.src=';
                $big_html .= "'" . $contentUrl . "site_image/chrome_extension.jpg'";
                $big_html .= '" alt="Chrome Extension" width="100%" loading="lazy"></a></div>';
    
                $big_html .= '<div><a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang']
                    . '-dictionary-learn-translations"
                    title="Common Translations">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                    . 'site_image/common_translations.webp"
                        onerror="this.onerror=null; this.src=';
                $big_html .= "'" . $contentUrl . "site_image/common_translations.jpg'";
                $big_html .= '" alt="Common Translations" width="100%" loading="lazy"></a></div>';
            } else {
                $big_html .= '<div><a href="https://chrome.google.com/webstore/detail/english-to-any-language-d/apenapfkioiehfhgheabegngnfhnfbjh?hl=en&authuser=0"
                    title="Chrome Extension">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl
                    . 'site_image/chrome_extension.webp"
                        onerror="this.onerror=null; this.src=';
                $big_html .= "'" . $contentUrl . "site_image/chrome_extension.jpg'";
                $big_html .= '" alt="Chrome Extension" width="100%" loading="lazy"></a></div>';
            }
    
            if ($main_array['lang'] == 'bengali') {
                $big_html .= '<fieldset class="bdr_radius3">
                    <legend>
                        <h1><a target="_blank" href="https://www.youtube.com/embed/J8wYIw3oRhU" title="How to use BDWord">How to use BDWord</a></h1>
                    </legend>
    
                </fieldset>';
            }
    
            $big_html .= '<fieldset>
                <legend><h2>Blog List</h2></legend>
    
                <div class="fieldset_body">
                    <div class="topic_link">';
    
            $sql = "SELECT id,title,subject FROM blog_info WHERE lang = 'all' OR lang = '" . strtolower($main_array['lang']) . "'";
            $query = mysqli_query($conn, $sql);
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $big_html .= ' <a title="' . str_replace("[lang]", str_replace("Bengali", "Bangla", $main_array['ulang']), $row['title']) . '"
                                href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang']
                        . '-dictionary-blog-' . $row['id'] . '">
                                <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                data-src="' . $contentUrl . 'img/direction_arrow2.webp" 
                                onerror="this.onerror=null; this.src=';
                    $big_html .= "'" . $contentUrl . "img/direction_arrow2.png'\"";
                    $big_html .= 'width="22px" height="22px" alt="icon" 
                                loading="lazy"><span>' .
                        str_replace("[lang]", str_replace("Bengali", "Bangla", $main_array['ulang']), $row['title']) . '</span></a>';
                }
            }
    
            $big_html .= '</div></div></fieldset>';
            $big_html .= '<fieldset><legend><h2>Topic Wise Words</h2></legend><div class="fieldset_body inner_details" style = "word-break: initial;">';
            $rand = rand(1, 12700);
    
            $topic_words = array();
            $this_topic = '';
            $topic_word_query = mysqli_query($conn, 'select word, topic, exmp from TopicWiseWords where id>' . $rand . ' limit 5');
            $topic_all_words = array();
            while ($row = mysqli_fetch_assoc($topic_word_query)) {
                $topic_words[$row["topic"]][] = array($row["word"], $row["exmp"]);
                $topic_all_words[] = $row["word"];
            }
    
            $topic_mean = array();
            $topic_words_mean_query = mysqli_query($conn, 'select word, mean from x_' . $main_array['lang'] . ' where word in (\'' . implode('\',\'', $topic_all_words) . '\') limit 5');
            while ($topic_words_mean_row = mysqli_fetch_assoc($topic_words_mean_query)) {
                $topic_mean[$topic_words_mean_row['word']] = $topic_words_mean_row['mean'];
            }
    
            foreach ($topic_words as $k => $v) {
                $this_topic = $k;
                $big_html .= '<div class="custom_font4">&#9679; ' . ucfirst($k) . '</div>';
                foreach ($v as $vv) {
                    if (isset($topic_mean[$vv[0]])) {
                        $big_html .= '<span><a title="English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' Meaning of ' . ucfirst($vv[0]) . '" href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-meaning-' . urlencode($vv[0]) . '"><label>' . ucfirst($vv[0]) . ' (' . $topic_mean[$vv[0]] . ') :: </label>' . $vv[1] . '</a></span>';
                    }
    
                }
            }
    
            $big_html .= '</div>
                <button class="btn_default5 bdr_radius2">
                    <a title="See all topic wise words" href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-dictionary-topic-wise-words-' . $this_topic . '">See all</a>
                </button>
                <script>var topic_wise_words_link = document.getElementById("topic_wise_words");
                    if (topic_wise_words_link !== null) {';
            $big_html .= "topic_wise_words_link.setAttribute('href', \"";
            $big_html .= $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-dictionary-topic-wise-words-' . $this_topic . '")';
            $big_html .= '}</script>
            </fieldset>';
    
            $big_html .= '<fieldset>
                <legend><h2>Learn 3000+ Common Words</h2></legend>
    
                <div class="fieldset_body inner_details" style = "word-break: initial;">';
    
            $w_3000_gre_limit = 5;
            $rand_3000 = rand(1, 3335);
            $rand_gre = rand(1, 1445);
            $w_3000 = array();
            $w_gre = array();
            $query = mysqli_query($conn, 'select word, exmp from `3000` where id>' . $rand_3000 . ' limit ' . $w_3000_gre_limit);
            while ($row = mysqli_fetch_assoc($query)) {
    
                $w_3000[] = $row['word'];
                $exmp[$row['word']] = $row['exmp'];
            }
            $query = mysqli_query($conn, 'select word, exmp from `gre` where id>' . $rand_gre . ' limit ' . $w_3000_gre_limit);
            while ($row = mysqli_fetch_assoc($query)) {
                $w_gre[] = strtolower($row['word']);
                $exmp[strtolower($row['word'])] = $row['exmp'];
            }
    
            $w_3000_gre = array_merge($w_3000, $w_gre);
            // $w_3000_gre = array_merge($w_3000_gre, $word_day_rows);
    
    
            $w_3000_gre2 = [];
    
            foreach ($w_3000_gre as $key => $val) {
                $w_3000_gre2[] = str_replace("'", "", $val);
            }
    
            $w_mean = array();
            $query = mysqli_query($conn, 'select mean, word from x_' . $main_array['lang'] . ' where word in (\'' . implode('\',\'', $w_3000_gre2) . '\') limit ' . ($w_3000_gre_limit * 3));
            while ($row = mysqli_fetch_assoc($query)) {
                $w_mean[$row['word']] = $row['mean'];
            }
    
            foreach ($w_3000 as $w_3) {
                if (count($w_mean) > 0 && $w_mean[$w_3] && $w_3 != $w_mean[$w_3]) {
                    $w_3_l = strtolower($w_3);
                    $big_html .= '<span><a title="English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' Meaning of ' . ucfirst($w_3) . '" href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-meaning-' . urlencode($w_3) . '"><label>' . ucfirst($w_3) . ' (' . $w_mean[$w_3] . ') :: </label>' . $exmp[$w_3_l] . '</a></span>';
                }
            }
    
            $big_html .= '</div>
                <button class="btn_default5 bdr_radius2">
                    <a title="See all 3000+ common words" href="' . $main_array['baseurl']
                . 'english-to-' . $main_array['lang'] . '-dictionary-learn-3000-plus-common-words">See all</a>
                </button>
            </fieldset>';
    
            if (!$main_array['q'] and $main_array['lang'] == 'bengali') {
                $big_html .= '<fieldset>' .
                    PageShortIntro(5, 'common_translations', 'english-to-' . $main_array['lang'] . '-dictionary-learn-translations', '500+ Common Translations', $conn) . '</fieldset>';
            }
    
            $big_html .= ' <fieldset>
                <legend><h2>Learn Common GRE Words</h2></legend>
    
                <div class="fieldset_body inner_details" style = "word-break:initial">';
    
            foreach ($w_gre as $w_g) {
                if (count($w_mean) > 0 && isset($w_mean[$w_g]) && $w_g != $w_mean[$w_g]) {
                    $big_html .= '<span><a title="English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' Meaning of ' . ucfirst($w_g) . '" href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-meaning-' . urlencode($w_g) . '"><label>' . ucfirst($w_g) . ' (' . $w_mean[$w_g] . ') :: </label>' . $exmp[$w_g] . '</a></span>';
                }
            }
    
            $big_html .= ' </div>
                <button class="btn_default5 bdr_radius2">
                    <a title="See all GRE words" href="' . $main_array['baseurl'] . 'english-to-' .
                $main_array['lang'] . '-dictionary-learn-common-gre-words">See all</a>
                </button>
            </fieldset>';
    
            if (isset($main_array['grammar']) && $main_array['lang'] == 'bengali') {
                $big_html .= '<fieldset>
                    <legend>Learn Grammar</legend>
    
                    <div class="fieldset_body">
                        <div class="topic_link">
                            ' . $main_array['grammar'] . '
                        </div>
                    </div>
                </fieldset>';
            }
    
            $big_html .= '<fieldset>
                <legend><h2>Learn Words Everyday</h2></legend>
                <div class="fieldset_body">
                    <div class="topic_link">';
    
            $big_html .= '<a href="' . $main_array['baseurl'] . 'english-to-' .
                $main_array['lang'] . '-dictionary-learn-ten-words-everyday-season-24-episode-1">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
                    data-src="'.$contentUrl.'img/direction_arrow2.webp" 
                    onerror="this.onerror=null; this.src=';
            $big_html .= "'" . $contentUrl . "img/direction_arrow2.png'";
            $big_html .= '" width="22px" height="22px" alt="icon" loading="lazy"><span>Season #24 Episode @1</span>
                        </a>';
    
            $big_html .= '<a href="' . $main_array['baseurl'] . 'english-to-' .
                $main_array['lang'] . '-dictionary-learn-ten-words-everyday-season-23-episode-50">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
                    data-src="'.$contentUrl.'img/direction_arrow2.webp" 
                    onerror="this.onerror=null; this.src=';
            $big_html .= "'" . $contentUrl . "img/direction_arrow2.png'";
            $big_html .= '" width="22px" height="22px" alt="icon" loading="lazy"><span>Season #23 Episode @50</span>
                        </a>';
    
            $big_html .= '<a href="' . $main_array['baseurl'] . 'english-to-' .
                $main_array['lang'] . '-dictionary-learn-ten-words-everyday-season-23-episode-49">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
                    data-src="'.$contentUrl.'img/direction_arrow2.webp" 
                    onerror="this.onerror=null; this.src=';
            $big_html .= "'" . $contentUrl . "img/direction_arrow2.png'";
            $big_html .= '" width="22px" height="22px" alt="icon" loading="lazy"><span>Season #23 Episode @49</span>
                        </a>';
    
            $big_html .= '<a href="' . $main_array['baseurl'] . 'english-to-' .
                $main_array['lang'] . '-dictionary-learn-ten-words-everyday-season-23-episode-48">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
                    data-src="'.$contentUrl.'img/direction_arrow2.webp" 
                    onerror="this.onerror=null; this.src=';
            $big_html .= "'" . $contentUrl . "img/direction_arrow2.png'";
            $big_html .= '" width="22px" height="22px" alt="icon" loading="lazy"><span>Season #23 Episode @48</span>
                        </a>';
    
            $big_html .= '<a href="' . $main_array['baseurl'] . 'english-to-' .
                $main_array['lang'] . '-dictionary-learn-ten-words-everyday-season-23-episode-47">
                    <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
                    data-src="'.$contentUrl.'img/direction_arrow2.webp" 
                    onerror="this.onerror=null; this.src=';
            $big_html .= "'" . $contentUrl . "img/direction_arrow2.png'";
            $big_html .= '" width="22px" height="22px" alt="icon" loading="lazy"><span>Season #23 Episode @47</span>
                        </a>';
    
            $big_html .= '</div></div><button class="btn_default5 bdr_radius2"><a href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-dictionary-learn-ten-words-everyday">See All Seasons</a></button>';
    
            $big_html .= '</div></fieldset>';
    
    
            $big_html .= "</div>";
    
    
            $lang_array = getLanguageArray();
            $country = getCountryBySite(array_search($_GET['lang'], getLanguageArray()));
    
    
            $big_html .= "<div class='right_content'>
            <div class='box_wrapper2'>
                <div class='inner_wrapper'>";
    
            if ($main_array['lang'] == 'bengali') {
    
                $big_html .= "<button class='btn_default2 bdr_radius2'>
                        <a href='https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary' target='_blank'>";
    
                $big_html .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
                    data-src="' . $contentUrl . 'img/android-icon.webp"
                    onerror="this.onerror=null; 
                    this.src=';
                $big_html .= "'" . $contentUrl . "img/android-icon.png'";
                $big_html .= '" width="30px" height="30px" alt="icon" loading="lazy"><span>Android App</span>';
                $big_html .= "</a>
                    </button>
    
                    <button class='btn_default2 bdr_radius2'>
                        <a href='https://itunes.apple.com/us/app/english-bengali-dictionary/id1213381239?ls=1&mt=8'
                            target='_blank'>";
    
                $big_html .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
                    data-src="' . $contentUrl . 'img/ios-icon.webp"
                    onerror="this.onerror=null; 
                    this.src=';
                $big_html .= "'" . $contentUrl . "img/ios-icon.png'";
                $big_html .= '" width="30px" height="30px" alt="icon" loading="lazy"><span>iPhone App</span>';
                $big_html .= "</a>
                    </button>
                
                    <button class='btn_default2 bdr_radius2'>
                        <a href='https://chrome.google.com/webstore/detail/bdword-english-to-bengali/cogjmeckpkinhnidokapabgaoelhkbcl'
                            target='_blank'>";
    
                $big_html .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
                    data-src="' . $contentUrl . 'img/chrome-icon.webp"
                    onerror="this.onerror=null; 
                    this.src=';
                $big_html .= "'" . $contentUrl . "img/chrome-icon.png'";
                $big_html .= '" width="30px" height="30px" alt="icon" loading="lazy"><span>Chrome Extension</span>';
                $big_html .= "</a>
                    </button>";
            } else {
    
    
                //connect();
                $getAppId = mysqli_fetch_assoc(mysqli_query($conn, 'select AppId from AppIds where Lang=\'' . $main_array['lang'] . '\' limit 1'));
                $appId = $getAppId['AppId'];
                $download_link = 'https://itunes.apple.com/us/app/english-' . $main_array['lang'] . '-dictionary/id' . $appId . '?ls=1&mt=8';
    
    
                $big_html .= "<button class='btn_default2 bdr_radius2'>
                        <a href='https://play.google.com/store/apps/details?id=com.bdword.e2" . $main_array['lang'] . "dictionary'
                            target='_blank'>";
    
                $big_html .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
                    data-src="' . $contentUrl . 'img/android-icon.webp"
                    onerror="this.onerror=null; 
                    this.src=';
                $big_html .= "'" . $contentUrl . "img/android-icon.png'";
                $big_html .= '" width="30px" height="30px" alt="icon" loading="lazy"><span>Android App</span>';
                $big_html .= "</a>
                    </button>
                    
                    <button class='btn_default2 bdr_radius2'>
                        <a href='" . $download_link . "' class='btn btn-primary btn-raised' target='_blank'>";
                $big_html .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
                    data-src="' . $contentUrl . 'img/ios-icon.webp"
                    onerror="this.onerror=null; 
                    this.src=';
                $big_html .= "'" . $contentUrl . "img/ios-icon.png'";
                $big_html .= '" width="30px" height="30px" alt="icon" loading="lazy"><span>iPhone App</span>';
    
                $big_html .= "</a>
                    </button>
                    
                    <button class='btn_default2 bdr_radius2'>
                        <a href='https://chrome.google.com/webstore/detail/english-to-any-language-d/apenapfkioiehfhgheabegngnfhnfbjh?hl=en&authuser=0'
                            target='_blank'>";
                $big_html .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
                    data-src="' . $contentUrl . 'img/chrome-icon.webp"
                    onerror="this.onerror=null; 
                    this.src=';
                $big_html .= "'" . $contentUrl . "img/chrome-icon.png'";
                $big_html .= '" width="30px" height="30px" alt="icon" loading="lazy"><span>Chrome Extension</span>';
                $big_html .= "</a>
                    </button>";
    
            }
    
    
            $big_html .= "</div>
                    </div>";
    
    
            $indians = array('hindi', 'malayalam', 'tamil', 'telugu', 'kannada', 'gujarati', 'punjabi', 'marathi');
            if ($main_array['lang'] == 'bengali') {
                $big_html .= '<div class="box_wrapper2 custom_bgcolor">
                            <div class="inner_wrapper">
                            <button class="btn_default3 bdr_radius2"><a href="http://www.allbanglanewspaperlist24.com" target="_blank"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl . 'img/newspaper-icon.png" width="30px" height="30px" alt="icon" loading="lazy"><label>All Bangla Newspapers</label></a>
                            </div>
                    </div>';
            } elseif (in_array($main_array['lang'], $indians)) {
                $big_html .= '<div class="box_wrapper2 custom_bgcolor">
                            <div class="inner_wrapper">
                                <button class="btn_default3 bdr_radius2"><a href="http://www.allindianewspaperlist.com/" target="_blank"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl . 'img/newspaper-icon.png" width="30px" height="30px" alt="icon" loading="lazy"><label>All Indian Newspapers</label></a>
                                </div>
                    </div>';
            } else {
                if (!empty($country)) {
                    $string = preg_replace('/\s+/', '_', $country);
                    $big_html .= '<div class="box_wrapper2 custom_bgcolor">
                            <div class="inner_wrapper"><button class="btn_default3 bdr_radius2"><a href="https://newspaperlinks.xyz/newspaper/' . strtolower($string) . '" target="_blank"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="' . $contentUrl . 'img/newspaper-icon.png" width="30px" height="30px" alt="icon" loading="lazy"><label>All ' . ucfirst($main_array['lang']) . ' Newspapers</label></a>
                            </div>
                    </div>';
    
                }
            }
    
            // echo $big_html;
    
    
            $big_html .= "<div class='box_wrapper2'>
                <div class='inner_wrapper'>
                    <fieldset>
                        <legend class='custom_font2'>Your Favorite Words</legend>
    
                        <div class='fieldset_body inner_details' id='load_favourite'>
                            Currently you do not have any favorite word. To make a word favorite you have to click on the heart
                            button.
                        </div>
                    </fieldset>
                </div>
            </div>";
    
    
            $big_html .= "<div class='box_wrapper2'>
                <div class='inner_wrapper'>
                    <fieldset>
                        <legend class='custom_font2'>Your Search History</legend>
    
                        <div class='fieldset_body inner_details' id='load_search'>
                            You have no word in search history!
                        </div>
                    </fieldset>
                </div>
            </div>";
    
            $big_html .= "<div class='box_wrapper2'>
            <div class='inner_wrapper'>
                <fieldset>
                    <legend class='custom_font2'>All Dictionary Links</legend>
    
                    <div class='fieldset_body'>
                        <ul>";
    
            foreach ($lang_array as $key => $row) {
                $big_html .= '<li><span><a title="English to ' . ucfirst(str_replace("bengali", "bangla", $row)) . ' Dictionary" 
                                                href="https://' . $key . '" target="_blank"><label style="color: black; cursor: pointer">English to ' . ucfirst(str_replace("bengali", "bangla", $row)) .
                    ' Dictionary</label></a></span></li><br>';
            }
    
    
            $big_html .= "</ul>
                            </div>
                        </fieldset>
                    </div>
                </div>
    
    
            </div>";
    
    
        // mysqli_close($conn);
    
    
            $big_html .= "</div>";
    
            $footer_domain_name = strtoupper(str_replace(array('https://www.', 'https://', '/'), '', $main_array['baseurl']));
    
            $big_html .= "<div class='footer_wrapper'>
                <span class='align_left'>&copy; 2018-" . date('Y') . " | <a href='" . $main_array['baseurl'] . "'><strong>" . $footer_domain_name . "</strong></a> | All Rights Reserved by <a href='" . $main_array['baseurl'] . "'><strong>" . $footer_domain_name . "</strong></a> </span>
                    <span class='align_right'>
                        <a href='" . $main_array['baseurl'] . "english-to-" . $main_array['lang'] . "-dictionary-about-us'>About Us</a>&nbsp;|&nbsp;
                        <a href='" . $main_array['baseurl'] . ">english-to-" . $main_array['lang'] . "-dictionary-privacy'>Privacy</a>&nbsp;|&nbsp;
                        <a href='" . $main_array['baseurl'] . "english-to-" . $main_array['lang'] . "-dictionary-disclaimer'>Disclaimer</a>&nbsp;|&nbsp;
                        <a href='" . $main_array['baseurl'] . "english-to-" . $main_array['lang'] . "-dictionary-contact-us'>Contact</a>
                    </span>
                </div>
            </div>
            <script async type='text/javascript' src='https://server2.mcqstudy.com/responsivejs.js'></script>";
    
            $jsurl = $main_array['url'];
            $lang = $_GET['lang'];
        // echo $big_html;
    
            $big_html .= "<script type='text/javascript'>
    
                function onlyUnique(n,e,i){return i.indexOf(n)===e}
    
                function calFavs(e,a){var t=[];null!=localStorage.getItem('favs')&&(t=JSON.parse(localStorage.getItem('favs'))),1==a?t.push(e):t.indexOf(e)>=0&&t.splice(t.indexOf(e),1),localStorage.setItem('favs',JSON.stringify(t.filter(onlyUnique))),alert((e.toUpperCase()+' has been added to the Favorite List.'))}
    
                function lang(){ return '" . $lang . "'}
    
                function main_domain(){return '" . $jsurl . "'}
    
                function getUniqueValuesWithCase(e,t){let n=[];return[...new Set(t?e:e.filter(e=>{let t='string'==typeof e?e.toLowerCase():e;if(-1===n.indexOf(t))return n.push(t),e}))]}
    
                function showAllStorageData(a){var t='';if(t='',null!=(r=JSON.parse(localStorage.getItem(a)))){var r=(r=getUniqueValuesWithCase(r,!1)).filter(function(i){return null!=i});for(i=0;i<r.length&&!(i>9);i++)0!=r[i]&&null!=r[i]&&(t+='<span style=\'padding:5px 0px; overflow:hidden; display:block;\'>',t+='<div style=\'float:left\' class=\'label_font\'><a href=\''+main_domain()+'/english-to-'+lang()+'-meaning-'+r[i]+'\'>'+capitalizeFirstLetter(r[i])+'</a></div>',t+='</span>')}return'word_history'==a&&(t+='<div class=\'clear_fixdiv\'></div><button style=\'margin: 10px 0px 0px 0px;float: right;\' class=\'btn_default4 bdr_radius2 custom_bdr\'><a href=\'" . $main_array['baseurl'] . "english-to-" . $main_array['lang'] . "-dictionary-search-history\'>SEE ALL</a></button>'),'favs'==a&&(null!=r?(r.length>10&&(t+='<div class=\'clear_fixdiv\'></div><button style=\'margin: 10px 0px 0px 0px;float: right;\' class=\'btn_default4 bdr_radius2 custom_bdr\'><a href=\'" . $main_array['baseurl'] . "english-to-" . $main_array['lang'] . "-dictionary-favourite-words\'>SEE ALL</a></button>'),0==r.length&&(t+='<div class=\'clear_fixdiv\'>Currently you do not have any favorite word. Please click on the heart icon to add words in your favorite list</div>')):t+='<div class=\'clear_fixdiv\'>Currently you do not have any favorite word. Please click on the heart icon to add words in your favorite list</div>'),'search_history'==a&&(null!=r?(r.length>10&&(t+='<div class=\'clear_fixdiv\'></div><button style=\'margin: 10px 0px 0px 0px;float: right;\' class=\'btn_default4 bdr_radius2 custom_bdr\'><a href=\'" . $main_array['baseurl'] . "english-to-" . $main_array['lang'] . "-dictionary-search-history\'>SEE ALL</a></button>'),0==r.length&&(t+='<div class=\'clear_fixdiv\'>You have no word in search history!</div>')):t+='<div class=\'clear_fixdiv\'>You have no word in search history!</div>'),t}
    
    
                // document.getElementById('load_history').innerHTML = showAllStorageData('word_history');
                document.getElementById('load_favourite').innerHTML = showAllStorageData('favs');
                document.getElementById('load_search').innerHTML = showAllStorageData('search_history');
    
                //Header Nav Collapse JS
                function showHideMenu(){var e=document.getElementById('menu');'block'===e.style.display?e.style.display='none':e.style.display='block'}function capitalizeFirstLetter(e){return e.charAt(0).toUpperCase()+e.slice(1)}
    
                //Accordion JS
                function showHideAccordion(){var o=document.getElementById('accordion');'block'===o.style.display?o.style.display='none':o.style.display='block'}function showHideAccordion2(){var o=document.getElementById('accordion2');'block'===o.style.display?o.style.display='none':o.style.display='block'}function showHideAccordion3(){var o=document.getElementById('accordion3');'block'===o.style.display?o.style.display='none':o.style.display='block'}function showHideAccordion4(){var o=document.getElementById('accordion4');'block'===o.style.display?o.style.display='none':o.style.display='block'}function showHideAccordion5(){var o=document.getElementById('accordion5');'block'===o.style.display?o.style.display='none':o.style.display='block'}function showHideAccordion6(){var o=document.getElementById('accordion6');'block'===o.style.display?o.style.display='none':o.style.display='block'}function showHideAccordion7(){var o=document.getElementById('accordion7');'block'===o.style.display?o.style.display='none':o.style.display='block'}
    
                //Show Hide JS
                function show(){document.getElementById('opener').style.display='none',document.getElementById('closer').style.display='inline'}function hide(){document.getElementById('closer').style.display='none',document.getElementById('opener').style.display='inline'}
                
                function edValueKeyPress(){var e=document.getElementById('q'),t=e.value,n=t.slice(0,2),r=t.length;e.value.length<2&&(document.getElementById('myInputautocomplete-list').innerHTML=''),e.value.length>2&&load('". $apiurl ."searchApi.php?q='+n,t,function(e){var n=document.getElementById('myInputautocomplete-list');n.innerHTML='';var i=JSON.parse(e.responseText);if(void 0===i||0==i.length)load('". $apiurl ."wrong_word.php?q='+t,t,function(e){var r=JSON.parse(e.responseText);if(void 0===r||0==r.length);else{var i=r.filter((e,t,n)=>n.indexOf(e)===t);for(var l in n.innerHTML='',i)if(i.hasOwnProperty(l)&&i[l].length==t.length){var o=document.createElement('DIV');o.innerHTML=capitalizeFirstLetter(i[l]),o.onclick=function(){document.new_form.q.value=this.innerHTML,redirectUrl()},document.getElementById('myInputautocomplete-list').appendChild(o)}}});else{var l=0;for(var o in i)if(i.hasOwnProperty(o)&&(i[o].indexOf(t.toLowerCase()) != -1)){if(l<11){var a=document.createElement('DIV');a.innerHTML=capitalizeFirstLetter(i[o]),a.onclick=function(){document.new_form.q.value=this.innerHTML,redirectUrl()},document.getElementById('myInputautocomplete-list').appendChild(a)}l++}}})}
                
                function load(t,e,n){var a,r='q='+e;if('undefined'!=typeof XMLHttpRequest)a=new XMLHttpRequest;else for(var X=['MSXML2.XmlHttp.5.0','MSXML2.XmlHttp.4.0','MSXML2.XmlHttp.3.0','MSXML2.XmlHttp.2.0','Microsoft.XmlHttp'],M=0,f=X.length;M<f;M++)try{a=new ActiveXObject(X[M]);break}catch(t){}a.onreadystatechange=function(){if(a.readyState<4)return;if(200!==a.status)return;4===a.readyState&&n(a)},a.open('POST',t,!0),a.send(r)}
    
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
        </script>";
    
            if ($is_test == false) {
            
                
                echo $big_html;
    
                //file_put_contents('cache_scripts/search_pages/bengali/food', $big_html);
                //file_put_contents('cache_scripts/search_pages/'. $_GET['lang'] .'/english-to-bengali-meaning-'. strtolower(str_replace(' ', '-', $_GET['q'])), $big_html);
                die;
            }
            //  else {
            //     //file_put_contents('./search_pages/' . $_GET['lang'] . '/english-to-' . $_GET['lang'] . '-meaning-' . strtolower(str_replace(' ', '-', $_GET['q'])), $big_html);
            //     //file_put_contents('./cache_scripts/search_pages/'. $_GET['lang'] .'/english-to-'. $_GET['lang'] .'-meaning-'. strtolower(str_replace(' ', '-', $_GET['q'])), $big_html);
                
            //         // $file = './cache_scripts/search_pages/'. $_GET['lang'] .'/english-to-'. $_GET['lang'] .'-meaning-'. strtolower(str_replace(' ', '-', $_GET['q'])).'.gz';
                    
            //         //restricted word
            //         $file = './cache_scripts/restricted/english-to-'. $_GET['lang'] .'-meaning-'. strtolower(str_replace(' ', '-', $_GET['q'])).'.gz';
                    
            //         $gzfile = $file;
    
            //         $fp = gzopen( $gzfile, 'w9' );
                
            //         gzwrite( $fp, $big_html );
                
            //         gzclose( $fp );
            // }
    
        // $big_html = '';
    
        // main loop ends
    
    }
//}



?>