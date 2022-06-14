<?php
$newspaper_url = "http://www.allindianewspaperlist.com/";

$isMobile = 0;

if(preg_match("/(android|avantgo|ipad|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])){
	$isMobile = 1;
}

$ads = true;

	$country = 'india';
	$lang = 'indian';
	$site_title = 'AllIndiaNewspaperList.com';
	$analytics_id = '87987245';

$lang_uc = ucfirst($lang);
$country_uc = ucfirst($country);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<?php
	
	$title = 'List of All '.$lang_uc.' Newspapers 2020'.(($server_name=='allbanglanewspaperlist24.com')?'- বাংলাদেশের সংবাদপত্রসমূহ':'');   

	switch(basename($_SERVER['PHP_SELF']))
	{
		case 'all-newspaper':
			$title = 'List of All '.$lang_uc.' Newspapers in '.$country_uc.' | All '.$lang_uc.' Newspaper List 2020';
		break;
		case 'all-online-newspapers':
			$title = 'List of All Online Newspapers in '.$country_uc.' | All '.$lang_uc.' Newspaper List 2020';
		break;
		case 'all-english-newspaper':
			$title = 'List of All English Newspapers in '.$country_uc.' | All '.$lang_uc.' Newspaper List 2020';
		break;
		case 'all-local-newspapers':
			$title = 'List of All '.$lang_uc.' Local Newspapers in '.$country_uc.' | All '.$lang_uc.' Newspaper List 2020';
		break;
		case 'all-blog':
			$title = 'List of All '.$lang_uc.' Blog Sites in '.$country_uc.' | All '.$lang_uc.' Newspaper List 2020';
		break;
		case 'submit-newspaper':
			$title = 'Submit your newspaper | All '.$lang_uc.' Newspaper List 2020';
		break;
		case 'contact':
			$title = 'Contact Us | All '.$lang_uc.' Newspaper List 2020';
		break;
	}
	
	?>
	

	
	<title><?=$title?></title>
	<meta name="Description" content="<?=$country?> newspaper, <?=$country?> newspapers, news paper in <?=$country?>, news paper of <?=$country?>, news papers <?=$country?>, news papers in <?=$country?>, news papers of <?=$country?>, ntv <?=$country?> news, online <?=$country?> news, star news <?=$country?>, the <?=$country?> news, bangla news paper in <?=$country?>, <?=$country?> and news, <?=$country?> bangla news, <?=$country?> bangla news paper, <?=$country?> bengali news, <?=$country?> daily news, <?=$country?> daily news paper, <?=$country?> daily news papers, <?=$country?> election news, <?=$country?> news, <?=$country?> news bdr, <?=$country?> news channel, <?=$country?> news daily, <?=$country?> news live, <?=$country?> news net, <?=$country?> news paper, <?=$country?> news paper bangla, <?=$country?> news paper daily, <?=$country?> news paper online, <?=$country?> news papers, <?=$country?> news pepar, <?=$country?> news today, <?=$country?> news tv, bbc <?=$country?> news, current <?=$country?> news, daily news paper in <?=$country?>, daily news paper of <?=$country?>, daily star <?=$country?> news, ittefaq news <?=$country?>, latest <?=$country?> news, latest news of <?=$country?>, news from <?=$country?>, news in <?=$country?>, news of <?=$country?>, news on <?=$country?>, news paper from <?=$country?>" />
	<meta name="Keywords" content="<?=$country?> newspaper, <?=$country?> newspapers, news paper in <?=$country?>, news paper of <?=$country?>, news papers <?=$country?>, news papers in <?=$country?>, news papers of <?=$country?>, ntv <?=$country?> news, online <?=$country?> news, star news <?=$country?>, the <?=$country?> news, bangla news paper in <?=$country?>, <?=$country?> and news, <?=$country?> bangla news, <?=$country?> bangla news paper, <?=$country?> bengali news, <?=$country?> daily news, <?=$country?> daily news paper, <?=$country?> daily news papers, <?=$country?> election news, <?=$country?> news, <?=$country?> news bdr, <?=$country?> news channel, <?=$country?> news daily, <?=$country?> news live, <?=$country?> news net, <?=$country?> news paper, <?=$country?> news paper bangla, <?=$country?> news paper daily, <?=$country?> news paper online, <?=$country?> news papers, <?=$country?> news pepar, <?=$country?> news today, <?=$country?> news tv, bbc <?=$country?> news, current <?=$country?> news, daily news paper in <?=$country?>, daily news paper of <?=$country?>, daily star <?=$country?> news, ittefaq news <?=$country?>, latest <?=$country?> news, latest news of <?=$country?>, news from <?=$country?>, news in <?=$country?>, news of <?=$country?>, news on <?=$country?>, news paper from <?=$country?>" />


	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-<?=$analytics_id?>-1', 'auto');
	  ga('send', 'pageview');

	</script>

	<?php
		if($isMobile == 1 AND $ads = true AND $_SERVER['PHP_SELF']=='index.php'){
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


	<link rel="stylesheet" href="https://www.allindianewspaperlist.com/css/css" type="text/css">
	<link href="https://www.allindianewspaperlist.com/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://www.allindianewspaperlist.com/css/bootstrap-material-design.css" rel="stylesheet">
	<link href="//cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.css" rel="stylesheet">
	<link href="https://www.allindianewspaperlist.com/css/main.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
<div class="navbar <?=($_SERVER['PHP_SELF']=='/newspapers.php')?'navbar-static-top':'navbar-fixed-top'?>">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=$newspaper_url?>"><?=$site_title?></a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">

      <ul class="nav navbar-nav navbar-right">
	  
        <li><a href="<?=$newspaper_url?>">Home</a></li>
	  
        <li><a class="paper-submit-btn btn btn-raised btn-info btn-newspaper-submit" href="<?=$newspaper_url?>submit-newspaper">Submit Newspaper</a></li>

        <li class="dropdown">
          <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Newspapers
            <b class="caret"></b></a>

		  

		<ul class="dropdown-menu load_dy_menu">

		</ul>

		

          
        </li>
		
        <li><a href="<?=$newspaper_url?>contact">Contact Us</a></li>

      </ul>
    </div>
  </div>
</div>