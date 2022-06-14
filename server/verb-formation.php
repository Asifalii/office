<?php
require('functions.php');


$info 			= array();
$url 			= base_url();
$lang 			= getLang();
$ulang 			= ucfirst($lang);
$inWordList 	= true;
	
$isMobile 		= isMobile();
		
?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php

require('connect.php');




$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$url = 'https://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];

$perpage = 10;

if(isset($_GET['page']) & !empty($_GET['page'])){
	$curpage = $_GET['page'];
}else{
	$curpage = 1;
}

$start = ($curpage * $perpage) - $perpage;

$PageSql = "SELECT * FROM `verb_formation`";


$pageres = mysql_query($PageSql) or die(mysql_error());
$totalres = mysql_num_rows($pageres);

$endpage = ceil($totalres/$perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;

$verb_formation_sql = "select * from verb_formation LIMIT ".$start.", ".$perpage;


$verb_formation = mysql_query($verb_formation_sql) or die(mysql_error());

?>
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
	
	<link rel="canonical" href="<?=canonical()?>" />
	<?php
		// if($q AND $lang!=null)
		// {
			// echo '<link rel="amphtml" href="'.$url.'/amp/?q='.$q.'" />';
		// }
	?>
	
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="English :: <?=$ulang?> Online Dictionary" />
	<meta property="og:description" content="English to <?=$ulang?> Dictionary (Free). You can get meaning of any English word very easily. It has auto-suggestion feature which will save you a lot of time getting any meaning. We have a Chrome Extension and an Android App" />
	<meta property="og:url" content="<?=$url?>" />
	<meta property="og:site_name" content="English :: <?=$ulang?> Online Dictionary" />


	<link rel="shortcut icon" href="<?=$url?>/imgs/favicon.ico">
	<?php 
	// echo getHrefLang2();
	?>
	

	<?php 
		echo showAds($q, 'mobile-head', $conn); 
	?>
	
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

a,table{background-color:transparent}h2,h3,hr{margin-top:20px}h2,h3,ul{margin-bottom:10px}.btn,.btn i.material-icons,.caret,.input-group-btn,.input-group-btn .btn i.material-icons{vertical-align:middle}html{font-family:sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}a:active,a:hover{outline:0}b{font-weight:700}hr{height:0;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;margin-bottom:20px;border:0;border-top:1px solid #eee}button,input{margin:0;font:inherit;color:inherit}button{overflow:visible;text-transform:none;-webkit-appearance:button;cursor:pointer}button::-moz-focus-inner,input::-moz-focus-inner{padding:0;border:0}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}table{border-spacing:0;border-collapse:collapse}td{padding:0}@media print{*,:after,:before{color:#000!important;text-shadow:none!important;background:0 0!important;-webkit-box-shadow:none!important;box-shadow:none!important}a,a:visited{text-decoration:underline}a[href]:after{content:" (" attr(href) ")"}a[href^="#"]:after{content:""}tr{page-break-inside:avoid}h2,h3,p{orphans:3;widows:3}h2,h3{page-break-after:avoid}.navbar{display:none}}.btn,.btn-primary:active,.btn:active,.form-control,.navbar-toggle{background-image:none}*,:after,:before{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}html{font-size:10px;-webkit-tap-highlight-color:transparent}body{margin:0;font-size:14px;line-height:1.42857143;color:#333}button,input{font-family:inherit;font-size:inherit;line-height:inherit}a{text-decoration:none}a:focus,a:hover{text-decoration:underline}a:focus{outline:dotted thin;outline:-webkit-focus-ring-color auto 5px;outline-offset:-2px}h2,h3{line-height:1.1;color:inherit}.btn,.dropdown-menu>li>a{line-height:1.42857143;white-space:nowrap}h2{font-size:30px}h3{font-size:24px}p{margin:0 0 10px}.container,.container-fluid{margin-right:auto;margin-left:auto;padding-right:15px;padding-left:15px}ul{margin-top:0}ul ul{margin-bottom:0}@media (min-width:768px){.container{width:750px}}@media (min-width:992px){.container{width:970px}}@media (min-width:1200px){.container{width:1170px}}.row{margin-right:-15px;margin-left:-15px}.col-md-4,.col-md-6,.col-md-8{position:relative;min-height:1px;padding-right:15px;padding-left:15px}@media (min-width:992px){.col-md-4,.col-md-6,.col-md-8{float:left}.col-md-8{width:66.66666667%}.col-md-6{width:50%}.col-md-4{width:33.33333333%}}label{display:inline-block;max-width:100%;margin-bottom:5px}input[type=search]{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;-webkit-appearance:none}.form-control{display:block;width:100%;color:#555;background-color:#fff}.form-control:focus{border-color:#66afe9;outline:0;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)}.form-control::-moz-placeholder{opacity:1}.form-control::-ms-expand{background-color:transparent;border:0}.form-group{margin-bottom:15px}.btn{display:inline-block;margin-bottom:0;text-align:center;-ms-touch-action:manipulation;touch-action:manipulation;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.btn:active:focus,.btn:focus{outline:dotted thin;outline:-webkit-focus-ring-color auto 5px;outline-offset:-2px}.btn:focus,.btn:hover{color:#333;text-decoration:none}.btn:active{outline:0;-webkit-box-shadow:inset 0 3px 5px rgba(0,0,0,.125);box-shadow:inset 0 3px 5px rgba(0,0,0,.125)}.btn-primary{color:#fff;background-color:#337ab7;border-color:#2e6da4}.btn-primary:focus{color:#fff;background-color:#286090;border-color:#122b40}.btn-primary:active,.btn-primary:hover{color:#fff;background-color:#286090;border-color:#204d74}.btn-primary:active:focus,.btn-primary:active:hover{color:#fff;background-color:#204d74;border-color:#122b40}.fade{opacity:0;-webkit-transition:opacity .15s linear;-o-transition:opacity .15s linear;transition:opacity .15s linear}.collapse{display:none}.caret{display:inline-block;width:0;height:0;margin-left:2px;border-top:4px dashed;border-top:4px solid\9;border-right:4px solid transparent;border-left:4px solid transparent}.dropdown{position:relative}.dropdown-toggle:focus{outline:0}.dropdown-menu{position:absolute;top:100%;left:0;z-index:1000;display:none;float:left;min-width:160px;padding:5px 0;margin:2px 0 0;font-size:14px;text-align:left;list-style:none;background-color:#fff;-webkit-background-clip:padding-box;background-clip:padding-box;border-radius:4px}.dropdown-menu>li>a{display:block;padding:3px 20px;clear:both;font-weight:400;color:#333}.dropdown-menu>li>a:focus,.dropdown-menu>li>a:hover{color:#262626;text-decoration:none;background-color:#f5f5f5}.input-group{position:relative;display:table;border-collapse:separate}.input-group .form-control{position:relative;z-index:2;float:left;width:100%;margin-bottom:0}.input-group .form-control:focus{z-index:3}.input-group .form-control,.input-group-btn{display:table-cell}.nav>li,.nav>li>a{display:block;position:relative}.input-group-btn{width:1%;position:relative;font-size:0;white-space:nowrap}.input-group .form-control:first-child{border-top-right-radius:0;border-bottom-right-radius:0}.input-group-btn:last-child>.btn{border-top-left-radius:0;border-bottom-left-radius:0;z-index:2;margin-left:-1px}.input-group-btn>.btn{position:relative}.input-group-btn>.btn:active,.input-group-btn>.btn:focus,.input-group-btn>.btn:hover{z-index:2}.nav{padding-left:0;margin-bottom:0;list-style:none}.nav>li>a{padding:10px 15px}.nav>li>a:focus,.nav>li>a:hover{text-decoration:none;background-color:#eee}.navbar{position:relative;min-height:50px;margin-bottom:20px}.navbar-collapse{padding-right:15px;padding-left:15px;overflow-x:visible;-webkit-overflow-scrolling:touch;border-top:1px solid transparent;-webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,.1);box-shadow:inset 0 1px 0 rgba(255,255,255,.1)}.container-fluid>.navbar-collapse,.container-fluid>.navbar-header{margin-right:-15px;margin-left:-15px}@media (min-width:768px){.navbar-right .dropdown-menu{right:0;left:auto}.navbar{border-radius:4px}.navbar-header{float:left}.navbar-collapse{width:auto;border-top:0;-webkit-box-shadow:none;box-shadow:none}.navbar-collapse.collapse{display:block!important;height:auto!important;padding-bottom:0;overflow:visible!important}.navbar-static-top .navbar-collapse{padding-right:0;padding-left:0}.container-fluid>.navbar-collapse,.container-fluid>.navbar-header{margin-right:0;margin-left:0}.navbar-static-top{border-radius:0}}.navbar-static-top{z-index:1000;border-width:0 0 1px}.navbar-brand{float:left;height:50px;padding:15px;font-size:18px;line-height:20px}.navbar-brand:focus,.navbar-brand:hover{text-decoration:none}.navbar-toggle{position:relative;float:right;padding:9px 10px;margin-top:8px;margin-right:15px;margin-bottom:8px;background-color:transparent;border:1px solid transparent;border-radius:4px}.navbar-toggle:focus{outline:0}.navbar-toggle .icon-bar{display:block;width:22px;height:2px;border-radius:1px}.navbar-toggle .icon-bar+.icon-bar{margin-top:4px}@media (min-width:768px){.navbar>.container-fluid .navbar-brand{margin-left:-15px}.navbar-toggle{display:none}}.navbar-nav{margin:7.5px -15px}.navbar-nav>li>a{padding-top:10px;padding-bottom:10px;line-height:20px}.navbar-nav>li>.dropdown-menu{margin-top:0;border-top-left-radius:0;border-top-right-radius:0}@media (min-width:768px){.navbar-nav{float:left;margin:0}.navbar-nav>li{float:left}.navbar-nav>li>a{padding-top:15px;padding-bottom:15px}.navbar-right{float:right!important;margin-right:-15px}}.jumbotron{padding-top:30px;padding-bottom:30px;margin-bottom:30px;color:inherit;background-color:#eee}.jumbotron p{margin-bottom:15px;font-size:21px;font-weight:200}.container .jumbotron{padding-right:15px;padding-left:15px;border-radius:6px}@media screen and (min-width:768px){.jumbotron{padding-top:48px;padding-bottom:48px}.container .jumbotron{padding-right:60px;padding-left:60px}}.panel{margin-bottom:20px;background-color:#fff}.panel-body{padding:15px}.panel-heading{padding:10px 15px;border-bottom:1px solid transparent;border-top-left-radius:3px;border-top-right-radius:3px}.panel-title{margin-top:0;margin-bottom:0;font-size:16px;color:inherit}.panel-primary{border-color:#337ab7}.panel-primary>.panel-heading{color:#fff;background-color:#337ab7;border-color:#337ab7}.close{float:right;font-size:21px;font-weight:700;line-height:1;color:#000;text-shadow:0 1px 0 #fff;filter:alpha(opacity=20);opacity:.2}body,body .container .jumbotron p,h2,h3{font-weight:300}.close:focus,.close:hover{color:#000;text-decoration:none;cursor:pointer;filter:alpha(opacity=50);opacity:.5}button.close{-webkit-appearance:none;padding:0;cursor:pointer;background:0 0;border:0}.modal{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1050;display:none;overflow:hidden;-webkit-overflow-scrolling:touch;outline:0}.modal.fade .modal-dialog{-webkit-transition:-webkit-transform .3s ease-out;-o-transition:-o-transform .3s ease-out;transition:transform .3s ease-out;-webkit-transform:translate(0,-25%);-ms-transform:translate(0,-25%);-o-transform:translate(0,-25%);transform:translate(0,-25%)}.modal-dialog{position:relative;width:auto;margin:10px}.modal-content{position:relative;background-color:#fff;-webkit-background-clip:padding-box;background-clip:padding-box;outline:0}.modal-header{padding:15px;border-bottom:1px solid #e5e5e5}.modal-header .close{margin-top:-2px}.modal-title{margin:0;line-height:1.42857143}.modal-body{position:relative}.modal-footer{padding:15px;text-align:right;border-top:1px solid #e5e5e5}@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto}.modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5)}}.container-fluid:after,.container-fluid:before,.container:after,.container:before,.modal-footer:after,.modal-footer:before,.modal-header:after,.modal-header:before,.nav:after,.nav:before,.navbar-collapse:after,.navbar-collapse:before,.navbar-header:after,.navbar-header:before,.navbar:after,.navbar:before,.panel-body:after,.panel-body:before,.row:after,.row:before{display:table;content:" "}.container-fluid:after,.container:after,.modal-footer:after,.modal-header:after,.nav:after,.navbar-collapse:after,.navbar-header:after,.navbar:after,.panel-body:after,.row:after{clear:both}@-ms-viewport{width:device-width}body{background-color:#EEE}body,h2,h3{font-family:Roboto,Helvetica,Arial,sans-serif}a,a:focus,a:hover{color:#043A54}body .container .jumbotron{padding:19px;margin-bottom:20px;-webkit-box-shadow:0 8px 17px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19);box-shadow:0 8px 17px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19);border-radius:2px;border:0;background-color:#fff}.btn,.input-group-btn .btn{border:none;border-radius:2px;position:relative;padding:8px 30px;margin:10px 1px;font-size:14px;font-weight:500;text-transform:uppercase;letter-spacing:0;will-change:box-shadow,transform;-webkit-transition:-webkit-box-shadow .2s cubic-bezier(.4,0,1,1),background-color .2s cubic-bezier(.4,0,.2,1),color .2s cubic-bezier(.4,0,.2,1);-o-transition:box-shadow .2s cubic-bezier(.4,0,1,1),background-color .2s cubic-bezier(.4,0,.2,1),color .2s cubic-bezier(.4,0,.2,1);transition:box-shadow .2s cubic-bezier(.4,0,1,1),background-color .2s cubic-bezier(.4,0,.2,1),color .2s cubic-bezier(.4,0,.2,1);outline:0;cursor:pointer;text-decoration:none;background:0 0}.btn::-moz-focus-inner,.input-group-btn .btn::-moz-focus-inner{border:0}.btn:not(.btn-raised),.input-group-btn .btn:not(.btn-raised){-webkit-box-shadow:none;box-shadow:none;color:rgba(0,0,0,.87)}.btn:not(.btn-raised).btn-primary{color:#043A54}.btn:not(.btn-raised):not(.btn-link):focus,.btn:not(.btn-raised):not(.btn-link):hover,.input-group-btn .btn:not(.btn-raised):not(.btn-link):focus,.input-group-btn .btn:not(.btn-raised):not(.btn-link):hover{background-color:rgba(153,153,153,.2)}.btn.btn-fab,.btn.btn-raised,.input-group-btn .btn.btn-fab{background-color:#EEE;color:rgba(0,0,0,.87)}.btn.btn-raised.btn-primary{background-color:#043A54;color:rgba(255,255,255,.84)}.btn.btn-raised:not(.btn-link){-webkit-box-shadow:0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow:0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12)}.btn.btn-raised:not(.btn-link):active,.btn.btn-raised:not(.btn-link):focus,.btn.btn-raised:not(.btn-link):hover{outline:0;background-color:#e4e4e4}.btn.btn-raised:not(.btn-link):active.btn-primary,.btn.btn-raised:not(.btn-link):focus.btn-primary,.btn.btn-raised:not(.btn-link):hover.btn-primary{background-color:#00aa9a}.btn.btn-raised:not(.btn-link):active,.btn.btn-raised:not(.btn-link):active:hover{-webkit-box-shadow:0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2);box-shadow:0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.2)}.btn.btn-raised:not(.btn-link):focus,.btn.btn-raised:not(.btn-link):focus:active,.btn.btn-raised:not(.btn-link):focus:active:hover,.btn.btn-raised:not(.btn-link):focus:hover{-webkit-box-shadow:0 0 8px rgba(0,0,0,.18),0 8px 16px rgba(0,0,0,.36);box-shadow:0 0 8px rgba(0,0,0,.18),0 8px 16px rgba(0,0,0,.36)}.btn.btn-fab,.input-group-btn .btn.btn-fab{border-radius:50%;font-size:24px;height:56px;margin:auto;min-width:56px;width:56px;padding:0;overflow:hidden;-webkit-box-shadow:0 1px 1.5px 0 rgba(0,0,0,.12),0 1px 1px 0 rgba(0,0,0,.24);box-shadow:0 1px 1.5px 0 rgba(0,0,0,.12),0 1px 1px 0 rgba(0,0,0,.24);position:relative;line-height:normal}.btn.btn-fab.btn-fab-mini,.input-group-btn .btn.btn-fab.btn-fab-mini{height:40px;min-width:40px;width:40px}.btn.btn-fab i.material-icons,.input-group-btn .btn.btn-fab i.material-icons{position:absolute;top:50%;left:50%;-webkit-transform:translate(-12px,-12px);-ms-transform:translate(-12px,-12px);-o-transform:translate(-12px,-12px);transform:translate(-12px,-12px);line-height:24px;width:24px}.form-control,label{font-size:16px;line-height:1.42857143}.btn:disabled,.input-group-btn .btn:disabled{color:rgba(0,0,0,.26);background:0 0}.btn-group-vertical.disabled.btn-group-raised:focus:not(:active),.btn-group-vertical.disabled.btn-raised:focus:not(:active),.btn-group-vertical:disabled.btn-group-raised:focus:not(:active),.btn-group-vertical:disabled.btn-raised:focus:not(:active),.btn-group-vertical[disabled][disabled].btn-group-raised:focus:not(:active),.btn-group-vertical[disabled][disabled].btn-raised:focus:not(:active),.btn-group.disabled.btn-group-raised:focus:not(:active),.btn-group.disabled.btn-raised:focus:not(:active),.btn-group:disabled.btn-group-raised:focus:not(:active),.btn-group:disabled.btn-raised:focus:not(:active),.btn-group[disabled][disabled].btn-group-raised:focus:not(:active),.btn-group[disabled][disabled].btn-raised:focus:not(:active),.btn.disabled.btn-group-raised:focus:not(:active),.btn.disabled.btn-raised:focus:not(:active),.btn:disabled.btn-group-raised:focus:not(:active),.btn:disabled.btn-raised,.btn:disabled.btn-raised:active,.btn:disabled.btn-raised:focus:not(:active),.btn[disabled][disabled].btn-group-raised:focus:not(:active),.btn[disabled][disabled].btn-raised:focus:not(:active),.input-group-btn .btn.disabled.btn-group-raised:focus:not(:active),.input-group-btn .btn.disabled.btn-raised:focus:not(:active),.input-group-btn .btn:disabled.btn-group-raised:focus:not(:active),.input-group-btn .btn:disabled.btn-raised:focus:not(:active),.input-group-btn .btn[disabled][disabled].btn-group-raised:focus:not(:active),.input-group-btn .btn[disabled][disabled].btn-raised:focus:not(:active),fieldset[disabled][disabled] .btn-group-vertical.btn-group-raised:focus:not(:active),fieldset[disabled][disabled] .btn-group-vertical.btn-raised:focus:not(:active),fieldset[disabled][disabled] .btn-group.btn-group-raised:focus:not(:active),fieldset[disabled][disabled] .btn-group.btn-raised:focus:not(:active),fieldset[disabled][disabled] .btn.btn-group-raised:focus:not(:active),fieldset[disabled][disabled] .btn.btn-raised:focus:not(:active),fieldset[disabled][disabled] .input-group-btn .btn.btn-group-raised:focus:not(:active),fieldset[disabled][disabled] .input-group-btn .btn.btn-raised:focus:not(:active){-webkit-box-shadow:none;box-shadow:none}.checkbox input[type=checkbox]:focus:not(:checked)+.checkbox-material:before,label.checkbox-inline input[type=checkbox]:focus:not(:checked)+.checkbox-material:before{-webkit-animation:rippleOff .5s;-o-animation:rippleOff .5s;animation:rippleOff .5s}.checkbox input[type=checkbox]:focus:not(:checked)+.checkbox-material .check:before,label.checkbox-inline input[type=checkbox]:focus:not(:checked)+.checkbox-material .check:before{-webkit-animation:checkbox-off .3s forwards;-o-animation:checkbox-off .3s forwards;animation:checkbox-off .3s forwards}.checkbox input[type=checkbox]:focus:not(:checked)+.checkbox-material .check:after,label.checkbox-inline input[type=checkbox]:focus:not(:checked)+.checkbox-material .check:after{-webkit-animation:rippleOff .5s forwards;-o-animation:rippleOff .5s forwards;animation:rippleOff .5s forwards}.checkbox input[type=checkbox][disabled]:not(:checked)~.checkbox-material .check,.checkbox input[type=checkbox][disabled]:not(:checked)~.checkbox-material .check:before,label.checkbox-inline input[type=checkbox][disabled]:not(:checked)~.checkbox-material .check,label.checkbox-inline input[type=checkbox][disabled]:not(:checked)~.checkbox-material .check:before{opacity:.5}@-webkit-keyframes checkbox-off{0%,25%{-webkit-box-shadow:0 0 0 10px,10px -10px 0 10px,32px 0 0 20px,0 32px 0 20px,-5px 5px 0 10px,20px -12px 0 11px,0 0 0 0 inset;box-shadow:0 0 0 10px,10px -10px 0 10px,32px 0 0 20px,0 32px 0 20px,-5px 5px 0 10px,20px -12px 0 11px,0 0 0 0 inset}50%{-webkit-transform:rotate(45deg);transform:rotate(45deg);margin-top:-4px;margin-left:6px;width:0;height:0;-webkit-box-shadow:0 0 0 10px,10px -10px 0 10px,32px 0 0 20px,0 32px 0 20px,-5px 5px 0 10px,15px 2px 0 11px,0 0 0 0 inset;box-shadow:0 0 0 10px,10px -10px 0 10px,32px 0 0 20px,0 32px 0 20px,-5px 5px 0 10px,15px 2px 0 11px,0 0 0 0 inset}51%{-webkit-transform:rotate(0);transform:rotate(0);margin-top:-2px;margin-left:-2px;width:20px;height:20px;-webkit-box-shadow:0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 10px inset;box-shadow:0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 10px inset}100%{-webkit-transform:rotate(0);transform:rotate(0);margin-top:-2px;margin-left:-2px;width:20px;height:20px;-webkit-box-shadow:0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0 inset;box-shadow:0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0 inset}}@-o-keyframes checkbox-off{0%,25%{box-shadow:0 0 0 10px,10px -10px 0 10px,32px 0 0 20px,0 32px 0 20px,-5px 5px 0 10px,20px -12px 0 11px,0 0 0 0 inset}50%{-o-transform:rotate(45deg);transform:rotate(45deg);margin-top:-4px;margin-left:6px;width:0;height:0;box-shadow:0 0 0 10px,10px -10px 0 10px,32px 0 0 20px,0 32px 0 20px,-5px 5px 0 10px,15px 2px 0 11px,0 0 0 0 inset}51%{-o-transform:rotate(0);transform:rotate(0);margin-top:-2px;margin-left:-2px;width:20px;height:20px;box-shadow:0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 10px inset}100%{-o-transform:rotate(0);transform:rotate(0);margin-top:-2px;margin-left:-2px;width:20px;height:20px;box-shadow:0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0 inset}}@keyframes checkbox-off{0%,25%{-webkit-box-shadow:0 0 0 10px,10px -10px 0 10px,32px 0 0 20px,0 32px 0 20px,-5px 5px 0 10px,20px -12px 0 11px,0 0 0 0 inset;box-shadow:0 0 0 10px,10px -10px 0 10px,32px 0 0 20px,0 32px 0 20px,-5px 5px 0 10px,20px -12px 0 11px,0 0 0 0 inset}50%{-webkit-transform:rotate(45deg);-o-transform:rotate(45deg);transform:rotate(45deg);margin-top:-4px;margin-left:6px;width:0;height:0;-webkit-box-shadow:0 0 0 10px,10px -10px 0 10px,32px 0 0 20px,0 32px 0 20px,-5px 5px 0 10px,15px 2px 0 11px,0 0 0 0 inset;box-shadow:0 0 0 10px,10px -10px 0 10px,32px 0 0 20px,0 32px 0 20px,-5px 5px 0 10px,15px 2px 0 11px,0 0 0 0 inset}51%{-webkit-transform:rotate(0);-o-transform:rotate(0);transform:rotate(0);margin-top:-2px;margin-left:-2px;width:20px;height:20px;-webkit-box-shadow:0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 10px inset;box-shadow:0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 10px inset}100%{-webkit-transform:rotate(0);-o-transform:rotate(0);transform:rotate(0);margin-top:-2px;margin-left:-2px;width:20px;height:20px;-webkit-box-shadow:0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0 inset;box-shadow:0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0,0 0 0 0 inset}}@-webkit-keyframes rippleOff{0%,100%{opacity:0}50%{opacity:.2}}@-o-keyframes rippleOff{0%,100%{opacity:0}50%{opacity:.2}}.radio input[type=radio]:focus:not(:checked)~.check:after,label.radio-inline input[type=radio]:focus:not(:checked)~.check:after{-webkit-animation:rippleOff .5s;-o-animation:rippleOff .5s;animation:rippleOff .5s}@keyframes rippleOff{0%,100%{opacity:0}50%{opacity:.2}}.form-control{height:38px;padding:7px 0;margin-bottom:7px}.form-control,.form-group .form-control{border:0;background-image:-webkit-gradient(linear,left top,left bottom,from(#043A54),to(#043A54)),-webkit-gradient(linear,left top,left bottom,from(#D2D2D2),to(#D2D2D2));background-image:-webkit-linear-gradient(#043A54,#043A54),-webkit-linear-gradient(#D2D2D2,#D2D2D2);background-image:-o-linear-gradient(#043A54,#043A54),-o-linear-gradient(#D2D2D2,#D2D2D2);background-image:linear-gradient(#043A54,#043A54),linear-gradient(#D2D2D2,#D2D2D2);-webkit-background-size:0 2px,100% 1px;background-size:0 2px,100% 1px;background-repeat:no-repeat;background-position:center bottom,center calc(100% - 1px);background-color:rgba(0,0,0,0);-webkit-transition:background 0s ease-out;-o-transition:background 0s ease-out;transition:background 0s ease-out;float:none;-webkit-box-shadow:none;box-shadow:none;border-radius:0}.form-control::-moz-placeholder,.form-group .form-control::-moz-placeholder{color:#BDBDBD;font-weight:400}.form-control:-ms-input-placeholder,.form-group .form-control:-ms-input-placeholder{color:#BDBDBD;font-weight:400}.form-control::-webkit-input-placeholder,.form-group .form-control::-webkit-input-placeholder{color:#BDBDBD;font-weight:400}.form-group{position:relative}.form-group.label-floating label.control-label{position:absolute;pointer-events:none;-webkit-transition:.3s ease all;-o-transition:.3s ease all;transition:.3s ease all;will-change:left,top,contents}.form-group.is-focused .form-control{outline:0;background-image:-webkit-gradient(linear,left top,left bottom,from(#043A54),to(#043A54)),-webkit-gradient(linear,left top,left bottom,from(#D2D2D2),to(#D2D2D2));background-image:-webkit-linear-gradient(#043A54,#043A54),-webkit-linear-gradient(#D2D2D2,#D2D2D2);background-image:-o-linear-gradient(#043A54,#043A54),-o-linear-gradient(#D2D2D2,#D2D2D2);background-image:linear-gradient(#043A54,#043A54),linear-gradient(#D2D2D2,#D2D2D2);-webkit-background-size:100% 2px,100% 1px;background-size:100% 2px,100% 1px;-webkit-box-shadow:none;box-shadow:none;-webkit-transition-duration:.3s;-o-transition-duration:.3s;transition-duration:.3s}.form-group.is-focused label,.form-group.is-focused label.control-label{color:#043A54}.form-group label,label{color:#BDBDBD;font-weight:400}.form-control::-moz-placeholder{font-size:16px;line-height:1.42857143;color:#BDBDBD;font-weight:400}.form-control:-ms-input-placeholder{font-size:16px;line-height:1.42857143;color:#BDBDBD;font-weight:400}.form-control::-webkit-input-placeholder{font-size:16px;line-height:1.42857143;color:#BDBDBD;font-weight:400}label.control-label{font-size:12px;line-height:1.07142857;font-weight:400;margin:16px 0 0}.form-group{padding-bottom:7px;margin:28px 0 0}.form-group .form-control{margin-bottom:7px}.form-group .form-control::-moz-placeholder{font-size:16px;line-height:1.42857143;color:#BDBDBD;font-weight:400}.form-group .form-control:-ms-input-placeholder{font-size:16px;line-height:1.42857143;color:#BDBDBD;font-weight:400}.form-group .form-control::-webkit-input-placeholder{font-size:16px;line-height:1.42857143;color:#BDBDBD;font-weight:400}.form-group label{font-size:16px;line-height:1.42857143}.form-group label.control-label{font-size:12px;line-height:1.07142857;font-weight:400;margin:16px 0 0}.form-group.label-floating label.control-label{top:-7px;font-size:16px;line-height:1.42857143}.form-group.label-floating.is-focused label.control-label,.form-group.label-floating:not(.is-empty) label.control-label{top:-30px;left:0;font-size:12px;line-height:1.07142857}.input-group-btn .btn{margin:0 0 7px}.input-group .input-group-btn{padding:0 12px}.navbar{border:0;border-radius:0}.navbar .navbar-brand{position:relative;height:60px;line-height:30px;color:inherit}.navbar .navbar-brand:focus,.navbar .navbar-brand:hover{color:inherit;background-color:transparent}.navbar .navbar-nav>li>a{color:inherit;padding-top:20px;padding-bottom:20px}.navbar .navbar-nav>li>a:focus,.navbar .navbar-nav>li>a:hover{color:inherit;background-color:transparent}.navbar .navbar-toggle{border:0}.navbar .navbar-toggle:focus,.navbar .navbar-toggle:hover{background-color:transparent}.navbar .navbar-toggle .icon-bar{background-color:inherit;border:1px solid}.modal-content,.navbar .dropdown-menu{border-radius:2px}.navbar .navbar-collapse{border-color:rgba(0,0,0,.1)}.navbar .dropdown-menu li>a{font-size:16px;padding:13px 16px}.navbar{background-color:#043A54;color:rgba(255,255,255,.84)}.navbar .dropdown-menu li>a:focus,.navbar .dropdown-menu li>a:hover{color:#043A54;background-color:#eee}@media (max-width:1199px){.navbar .navbar-brand{height:50px;padding:10px 15px}.navbar .navbar-nav>li>a{padding-top:15px;padding-bottom:15px}}.dropdown-menu{border:0;-webkit-box-shadow:0 2px 5px 0 rgba(0,0,0,.26);box-shadow:0 2px 5px 0 rgba(0,0,0,.26)}.dropdown-menu li{overflow:hidden;position:relative}.dropdown-menu li a:hover{background-color:transparent;color:#043A54}.panel{-webkit-box-shadow:0 1px 6px 0 rgba(0,0,0,.12),0 1px 6px 0 rgba(0,0,0,.12)}.modal-content{-webkit-box-shadow:0 27px 24px 0 rgba(0,0,0,.2),0 40px 77px 0 rgba(0,0,0,.22);box-shadow:0 27px 24px 0 rgba(0,0,0,.2),0 40px 77px 0 rgba(0,0,0,.22);border:none}.modal-content .modal-header{border-bottom:none;padding:24px 24px 0}.modal-content .modal-body{padding:24px 24px 16px}.modal-content .modal-footer{border-top:none;padding:7px}.modal-content .modal-footer button{margin:0;padding-left:16px;padding-right:16px;width:auto}.modal-content .modal-body+.modal-footer{padding-top:0}.panel{border-radius:2px;border:0;box-shadow:0 1px 6px 0 rgba(0,0,0,.12),0 1px 6px 0 rgba(0,0,0,.12)}.panel>.panel-heading{background-color:#eee}.panel.panel-primary>.panel-heading{background-color:#043A54}[class*=panel-]>.panel-heading{color:rgba(255,255,255,.84);border:0}@media (-webkit-min-device-pixel-ratio:0.75),(min--moz-device-pixel-ratio:0.75),(-o-device-pixel-ratio:3/4),(min-device-pixel-ratio:0.75),(-o-min-device-pixel-ratio:3/4),(min-resolution:0.75dppx),(-webkit-min-device-pixel-ratio:1.25),(-o-min-device-pixel-ratio:5/4),(min-resolution:120dpi){hr{height:.75px}}@media (-webkit-min-device-pixel-ratio:1),(min--moz-device-pixel-ratio:1),(-o-device-pixel-ratio:1),(min-device-pixel-ratio:1),(-o-min-device-pixel-ratio:1/1),(min-resolution:1dppx),(-webkit-min-device-pixel-ratio:1.6666666666666667),(-o-min-device-pixel-ratio:5/3),(min-resolution:160dpi){hr{height:1px}}@media (-webkit-min-device-pixel-ratio:1.33),(min--moz-device-pixel-ratio:1.33),(-o-device-pixel-ratio:133/100),(min-device-pixel-ratio:1.33),(-o-min-device-pixel-ratio:133/100),(min-resolution:1.33dppx),(-webkit-min-device-pixel-ratio:2.21875),(-o-min-device-pixel-ratio:71/32),(min-resolution:213dpi){hr{height:1.33px}}@media (-webkit-min-device-pixel-ratio:1.5),(min--moz-device-pixel-ratio:1.5),(-o-device-pixel-ratio:3/2),(min-device-pixel-ratio:1.5),(-o-min-device-pixel-ratio:3/2),(min-resolution:1.5dppx),(-webkit-min-device-pixel-ratio:2.5),(-o-min-device-pixel-ratio:5/2),(min-resolution:240dpi){hr{height:1.5px}}@media (-webkit-min-device-pixel-ratio:2),(min--moz-device-pixel-ratio:2),(-o-device-pixel-ratio:2/1),(min-device-pixel-ratio:2),(-o-min-device-pixel-ratio:2/1),(min-resolution:2dppx),(-webkit-min-device-pixel-ratio:3.9583333333333335),(-o-min-device-pixel-ratio:95/24),(min-resolution:380dpi){hr{height:2px}}@media (-webkit-min-device-pixel-ratio:3),(min--moz-device-pixel-ratio:3),(-o-device-pixel-ratio:3/1),(min-device-pixel-ratio:3),(-o-min-device-pixel-ratio:3/1),(min-resolution:3dppx),(-webkit-min-device-pixel-ratio:5),(-o-min-device-pixel-ratio:5/1),(min-resolution:480dpi){hr{height:3px}}@media (-webkit-min-device-pixel-ratio:4),(min--moz-device-pixel-ratio:4),(-o-device-pixel-ratio:4/1),(min-device-pixel-ratio:3),(-o-min-device-pixel-ratio:4/1),(min-resolution:4dppx),(-webkit-min-device-pixel-ratio:6.666666666666667),(-o-min-device-pixel-ratio:20/3),(min-resolution:640dpi){hr{height:4px}}*{-webkit-tap-highlight-color:rgba(255,255,255,0);-webkit-tap-highlight-color:transparent}:focus{outline:0}.dropdownjs>ul>li:h>.close:hover:before{opacity:.9}#load_data span,.jumbo_min_btn{cursor:pointer}.bg-danger:hover,.bg-info:hover,.bg-primary:hover,.bg-success:hover,.bg-warning:hover,.box-menu:hover{text-decoration:none}.col-md-2 img{width:173px;height:34px;border:1px solid #000}.page-header{margin:0!important}.paper-submit-btn{height:37px!important;padding-top:10px!important}.serach-box{margin-top:10px!important}.logo{width:138px!important}.loader,.loader img{width:70px}.loader{margin:0 auto;text-align:center}.container{margin-top:20px!important}.jumbo_min_btn{float:right;font-size:26px;border:1px solid #fff;width:25px;height:25px;line-height:22px;text-align:center;margin-top:3px}.selected,.suggested_list li:hover{background:#043A54;cursor:pointer;color:#fff}.suggested_list{margin-top:-7px;margin-bottom:10px;list-style:none;padding-left:0;z-index:5000;background:#eee;border:1px solid #043A54;color:#000;font-weight:bold;}.suggested_list li{padding:10px;border-bottom:1px solid #043A54}.jumbo_title{background:#043A54;color:#fff;padding:5px 15px;font-size:20px;margin:0 -19px!important}.jumbo_details{border:0 solid #043A54;padding:15px;display:block;font-size:20px!important}.modal-body{padding:0 10px 16px!important}.modal-header,.modal-header h2{padding-left:10px!important}.btn-global,.btn-local,.btn-twowords{margin-left:5px;width:80px}.serach_icon,.serach_icon:hover{background:#fff!important;border:0!important;box-shadow:0 0!important;-webkit-box-shadow:0 0!important;border-radius:0!important;height:20px!important;width:20px!important;min-width:20px!important}.box-blog,.box-menu{display:inline-block;font-weight:700;border:1px solid #162336;text-align:center;cursor:pointer}.other-dictionary-div{margin:15px 0 5px!important}.box-menu-full-width{padding:9px;cursor:pointer;margin-top:20px;margin-bottom:0}.box-menu{padding:15px;width:125px;margin-right:10px;margin-bottom:10px}.box-blog{padding:10px;width:50px}.bg-primary{color:#fff;background-color:#337ab7}.bg-primary:hover{color:#fff}.bg-danger,.bg-danger:hover,.bg-info,.bg-info:hover,.bg-success:hover,.bg-warning,.bg-warning:hover{color:#000}.bg-success{background-color:#dff0d8;color:#000}.bg-info{background-color:#d9edf7}.bg-warning{background-color:#fcf8e3}.bg-danger{background-color:#f2dede}.bg-dark{background-color:#162336;color:#fff}.article-section{clear:both;width:100%;margin-bottom:7px}.article-table{width:100%;background-color:rgba(29,107,229,.08)}.article-table:nth-child(even){width:100%;background-color:#f5f5f5}.article-thumb{width:60px;vertical-align:top;padding:6px}.article-thumb-div{font-size:20px;padding:3px;height:42px;line-height:1.7}.article-td{vertical-align:top;padding-top:6px;padding-bottom:6px}.article-h2{margin:0 7px;font-size:17px}.article-a{display:block;width:100%;color:#157ab5}.article-date{font-size:11px;color:#000;margin-left:7px;margin-top:5px}.back-button{width:38px;padding:11px 7px}.sound-button{width:38px;padding:5px}.clear{clear:both;height:1px}.history-remove-btn{cursor:pointer}.bn_ba img{width:100%;max-width:350px}.fav-button{margin-top:10px!important}#ad{margin:10px auto}.pull-right{float:right!important}.list-group-item-text{margin-bottom:0;line-height:1.3}.list-group{padding-left:0;margin-bottom:20px}.history-row{margin-bottom:5px;border-bottom:1px solid #ccc}.list-group .list-group-item .list-group-item-heading{color:rgba(0,0,0,.77);font-size:20px;line-height:29px}.pull-left{float:left!important}.list-group-item-heading{margin-top:0;margin-bottom:5px;font-weight:400}.pagination{display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#337ab7;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-top-left-radius:4px;border-bottom-left-radius:4px}.pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:2;color:#23527c;background-color:#eee;border-color:#ddd}.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:3;color:#fff;cursor:default;background-color:#337ab7;border-color:#337ab7}.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{color:#777;cursor:not-allowed;background-color:#fff;border-color:#ddd}.navbar-nav li a{font-weight:bold;text-transform:uppercase;}.collapsing,.modal,.modal-open{overflow:hidden}.modal,.modal-backdrop{top:0;right:0;bottom:0;left:0}.fade{opacity:0;-webkit-transition:opacity .15s linear;-o-transition:opacity .15s linear;transition:opacity .15s linear}.fade.in{opacity:1}.collapse{display:none}.collapse.in{display:block}.collapsing{position:relative;height:0;-webkit-transition-property:height,visibility;-o-transition-property:height,visibility;transition-property:height,visibility;-webkit-transition-duration:.35s;-o-transition-duration:.35s;transition-duration:.35s;-webkit-transition-timing-function:ease;-o-transition-timing-function:ease;transition-timing-function:ease}.modal{display:none;position:fixed;z-index:1050;-webkit-overflow-scrolling:touch;outline:0}.modal.fade .modal-dialog{-webkit-transform:translate(0,-25%);-ms-transform:translate(0,-25%);-o-transform:translate(0,-25%);transform:translate(0,-25%);-webkit-transition:-webkit-transform .3s ease-out;-o-transition:-o-transform .3s ease-out;transition:transform .3s ease-out}.modal.in .modal-dialog{-webkit-transform:translate(0,0);-ms-transform:translate(0,0);-o-transform:translate(0,0);transform:translate(0,0)}.modal-open .modal{overflow-x:hidden;overflow-y:auto}.modal-dialog{position:relative;width:auto;margin:10px}.modal-content{position:relative;background-color:#fff;border:1px solid #999;border:1px solid rgba(0,0,0,.2);border-radius:6px;-webkit-box-shadow:0 3px 9px rgba(0,0,0,.5);box-shadow:0 3px 9px rgba(0,0,0,.5);-webkit-background-clip:padding-box;background-clip:padding-box;outline:0}.modal-backdrop{position:fixed;z-index:1040;background-color:#000}.modal-backdrop.fade{opacity:0;filter:alpha(opacity=0)}.modal-backdrop.in{opacity:.5;filter:alpha(opacity=50)}.modal-header{padding:15px;border-bottom:1px solid #e5e5e5}.modal-header .close{margin-top:-2px}.modal-title{margin:0;line-height:1.42857143}.modal-body{position:relative;padding:15px}.modal-footer{padding:15px;text-align:right;border-top:1px solid #e5e5e5}.modal-footer .btn+.btn{margin-left:5px;margin-bottom:0}.modal-footer .btn-group .btn+.btn{margin-left:-1px}.modal-footer .btn-block+.btn-block{margin-left:0}.modal-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto}.modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5)}.modal-sm{width:300px}}@media (min-width:992px){.modal-lg{width:900px}}.sound-button img,.fav-button img{position:relative;top:3px;}.download_box {background: #eee; width:100%; clear:both;display:none;padding:5px;}.download_box_text {margin-top:9px;margin-left:9px;text-transform:uppercase;}.download_box_img {margin-top:4px;}.download_box_remove{margin-top: 6px;cursor:pointer;}.main-search{background:#fff !important;margin-bottom:0px!important;padding-left:10px;color:#000;font-weight:bold;}.search-group{border:1px solid #043A54;-webkit-box-shadow:0 8px 17px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19);box-shadow:0 8px 17px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19);}

</style>
	
</head>

<body>
<div class="navbar navbar-static-top">
  <div class="container-fluid" style="max-width: 1162px !important;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <!--img class="logo" src="'.$url.'/imgs/new_logo.png"-->
      <a class="navbar-brand" href="<?=$url?>" style="font-weight:bold;font-size:<?=($lang=='bengali')?'20':'15'?>px;"><?=($lang=='bengali')?'BDWORD':strtoupper(str_replace(array('https://www.','https://'),'',$url))?></a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">

      <ul class="nav navbar-nav navbar-right">
	  
        <li><a href="<?=$url?>">Home</a></li>
		<li><a href="<?=$url?>/read-text">Read Text</a></li>
		<li><a href="<?=$url?>/vocabulary-game">Games</a></li>
		<li><a href="<?=$url?>/learn-ten-words-everyday">Words Everyday</a></li>
        <li><a href="<?=$url?>/contact-us">Contact</a></li>

      </ul>
    </div>
  </div>
</div>

<div class="container">


	
	<div class="bs-docs-section">
	
		<div class="row">
		
			<div class="col-md-8">
				
				<div id="ad">
					<?=showAds($q, 'body-top', $conn);?>
				</div>
				
				<div class="bs-component">

					<div class="jumbotron">
                         <p></p>
						 
						 <div class="panel">
						
							<div class="panel-body">
							
							<?php $url = base_url(); ?>
							
							<table width=100% cell-padding=5 cell-spacing=2>
								<tr>
									<th>Present Form</th>
									<th>Meaning</th>
									<th>Past Form</th>
									<th>Past Participle</th>
								</tr>
							
							
							<?php while($row=mysql_fetch_assoc($verb_formation)){?>
								
								<tr>
									<td><?php echo $row['word'];?></td>
									<td><?php echo $row['mean'];?></td>
									<td><?php echo $row['past'];?></td>
									<td><?php echo $row['participle'];?></td>
							
							<?php } ?>
							
							</table>
									
							<ul class="pagination">
								<?php if($curpage != $startpage){ ?>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $startpage; ?>" tabindex="-1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">First</span>
      </a>
    </li>
    <?php } ?>
	
	<?php if($curpage != $endpage){ ?>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $endpage; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Last</span>
      </a>
    </li>
    <?php } ?>
	
	<li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
							
							
							<?php if($curpage != $endpage){ ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage; ?>"><?php echo $nextpage ?></a></li>
<?php } ?>
							</ul>
							
							</div>
						 </div>
					
					</div>
					
				</div>	
				
			</div>
			
			<div class="col-md-4">
			
				<?php require('sidebar.php'); ?>
			
			</div>
		
		</div>
	
	</div>


</div>

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
$(document).ready(function(){
	
	$('#load_data').html(showAllStorageData('favs'));
});
</script>

</body>
</html>

