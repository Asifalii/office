<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>

<?php
	if($inWordList and $isMobile==false and restrictAd($q)){
?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 336-red -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-2642708445471409"
     data-ad-slot="3618946282"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<?php
	}
?>

<?php endif; ?>
<style>
.icon-android { 
background-repeat: no-repeat;
display: inline-block;
background-image: url("<?=$base_url?>/imgs/android-icon.png");
background-position : 0px 0px; 
width : 30px; height : 30px;  
}
.icon-ios { 
background-repeat: no-repeat;
display: inline-block;
background-image: url("<?=$base_url?>/imgs/ios-icon.png");
background-position : 0px 0px; 
width : 30px; height : 30px;  
}
.icon-chrome { 
background-repeat: no-repeat;
display: inline-block;
background-image: url("<?=$base_url?>/imgs/chrome-icon.png");
background-position : 0px 0px; 
width : 30px; height : 30px;  
}
.left_padding {
	padding-left:10px;
}
</style>
<?php
$lang = getLang();
if($lang=='bengali'){
?>
<div class="panel panel-primary ">

	<div class="panel-body app_links_body">
		<a href="https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary" class="btn btn-primary btn-raised" style="width:100% !important;"><table><tr><td><i class="icon-android"></i></td><td class="left_padding"> Android APP</td></tr></table></a>
		<a href="https://itunes.apple.com/us/app/english-bengali-dictionary/id1213381239?ls=1&mt=8" class="btn btn-primary btn-raised" style="width:100% !important;"><table><tr><td><i class="icon-ios"></i></td><td class="left_padding"> iPhone APP</td></tr></table></a>
		<a href="https://chrome.google.com/webstore/detail/bdword-english-to-bengali/cogjmeckpkinhnidokapabgaoelhkbcl" class="btn btn-primary btn-raised" style="width:100% !important;"><table><tr><td><i class="icon-chrome"></i></td><td class="left_padding"> Chrome Extension</td></tr></table></a>
	</div>

</div>

<?php
}else{
	
connect();
$getAppId = mysqli_fetch_assoc(mysqli_query($conn,'select AppId from AppIds where Lang="'.$lang.'" limit 1'));
$appId = $getAppId['AppId'];
$download_link = 'https://itunes.apple.com/us/app/english-'.$lang.'-dictionary/id'.$appId.'?ls=1&mt=8';
	
?>
<div class="panel panel-primary ">

	<div class="panel-body app_links_body">
		<a href="https://play.google.com/store/apps/details?id=com.bdword.e2<?=$lang?>dictionary" class="btn btn-primary btn-raised" style="width:100% !important;"><table><tr><td><i class="icon-android"></i></td><td class="left_padding"> Android APP</td></tr></table></a>
		<a href="<?=$download_link?>" class="btn btn-primary btn-raised" style="width:100% !important;"><table><tr><td><i class="icon-ios"></i></td><td class="left_padding"> iPhone APP</td></tr></table></a>
	</div>

</div>

<?php
}
?>


<?php
$indians = array('hindi','tamil','telugu','kannada','gujarati','punjabi','marathi');
if($lang=='bengali')
{
	echo '<a href="http://www.allbanglanewspaperlist24.com" rel="nofollow" target="_blank"><img src="'.$base_url.'img/banglanewspapers.png" style="width:100%; max-width:360px;"/></a><br>';
}elseif(in_array($lang, $indians))
{
	echo '<a href="http://www.allindianewspaperlist.com/" rel="nofollow" target="_blank"><img src="'.$base_url.'img/indiannewspapers.png" style="width:100%; max-width:360px;" /></a><br>';
}
?>


<!--div class="panel panel-primary ">

	<div class="panel-heading">
		<h3 class="panel-title">
			Search History
		</h3>
	</div>
	
	<div class="panel-body load_search_history">
		Any word you search will appear here.
	</div>

</div>
<br-->
<div class="panel panel-primary ">

	<div class="panel-heading">
		<h3 class="panel-title">
			Your Favorite Words
		</h3>
	</div>
	
	<div class="panel-body load_favs">
		Currently you do not have any favorite word. To make a word favorite you have to click on the heart button.
	</div>

</div>

<!-- G&R_300x250 -->
<script id="GNR440">
    (function (i,g,b,d,c) {
        i[g]=i[g]||function(){(i[g].q=i[g].q||[]).push(arguments)};
        var s=d.createElement(b);s.async=true;s.src=c;
        var x=d.getElementsByTagName(b)[0];
        x.parentNode.insertBefore(s, x);
    })(window,'gandrad','script',document,'//content.green-red.com/lib/display.js');
    gandrad({siteid:501,slot:440});
</script>
<!-- End of G&R_300x250 -->

<div class="panel panel-primary " style="padding:15px;">

<a href="<?=$url?>/about-us">About Us</a> - 
<a href="<?=$url?>/privacy">Privacy</a> - 
<a href="<?=$url?>/disclaimer">Disclaimer</a> - 
<a href="<?=$url?>/contact-us">Contact</a>

</div>



