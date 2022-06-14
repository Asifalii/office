<?php

$server_name = str_replace('www.','',$_SERVER['SERVER_NAME']);

$newspaper_url = "http://" . $_SERVER['SERVER_NAME'];

$isMobile = 0;

if(preg_match("/(android|avantgo|ipad|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])){
    $isMobile = 1;
}

$ads = true;

$country = 'bangla';
$lang = 'bangladesh';
$site_title = 'AllBanglaNewspaperList24.com';
$analytics_id = '57188801';


if($server_name=='allindianewspaperlist.com')
{
    $country = 'india';
    $lang = 'indian';
    $site_title = 'AllIndiaNewspaperList.com';
    $analytics_id = '87987245';
}

$lang_uc = ucfirst($lang);
$country_uc = ucfirst($country);
$site = 'https://www.allbanglanewspaperlist24.com/';
$media = 'https://www.allbanglanewspaperlist24.com/';
?>

<!doctype html>
<html>

<head>
	
    <meta testset="<?=$_SERVER['PHP_SELF']?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-XD9BQF2CNR"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-XD9BQF2CNR');
</script>

    <?php

    $title = 'List of All '.$lang_uc.' Newspapers 2020'.(($server_name=='allbanglanewspaperlist24.com')?'- বাংলাদেশের সংবাদপত্রসমূহ':'');

    switch(basename($_SERVER['PHP_SELF']))
    {
        case '/all-newspaper':
            $title = 'List of All '.$lang_uc.' Newspapers in '.$country_uc.' | All '.$lang_uc.' Newspaper List 2020';
            break;
        case '/all-online-newspapers':
            $title = 'List of All Online Newspapers in '.$country_uc.' | All '.$lang_uc.' Newspaper List 2020';
            break;
        case '/all-english-newspaper':
            $title = 'List of All English Newspapers in '.$country_uc.' | All '.$lang_uc.' Newspaper List 2020';
            break;
        case '/all-local-newspapers':
            $title = 'List of All '.$lang_uc.' Local Newspapers in '.$country_uc.' | All '.$lang_uc.' Newspaper List 2020';
            break;
        case '/all-blog':
            $title = 'List of All '.$lang_uc.' Blog Sites in '.$country_uc.' | All '.$lang_uc.' Newspaper List 2020';
            break;
        case '/submit-newspaper':
            $title = 'Submit your newspaper | All '.$lang_uc.' Newspaper List 2020';
            break;
        case '/contact':
            $title = 'Contact Us | All '.$lang_uc.' Newspaper List 2020';
            break;
    }

    ?>



    <title><?=$title?></title>

    <meta name="Description" content="<?=$country?> newspaper, <?=$country?> newspapers, news paper in <?=$country?>, news paper of <?=$country?>, news papers <?=$country?>, news papers in <?=$country?>, news papers of <?=$country?>, ntv <?=$country?> news, online <?=$country?> news, star news <?=$country?>, the <?=$country?> news, bangla news paper in <?=$country?>, <?=$country?> and news, <?=$country?> bangla news, <?=$country?> bangla news paper, <?=$country?> bengali news, <?=$country?> daily news, <?=$country?> daily news paper, <?=$country?> daily news papers, <?=$country?> election news, <?=$country?> news, <?=$country?> news bdr, <?=$country?> news channel, <?=$country?> news daily, <?=$country?> news live, <?=$country?> news net, <?=$country?> news paper, <?=$country?> news paper bangla, <?=$country?> news paper daily, <?=$country?> news paper online, <?=$country?> news papers, <?=$country?> news pepar, <?=$country?> news today, <?=$country?> news tv, bbc <?=$country?> news, current <?=$country?> news, daily news paper in <?=$country?>, daily news paper of <?=$country?>, daily star <?=$country?> news, ittefaq news <?=$country?>, latest <?=$country?> news, latest news of <?=$country?>, news from <?=$country?>, news in <?=$country?>, news of <?=$country?>, news on <?=$country?>, news paper from <?=$country?>" />
    <meta name="Keywords" content="<?=$country?> newspaper, <?=$country?> newspapers, news paper in <?=$country?>, news paper of <?=$country?>, news papers <?=$country?>, news papers in <?=$country?>, news papers of <?=$country?>, ntv <?=$country?> news, online <?=$country?> news, star news <?=$country?>, the <?=$country?> news, bangla news paper in <?=$country?>, <?=$country?> and news, <?=$country?> bangla news, <?=$country?> bangla news paper, <?=$country?> bengali news, <?=$country?> daily news, <?=$country?> daily news paper, <?=$country?> daily news papers, <?=$country?> election news, <?=$country?> news, <?=$country?> news bdr, <?=$country?> news channel, <?=$country?> news daily, <?=$country?> news live, <?=$country?> news net, <?=$country?> news paper, <?=$country?> news paper bangla, <?=$country?> news paper daily, <?=$country?> news paper online, <?=$country?> news papers, <?=$country?> news pepar, <?=$country?> news today, <?=$country?> news tv, bbc <?=$country?> news, current <?=$country?> news, daily news paper in <?=$country?>, daily news paper of <?=$country?>, daily star <?=$country?> news, ittefaq news <?=$country?>, latest <?=$country?> news, latest news of <?=$country?>, news from <?=$country?>, news in <?=$country?>, news of <?=$country?>, news on <?=$country?>, news paper from <?=$country?>" />

    <?php
    if($ads = true AND $_SERVER['PHP_SELF']=='/index.php'){
        ?>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-2642708445471409",
                enable_page_level_ads: true
            });
        </script>

    <?php
    }
    ?>


    <link rel="shortcut icon" type="image/png" href="<?= $media ?>favicon.png">

    <style type="text/css">
        body,html{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;height:100%}body{margin:0;padding:0;font-family:Tahoma,Verdana,Segoe,sans-serif;font-size:.95rem;color:#333;background-color:#fff;overflow-x:hidden}h1,h2,h3,h4,h5,h6{margin:0 0 0 2px;padding:0;font-weight:700}p{margin:0;padding:0}a{text-decoration:none}a:focus,button:focus,img:focus,input:focus,textarea:focus{outline:0}h1{padding:8px;font-size:1.12rem;color:#333;border:1px solid #ededed;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;background:url(img/bg28.png) repeat;clear:both}h2{padding:8px;font-size:1.12rem;color:#145b85;border:1px solid #ededed;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;background:url(img/bg28.png) repeat;clear:both}.top_margin{margin-top:15px!important}.blank_space{width:100%;height:30px;clear:both}.blank_space2{width:100%;height:15px;clear:both}.blank_space3{width:100%;height:8px;clear:both}.text_center{text-align:center}.align_left{float:left}.align_right{float:right}.responsive_img{width:100%;max-width:100%;height:auto}.div_width{width:70%}.success_message{width:100%;height:auto;background-color:#3f7c3b;color:#fff;font-weight:700;clear:both}.error_message{width:100%;height:auto;background-color:#c23133;color:#fff;font-weight:700;clear:both}.btn_default{margin-top:10px;padding:12px 24px;width:auto;font-size:.75rem;color:#fff;background-color:#043a54;text-align:center;text-transform:uppercase;border:1px solid #ededed;cursor:pointer;float:right}.btn_default:hover{background-color:#00aa9a;border:1px solid #ededed}#site_wrapper{margin-top:61px;position:relative;width:100%;height:auto;overflow:hidden}.header_wrapper{position:fixed;top:0;z-index:99;width:100%;height:60px;background-color:#145b85;border-bottom:1px solid #ededed}.header_wrapper .header_logo a{padding-left:2px;color:#fff;font-size:1.5rem;font-weight:900;line-height:60px;float:left}.content_wrapper{margin:0 auto;max-width:100%;width:1090px;height:auto;position:relative}.css_menu{position:absolute;right:0;z-index:999}.css_menu ul{margin:0;padding:0}.css_menu .show-menu,.css_menu ul{list-style-type:none;float:right}.css_menu li{margin-right:1px;display:inline-block;float:left}.css_menu li a{padding:0 15px;display:block;color:#fff;font-weight:600;text-decoration:none;text-align:left;line-height:60px}.css_menu li:hover a{color:#333;background-color:#fff}.css_menu li:hover ul a{color:#333;border-bottom:1px solid #ededed}.css_menu .show-menu,.css_menu li:hover ul a:hover{color:#fff;background-color:#145b85}.css_menu li ul{margin-left:-1px;position:absolute;display:none;border:1px solid #ededed;border-bottom:none}.css_menu li ul li{margin-right:0;display:block;float:none}.css_menu li ul li a{width:auto;line-height:35px;font-weight:400}.css_menu ul li a:hover+.hidden,.hidden:hover{display:block}.css_menu .show-menu{display:none}.css_menu input[type=checkbox]{display:none}.css_menu input[type=checkbox]:checked~#menu{display:block}.css_menu_active{color:#333!important;background-color:#fff}.menu-icon{padding:3px;width:25px;height:auto;border:2px solid #104b6d;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px}.box_wrapper{margin:0 auto;width:100%;height:auto;min-height:50px;background-color:#fff;-webkit-box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-box-shadow:0 0 4px 0 rgba(0,0,0,.25);box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;overflow:hidden}.inner_wrapper{margin:18px 15px 15px 15px;overflow:hidden}.inner_wrapper p{margin-bottom:15px;margin-left:6px;line-height:24px;text-align:justify}.thumb_panel{margin:10px -5px 0 -5px}.thumb_panel .thumbs{margin:6px;padding:0;width:164px;height:31px;border:1px solid #ededed;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;float:left}.thumb_panel .thumbs:hover{-webkit-box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-box-shadow:0 0 4px 0 rgba(0,0,0,.25);box-shadow:0 0 2px 0 rgba(0,0,0,.25)}.thumb_panel .thumbs img{width:164px;height:31px;vertical-align:middle;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px}.form_input{margin:0 15px;padding:15px 0;overflow:hidden}.form_input .items{margin-bottom:10px;width:100%;overflow:hidden;clear:both}.form_input label{width:30%;text-indent:6px;line-height:35px;float:left}.form_input [type=file],.form_input input[type=email],.form_input input[type=phone],.form_input input[type=text],.form_input textarea{padding:8px;width:40%;color:#666;font-size:.95rem;border:1px solid #ddd;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-moz-box-shadow:inset 0 0 2px #ddd;-webkit-box-shadow:inset 0 0 2px #ddd;box-shadow:inset 0 0 2px #ddd;text-transform:capitalize;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;float:left}.form_input input[type=submit]{padding:10px 15px;width:auto;color:#fff;font-size:.85rem;font-weight:700;border:1px solid #104f74;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-moz-box-shadow:inset 0 0 10px #064265;-webkit-box-shadow:inset 0 0 10px #064265;box-shadow:inset 0 0 10px #064265;text-transform:uppercase;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;cursor:pointer;background-color:#145b85;float:right}.form_input input[type=submit]:hover{background-color:#146fa5}.google_add_space{margin:8px 8px 27px 8px;width:340px;height:310px;float:right;background-color:#fff}.google_add_space2{margin:0 auto;width:750px;height:95px;background-color:#fff}.footer_wrapper{margin:0 auto 5px;padding:0 4px;max-width:100%;width:1090px;display:block;clear:both}.footer_wrapper span{font-size:.75rem;color:#555;line-height:50px;display:block}.footer_wrapper span a{color:#333}.footer_wrapper span a:hover{color:#00327d}.android_banner{margin-bottom:15px;width:auto;-moz-box-shadow:0 0 4px 0 rgba(0,0,0,.25);box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;display:block;text-align:center;background-color:#98b853}.android_banner a{text-align:center;color:#fff;font-weight:700;font-size:16px;display:block;padding:15px 10px 10px 10px}.android_banner a img{vertical-align:middle;margin-top:-5px;border:2px solid #fff;-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;background-color:#fff}@media screen and (max-width:1024px){.inner_wrapper p{text-align:left}.footer_wrapper{padding:5px 0}.footer_wrapper span{padding:0 15px;line-height:22px;text-align:center;float:none}.header_logo a{padding-left:15px!important}.thumb_panel .thumbs{width:18.585%;height:auto}.thumb_panel .thumbs img{width:100%;height:31px}.google_add_space{width:100%;height:auto}.google_add_space img{width:100%;max-width:100%;height:auto}.google_add_space2{width:100%;height:auto}.google_add_space2 img{width:100%;max-width:100%;height:auto}}@media screen and (max-width:960px){.inner_wrapper p{text-align:left}.footer_wrapper{padding:5px 0}.footer_wrapper span{padding:0 15px;line-height:22px;text-align:center;float:none}.header_logo a{padding-left:15px!important}.res_top_margin{margin-top:0!important}.thumb_panel .thumbs{width:23%;height:auto}.thumb_panel .thumbs img{width:100%;height:31px}.google_add_space{width:100%;height:auto}.google_add_space img{width:100%;max-width:100%;height:auto}.google_add_space2{width:100%;height:auto}.google_add_space2 img{width:100%;max-width:100%;height:auto}}@media screen and (max-width:900px){.css_menu{width:auto}.css_menu ul{width:100%;position:relative;top:-5px;display:none}.css_menu li{border-top:1px solid #fff}.css_menu li a,.css_menu ul li{width:100%;line-height:45px;background-color:#104b6d}.css_menu .show-menu{margin:15px;display:block}.css_menu li ul{width:100%;height:235px;overflow:scroll;position:relative;top:0}.header_logo a{padding-left:15px!important;width:80%;overflow:hidden}}@media screen and (max-width:854px){.form_input{margin:0 5px;padding:0}.form_input label{line-height:30px}.form_input label{width:100%;text-indent:0;clear:both}.form_input [type=file],.form_input input[type=email],.form_input input[type=phone],.form_input input[type=text],.form_input textarea{width:100%;clear:both}.form_input input[type=submit]{margin-top:10px;float:left;clear:both}.inner_wrapper p{text-align:left}.footer_wrapper{padding:5px 0}.footer_wrapper span{padding:0 15px;line-height:22px;text-align:center;float:none}.thumb_panel .thumbs{width:23%;height:auto}.thumb_panel .thumbs img{width:100%;height:31px}.google_add_space{width:100%;height:auto}.google_add_space img{width:100%;max-width:100%;height:auto}.google_add_space2{width:100%;height:auto}.google_add_space2 img{width:100%;max-width:100%;height:auto}}@media screen and (max-width:768px){.form_input{margin:0 5px;padding:0}.form_input label{line-height:30px}.form_input label{width:100%;text-indent:0;clear:both}.form_input [type=file],.form_input input[type=email],.form_input input[type=phone],.form_input input[type=text],.form_input textarea{width:100%;clear:both}.form_input input[type=submit]{margin-top:10px;float:left;clear:both}.inner_wrapper p{text-align:left}.footer_wrapper{padding:5px 0}.footer_wrapper span{padding:0 15px;line-height:22px;text-align:center;float:none}}@media screen and (max-width:667px){.form_input{margin:0 5px;padding:0}.form_input label{line-height:30px}.form_input label{width:100%;text-indent:0;clear:both}.form_input [type=file],.form_input input[type=email],.form_input input[type=phone],.form_input input[type=text],.form_input textarea{width:100%;clear:both}.form_input input[type=submit]{margin-top:10px;float:left;clear:both}.inner_wrapper p{text-align:left}.footer_wrapper{padding:5px 0}.footer_wrapper span{padding:0 15px;line-height:22px;text-align:center;float:none}.thumb_panel .thumbs{width:30.55%;height:auto}.thumb_panel .thumbs img{width:100%;height:31px}.google_add_space{width:100%;height:auto}.google_add_space img{width:100%;max-width:100%;height:auto}.google_add_space2{width:100%;height:auto}.google_add_space2 img{width:100%;max-width:100%;height:auto}}@media screen and (max-width:480px){.form_input{margin:0 5px;padding:0}.form_input label{line-height:30px}.form_input label{width:100%;text-indent:0;clear:both}.form_input [type=file],.form_input input[type=email],.form_input input[type=phone],.form_input input[type=text],.form_input textarea{width:100%;clear:both}.form_input input[type=submit]{margin-top:10px;float:left;clear:both}.inner_wrapper p{text-align:left}.footer_wrapper{padding:5px 0}.footer_wrapper span{padding:0 15px;line-height:22px;text-align:center;float:none}.thumb_panel .thumbs{width:46.35%;height:auto}.thumb_panel .thumbs img{width:100%;height:31px}.google_add_space{width:100%;height:auto}.google_add_space img{width:100%;max-width:100%;height:auto}.google_add_space2{width:100%;height:auto}.google_add_space2 img{width:100%;max-width:100%;height:auto}.header_logo a{width:80%;font-size:1.3rem!important}}@media screen and (max-width:384px){.thumb_panel .thumbs{width:45%;height:auto}.thumb_panel .thumbs img{width:100%;height:31px}.google_add_space{width:100%;height:auto}.google_add_space img{width:100%;max-width:100%;height:auto}.google_add_space2{width:100%;height:auto}.google_add_space2 img{width:100%;max-width:100%;height:auto}.header_logo a{width:80%;font-size:1.175rem!important}}@media screen and (max-width:360px){.header_logo a{width:80%;font-size:1.125rem!important}}@media screen and (max-width:320px){.header_logo a{width:78%;font-size:.98rem!important}}
    </style>
</head>

<body>
    <!--Site Wrapper-->
    <div id="site_wrapper">
        <div class="header_wrapper" id="header_wrapper">
            <div class="content_wrapper">
                <div class="header_logo">
                    <a href="<?= $site ?>">AllBanglaNewspaperList24.com</a>
                </div>
                <div class="css_menu">
                    <label for="show-menu" class="show-menu" id="showMenu">
                        <img class="menu-icon" src="<?= $media ?>img/menu-icon.png" alt="Menu">
                    </label>
                    <input type="checkbox" id="show-menu" role="button" onClick="showMenu()">
                    <ul class="parent" id="menu">
                        <li><a class="" href="<?= $site ?>">Home</a></li>
                        <li id="dismiss">
                            <a href="#" onclick="newspapers(this)" onmouseover="newspapers(this)">Newspapers ￬</a>

                            <?php  if($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/index.php') {?>

                            <ul class="hidden" id="sub_menu">
                                <li onclick="dismiss(this);"><a href="#bangla" onclick="smoothScroll('bangla')">All Bangla Newspapers</a></li>
                                <li onclick="dismiss(this);"><a href="#online" onclick="smoothScroll('online')">All Online Newspapers</a></li>
                                <li onclick="dismiss(this);"><a href="#local" onclick="smoothScroll('local')">All Local Newspapers</a></li>
                                <li onclick="dismiss(this);"><a href="#tv" onclick="smoothScroll('tv')">All TV Channels</a></li>
                                <li onclick="dismiss(this);"><a href="#inter" onclick="smoothScroll('inter')">International Newspapers</a></li>
                                <li onclick="dismiss(this);"><a href="#radio" onclick="smoothScroll('radio')">All Radio Channels</a></li>
                                <li onclick="dismiss(this);"><a href="#intertv" onclick="smoothScroll('intertv')">Important International TV Channels</a></li>
                                <li onclick="dismiss(this);"><a href="#indian" onclick="smoothScroll('indian')">Popular Indian Newspapers</a></li>
                                <li onclick="dismiss(this);"><a href="#magazine" onclick="smoothScroll('magazine')">Popular Magazines</a></li>
                                <li onclick="dismiss(this);"><a href="#jobs" onclick="smoothScroll('jobs')">Popular Job Sites</a></li>
                                <li onclick="dismiss(this);"><a href="#edu" onclick="smoothScroll('edu')">Popular Educational Sites</a></li>
                            </ul>

                            <?php }else{ ?>
                            <ul class="hidden" id="sub_menu">
                                <li><a href="<?= $site ?>#bangla">All Bangla Newspapers</a></li>
                                <li><a href="<?= $site ?>#online">All Online Newspapers</a></li>
                                <li><a href="<?= $site ?>#local">All Local Newspapers</a></li>
                                <li><a href="<?= $site ?>#tv">All TV Channels</a></li>
                                <li><a href="<?= $site ?>#inter">International Newspapers</a></li>
                                <li><a href="<?= $site ?>#radio">All Radio Channels</a></li>
                                <li><a href="<?= $site ?>#intertv">Important International TV Channels</a></li>
                                <li><a href="<?= $site ?>#indian">Popular Indian Newspapers</a></li>
                                <li><a href="<?= $site ?>#magazine">Popular Magazines</a></li>
                                <li><a href="<?= $site ?>#jobs">Popular Job Sites</a></li>
                                <li><a href="<?= $site ?>#edu">Popular Educational Sites</a></li>
                            </ul>
                            <?php }?>
                        </li>
                        <li><a href="<?= $site ?>submit-newspaper">Submit Newspaper</a></li>
                        <li><a href="<?= $site ?>contact-us">Contact Us</a></li>
						<li><a href="<?= $site ?>privacy">Privacy</a></li>
						<li>
							<a href="https://play.google.com/store/apps/details?id=com.dimoff.sitepointmobile" target="_blank" title="Android App" style="position:relative;top:10px;background-color:transparent!important;">
								<img src="<?= $media ?>img/android-icon.png" width="30" height="30" alt="Android App">
							</a>
						</li>
                    </ul>    
                </div>
            </div>
        </div>

        <div class="content_wrapper top_margin res_top_margin">

    
    
    
    