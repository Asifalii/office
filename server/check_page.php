<?php
require_once('./v5/connect.php'); 
require_once('search-functions.php');
$lang = $_GET['lang'];
$url = array_search($_GET['lang'],getLanguageArray())."/";
//$url = "german2.english-dictionary.help/";
$ip = 'https://server2.mcqstudy.com/';
$other = @file_get_contents('https://content2.mcqstudy.com/main/' . $lang . '.txt');
if(!empty($other)){
	$array = explode(',',$other);
	$random_keys=array_rand($array);
	
	if($random_keys){
		$other1 = @file_get_contents('https://content2.mcqstudy.com/local/' . strtolower($lang).'/'.$array[$random_keys]. '.txt');
		if(!empty($other1)){
			$array1 = explode(',',$other1);
			$array1 = array_unique(array_map(function($v) { return mb_substr($v, 0, 2); }, $array1));
			$array1 = array_filter($array1);
			$random_keys1=array_rand($array1);
		}
	}
}
?>
<table>
<tr>
<td><a href="https://<?= $url?>" target="_blank"><?= $url?></a></td>
<td><a href="<?= $ip?>index_cache.php?lang=<?=$lang?>" target="_blank"><?= $ip?>index_cache.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>index.html" target="_blank"><?= $url?>index.html</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>local_lang.php?lang=arabic&word=أفق" target="_blank"><?= $url?>local_lang.php?lang=arabic&word=أفق</a></td>
<td><a href="<?= $ip?>local_lang.php?lang=arabic&word=أفق" target="_blank"><?= $ip?>local_lang.php?lang=arabic&word=أفق</a></td>
<td><a href="https://<?= $url?><?=$lang?>-to-english-meaning-أفق" target="_blank"><?= $url?><?=$lang?>-to-english-meaning-أفق</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>?q=common" target="_blank"><?= $url?>?q=common</a></td>
<td><a href="<?= $ip?>index_cache.php?lang=<?=$lang?>&q=common" target="_blank"><?= $ip?>index_cache.php?lang=<?=$lang?>&q=common</a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-meaning-common" target="_blank"><?= $url?>english-to-<?=$lang?>-meaning-common</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>read-text.php" target="_blank"><?= $url?>read-text.php</a></td>
<td><a href="<?= $ip?>read-text.php?lang=<?=$lang?>" target="_blank"><?= $ip?>read-text.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-read-text-with-translation" target="_blank"><?= $url?>english-to-<?=$lang?>-read-text-with-translation</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>favourite-words.php" target="_blank"><?= $url?>favourite-words.php</a></td>
<td><a href="<?= $ip?>favourite-words.php?lang=<?=$lang?>" target="_blank"><?= $ip?>favourite-words.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-favourite-words" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-favourite-words</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>search_history.php" target="_blank"><?= $url?>search_history.php</a></td>
<td><a href="<?= $ip?>search_history.php?lang=<?=$lang?>" target="_blank"><?= $ip?>search_history.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-search-history" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-search-history</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>blogs.php" target="_blank"><?= $url?>blogs.php</a></td>
<td><a href="<?= $ip?>blogs.php?lang=<?=$lang?>" target="_blank"><?= $ip?>blogs.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-browse-all-blogs" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-browse-all-blogs</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>blog.php?blog_id=2" target="_blank"><?= $url?>blog.php?blog_id=2</a></td>
<td><a href="<?= $ip?>blog.php?lang=<?=$lang?>&blog_id=2" target="_blank"><?= $ip?>blog.php?lang=<?=$lang?>&blog_id=2</a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-blog-2" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-blog-2</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>contact-us.php" target="_blank"><?= $url?>contact-us.php</a></td>
<td><a href="<?= $ip?>contact-us.php?lang=<?=$lang?>" target="_blank"><?= $ip?>contact-us.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-contact-us" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-contact-us</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>about-us.php" target="_blank"><?= $url?>about-us.php</a></td>
<td><a href="<?= $ip?>about-us.php?lang=<?=$lang?>" target="_blank"><?= $ip?>about-us.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-about-us" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-about-us</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>privacy.php" target="_blank"><?= $url?>privacy.php</a></td>
<td><a href="<?= $ip?>privacy.php?lang=<?=$lang?>" target="_blank"><?= $ip?>privacy.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-privacy" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-privacy</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>disclaimer.php" target="_blank"><?= $url?>disclaimer.php</a></td>
<td><a href="<?= $ip?>disclaimer.php?lang=<?=$lang?>" target="_blank"><?= $ip?>disclaimer.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-disclaimer" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-disclaimer</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>learn-prepositions-by-photos.php" target="_blank"><?= $url?>learn-prepositions-by-photos.php</a></td>
<td><a href="<?= $ip?>learn-prepositions-by-photos.php?lang=<?=$lang?>" target="_blank"><?= $ip?>learn-prepositions-by-photos.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-learn-prepositions" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-learn-prepositions</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>commonly-confused-words.php" target="_blank"><?= $url?>commonly-confused-words.php</a></td>
<td><a href="<?= $ip?>commonly-confused-words.php?lang=<?=$lang?>" target="_blank"><?= $ip?>commonly-confused-words.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-commonly-confused-words" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-commonly-confused-words</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>form-of-verbs.php" target="_blank"><?= $url?>form-of-verbs.php</a></td>
<td><a href="<?= $ip?>form-of-verbs.php?lang=<?=$lang?>" target="_blank"><?= $ip?>form-of-verbs.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-form-of-verbs" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-form-of-verbs</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>300-plus-toefl-words.php" target="_blank"><?= $url?>300-plus-toefl-words.php</a></td>
<td><a href="<?= $ip?>300-plus-toefl-words.php?lang=<?=$lang?>" target="_blank"><?= $ip?>300-plus-toefl-words.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-300-plus-toefl-words" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-300-plus-toefl-words</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>learn-ten-words-everyday.php" target="_blank"><?= $url?>learn-ten-words-everyday.php</a></td>
<td><a href="<?= $ip?>learn-ten-words-everyday.php?lang=<?=$lang?>" target="_blank"><?= $ip?>learn-ten-words-everyday.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-learn-ten-words-everyday" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-learn-ten-words-everyday</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>learn-ten-words-everyday.php?season=1" target="_blank"><?= $url?>learn-ten-words-everyday.php?season=1</a></td>
<td><a href="<?= $ip?>learn-ten-words-everyday.php?lang=<?=$lang?>&season=1" target="_blank"><?= $ip?>learn-ten-words-everyday.php?lang=<?=$lang?>&season=1</a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-learn-ten-words-everyday-season-1" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-learn-ten-words-everyday-season-1</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>learn-ten-words-everyday.php?season=1&episode=1" target="_blank"><?= $url?>learn-ten-words-everyday.php?season=1&episode=1</a></td>
<td><a href="<?= $ip?>learn-ten-words-everyday.php?lang=<?=$lang?>&season=1&episode=1" target="_blank"><?= $ip?>learn-ten-words-everyday.php?lang=<?=$lang?>&season=1&episode=1</a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-learn-ten-words-everyday-season-1-episode-1" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-learn-ten-words-everyday-season-1-episode-1</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>vocabulary-game.php" target="_blank"><?= $url?>vocabulary-game.php</a></td>
<td><a href="<?= $ip?>vocabulary-game.php?lang=<?=$lang?>" target="_blank"><?= $ip?>vocabulary-game.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-vocabulary-game" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-vocabulary-game</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>vocabulary-game.php?season=1" target="_blank"><?= $url?>vocabulary-game.php?season=1</a></td>
<td><a href="<?= $ip?>vocabulary-game.php?lang=<?=$lang?>&season=1" target="_blank"><?= $ip?>vocabulary-game.php?lang=<?=$lang?>&season=1</a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-vocabulary-game-season-1" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-vocabulary-game-season-1</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>vocabulary-game.php?season=1&episode=1" target="_blank"><?= $url?>vocabulary-game.php?season=1&episode=1</a></td>
<td><a href="<?= $ip?>vocabulary-game.php?lang=<?=$lang?>&season=1&episode=1" target="_blank"><?= $ip?>vocabulary-game.php?lang=<?=$lang?>&season=1&episode=1</a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-vocabulary-game-season-1-episode-1" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-vocabulary-game-season-1-episode-1</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>blank-quiz.php?page=1" target="_blank"><?= $url?>blank-quiz.php?page=1</a></td>
<td><a href="<?= $ip?>blank-quiz.php?lang=<?=$lang?>&page=1" target="_blank"><?= $ip?>blank-quiz.php?lang=<?=$lang?>&page=1</a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-fill-in-the-blanks-page-1" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-fill-in-the-blanks-page-1</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>topic-wise-words.php?topic=animals" target="_blank"><?= $url?>topic-wise-words.php?topic=animals</a></td>
<td><a href="<?= $ip?>topic-wise-words.php?lang=<?=$lang?>&topic=animals" target="_blank"><?= $ip?>topic-wise-words.php?lang=<?=$lang?>&topic=animals</a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-topic-wise-words-animals" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-topic-wise-words-animals</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>learn-3000-plus-common-words.php" target="_blank"><?= $url?>learn-3000-plus-common-words.php</a></td>
<td><a href="<?= $ip?>learn-3000-plus-common-words.php?lang=<?=$lang?>" target="_blank"><?= $ip?>learn-3000-plus-common-words.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-learn-3000-plus-common-words" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-learn-3000-plus-common-words</a></td>
</tr>
<?php if($lang == 'bengali'){ ?>
<tr>
<td><a href="https://<?= $url?>post.php?post_id=25&cat=2&title=agreement-of-verb-with-subjects" target="_blank"><?= $url?>post.php?post_id=25&cat=2&title=agreement-of-verb-with-subjects</a></td>
<td><a href="<?= $ip?>post.php?lang=<?=$lang?>&post_id=25&cat=2&title=agreement-of-verb-with-subjects" target="_blank"><?= $ip?>post.php?lang=<?=$lang?>&post_id=25&cat=2&title=agreement-of-verb-with-subjects</a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-grammar-agreement-of-verb-with-subjects" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-grammar-agreement-of-verb-with-subjects</a></td>
</tr>
<?php } ?>
<tr>
<td><a href="https://<?= $url?>learn-common-gre-words.php" target="_blank"><?= $url?>learn-common-gre-words.php</a></td>
<td><a href="<?= $ip?>learn-common-gre-words.php?lang=<?=$lang?>" target="_blank"><?= $ip?>learn-common-gre-words.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-learn-common-gre-words" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-learn-common-gre-words</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>learn-common-gre-words.php?topic=g&page=1" target="_blank"><?= $url?>learn-common-gre-words.php?topic=g&page=1</a></td>
<td><a href="<?= $ip?>learn-common-gre-words.php?lang=<?=$lang?>&topic=g&page=1" target="_blank"><?= $ip?>learn-common-gre-words.php?lang=<?=$lang?>&topic=g&page=1</a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-learn-common-gre-words-g-page-1" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-learn-common-gre-words-g-page-1</a></td>
</tr>

<?php if($lang == 'bengali'){?>
<tr>
<td><a href="https://<?= $url?>learn-common-translations.php" target="_blank"><?= $url?>learn-common-translations.php</a></td>
<td><a href="<?= $ip?>learn-common-translations.php?lang=<?=$lang?>" target="_blank"><?= $ip?>learn-common-translations.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-learn-translations" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-learn-translations</a></td>
</tr>
<?php }?>
<tr>
<td><a href="https://<?= $url?>local.php" target="_blank"><?= $url?>local.php</a></td>
<td><a href="<?= $ip?>local.php?lang=<?=$lang?>" target="_blank"><?= $ip?>local.php?lang=<?=$lang?></a></td>
<td><a href="https://<?= $url?><?=$lang?>-to-english-dictionary" target="_blank"><?= $url?><?=$lang?>-to-english-dictionary</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>local1.php?word=a" target="_blank"><?= $url?>local1.php?word=a</a></td>
<td><a href="<?= $ip?>local1.php?lang=<?=$lang?>&word=a" target="_blank"><?= $ip?>local1.php?lang=<?=$lang?>&word=a</a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-letter-a" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-letter-a</a></td>
</tr>
<tr>
<td><a href="https://<?= $url?>local2.php?word=ab" target="_blank"><?= $url?>local2.php?word=ab</a></td>
<td><a href="<?= $ip?>local2.php?lang=<?=$lang?>&word=ab" target="_blank"><?= $ip?>local2.php?lang=<?=$lang?>&word=ab</a></td>
<td><a href="https://<?= $url?>english-to-<?=$lang?>-dictionary-two-letter-ab" target="_blank"><?= $url?>english-to-<?=$lang?>-dictionary-two-letter-ab</a></td>
</tr>

<?php if($array[$random_keys]){ ?>
<td><a href="https://<?= $url?>local1.php?word=a" target="_blank"><?= $url?>local1.php?word=a</a></td>
<td><a href="<?= $ip?>local1.php?lang=<?=$lang?>&word=<?= $array[$random_keys]?>" target="_blank"><?= $ip?>local1.php?lang=<?=$lang?>&word=<?= $array[$random_keys]?></a></td>
<td><a href="https://<?= $url?><?=$lang?>-to-english-dictionary-letter-<?= $array[$random_keys]?>" target="_blank"><?= $url?><?=$lang?>-to-english-dictionary-letter-<?= $array[$random_keys]?></a></td>
</tr>
<?php }?>

<?php if($array1[$random_keys1]){ ?>
<td><a href="https://<?= $url?>local1.php?word=a" target="_blank"><?= $url?>local1.php?word=a</a></td>
<td><a href="<?= $ip?>local2.php?lang=<?=$lang?>&word=<?= strtolower($array1[$random_keys1])?>" target="_blank"><?= $ip?>local2.php?lang=<?=$lang?>&word=<?= strtolower($array1[$random_keys1])?></a></td>
<td><a href="https://<?= $url?><?=$lang?>-to-english-dictionary-two-letter-إب" target="_blank"><?= $url?><?=$lang?>-to-english-dictionary-two-letter-إب</a></td>
</tr>
<?php }?>

</table>
