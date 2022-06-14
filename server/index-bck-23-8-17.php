<?php 
require('header.php'); 
?>
	
	<div class="bs-docs-section">
	
		<div class="row">
		
			<div class="col-md-8">
				

				<div class="bs-component">

					<div class="jumbotron">
					
					<?php
					$device = findDevice();
					if($device=='ios')
					{
						connect();
						$getAppId = mysql_fetch_assoc(mysql_query('select AppId from AppIds where Lang="'.$lang.'" limit 1'));
						$appId = $getAppId['AppId'];
						$download_link = 'https://itunes.apple.com/us/app/english-'.$lang.'-dictionary/id'.$appId.'?ls=1&mt=8';
					?>
					
						<div class="download_box">
							<a href="<?=$download_link?>" style="display:block"><div class="pull-left download_box_img"><i class="icon-ios"></i></div><div class="list-group-item-heading pull-left download_box_text"> DOWNLOAD IOS APP</div></a>
							
							<div class="pull-right download_box_remove"><img src="<?=$url?>/imgs/clear.png"></div>
						</div>
							
					<?php
					}
					if($device=='android')
					{
						
						$download_link = ($lang=='bengali')?'b':$lang;
					?>
						
						<div class="download_box">
							<a href="https://play.google.com/store/apps/details?id=com.bdword.e2<?=$download_link?>dictionary" style="display:block"><div class="pull-left download_box_img"><i class="icon-android"></i></div><div class="list-group-item-heading pull-left download_box_text"> DOWNLOAD ANDROID APP</div></a>
							
							<div class="pull-right download_box_remove"><img src="<?=$url?>/imgs/clear.png"></div>
						</div>
							
					<?php
					}
					if($device=='pc' AND $lang == 'bengali')
					{
					?>
						
						<div class="download_box">
							<a href="https://chrome.google.com/webstore/detail/bdword-english-to-bengali/cogjmeckpkinhnidokapabgaoelhkbcl" style="display:block"><div class="pull-left download_box_img"><i class="icon-chrome"></i></div><div class="list-group-item-heading pull-left download_box_text"> DOWNLOAD CHROME EXTENSION</div></a>
							
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
					
							<?php
							if($lang=='bengali'){
							?>
					
							<div class="form-group form-inline is-focused">
							<table><tr><td>
								  <div class="radio">
									<label style="color:#000;">
									  <input type="radio" name="keyb" value="1" <?=($_GET['keyb']!=2)?'checked':''?>>
										English to Bengali
									</label>
								  </div>
							  </td>
							  <td>&nbsp;&nbsp;</td>
							  <td>
								  <div class="radio">
									<label style="color:#000;">
									  <input type="radio" name="keyb" value="2" <?=($_GET['keyb']==2)?'checked':''?>>
									  Bengali to English
									</label>
								  </div>
							  </td></tr></table>
							</div>
							
							<?php
							}
							?>
							
							<div class="form-group label-floating serach-box <?=($q)?'is-focused':''?>">
								<div class="input-group search-group">

									
									<input type="search" class="form-control main-search" id="q" name="q" value="<?=(isset($_GET['q']))?$q:''?>" autocomplete="off" required placeholder="type English word/phrase" <?=($_GET['keyb']==2)?'style="display:none;"':''?>>
									<input type="search" class="form-control main-search" id="qb" name="qb" value="<?=(isset($_GET['qb']))?$_GET['qb']:''?>" autocomplete="off" required placeholder="Type <?=$ulang?> word in English (e.g. amader)" <?=($_GET['keyb']!=2)?'style="display:none;"':''?>>
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
						
				</div>
					</div>
					
				<div id="ad">
				
<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>
					<?php
						if($inWordList)
						{
							echo showAds($q, 'body-top');
						}
					?>
<?php endif; ?>
				

				</div>
					
		<div class="bs-component">
			<div class="jumbotron">
						
						
<p>

<?php
require('connect3.php');
$show_local_mean = true;
if($q and $lang and $show_local_mean==true){


if(preg_match("/^[a-z]$/", $q[0])){
	
	$mquery = mysql_query("select ".$lang." as mean from lang where word like '".$q."' limit 1");
	$mrow = mysql_fetch_assoc($mquery);

	
	// if no meaning
	if(mysql_num_rows($mquery)==0)
	{
		echo '<h3>No word meaning found for: '.$q.'</h3>';
		$pspell_array = '[]';
		
		$check_com_words = mysql_num_rows(mysql_query('select word from com_words where word like "'.$q.'"'));
		if($check_com_words==0 and strlen($q)<36)
		{
			$pspell_array = file_get_contents('http://sug.bdword.com/api_multiple.php?word='.urlencode($q));

			if(in_array($q, json_decode($pspell_array), true) and strlen($q)<36)
			{
				@mysql_query('insert into com_words (word) values ("'.$q.'")');
			}
		}
		
		if(count($pspell_array)>0)
		{
			echo '<hr><h3>Did you mean '.$pspell_array[0].'?</h3><hr>';
			
			foreach($pspell_array as $pa)
			{
				echo '<a style="display:block;" href="'.$url.'/english-to-'.$lang.'-meaning-'.$pa.'">'.$pa.'</a><hr>';
			}
		}

	}else{ // if meaning
		
		$sql = 'select word, '.$lang.', id, data from word_frame where word like "'.$q.'" limit 1';
		$query = mysql_query($sql);
		$row = mysql_fetch_assoc($query);

		$id = $row['id'];
		$data = json_decode($row['data']);
		$mean = json_decode($row[$lang]);
		$nex = null;
		$prev = null;
		$ba_img = null;
		$img_check = mysql_fetch_assoc(mysql_query('select nex,prev from img_words where word="'.$q.'" limit 1'));
		if($img_check['nex'])
		{	
			$ba_img = $q;
			$nex = $img_check['nex'];
			$prev = $img_check['prev'];
		}
		

		// img
		echo ($ba_img and $lang=='bengali')?'<div class="jumbo_title" style="margin-top:-34px !important;">Bangla Academy Ovidhan</div><div class="jumbo_details bn_ba"><img src="'.$url.'/word/'.strtoupper($ba_img).'.JPG" title="'.$q.'" alt="'.$q.'"></div><br>':'';
		
		// show top meaning
		
		echo '<p class="pull-left">'.$q.' <button class="btn btn-raised sound-button" onclick="responsiveVoice.speak(\''.$q.'\')"><img src="'.$url.'/imgs/play.png"></button>&nbsp;&nbsp;<button class="btn btn-raised sound-button fav-button" onclick="calFavs(\''.$q.'\', 1)"><img src="'.$url.'/imgs/favorite.png"></button> :'.$mrow['mean'].'</p><div style="clear:both;">&nbsp;</div>';
		
		// related
		
		$related_query = mysql_query('select variant from variants where word like "'.$q.'"');
		$related_words = array();
		while($related_row=mysql_fetch_assoc($related_query)){
			if($related_row['variant']!=$q)
			{
				$related_words[] = $related_row['variant'];
			}
				
		}
		
		$related_words_imp = "'".implode("','",$related_words)."'";

		$related_mean_query = mysql_query("select ".$lang." as mean, word from lang where word in (".$related_words_imp.")");
		$related_mean_array = array();
		while($related_mean_row=mysql_fetch_assoc($related_mean_query)){
			echo '<p>'.ucfirst($related_mean_row['word']).' :: '.$related_mean_row['mean'].'</p>';
		}
		
		// related ends
		
		// next prev
		
		echo ($prev)?'<div class="pull-left"><a class="btn btn-raised" href="'.$url.'/english-to-'.$lang.'-meaning-'.$prev.'">Previous</a></div>':'';
		
		echo ($nex)?'<div class="pull-right"><a class="btn btn-raised" href="'.$url.'/english-to-'.$lang.'-meaning-'.$nex.'">Next</a></div>':'';
		
		echo '<div style="clear:both;"></div><hr>';
		
		// see also in
		
		echo '<div class="jumbo_details"><br><div class="jumbo_title">Find meaning also in:</div><a class="btn btn-primary" href="http://the-definition.com/dictionary/'.$q.'" target="_blank">The Definition</a><a class="btn btn-primary" href="http://dictionary.reference.com/browse/'.$q.'?s=t" target="_blank">Dictionary.com</a><a class="btn btn-primary" href="http://www.merriam-webster.com/dictionary/'.$q.'" target="_blank">Merriam Webster</a><a class="btn btn-primary" href="http://en.wikipedia.org/wiki/'.$q.'" target="_blank">Wikipedia</a></div><br>';
		

		
		// echo "<pre>";
		// print_r($data->mean);
		
		// bn
		
		if($data->mean && count($data->mean)>0)
		{
			echo '<br><div class="jumbo_title">English to '.$ulang.' Meaning</div>';
			
			echo '<div class="jumbo_details bn_meaning">';
			$i = 0;

			foreach($data->mean as $key=>$val){
				$i++;
				if($i>1){
					echo '<hr>';
				}
				
				echo '<b>'.ucfirst($key).'</b><br>';
				$temp_array = array();
				$j = 0;
				foreach($val as $v)
				{
					$j++;
					if($mean->$v)
						$temp_array[] = $mean->$v;
					
					if($j>15){
						break;
					}
					
				}
				
				$temp_array = array_unique($temp_array);
				
				$j = 0;
				foreach($temp_array as $ta)
				{
					$j++;
					echo $j.'. '.$ta.'<br>';
					
					if($j>15){
						break;
					}
					
				}
								
			}
			
			echo '</div>';
		}

		// en
		if($data->eng && count($data->eng)>0)
		{
			
			$eng = '';
			$i = 0;

			foreach($data->eng as $key=>$val){
				$i++;
				if($i>1){
					$eng .= '<hr>';
				}
				
				$eng .= '<b>'.ucfirst($key).'</b><br>';

				$j = 0;
				foreach($val as $v)
				{
					$j++;
					$eng .= $j.'. '.$v.'<br>';
					
					if($j>15){
						break;
					}
					
				}
								
			}
			
			echo '<button class="btn btn-raised" onclick="showEngMeanPop(\'English Meaning :: '.$q.'\',\''.mysql_escape_string($eng).'\')">Show English Meaning</button>';
			
		}
		
		// examples
		if($data->examples && count($data->examples)>0)
		{
			
			$examples = '';
			$i = 0;

			foreach($data->examples as $val){
				$i++;
				if($i>1){
					$examples .= '<hr>';
				}
		
				$examples .= $i.'. '.$val;	
				if($i>15){
					break;
				}				
			}
			
			echo '&nbsp;&nbsp;<button class="btn btn-raised" onclick="showEngMeanPop(\'Examples :: '.$q.'\',\''.mysql_escape_string($examples).'\')">Show Examples</button>';
			
		}
		
		// phrases
		if($data->phrase && count($data->phrase)>0)
		{
			echo '<br><div class="jumbo_title" data-target="phrases">Related Phrases</div>';
			
			echo '<div class="jumbo_details phrases">';
			$i=0;
			foreach($data->phrase as $key=>$val)
			{
				if($mean->$val)
				{
					$i++;
					if($i>1){
						echo '<hr>';
					}
					echo '<p>'.$i.'. '.$val.' :: '.$mean->$val.'</p>';
				}
				if($i>15){
					break;
				}
			}
			

			echo '</div>';
		}
		


		// synonyms
		if($data->syn && count($data->syn)>0)
		{
			echo '<br><div class="jumbo_title" data-target="phrases">Synonyms</div>';
			
			echo '<div class="jumbo_details synonyms">';
			$i=0;
			foreach($data->syn as $key=>$val)
			{
				if($mean->$val)
				{
					$i++;
					if($i>1){
						echo '<hr>';
					}
					echo '<p>'.$i.'. '.$val.' :: '.$mean->$val.'</p>';
				}
				if($i>15){
					break;
				}
			}
			

			echo '</div>';
		}
		
		// antonyms
		if($data->anto && count($data->anto)>0)
		{
			echo '<br><div class="jumbo_title" data-target="phrases">Antonyms</div>';
			
			echo '<div class="jumbo_details antonyms">';
			$i=0;
			foreach($data->anto as $key=>$val)
			{
				if($mean->$val)
				{
					$i++;
					if($i>1){
						echo '<hr>';
					}
					echo '<p>'.$i.'. '.$val.' :: '.$mean->$val.'</p>';
				}
				if($i>15){
					break;
				}
			}
			

			echo '</div>';
		}
		
		// variants
		if($data->variants && count($data->variants)>0)
		{
			echo '<br><div class="jumbo_title" data-target="phrases">Different forms</div>';
			
			echo '<div class="jumbo_details variants">';
			echo '<p>'.implode(', ',$data->variants).'</p>';
			echo '</div>';
		}
		
		// similar
		if($data->similar && count($data->similar)>0)
		{
			echo '<br><div class="jumbo_title" data-target="phrases">Similar Words</div>';
			
			echo '<div class="jumbo_details similar">';
			echo '<p>'.implode(', ',$data->similar).'</p>';
			echo '</div>';
		}
		
		
	}// if meaning ends
	

	
}else{
	
	$mquery = mysql_query("select word, `".$lang."` as `mean` from `lang` where `".$lang."` like '".$q."' limit 10");

	if(mysql_num_rows($mquery)!=0)
	{
		while($row = mysql_fetch_assoc($mquery))
		{
			echo '<hr><h2>'.$row['word'].' :: '.$row['mean'].'</h2>';
		}
	}else{
		echo '<h2>No word meaning found for: '.$q.'</h2>';
	}


	
}
// show meaning [ends]

}

?>

</p>



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
								
								
<hr>


<div class="panel">

	<div class="panel-heading">
	<h3 class="panel-title"><b>Topic Wise Words</b></h3>
	</div>
	<div class="panel-body">

		<?php
			echo GetAllTopics('topic-wise-words.php', $topic);
		?>

	</div>
	
</div>

<div class="panel">

	<div class="panel-heading">
	<h3 class="panel-title"><b>Learn 3000+ Common Words</b></h3>
	</div>
	<div class="panel-body">

		<?php
			echo Common3000WordsShort('learn-3000-plus-common-words.php');
		?>

	</div>
	
</div>


<?php


if(!$q AND $lang=='bengali'){
	echo PageShortIntro(5, 'common_translations', 'learn-common-translations.php', '500+ Common Translations');
}

?>


<div class="panel">

	<div class="panel-heading">
	<h3 class="panel-title"><b>Learn Common GRE Words</b></h3>
	</div>
	<div class="panel-body">

		<?php
			echo CommonGREWordsShort('learn-common-gre-words.php');
		?>

	</div>
	
</div>

<?php 
if($lang=='bengali')
{
?>

<div class="panel">
	<div class="panel-heading">
	<h3 class="panel-title"><b>Learn Grammar</b></h3>
	</div>
	<div class="panel-body">
		<?php
			echo getGrammar();
		?>
	</div>
			  
</div>

<?php			
}
?>

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
	echo '<a style="font-size: 18px;" href="'.$url.'/english-to-'.$lang.'-meaning-'.$gwd.'">'.$gwd.'</a><br>';
	
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
} // if no $q

?>
						</p>

						<div style="clear:both;">&nbsp;</div>

					</div>
					
				</div>	
				
			</div>
			
			<div class="col-md-4">
			
				<?php require('sidebar2.php'); ?>
			
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

<?php
if($lang=='bengali'){
?>
<script src="./js/keyboard.js"></script>
<?php } ?>
<script>


function submit_search_local(word){
	$('#q').val(word);
	$('.suggested_list li').removeClass('selected');
	$('#new_form').submit();
}

$('input[name=keyb]').on('change', function(){

	if($('input[name=keyb]:checked').val()==2)
	{
		$('#qb').css('display','block');
		$('#q').css('display','none');
	}else
	{
		$('#qb').css('display','none');
		$('#q').css('display','block');
	}
	
});
$('#qb').on('input', function() {

	var search_term = parseKeymap($('#qb').val(), 'Phonetic');
	var firstChar = search_term.charAt(0).toLowerCase();

	if(search_term.length>2)
	{
		$.ajax({
			type: 'post',
			data: {q: search_term},
			url: 'getBengaliSug.php',
			success: function(data)
			{
				

				$('.suggested_list').html('');
				if(data!='' && data != null)
				{
					$.each(data, function(i, val){
						console.log(val);
						$('.suggested_list').append('<li onclick="submit_search_local(\''+val[0]+'\')">'+val[1]+' :: '+val[0]+'</li>');
						
					});
				}

				
			}
		});
	}else
	{
		$('.suggested_list').html('');
	}

});


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


if(obj['mean']!=null && obj['data']['img']!=null && lang()=='bengali')
{
	$mean += '<br><div class="jumbo_title" style="margin-top:-49px !important;">Bangla Academy Ovidhan</div>';
	var img_mean = obj['data']['img'];
	if($q=='into')
	{
		img_mean = 'into';
	}
	$mean += '<div class="jumbo_details bn_ba">';
	$mean += '<img src="//www.bdword.com/word/'+obj['data']['img'].toUpperCase()+'.JPG" title="'+img_mean+'" alt="'+img_mean+'" />';
	$mean += '</div><hr>';
	

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
