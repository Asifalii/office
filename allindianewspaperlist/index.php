<?php
require 'header.php';
?>

<div class="container" style="<?=($_SERVER['PHP_SELF']=='/newspapers.php')?'':'margin-top:70px !important;'?>">

	<?php
	if($isMobile == 0 AND $ads = true){
	?>
	<div style="margin:5px auto; width: 730px">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<ins class="adsbygoogle"
		style="display:inline-block;width:728px;height:90px"
		data-ad-client="ca-pub-2642708445471409"
		data-ad-slot="9676823488"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	
	<?php
	}
	?>

	<div id="main_body">
	
	</div>
	

	<div class="bs-docs-section">
	
		<div class="row">
		
			<div class="col-md-12">
				
				<div class="page-header"><h2 id="container">About <?=$site_title?></h2></div>
				<div class="bs-component">
				
					<div class="jumbotron">
				
						<p>

						Now You Can Read <b>All <?=$lang_uc?> Newspapers</b> just in one click. Yes, no need to search for your favorite <b><?=$lang_uc?> Newspaper or epaper</b>, you can read any Newspaper of <?=$country_uc?> of any language from this site. Just click the icon of your favorite newspaper and it will open in new tab. You can easily switch newspapers, we have several classification and listing all the newspapers available throught the globe. You can compare a news item in several <b><?=$lang_uc?> newspapers</b>. <b><?=$site_title?></b> is now in your reach.</p>

						<p>Our website provides a listing of almost all the <?=$lang_uc?>, English and Online Newspapers available in <?=$country_uc?> and from <?=$lang_uc?> speaking communities living at home and abroad. We have all major national newspapers both in <?=$lang_uc?> and English. We also listed all the local newspapers from major divisions, states, districts and your local cities. “Local” Newspapers section has newspapers covering local News. All Probashi Newspapers available from <?=$lang_uc?> Community Abroad and Indians living in major cities abroad. Our <?=$lang_uc?> newspaper list also includes most popular websites providing “online” (also known as 24×7 <?=$lang_uc?> news sites) <?=$lang_uc?> news from <?=$country_uc?>, News from India and also news from abroad. We are honored to have so many requests to add new newspapers, specially for Online News sites, and added them. If we missed any, please feel free to submit them and we’ll review and add them for you.</p>

						<p>We are listing more <?=$lang_uc?> newspapers from your local cities almost everyday. If you do not see your favorite city news paper here, We encourage all locals living in <?=$country_uc?>, India USA, Canada, Australia, UK, Europe, Middle East and rest of the world to add their favorite newspapers by clicking on “Submit your Newspaper”.</p>

						<p>Readers Tagged us as:<hr>
						<?=$lang_uc?> newspaper,<?=$lang_uc?> news,<?=$country?> newspaper,<?=$lang_uc?> news paper,all bd news,<?=$country?> newspapers

						</p>
				
						<div style="clear:both;">&nbsp;</div>
				
					</div></div>
				
			</div>
		
		</div>
	
	</div>


</div>

<?php
require 'footer.php';
?>
