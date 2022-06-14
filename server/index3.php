<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('search-functions.php');
moveHttpToHttps();
if($_GET['msg']=='not-found'){
	header("HTTP/1.0 404 Not Found");
}

require_once('functions.php');
// redirectOlds();

if(isset($_GET['q']) && $_GET['q'] != null){
	$q 				= sanitize($_GET['q'],$conn);
}else{
	$q 				= '';
}



if(preg_match('#::#', $q))
{
	$q_ex = explode('::', $q);
	$q = trim($q_ex[1]);
}

$info 			= array();
$url 			= base_url();
$lang 			= getLang();
$ulang 			= ucfirst($lang);
$inWordList 	= true;
	
$isMobile 		= isMobile();

$base_url = $url.'/';



?>



<!doctype html>
<html>
    
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="<?=googleSiteVerify()?>" />
	
	
	
	<title><?=getTitle($q, $url)?></title>
	
	<?php 
$local_lang = ($lang=='bengali')?'Popular as ইংরেজি বাংলা অভিধান':'';
$m_des = ($q)?$q.' - Meaning in '.$ulang.', what is meaning of common in '.$ulang.' dictionary, audio pronunciation, synonyms and definitions of common in '.$ulang.' and English.':'English to '.$ulang.' bilingual free online dictionary with English '.$ulang.' translation, English '.$ulang.' word meanings, definitions, synonyms and antonyms in '.$ulang.' and English. '.$local_lang;
?>
	
    <meta name="description" content="<?=$m_des?>">
	
	<?php if(trim($_SERVER['DOCUMENT_URI'],'/') == 'index.php'){ ?>
      <link rel="canonical" href="<?=canonical($conn)?>" />
    <?php } ?>
	
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
	
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="English :: <?=$ulang?> Online Dictionary" />
	<meta property="og:description" content="English to <?=$ulang?> Dictionary (Free). You can get meaning of any English word very easily. It has auto-suggestion feature which will save you a lot of time getting any meaning. We have a Chrome Extension and an Android App" />
	<meta property="og:url" content="<?=$url?>" />
	<meta property="og:site_name" content="English :: <?=$ulang?> Online Dictionary" />
    
	<link rel="shortcut icon" href="img/favicon.png">    
    <!--Google Font
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	-->
    
	
<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', '<?=analyticsId()?>', 'auto');
		ga('send', 'pageview');
	</script>
<?php endif; ?>
	
    <style>   
    h1{margin:0;padding:0;font-size:1.2rem;font-weight:500}h2{margin:0;padding:0;font-size:1.2rem;font-weight:500}.box_wrapper,.box_wrapper2{min-height:50px;overflow:hidden}.btn_default2 img,.btn_default3 img,.topic_link a img{margin-right:6px;float:left}.btn_default2 span,.btn_default3 span{line-height:30px}a,a:hover{text-decoration:none}body,html{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;height:100%}body{margin:0;padding:0;font-family:Tahoma, Verdana, Segoe, sans-serif!important; font-size:.95rem;color:#333;background-color:#f8f8f8;overflow-x:hidden}.btn_default,.custom_bgcolor{background-color:#043A54}.btn_default,.custom_font{font-size:.75rem}.custom_font,.custom_font2{color:#009385}a:focus,img:focus,button:focus,img:focus,input:focus{outline:0}.top_margin{margin-top:15px!important}.bdr_radius{-webkit-border-bottom-left-radius:3px;-webkit-border-bottom-right-radius:3px;-moz-border-radius-bottomleft:3px;-moz-border-radius-bottomright:3px;border-bottom-left-radius:3px;border-bottom-right-radius:3px}.bdr_radius2{-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px}.bdr_radius3{border:1px solid #add7d3}.inner_wrapper{margin:15px 15px 0}.btn_default,.btn_default2{font-weight:700;color:#fff;border:none;cursor:pointer}.btn_default3,.btn_default4,.btn_default5{color:#333;border:1px solid #ddd;cursor:pointer}.align_left{float:left}.align_right{float:right}.btn_default{margin-right:3px;padding:10px 15px;text-transform:uppercase}.btn_default2,.btn_default3{padding:14px 15px;text-align:left;width:100%;text-transform:uppercase}.btn_default:hover,.btn_default_active{background-color:#00aa9a}.btn_default2{margin-bottom:15px;font-size:.95rem;background-color:#043A54;-webkit-box-shadow:0 1px 4px 0 rgba(0,0,0,.35);-moz-box-shadow:0 1px 4px 0 rgba(0,0,0,.35);box-shadow:0 1px 4px 0 rgba(0,0,0,.35)}.btn_default2 img{margin:0 5px 0 0;vertical-align:middle}.btn_default2:hover{background-color:#00aa9a}.btn_default3{margin-bottom:15px;font-size:1rem;font-weight:900;background-image:url(img/bg28.png);background-repeat:repeat;-webkit-box-shadow:0 1px 1px 0 rgba(0,0,0,.25);-moz-box-shadow:0 1px 1px 0 rgba(0,0,0,.25);box-shadow:0 1px 1px 0 rgba(0,0,0,.25)}.btn_default4,.btn_default5{padding:10px;font-size:.75rem;font-weight:700}.btn_default3 img{margin:-3px 5px 0 0;vertical-align:middle}.btn_default3:hover{background-image:url(../img/bg28-hover.png);background-repeat:repeat}.btn_default4{margin:6px 3px;background-color:#fff}.btn_default4:hover{background-color:#fafafa}.btn_default5{margin:10px 0 10px 10px;width:97%;background-color:#fff;text-align:center;text-transform:uppercase}.btn_default5:hover{background-color:#fafafa}#site_wrapper{width:100%;height:auto;overflow:hidden}.content_wrapper{margin:0 auto;max-width:100%;width:1140px;height:auto;position:relative}.left_content{width:65%;float:left}.right_content{width:34%;float:right}.box_wrapper{margin:4px auto 16px;width:99%;height:auto;background-color:#fff;-webkit-box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-box-shadow:0 0 4px 0 rgba(0,0,0,.25);box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper fieldset{margin:15px 15px 20px;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper fieldset legend{margin-left:10px;font-size:1.22rem;font-weight:500}.box_wrapper fieldset .fieldset_body{padding:20px 13px;overflow:hidden}.box_wrapper fieldset .fieldset_body span{float:left}.search_fld{width:83.5%;position:relative;top:10px;left:15px;right:0;float:left}.search_fld input[type=text]{position:relative;z-index:1;width:100%;padding:10px;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-moz-box-shadow:inset 0 0 5px #ccc;-webkit-box-shadow:inset 0 0 5px #ccc;box-shadow:inset 0 0 5px #ccc;text-transform:capitalize;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.search_fld input[type=text]:focus{border:1px solid #bbb}.search_btn{padding:19px;width:22px;height:22px;position:absolute;top:1px;right:0;z-index:2;background-color:transparent;background-image:url(img/search_icon.png);background-position:center center;border-left:1px solid #666;border-right:0;border-top:0;border-bottom:0;background-repeat:no-repeat;cursor:pointer;opacity:.35;transition:opacity .5s ease-out;-moz-transition:opacity .5s ease-out;-webkit-transition:opacity .5s ease-out;-o-transition:opacity .5s ease-out}.footer_wrapper{display:block;clear:both}.footer_wrapper,.topic_link a:first-child{border-top:1px solid #ddd}.footer_wrapper,.topic_link a{border-bottom:1px solid #ddd;overflow:hidden}.search_btn:hover{opacity:.75}.topic_link{margin:0;padding:0}.topic_link a{margin-left:3px;padding:12px 0;width:100%;color:#333;line-height:25px;display:block}.topic_link a:hover{background-color:#fafafa}.topic_link span{line-height:25px}.topic_link span img{margin-right:5px;vertical-align:middle}.box_wrapper2{margin:4px auto 17px;width:99%;height:auto;background-color:#fff;-webkit-box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-box-shadow:0 0 4px 0 rgba(0,0,0,.25);box-shadow:0 0 4px 0 rgba(0,0,0,.25);-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper2 fieldset{margin:0 0 20px;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.box_wrapper2 fieldset legend{margin-left:10px;font-size:1.08rem;font-weight:500}.box_wrapper2 fieldset .fieldset_body{padding:13px;overflow:hidden}.footer_wrapper{margin:0 auto 5px;padding:0 4px;max-width:100%;width:1124px}.footer_wrapper span{font-size:.75rem;color:#555;line-height:50px;display:block}.footer_wrapper span a{color:#333}.footer_wrapper span a:hover{color:#00aa9a}button a{color:#333;display:block}button a:hover{color:#009385;text-decoration:none!important}button a span{color:#fff}button a label{color:#333;line-height:30px}.custom_bdr{border:1px solid #aaa}.responsive_img{width:100%;max-width:100%;height:auto}
    
    /*Header Wrapper*/    
    .header_wrapper{position:relative;top:0;width:100%;height:auto;background-color:#043A54;overflow:hidden}.header_logo a,.header_wrapper .header_logo{padding-left:2px;color:#fff;font-size:1.5rem;font-weight:900;line-height:60px;float:left;width:10.5%;}.header_wrapper .header_nav{padding-right:2px;float:right}.header_wrapper .header_nav ul{margin:0;padding:0}.header_wrapper .header_nav ul li{margin:0;padding:0;list-style-type:none;display:inline;float:left}.header_wrapper .header_nav ul li a{padding:0 15px;color:#fff;font-size:.95rem;font-weight:700;line-height:58px;text-transform:uppercase;text-align:center;border:1px solid #043A54;border-right:none;float:left}.header_wrapper .header_nav ul li a:hover{color:#fff;background-color:#00aa9a;border:1px solid #043A54;border-right:none}.header_wrapper .header_nav ul li a.active{background-color:#00aa9a}.header_nav_collapse{width:100%;display:inline-block;float:left}.header_nav_collapse ul{margin-top:3px;padding:0;width:100%;list-style:none;display:none;margin-bottom:10px}.header_nav_collapse ul li{width:100%;height:auto;position:relative;top:-3px;z-index:3;transition:all .5s;opacity:1;display:inline-block;color:#fff;border-bottom:1px solid #084a6a;background-color:#043A54;text-indent: 15px}.header_nav_collapse ul li:hover{background:#00aa9a}.header_nav_collapse ul li a{padding:15px 0px;color:#fff;text-decoration:none;display:block}.header_nav_collapse ul li:last-child{border-bottom:none;-webkit-border-bottom-left-radius:4px;-webkit-border-bottom-right-radius:4px;-moz-border-radius-bottomleft:4px;-moz-border-radius-bottomright:4px;border-bottom-left-radius:4px;border-bottom-right-radius:4px}.header_nav_collapse label{position:absolute;top:10px;right:0px;padding:11px 9px 7px 9px;display:inline-block;border:2px solid #00a091;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px;cursor:pointer}.header_nav_collapse label:before{width:20px;height:2px;background:#fff;display:inline-block;content:"";box-shadow:0 -6px 0 0 #fff,0 -12px 0 0 #fff;transition:all .5s;opacity:1}
        
    /*Auto Suggest CSS*/
    .autocomplete{position:relative;display:inline-block}.autocomplete-items{position:relative;border:1px solid #ddd;border-bottom:none;border-top:none;z-index:99;top:0px;left:0;right:0;}.autocomplete-items div{padding:8px 10px;cursor:pointer;background-color:#fff;border-bottom:1px solid #ddd}.autocomplete-items div:hover{background-color:#fafafa}.autocomplete-items:last-child{-webkit-border-bottom-left-radius:3px;-moz-border-radius-bottomleft:3px;border-bottom-left-radius:3px;-webkit-border-bottom-right-radius:3px;-moz-border-radius-bottomright:3px;border-bottom-right-radius:3px;margin-bottom:20px}
        
    /*Read Text Page CSS*/     
    .btn_default6,h6{font-weight:700;clear:both}h6{margin:0;padding:10px 0;font-family:Roboto,sans-serif;font-size:1.15rem;color:#333;border-top:1px solid #ddd;border-bottom:1px solid #ddd}.top_margin2{margin-top:45px}.custom_font3{font-size:1.12rem;color:#009385;line-height:24px}.clear_fixdiv{margin:0;padding:0;display:block;clear:both}.btn_default6{margin-top:10px;padding:12px 24px;width:auto;font-size:.75rem;color:#fff;background-color:#043A54;text-align:center;text-transform:uppercase;border:1px solid #043045;cursor:pointer;float:right}.btn_default6:hover{background-color:#00aa9a;border:1px solid #009a8b}.box_wrapper fieldset .fieldset_body textarea{position:relative;z-index:1;width:97%;margin:0;padding:10px;font-family:Roboto,sans-serif;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-top-left-radius:3px;-moz-border-radius-topleft:3px;border-top-left-radius:3px;-webkit-border-top-right-radius:3px;-moz-border-radius-topright:3px;border-top-right-radius:3px;-webkit-border-bottom-right-radius:3px;-moz-border-radius-bottomright:3px;border-bottom-right-radius:3px;-moz-box-shadow:inset 0 0 5px #ccc;-webkit-box-shadow:inset 0 0 5px #ccc;box-shadow:inset 0 0 5px #ccc; display:block}.box_wrapper fieldset .fieldset_body textarea:focus{border:1px solid #bbb; outline:none}.gif_img{width:100%;min-width:100%; height:auto;border:2px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.text_color{color:#fff}.pagination{margin:0px 15px 25px 0px;display:inline-block;float:right;clear:both}.pagination a{margin-left:3px;color:#333;float:left;padding:5px 10px;text-decoration:none;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.pagination a.active{background-color:#009385;color:#fff;border:1px solid #01877a}.pagination a:hover:not(.active){background-color:#fafafa;border:1px solid #ddd}    
    
    /*All Topic Words CSS*/
    .pagination{margin:0px 15px 25px 0px;display:inline-block;float:right;clear:both}.pagination a{margin-left:3px;color:#333;float:left;padding:5px 10px;text-decoration:none;border:1px solid #ddd;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.pagination a.active{background-color:#009385;color:#fff;border:1px solid #01877a}.pagination a:hover:not(.active){background-color:#fafafa;border:1px solid #ddd}.btn_active{background-color:#fafafa}.inner_details{line-height:22px}.inner_details span{width:100%;padding:15px 0px;border-bottom:1px solid #eaeaea;clear:both}.inner_details label{font-weight:500; color:#009385;text-transform:capitalize}.inner_details span:first-child{padding-top:0}.inner_details a{color:#333;text-decoration:none}.inner_details a:hover{color:#009385;text-decoration:underline;cursor:pointer}.inner_details .label_font{margin-right:5px;font-weight:500;color:#009385;float:left}.img_align{display:inline-flex;line-height:28px}.img_align img{margin:0px 8px}.align_text{font-weight:500;line-height:28px;float:left}.align_text2{margin:0px 8px; color:#333;line-height:28px;float:left}.line_height{line-height:35px}.float_left{float:left}.float_div{width:50%; float:left}.custom_margin{margin-bottom:8px}.custom_margin2{margin-bottom:20px;clear:both}.custom_margin3{margin-top:8px!important;float:left;clear:both}
    
    /*Accordion CSS*/
    .accordion_collapse{overflow:hidden;clear:both}.accordion_collapse h4{margin:0;padding:8px;border:1px solid #eaeaea;-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px;background-color:#fafafa;outline:none;cursor:pointer}.custom-accordion-content{padding:15px 8px;display:block}.icon_right{font-size:0.8rem;color:#009385!important;float:right}
        
    /*Search Result Page*/
    .dic_img img{width:340px;height:auto;padding:15px 10px 10px 10px;border:1px dashed #ddd}.h_line{margin:0 0 15px 0;border-top:1px solid #eaeaea;clear:both}.h_line2{margin:15px 0 15px 0;border-top:1px solid #eaeaea;clear:both}    
    
    /*Vocabulary Game Page CSS*/
    .alert_text{color:#e90505}.success_text{color:#009d2c}
    
    /*Contact Page CSS*/
    .contact{margin:0;padding:0;display:block;overflow:hidden}.contact p{margin:0;padding:0}.contact input[type=text]{margin-bottom:12px;width:100%;padding:10px;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-moz-box-shadow:inset 0 0 3px #ccc;-webkit-box-shadow:inset 0 0 3px #ccc;box-shadow:inset 0 0 3px #ccc;text-transform:capitalize;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.contact input[type=text]:focus{border:1px solid #bbb}.contact textarea{margin-bottom:12px!important;width:100%!important;padding:10px;color:#333;font-size:.95rem;font-weight:400;border:1px solid #ccc;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-moz-box-shadow:inset 0 0 3px #ccc!important;-webkit-box-shadow:inset 0 0 3px #ccc!important;box-shadow:inset 0 0 3px #ccc!important;text-transform:capitalize;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.contact textarea:focus{border:1px solid #bbb}    
     
    /*Miscellaneous CSS*/
    .custom_font4{color:#333;font-size:1.12rem;font-weight:500}::-webkit-input-placeholder{text-transform:none}::-moz-placeholder{text-transform:none}:-ms-input-placeholder{text-transform:none}:-moz-placeholder{text-transform:none}.cursor_link{cursor:pointer}.btn_pre{background-color:#009385;border:1px solid #01877a;float:left}.btn_pre:hover{background-color:#fff; border:1px solid #ddd}.btn_next{background-color:#009385;border:1px solid #01877a;float:right}.btn_next:hover{background-color:#fff;border:1px solid #ddd}.btn_pre a,.btn_next a{padding:8px 12px;color:#fff;font-size:0.925rem;font-weight:700;text-decoration:none}.btn_pre a:hover,.btn_next a:hover{text-decoration:none}.desc_text p{margin:0;padding:0;clear:both}.desc_text a{color:#009385}.texture_btn{background-image:url(img/bg28.png);background-repeat:repeat}.btn_bdrcolor1{border-color:#bcc4c8}.btn_bdrcolor2{border-color:#ffc2af}.btn_bdrcolor3{border-color:#49d5c8}.btn_activebg{background-image:url(img/bg28-hover.png);background-repeat:repeat}
      
	/*Words by Category*/
    .words_category{margin-bottom:10px;overflow:hidden;clear:both}.words_category:last-child{margin-bottom:0}.words_category h5{margin:0;padding:5px;font-size:1rem;font-weight:700;color:#009385}.words_category h5 img{vertical-align:middle}.words_category label{margin:0;padding:10px 10px 10px 10px;color:#333;background-color:#f8f8f8;cursor:pointer;display:block}.words_category .category_cards{margin:0}.words_category .category_cards a{width:49.35%;padding:10px;border:1px solid #ddd;border-bottom:5px solid #ededed;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;box-sizing:border-box;float:left;overflow:hidden}.category_cards a:hover{border:1px solid #ccc;border-bottom:5px solid #ccc}.words_category .category_cards:nth-child(even) a{float:right}.custom_color3{color:#043A54!important}
    .custom_color4{color:#ff8a00!important}.custom_color5{color:#0096ff!important}  
	
	/*Custom Database Style*/
    .custom_dbstyle{margin:0}.custom_dbstyle ol,.custom_dbstyle span{line-height:normal!important;clear:both!important}.custom_dbstyle ol,.custom_dbstyle p,.custom_dbstyle span{padding:0;font-family:Roboto,sans-serif!important;font-size:.95rem!important;color:#333!important}.custom_dbstyle{margin:0}.custom_dbstyle p{margin:0 0 15px!important}.custom_dbstyle ol{margin:0 15px 15px!important}.custom_dbstyle ol li{margin:0;padding:0}.custom_dbstyle span{margin:0 0 15px!important}.jumbotron h2{display:none}.custom_dbstyle table{width:94%!important;margin:0 0 5px!important;table-layout:auto!important;border:0!important;font-weight:500!important}.custom_dbstyle table td{padding:5px!important}.custom_dbstyle ul{margin:0!important;padding:0!important;overflow:hidden!important}.custom_dbstyle ul li{margin:0!important;padding:0!important;list-style-type:none!important}  
    
	/*CSS by Sajjad*/
    .icon_button{border: 0; background-color: transparent;padding: 0px; margin: 0px;}	
	
	/*Modal CSS*/
	.modal-header{border-bottom:1px solid #e5e5e5}.modal-header .close{position:absolute;right:12px;top:12px}.modal-title{margin:15px 0 0}@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto}}.modal-content{padding:10px}.modal-content .modal-header{border-bottom:none}.modal-content .modal-body{padding:0 8px}.modal-content .modal-footer{border-top:none;padding:7px}.modal-content .modal-footer button{margin:0;width:auto;position:relative;right:2px;bottom:0}.modal-content .modal-body+.modal-footer{padding-top:0}.modal,.modal-open{overflow:hidden}.modal,.modal-backdrop{top:0;right:0;bottom:0;left:0}.modal{display:none;position:fixed;z-index:1050;-webkit-overflow-scrolling:touch;outline:0}.modal.fade .modal-dialog{-webkit-transform:translate(0,-25%);-ms-transform:translate(0,-25%);-o-transform:translate(0,-25%);transform:translate(0,-25%);-webkit-transition:-webkit-transform .3s ease-out;-o-transition:-o-transform .3s ease-out;transition:transform .3s ease-out}.modal.in .modal-dialog{-webkit-transform:translate(0,0);-ms-transform:translate(0,0);-o-transform:translate(0,0);transform:translate(0,0)}.modal-open .modal{overflow-x:hidden;overflow-y:auto}.modal-dialog{position:relative;width:auto;margin:10px}.modal-content{position:relative;background-color:#fff;border:1px solid #999;border:1px solid rgba(0,0,0,.2);border-radius:6px;-webkit-box-shadow:0 3px 9px rgba(0,0,0,.5);box-shadow:0 3px 9px rgba(0,0,0,.5);-webkit-background-clip:padding-box;background-clip:padding-box;outline:0}.modal-backdrop{position:fixed;z-index:1040;background-color:#000}.modal-backdrop.fade{opacity:0;filter:alpha(opacity=0)}.modal-backdrop.in{opacity:.5;filter:alpha(opacity=50)}.modal-header{padding:10px}.modal-header button{border:0;background-color:transparent;font-size:30px}.modal-body{position:relative}.modal-footer{padding:15px;text-align:right;border-top:1px solid #e5e5e5}.modal-footer .btn+.btn{margin-left:5px;margin-bottom:0}.modal-footer .btn-group .btn+.btn{margin-left:-1px}.modal-footer .btn-block+.btn-block{margin-left:0}.modal-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto}.modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5)}.modal-sm{width:300px}}@media (min-width:992px){.modal-lg{width:900px}}
	
	/*Media Query CSS*/    
    @media only screen and (max-width:1024px){#site_wrapper{margin:0 auto;width:95%;padding:10px 0}.small_viewport_mergin{margin-left:28px;float:none;clear:both}.footer_wrapper{width:99%}.box_wrapper fieldset{margin:20px 0;border:0}.box_wrapper2 fieldset{padding:0;border:0}.box_wrapper2 fieldset .fieldset_body{padding:3px}.box_wrapper2 fieldset legend{margin-left:0}.header_wrapper{-moz-border-radius:4px;-webkit-border-radius:4px;border-radius:4px}.header_logo a,.header_wrapper .header_logo{padding-left:7px}.header_nav_collapse label{right:15px}.header_nav_collapse ul{margin-top:0}.search_fld{margin:0;width:91%;left:14px}.header_wrapper{padding-bottom:20px}.header_wrapper .header_logo{display:none}.header_nav_collapse ul{margin-top:15px}.header_nav_collapse ul li:last-child{margin-bottom:-15px}.autocomplete-items:last-child{margin-bottom:5px}}@media only screen and (max-width:1023px){.gallery_meaning .div_panel{margin:5px 0px;width:100%}}@media only screen and (max-width:854px){.search_fld{margin:0;width:89%;left:14px}.dic_img img{width:75%;height:auto}}@media only screen and (max-width:800px){.box_wrapper fieldset .fieldset_body textarea,.btn_default5{width:95%}}@media only screen and (max-width:768px){.box_wrapper fieldset .fieldset_body textarea{width:95%}.dic_img img{padding:0; width:100%;height:auto;border:0}.search_fld{width:89%}}@media only screen and (max-width:667px){.search_fld{margin:0;width:87%;left:14px}}@media only screen and (max-width:640px){.header_nav{display:none}.header_nav_collapse{display:inline}.header_nav_collapse ul li{width:100%}#menu{display:none}.btn_default3 img{width:30px;height:30px}.small_viewport_mergin{float:left}.btn_default5{width:94%}.search_fld{margin:0;width:87%;left:14px}.dic_img img{padding:0; width:100%;height:auto;border:0}}@media only screen and (max-width:600px){.box_wrapper fieldset .fieldset_body textarea{width:93%}.float_div{width:100%}.search_fld{margin:0;width:85%;left:14px}.dic_img img{padding:0; width:100%;height:auto;border:0}}@media only screen and (max-width:480px){.header_nav{display:none}.header_nav_collapse{display:inline}#menu{display:none}.left_content{width:100%;float:none;display:block}.box_wrapper fieldset legend{margin-left:0;font-size:1.16rem}.box_wrapper fieldset .fieldset_body{padding:10px 3px}.btn_default4{margin:3px;padding:8px}.btn_default5{width:98%;margin:20px 3px 10px 5px;padding:8px}.topic_link a{padding:10px 0}.small_viewport_mergin{margin-left:28px;float:left}.right_content{width:100%;float:none;display:block}.btn_default2{padding:10px}.btn_default3{padding:10px;font-size:.93rem}.btn_default3 img{width:30px;height:30px}.footer_wrapper{padding:8px 4px}.footer_wrapper span{float:none;line-height:25px}.search_fld{margin:0;width:82%;left:14px}.dic_img img{padding:0; width:100%;height:auto;border:0}.words_category{margin-bottom:0}.words_category .category_cards a {margin-bottom:10px;width:100%}}@media only screen and (max-width:414px){.box_wrapper fieldset .fieldset_body textarea{width:93%}.btn_default5{width:97%}.search_fld{margin:0;width:79%;left:14px}}@media only screen and (max-width:375px){.box_wrapper fieldset .fieldset_body textarea{width:92%}.dic_img img{padding:0; width:100%;height:auto;border:0}.search_fld{width:77%}}@media only screen and (max-width:320px){.btn_default5{width:96%}.search_fld{margin:0;width:74%;left:14px}}
	
    </style>

<?php

if($no_index_status==false){
	echo showAds($q, 'mobile-head', $conn);
}

?>
	
	
	
</head>

<body>

    <!--Site Wrapper-->
    <div id="site_wrapper">
        <div class="header_wrapper">
        	<div class="content_wrapper">
        		<div class="header_logo">
                	<a href="index.php" style="text-transform:uppercase;"><?=($lang=='bengali')?'BDWORD':$ulang?></a>
                </div>
                <div class="search_fld">
                    <form autocomplete="off" name="new_form" action="<?= $base_url; ?>" id="new_form"> 
						<input type="text" id="q" name="q" value="<?=(isset($_GET['q']))?$q:''?>" autocomplete="off" required placeholder="Type English word/phrase" onKeyPress="edValueKeyPress()" onKeyUp="edValueKeyPress()" />
                        <button type="submit" class="search_btn"></button>
						
						<div id="myInputautocomplete-list" class="autocomplete-items">
						
						</div>
                    </form>
                </div>    
			
                <div class="header_nav_collapse">
                	<label onclick="showHideMenu()"></label>
                    <ul id="menu">    
                    	<li>
                        	<a href="<?=$base_url?>">Home</a>
                        </li>
                        <li>
                        	<a href="<?=$base_url?>read-text.php">Read Text</a>
                        </li>
                        <li>
                        	<a href="<?=$base_url?>vocabulary-game.php">Games</a>
                        </li>
                        <li>
                        	<a href="<?=$base_url?>learn-ten-words-everyday.php">Words Everyday</a>
                        </li>
						<li>
                        	<a href="<?=$base_url?><?=$lang?>-to-english-dictionary" title="<?=$ulang?> to English Dictionary"><?=$ulang?> to English Dictionary</a>
                        </li>
						<li>
                        	<a href="<?=$base_url?>browse-words.php" title="Browse English Words">Browse Words</a>
                        </li>
						<!--li>
                        	<a href="<?=$base_url?>word-history.php" title="Browse Word History">Word History</a>
                        </li-->
						<li>
                        	<a href="<?=$base_url?>favourite-words.php" title="Browse Favorite Words">Favorite Words</a>
                        </li>
                        <li>
                        	<a href="<?=$base_url?>contact-us.php">Contact</a>
                        </li>
                    </ul>    
                </div>
        	</div>
        </div>
        
        <div class="content_wrapper top_margin">
            <div class="left_content">
	
	<div class="bs-docs-section">
	
		<div class="row">
		
			<div class="col-md-8">
				
				<div id="ad">
				
<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>
					<?php
						if($inWordList)
						{
							echo showAds($q, 'body-top', $conn);
						}
					?>
<?php endif; ?>
				

				</div>
				
				
				
				<div class="bs-component">

					<div class="jumbotron">
					
					<?php
					if($lang=='bengali'){
						$device = findDevice();
						if($device=='ios'){
							$download_link = 'https://itunes.apple.com/us/app/english-bengali-dictionary/id1213381239?ls=1&mt=8';
							$download_text = 'ios app';
						}elseif($device=='android')
						{
							$download_link = 'https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary';
							$download_text = 'android app';
						}elseif($device=='pc'){
							$download_link = 'https://chrome.google.com/webstore/detail/bdword-english-to-bengali/cogjmeckpkinhnidokapabgaoelhkbcl';
							$download_text = 'chrome extension';
						}
					?>
					
						<div class="download_box">
						
						<a href="https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary" style="display:block"><div class="pull-left download_box_img"><i class="icon-<?=$download_text?>"></i></div><div class="list-group-item-heading pull-left download_box_text"> Download <?=$download_text?></div></a>
						
						<div class="pull-right download_box_remove"><img src="<?=$url?>/imgs/clear.png"></div>
						
						</div>
						
					<?php
					}
					?>

					<?php
					
					if($q)
					{
						if(preg_match("/^[a-z]$/", $q[0])){
							echo '<h1 style="font-size:20px;">English to '.$ulang.' Meaning :: '.$q.'</h1>';
						}else
						{
							echo '<h1 style="font-size:20px;">'.$ulang.' to English Meaning :: '.$q.'</h1>';
						}
					}else{
						echo '<h1 style="font-size:20px;">English to '.$ulang.' Dictionary</h1>';
					}
					
					?>
					
						<form id="new_form" action="<?=$url?>/index.php">
							
							<div class="form-group label-floating serach-box <?=($q)?'is-focused':''?>">
								<div class="input-group search-group">
									<input type="search" class="form-control main-search" id="q" name="q" value="<?=(isset($_GET['q']))?$q:''?>" autocomplete="off" required placeholder="Type English or <?=$ulang?> word">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-fab btn-fab-mini serach_icon">
										  <img src="<?=$url?>/imgs/search.png" />
										</button>
									</span>
									
								</div>
							</div>
							
						<ul class="suggested_list">

						</ul>
							

						</form>
						
<p id="load_data2"></p>
						
<p>

<?php
require('connect3.php');
?>

</p>



						
						<?php if($q){ ?>
						<hr>
						<p>
						English to <?=$ulang?> Dictionary: <?=$q?><br>
						Meaning and definitions of <?=$q?>, translation in <?=$ulang?> language for <?=$q?> with similar and opposite words. Also find spoken pronunciation of <?=$q?> in <?=$ulang?> and in English language.<br><br>

						Tags for the entry "<?=$q?>"<br>
						What <?=$q?> means in <?=$ulang?>, <?=$q?> meaning in <?=$ulang?>, <?=$q?> definition, examples and pronunciation of <?=$q?> in <?=$ulang?> language.
						</p>
						<?php } ?>
						
						<p id="prev_data">
						
								<a class="btn btn-primary btn-raised" href="<?=$url?>/read-text">Read Text</a>
								<a class="btn btn-primary btn-raised" href="<?=$url?>/browse-words">Browse Words</a>
								<a class="btn btn-primary btn-raised" href="<?=$url?>/word-history">Word History</a>
								<a class="btn btn-primary btn-raised" href="<?=$url?>/favorite-words">Favorite Words</a>
								<a class="btn btn-primary btn-raised" href="<?=$url?>/vocabulary-game">Vocabulary Games</a>
								<a class="btn btn-primary btn-raised" href="<?=$url?>/learn-ten-words-everyday">Learn Ten Words Everyday</a>
								<a class="btn btn-primary btn-raised" href="<?=$url?>/learning-materials">Learning Materials</a>
								
<hr>

<?php
	
if(!$q){
	
$get_word_day = json_decode(file_get_contents('word_day.txt'));

$this_date = date('Y-m-d');
$word_day_rows = $get_word_day->words;
$word_by_day = '';
if($get_word_day->date!=$this_date)
{
	$word_day_rows = array();
	$word_day_query = mysql_query('select word from text_wordlist order by rand() limit 10');
	while($word_day_row=mysql_fetch_assoc($word_day_query))
	{
		$word_day_rows[] = $word_day_row['word'];
	}
	$word_by_day = $word_day_rows[0];
	unset($word_day_rows[0]);
	$get_word_day = array('words'=>$word_day_rows);
	file_put_contents('word_day.txt', json_encode(array('words'=>$word_day_rows, 'word_by_day'=>$word_by_day, 'date'=>$this_date)));
}else
{
	$word_by_day = $get_word_day->word_by_day;
}

?>

<div class="bs-docs-section">

<div class="row">

<div class="col-md-6">

<div class="panel">
	<div class="panel-heading">
	<h3 class="panel-title">Learn Words Everyday</h3>
	</div>
	<div class="panel-body">

	<?php				
	$date1=date_create("2017-03-01");
	$date2=date_create(date('Y-m-d'));
	$diff=date_diff($date1,$date2);
	$dif = (int)$diff->format("%a") + 1;

	$days = $dif;
	
	?>
	<?php
	$j=0;
	for($i=$days;$i--;$i>0)
	{
		$sess = ((int)($i/50))+1;
		$day = date('l jS \of F Y', strtotime('-'.$j.' day', strtotime(date('Y-m-d'))));
	?>
	<a style="font-size:18px;" href="<?=$url?>/learn-ten-words-everyday/<?=$sess?>/<?=$i%50?>">Session #<?=$sess?> Episode @<?=$i%50?></a><br><h5 style="color:grey; font-weight:normal;">Published at: <?=$day?></h5><hr>
	<?php
	$j++;
	if($j>4)
	{
	break;
	}
	}

	echo '<a class="btn btn-primary btn-raised full-width" href="'.$url.'/learn-ten-words-everyday/'.$sess.'" style="width:100% !important;">See All Posts</a>';
			
	?>

</div>
			  
			  
			  
</div>
								
</div>
<div class="col-md-6">

<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Most Searched Words</h3>
	</div>
	<div class="panel-body">

<?php

$k=0;
foreach($word_day_rows as $gwd)
{
	$k++;
	echo '<a style="font-size: 18px;" href="'.$url.'/english-'.$lang.'-dictionary-meaning-'.$gwd.'">'.$gwd.'</a><br>';
	
	if($k<9){
		echo '<hr>';
	}
	
}

?>
	
	
	</div>
</div>

</div>


</div>

</div>


<div class="panel">
	<div class="panel-heading">
	<h3 class="panel-title">Word of the day</h3>
	</div>
	<div class="panel-body">

<?php	


// word of the day coding
echo '<h2>'.ucfirst($word_by_day).'</h2><hr>';

$query = mysql_query('select word, '.$lang.', id, data from word_frame where word like "'.$word_by_day.'" limit 1');
$row = mysql_fetch_assoc($query);

$id = $row['id'];
$data = json_decode($row['data']);
$mean = json_decode($row[$lang]);
$main = $mrow['main'];

$related_words_imp = "'".implode("','",$related_words)."'";

$related_mean_query = mysql_query("select ".$lang." as mean, word from lang where word in (".$related_words_imp.")");
$related_mean_array = array();
while($related_mean_row=mysql_fetch_assoc($related_mean_query)){
	$related_mean_array[$related_mean_row['word']] = $related_mean_row['mean'];
}


foreach($data->mean as $key=>$val)
{
	$key_obj = ucfirst(($key=='main')?'meaning':$key);
	
	$mean_list = array();
	foreach($val as $v)
	{
		$mean_list[] = $mean->$v;
	}

	echo '<div class="jumbo_details"><b>'.$key_obj.'</b> :: '.implode(', ',array_unique($mean_list)).'</div>';
	
}

?>

	<a class="btn btn-primary btn-raised full-width" href="<?=$url?>/english-to-<?=$lang?>-meaning-<?=$word_by_day?>" style="width:100% !important;">See Details</a>
	
</div>
			  
			  
			  
</div>


								
							<?php 
							if($lang=='bengali')
							{
?>

<div class="panel">
	<div class="panel-heading">
	<h3 class="panel-title">Latest Posts</h3>
	</div>
	<div class="panel-body">

<?php
								$limit = 5;
								require('getLearningMaterials.php'); 
								
?>


</div>
			  
			  
			  
</div>

<?php
								
							}
							
}
							
							?>
						</p>

						<div style="clear:both;">&nbsp;</div>

					</div>
					
				</div>	
				
			</div>
			
			<div class="col-md-4">
			
				<?php require('sidebar.php'); ?>
			
			</div>
		
		</div>
	
	</div>


</div>

<input type="hidden" id="local_alphabets" value="<?php echo file_get_contents('./words/main/'.$lang.'.txt'); ?>" />

<div id="complete-dialog" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title"></h2><hr>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php require('footer.php'); ?>

<script>
<?php  
if($q){
?>
var $q = '<?=$q?>';
var $type = 1;

if ($q.charAt(0).match(/[a-z]/i)){
	$type = 0;
}

var obj = JSON.parse('<?=str_replace(array("'",'\"'),array("\'","\'"),getData($q,$type))?>');

var $content_area = '#load_data2';

var $mean = '';

if(obj['error']==2)
{
	window.location.href = main_domain()+'/captcha.php?q='+$q;
}

if(obj['main'])
{
	calHistory($q, 1);
	document.title = 'English to '+lang_uc()+' meaning: '+$q+' - '+obj['main'];
	$mean += '<h2 class="pull-left">'+$q+' <button class="btn btn-raised sound-button" onclick="responsiveVoice.speak(\''+$q+'\')"><img src="'+main_domain()+'/imgs/play.png"/></button>&nbsp;&nbsp;<button class="btn btn-raised sound-button fav-button" onclick="calFavs(\''+$q+'\', 1)"><img src="'+main_domain()+'/imgs/favorite.png"/></button> : '+obj['main']+'</h2><div class="clear">&nbsp;</div>';
	
	if(obj['related'])
	{
		$mean += '<hr>';
		$.each(obj['related'], function(key2, val2){
			$i++;
			$mean += '<h2>'+key2+' :: '+val2+'</h2><br>';
		});
	}
	
}


if(obj['prev'])
{
	$mean += '<div class="pull-left"><a class="btn btn-raised" href="'+main_domain()+'/english-to-'+lang()+'-meaning-'+obj['prev']+'">Previous</a></div>';
	if(obj['nex']==null){
		$mean += '<div style="clear:both;"></div><hr>';
	}
}


if(obj['nex'])
{
	$mean += '<div class="pull-right"><a class="btn btn-raised" href="'+main_domain()+'/english-to-'+lang()+'-meaning-'+obj['nex']+'">Next</a></div>';
	$mean += '<div style="clear:both;"></div><hr>';
}

if(obj['error']==1)
{
	
	if(obj['sug']!=null && obj['sug']!='[]'){
		$mean += '<h2>Did you mean?</h2><hr>';
		var sug = JSON.parse(obj['sug'].replace(new RegExp("'", 'g'), '"'));
		$.each(sug, function(key, val){
			$mean += '<a style="display:block;" href="'+main_domain()+'/english-to-'+lang()+'-meaning-'+val+'">'+val+'</a><hr>';
		});
	}
	
	$($content_area).html('<h3>'+obj['msg']+'</h3><hr>'+$mean);
	

	
}



if(obj['type']==1 && obj['data']!=null && obj['data'][0]!=null)
{
	document.title = lang_uc()+' to English meaning: '+$q;
	$mean += '<br><div class="jumbo_title">'+lang_uc()+' to English Menaing: '+$q+'</div>';
	
	$mean += '<div class="jumbo_details bn_meaning">';
	var $i = 0;
	$.each(obj['data'], function(key, val){
		$i++;
		$mean += '<p>'+$i+'. '+val['mean']+' = '+val['word']+'</p>';
	});
	
	
	$mean += '</div>';
	

}

if(obj['main']){
	$mean += '<div class="jumbo_details">';
	$mean += '<br><div class="jumbo_title">Find meaning also in:</div>';
	$mean += '<a class="btn btn-primary" href="http://translate.google.com/#en/bn/'+$q+'" target="_blank">Google Translator</a><a class="btn btn-primary" href="http://the-definition.com/dictionary/'+$q+'" target="_blank">The Definition</a><a class="btn btn-primary" href="http://dictionary.reference.com/browse/'+$q+'?s=t" target="_blank">Dictionary.com</a><a class="btn btn-primary" href="http://www.merriam-webster.com/dictionary/'+$q+'" target="_blank">Merriam Webster</a><a class="btn btn-primary" href="http://en.wikipedia.org/wiki/'+$q+'" target="_blank">Wikipedia</a>';
	$mean += '</div>';
}



if(obj['mean']!=null && obj['data']['img']!=null && lang()=='bengali')
{
	$mean += '<br><div class="jumbo_title">Bangla Academy Ovidhan</div>';
	var img_mean = obj['data']['img'];
	if($q=='into')
	{
		img_mean = 'into';
	}
	$mean += '<div class="jumbo_details bn_ba">';
	$mean += '<img src="//www.bdword.com/word/'+obj['data']['img'].toUpperCase()+'.JPG" title="'+img_mean+'" alt="'+img_mean+'" />';
	$mean += '</div>';
	

}

if(obj['mean']!=null && Object.size(obj['data']['mean'])>0)
{
	$mean += '<br><div class="jumbo_title">English to '+lang_uc()+' Meaning</div>';
	
	$mean += '<div class="jumbo_details bn_meaning">';
	var i = 0;
	$.each(obj['data']['mean'], function(key, val){
		i++;
		if(i>1){
			$mean += '<hr>';
		}
		var $mean_array = [];
		
		$.each(val, function(key, val){
			if(obj['mean'][val]!=undefined){
				$mean_array.push(obj['mean'][val]);
			}
		});
		
		$mean += ((key!='main')?'<b>'+key+':</b> ':'')+$mean_array.getUnique().join(', ');
		
		
		
	});
	
	$mean += '</div>';
}


// eng meaning
if(obj['mean']!=null && Object.size(obj['data']['eng'])>0)
{

	var $pop_eng_mean = '';
	var i = 0;
	$.each(obj['data']['eng'], function(key, val){
	
		i++;
		if(i>1){
			$pop_eng_mean += '<hr>';
		}
	
		$pop_eng_mean += '<h4><b>'+$q+' ['+key+']</b></h4><hr>';
		$pop_eng_mean += '<p>';
		
		$i = 0;
		$.each(val, function(key, val){
			$i++;
			
			$pop_eng_mean += '<p>'+$i+'. '+val+'</p>';
		});

		
		$pop_eng_mean += '</p>';
	
	});
	
	$pop_eng_mean = $pop_eng_mean.replace(/'/g, "&quot");

	
	$mean += '<button class="btn btn-raised" onclick="showEngMeanPop(\'English Meaning :: '+$q+'\',\''+$pop_eng_mean+'\')">Show English Meaning</button>&nbsp;&nbsp;';
	
	
	
	
}

// examples
if(obj['mean']!=null && Object.size(obj['data']['examples'])>0)
{

	$i=0;
	
	var $pop_examples = '';
	$.each(obj['data']['examples'], function(key, val){
		$i++;
		if($i>1){
			$pop_examples += '<hr>';
		}
		
		$pop_examples += '<p>'+$i+'. '+val+'</p>';
		
	});

	$pop_examples = $pop_examples.replace(/'/g, "&quot");

	$mean += '<button class="btn btn-raised" onclick="showEngMeanPop(\'Examples :: '+$q+'\',\''+$pop_examples+'\')">Show Examples</button>';

}


// phrases
if(obj['mean']!=null && Object.size(obj['data']['phrase'])>0)
{
	$mean += '<br><div class="jumbo_title" data-target="phrases">Related Phrases</div>';
	$i=0;
	$mean += '<div class="jumbo_details phrases">';
	
	$.each(obj['data']['phrase'], function(key, val){
				
		if(obj['mean'][val]!=undefined)
		{
			$i++;
			if($i>1){
				$mean += '<hr>';
			}
			$mean += '<p>'+$i+'. <a href="'+main_domain()+'/english-to-'+lang()+'-meaning-'+val+'">'+val+'</a> = '+obj['mean'][val]+'</p>';
		}
		
	});
	$mean += '</div>';
}



// synonyms
if(obj['mean']!=null && Object.size(obj['data']['syn'])>0)
{
	$mean += '<br><div class="jumbo_title" data-target="phrases">Synonyms</div>';
	$i=0;
	
	$mean += '<div class="jumbo_details synonyms">';
	$.each(obj['data']['syn'], function(key, val){
				
		if(obj['mean'][val]!=undefined)
		{
			$i++;
			if($i>1){
				$mean += '<hr>';
			}
			
			$mean += '<p>'+$i+'. <a href="'+main_domain()+'/english-to-'+lang()+'-meaning-'+val+'">'+val+'</a> = '+obj['mean'][val]+'</p>';
		}
		
	});
	$mean += '</div>';
}

// antonyms
if(obj['mean']!=null && Object.size(obj['data']['anto'])>0)
{
	$mean += '<br><div class="jumbo_title" data-target="phrases">Antonyms</div>';
	$i=0;
	
	$mean += '<div class="jumbo_details antonyms">';
	$.each(obj['data']['anto'], function(key, val){
				
		if(obj['mean'][val]!=undefined)
		{
			$i++;
			if($i>1){
				$mean += '<hr>';
			}
			$mean += '<p>'+$i+'. <a href="'+main_domain()+'/english-to-'+lang()+'-meaning-'+val+'">'+val+'</a> = '+obj['mean'][val]+'</p>';
		}
		
	});
	$mean += '</div>';
}

// variants
if(obj['mean']!=null && Object.size(obj['data']['variants'])>0)
{
	$mean += '<br><div class="jumbo_title" data-target="phrases">Different forms</div>';
	
	$mean += '<div class="jumbo_details variants">';
	$mean += '<p>'+obj['data']['variants'].join(', ')+'</p>';
	$mean += '</div>';
}

// similar
if(obj['mean']!=null && Object.size(obj['data']['similar'])>0)
{
	$mean += '<br><div class="jumbo_title" data-target="phrases">Similar Words</div>';
	
	$mean += '<div class="jumbo_details similar">';
	$mean += '<p>'+obj['data']['similar'].join(', ')+'</p>';
	$mean += '</div>';
}

// Show everything
$($content_area).html($mean);	

function showEngMeanPop($title, $content)
{
	$('#complete-dialog').modal('show');
	$('.modal-title').text($title);
	$('.modal-body').html($content);
	$('.modal-body').css({'font-size':'20px','padding':'10px'});
}
		

		
<?php 
}
?>
		

$(document).keydown(function(e){
	
	if (e.keyCode == 13)
	{
		if($('#q').val().trim().length>0){
			$("#new_form").submit();
		}
	}
	
    if (e.keyCode == 40)
	{
		if($('.suggested_list').text()==''){
			return false;
		}
        if(chosen === "") {
            chosen = 0;
        } else if((chosen+1) < $('.suggested_list li').length) {
            chosen++; 
        }
        $('.suggested_list li').removeClass('selected');
        $('.suggested_list li:eq('+chosen+')').addClass('selected');
        var result = $('.suggested_list li:eq('+chosen+')').text();
        $('#q').val(result);
		$('#q').blur();
        return false;
    }
    if (e.keyCode == 38)
	{
		if($('.suggested_list').text()==''){
			return false;
		}
        if(chosen === "")
		{
            chosen = 0;
        }else if(chosen > 0)
		{
            chosen--;            
        }
        $('.suggested_list li').removeClass('selected');
        $('.suggested_list li:eq('+chosen+')').addClass('selected');
        var result = $('.suggested_list li:eq('+chosen+')').text();
        $('#q').val(result);
		$('#q').blur();
        return false;
    }
	
	
});
		
function submit_search(q){
	$('#q').val(q);
	$('.suggested_list li').removeClass('selected');
	$('#new_form').submit();
}
		
$("#new_form").submit(function(event){

	chosen = '';
	var $q = $("#q").val().trim().toLowerCase();
	$('.suggested_list').html('');
	$("#q").blur();
	if($q.length==0 || $q=='')
	{
		$('#load_data').html('<h3>Please type your word first.</h3>');
		return;
	}

	$('#load_data').html('<div class="loader"><img src="imgs/loader.gif"/></div>');
	$('.suggested_list').html('');
});
		
</script>

</body>
</html>
