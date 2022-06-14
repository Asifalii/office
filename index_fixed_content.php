
				
				<div class="box_wrapper">
                    <fieldset>
					
					<?php 
					
						
					echo '<legend class="custom_font2"><h1>English to '.$ulang.' Dictionary</h1></legend>'; 
					
					?>
                        
                        <div class="fieldset_body inner_details">
							<?php //echo ($q!=$_GET['q'])?'<span>Showing meaning for <b>'.$q.'</b> (<u>'.$_GET['q'].'</u>)</span>':''; ?>
                            <span>
                            	<button class="btn_default4 bdr_radius2 custom_bdr">
                                    <a href="<?=$base_url?><?=$lang?>-to-english-dictionary" title="<?=$ulang?> to English Dictionary"><?=$ulang?> to English Dictionary</a>
                                </button>	
                                <button class="btn_default4 bdr_radius2 custom_bdr">
                                    <a href="<?=$base_url?>english-to-<?=$lang?>-read-text-with-translation" title="Read Text">Read Text</a>
                                </button>	
                             
                                <button class="btn_default4 bdr_radius2">
                                    <a href="<?=$base_url?>english-to-<?= $lang?>-dictionary-favourite-words" title="Browse Favorite Words">Favorite Words</a>
                                </button>
                                <button class="btn_default4 bdr_radius2">
                                    <a href="<?=$base_url?>english-to-<?= $lang?>-dictionary-learn-ten-words-everyday" title="Learn Ten Words Everyday">Learn Words</a>
                                </button>

                                <button class="btn_default4 bdr_radius2">
                                    <a href="<?=$base_url?>english-to-<?= $lang?>-dictionary-vocabulary-game" title="Play Vocabulary Games">Vocabulary Games</a>
                                </button>
                        	</span>
                        </div>
                    </fieldset>
					
					<div><a href="<?=$base_url?>english-to-<?= $lang?>-dictionary-learn-prepositions" title="Learn Prepositions by Photos"><img src="<?=$contentUrl?>banners/learn-prepositions-by-photos.jpg" alt="Learn Prepositions by Photos" style="width:100%" /></a></div>
					
                    <div><a href="<?=$base_url?>english-to-<?=$lang?>-dictionary-commonly-confused-words" title="commonly confused words"><img src="<?=$contentUrl?>banners/commonly-confused-words.jpg" alt="commonly confused words" style="width:100%" /></a></div>
			
					<div><a href="<?=$base_url?>english-to-<?= $lang?>-dictionary-form-of-verbs" title="form of verbs"><img src="<?=$contentUrl?>banners/form-of-verbs.jpg" alt="form of verbs" style="width:100%; max-height:170px;" /></a></div>

			
					<fieldset class="bdr_radius3">
                        <legend>
                            <h1>Words by Category</h1>
                        </legend>

                        <div class="fieldset_body">


							<div class="words_category" style="width:100%;">
                                <div class="category_cards">
                                    <a href="<?=$base_url?>english-to-<?= $lang?>-dictionary-300-plus-toefl-words" style="width:100%;">
                                        <h5>
                                            <img src="<?= $contentUrl?>img/direction_arrow2.png">
                                            TOEFL Words
                                        </h5>
                                        <label>Learn 300+ TOEFL words</label>
                                    </a>
                                </div> 
                            </div>

                            <div class="words_category">
                                <div class="category_cards">
                                    <a id="topic_wise_words" href="<?=$base_url?>english-to-<?= $lang?>-dictionary-topic-wise-words-food">
                                        <h5>
                                            <img src="<?= $contentUrl?>img/direction_arrow2.png">
                                            Topic Wise Words
                                        </h5>
                                        <label>Learn topic wise words</label>
                                    </a>
                                </div>
                                <div class="category_cards">
                                    <a href="<?=$base_url?>english-to-<?= $lang?>-dictionary-learn-3000-plus-common-words">
                                        <h5 class="custom_color3">
                                            <img src="<?= $contentUrl?>img/direction_arrow.png">
                                            Common Words
                                        </h5>
                                        <label>Learn 3000+ common words</label>
                                    </a>
                                </div>
                            </div>
							
							<div class="words_category">
                                
								<?php
									if($lang=='bengali' OR $lang=='bangla'){
								?>

								<div class="category_cards">
                                    <a href="<?=$base_url?>english-to-<?$lang?>-dictionary-grammar-agreement-of-verb-with-subjects">
                                        <h5>
                                            <img src="<?= $contentUrl?>img/direction_arrow2.png">
                                            English Grammar
                                        </h5>
                                        <label>Learn English Grammar</label>
                                    </a>
                                </div>

								<?php
									}
								?>

                                <div class="category_cards" <?php echo ($lang=='bengali')?'':'style="width:100%;"'; ?>>
                                    <a id="words_everyday" href="#" <?php echo ($lang=='bengali')?'':'style="width:100%;"'; ?>>
                                        <h5 class="custom_color3">
                                            <img src="<?= $contentUrl?>img/direction_arrow.png">
                                            Words Everyday
                                        </h5>
                                        <label>Learn words everyday</label>
                                    </a>
                                </div>
                            </div>
                            <div class="words_category">
                                <div class="category_cards">
                                    <a id="most_search_words" href="#">
                                        <h5 class="custom_color4">
                                            <img src="<?= $contentUrl?>img/direction_arrow3.png">
                                            Most Searched Words
                                        </h5>
                                        <label>Learn most searched words</label>
                                    </a>
                                </div>
                                <div class="category_cards">
                                    <a href="<?=$base_url?>english-to-<?= $lang?>-dictionary-learn-common-gre-words">
                                        <h5 class="custom_color5">
                                            <img src="<?= $contentUrl?>img/direction_arrow4.png">
                                            GRE Words
                                        </h5>
                                        <label>Learn common GRE words</label>
                                    </a>
                                </div>
                            </div>
							
							<?php if($lang=='bengali'){?>
							
							<div class="words_category">
                                <div class="category_cards">
                                    <a href="https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary">
                                        <h5 class="custom_color4">
                                            <img src="<?= $contentUrl?>img/android-icon.png" width="25" height="25" alt="icon">
                                            Android App
                                        </h5>
                                        <label>Download Android App</label>
                                    </a>
                                </div>
                                <div class="category_cards">
                                    <a href="https://itunes.apple.com/us/app/english-bengali-dictionary/id1213381239?ls=1&mt=8">
                                        <h5 class="custom_color5">
                                            <img src="<?= $contentUrl?>img/ios-icon.png" width="25" height="25" alt="icon">
                                            iPhone App
                                        </h5>
                                        <label>Download iPhone App</label>
                                    </a>
                                </div>
                            </div>
							<?php }else{
									
								$getAppId = mysqli_fetch_assoc(mysqli_query($conn,'select AppId from AppIds where Lang="'.$lang.'" limit 1'));
								$appId = $getAppId['AppId'];
								$download_link = 'https://itunes.apple.com/us/app/english-'.$lang.'-dictionary/id'.$appId.'?ls=1&mt=8';
								
							?>
							<div class="words_category">
								<div class="category_cards">
                                    <a href="https://play.google.com/store/apps/details?id=com.bdword.e2<?=$lang?>dictionary">
                                        <h5 class="custom_color4">
                                            <img src="<?= $contentUrl?>img/android-icon.png" width="25" height="25" alt="icon">
                                            Android App
                                        </h5>
                                        <label>Download Android App</label>
                                    </a>
                                </div>
                                <div class="category_cards">
                                    <a href="<?=$download_link?>">
                                        <h5 class="custom_color5">
                                            <img src="<?= $contentUrl?>img/ios-icon.png" width="25" height="25" alt="icon">
                                            iPhone App
                                        </h5>
                                        <label>Download iPhone App</label>
                                    </a>
                                </div>
							</div>
							
							<?php }?>
							
							<?php if($lang=='bengali'){?>
							
							<div class="words_category">
                                <div class="category_cards">
                                    <a href="https://chrome.google.com/webstore/detail/bdword-english-to-bengali/cogjmeckpkinhnidokapabgaoelhkbcl">
                                        <h5>
                                            <img src="<?= $contentUrl?>img/direction_arrow2.png">
                                            Chrome Extension
                                        </h5>
                                        <label>Download Chrome Extension</label>
                                    </a>
                                </div>
								
								<div class="category_cards">
								<?php if(!$q AND $lang=='bengali'){?>
                                    <a href="<?=$base_url?>english-to-<?= $lang?>-dictionary-learn-translations">
                                        <h5 class="custom_color4">
                                            <img src="<?= $contentUrl?>img/direction_arrow3.png">
                                            Common Translations
                                        </h5>
                                        <label>Learn 500+ common translations</label>
                                    </a>
								<?php }?>
                                </div>
                            </div> 
							<?php }?>
                        </div>
                    </fieldset>
					
					<?php if($lang == 'bengali') {?>
					
					<fieldset class="bdr_radius3">
						<legend>
								<h1>How to use BDWord</h1>
						</legend>
						<div class="fieldset_body">
							<?php
							
							if($isMobile==true){
								echo '<iframe width="360" height="215" src="https://www.youtube.com/embed/J8wYIw3oRhU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
							}else{
								echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/J8wYIw3oRhU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
							}
							
							?>
							
							
                           <!--video width="100%" controls>
									<source src="<?=$base_url?>videos/<?php echo $lang?>/bdword(site).mp4" type="video/mp4">
									<source src="<?=$base_url?>videos/<?php echo $lang?>/bdword(site).ogg" type="video/ogg">
										Your browser does not support HTML5 video.
							</video-->
                            
						</div>
					
					</fieldset>
					
					<?php }?>
					
                    <fieldset>
                        <legend><h2>Topic Wise Words</h2></legend>
                    
                        <div class="fieldset_body inner_details">
						
						<?php
						
						
			
							$rand = rand(1,12700);
							
							$topic_words = array();
							$this_topic = '';
							$topic_word_query = mysqli_query($conn,'select word, topic, exmp from TopicWiseWords where id>'.$rand.' limit 5');
							$topic_all_words = array();
							while($row=mysqli_fetch_assoc($topic_word_query))
							{
								$topic_words[$row["topic"]][] = array($row["word"], $row["exmp"]);
								$topic_all_words[] = $row["word"];
							}
							
							$topic_mean = array();
							$topic_words_mean_query = mysqli_query($conn,'select word, mean from x_'.$lang.' where word in ("'.implode('","', $topic_all_words).'") limit 5');
							while($topic_words_mean_row=mysqli_fetch_assoc($topic_words_mean_query)){
								$topic_mean[$topic_words_mean_row['word']] = $topic_words_mean_row['mean'];
							}
							
							foreach($topic_words as $k=>$v){
								$this_topic = $k;
								echo '<div class="custom_font4">&#9679; '.ucfirst($k).'</div>';
								foreach($v as $vv){
									if(array_key_exists($vv[0], $topic_mean) && $topic_mean[$vv[0]]!=''){
										//echo '<span><a title="English to '.$ulang.' Meaning of '.ucfirst($vv[0]).'" href="'.$base_url.'/english-to-'.$lang.'-dictionary-meaning-of-'.urlencode($vv[0]).'"><label>'.ucfirst($vv[0]).' ('.$topic_mean[$vv[0]].') :: </label>'.$vv[1].'</a></span>';
										echo '<span><a title="English to '.$ulang.' Meaning of '.ucfirst($vv[0]).'" href="'.$base_url.'english-to-'.$lang.'-meaning-'.urlencode($vv[0]).'"><label>'.ucfirst($vv[0]).' ('.$topic_mean[$vv[0]].') :: </label>'.$vv[1].'</a></span>';
									}
									
								}
							}
			
						?>
                           
                        </div>
                        <button class="btn_default5 bdr_radius2">
							<a title="See all topic wise words" href="<?= $base_url?>english-to-<?= $lang?>-dictionary-topic-wise-words-<?=$this_topic?>">See all</a>
                        </button>
						<script>
						
						  var topic_wise_words_link = document.getElementById("topic_wise_words");
						  topic_wise_words_link.setAttribute('href', "<?= $base_url?>english-to-<?= $lang?>-dictionary-topic-wise-words-<?=$this_topic?>");
						
						</script>
                    </fieldset>
                    <fieldset>
                        <legend><h2>Learn 3000+ Common Words</h2></legend>
			
                        <div class="fieldset_body inner_details">
                            <?php
							
							
								
						$w_3000_gre_limit = 5;
						$rand_3000 = rand(1, 3335);
						$rand_gre = rand(1, 1445);
						$w_3000 = array();
						$w_gre = array();
						$query = mysqli_query($conn,'select word, exmp from `3000` where id>'.$rand_3000.' limit '.$w_3000_gre_limit);
						$exmp = [];
						while($row=mysqli_fetch_assoc($query)){
							$w_3000[] = $row['word'];
							$exmp[$row['word']] = $row['exmp'];
						}
											
						$query = mysqli_query($conn,'select word, exmp from `gre` where id>'.$rand_gre.' limit '.$w_3000_gre_limit);
						while($row=mysqli_fetch_assoc($query)){
							$w_gre[] = strtolower($row['word']);
							$exmp[strtolower($row['word'])] = $row['exmp'];
						}

						$w_3000_gre = array_merge($w_3000, $w_gre);
						
						$w_mean = array();
						$query = mysqli_query($conn,'select mean, word from x_'.$lang.' where word in ("'.implode('","',$w_3000_gre).'") limit '.($w_3000_gre_limit*3));
						while($row=mysqli_fetch_assoc($query)){
							$w_mean[$row['word']] = $row['mean'];
						}

						foreach($w_3000 as $w_3)
						{
							if(array_key_exists($w_3, $w_mean) && $w_3!=$w_mean[$w_3] and $w_mean[$w_3]){ 
								$w_3_l = strtolower($w_3);
								//echo '<span><a title="English to '.$ulang.' Meaning of '.ucfirst($w_3).'" href="'.$base_url.'/english-to-'.$lang.'-dictionary-meaning-of-'.urlencode($w_3).'"><label>'.ucfirst($w_3).' ('.$w_mean[$w_3].') :: </label>'.$exmp[$w_3_l].'</a></span>';
								echo '<span><a title="English to '.$ulang.' Meaning of '.ucfirst($w_3).'" href="'.$base_url.'english-to-'. $lang.'-meaning-'.urlencode($w_3).'"><label>'.ucfirst($w_3).' ('.$w_mean[$w_3].') :: </label>'.$exmp[$w_3_l].'</a></span>';
							}
						}

								
								?>
                        </div>
                        <button class="btn_default5 bdr_radius2">
                            <a title="See all 3000+ common words" href="<?= $base_url?>english-to-<?= $lang?>-dictionary-learn-3000-plus-common-words">See all</a>
                        </button>
                    </fieldset>
                    
					<?php
										
					if(!$q AND $lang=='bengali'){?>
						<fieldset>
							<?php echo PageShortIntro(5, 'common_translations', 'learn-common-translations.php', '500+ Common Translations', $conn, $base_url, $lang);?>
						</fieldset>
					<?php } ?>
                    
					<fieldset>
                        <legend><h2>Learn Common GRE Words</h2></legend>

                        <div class="fieldset_body inner_details">
                            <?php
							
							
							foreach($w_gre as $w_g)
							{
								if(array_key_exists($w_g, $w_mean) && $w_g!=$w_mean[$w_g] and $w_mean[$w_g]){
									//echo '<span><a title="English to '.$ulang.' Meaning of '.ucfirst($w_g).'" href="'.$base_url.'/english-to-'.$lang.'-dictionary-meaning-of-'.urlencode($w_g).'"><label>'.ucfirst($w_g).' ('.$w_mean[$w_g].') :: </label>'.$exmp[$w_g].'</a></span>';
									echo '<span><a title="English to '.$ulang.' Meaning of '.ucfirst($w_g).'" href="'.$base_url.'english-to-'. $lang.'-meaning-'.urlencode($w_g).'"><label>'.ucfirst($w_g).' ('.$w_mean[$w_g].') :: </label>'.$exmp[$w_g].'</a></span>';
								}
							}		
		
							?>
                        </div>
                        <button class="btn_default5 bdr_radius2">
                            <a title="See all GRE words" href="<?= $base_url?>english-to-<?= $lang?>-dictionary-learn-common-gre-words" >See all</a>
                        </button>
                    </fieldset>
					
					<?php  if($lang=='bengali') { ?>
                    <fieldset>
                        <legend>Learn Grammar</legend>

                        <div class="fieldset_body">
                            <div class="topic_link">
								<?php echo getGrammar($conn); ?>
                            </div>
                        </div>
                    </fieldset>
					<?php }?>
                    
					
					<fieldset>
                        <legend><h2>Learn Words Everyday</h2></legend>
                        <div class="fieldset_body">
                            <div class="topic_link">
							
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
								<a href="<?=$base_url?>english-to-arabic-dictionary-learn-ten-words-everyday-season-<?=$sess?>-episode-<?=$i%50?>"><img src="<?= $contentUrl?>img/direction_arrow2.png" width="22" height="22" alt="icon"><span>Season #<?=$sess?> Episode @<?=$i%50?></span><div class="align_right custom_font small_viewport_mergin">Published at: <?=$day?></div></a>
								<?php
								$j++;
								if($j>4)
								{
								break;
								}
								}
								

								echo '</div></div><button class="btn_default5 bdr_radius2"><a href="'.$base_url.'english-to-'. $lang.'-dictionary-learn-ten-words-everyday-season-'.$sess.'">See All Posts</a></button>';
			
	?>
        
                    </fieldset>
					
					

            </div>