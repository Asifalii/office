<?php 
require_once('search-functions.php');
$base_url = base_url() . '/';
$language = getLang();

$pagelist = array(
				'',
				$language.'-to-english-dictionary',
				'read-text.php',
				'browse-words.php',
				'favourite-words.php',
				'learn-ten-words-everyday.php',
				'vocabulary-game.php',
				'blank-quiz.php?page=1',
				'search_history.php',
				'learn-prepositions-by-photos.php',
				'commonly-confused-words.php',
				'form-of-verbs.php',
				'300-plus-toefl-words.php',
				'learn-common-translations.php',
				'learn-common-gre-words.php',
				'post.php?post_id=25&cat=2&title=agreement-of-verb-with-subjects',
				'post.php?post_id=26&cat=2&title=sentence-simple-complex-compound',
				'post.php?post_id=27&cat=2&title=right-form-of-verbs',
				'post.php?post_id=28&cat=2&title=narration',
				'post.php?post_id=29&cat=2&title=gender',
				'post.php?post_id=30&cat=2&title=number',
				'post.php?post_id=31&cat=2&title=articles',
				'post.php?post_id=32&cat=2&title=voice',
				'post.php?post_id=33&cat=2&title=tense',
				'post.php?post_id=34&cat=2&title=parts-of-speech',
				'post.php?post_id=35&cat=2&title=sentence',
				'learn-3000-plus-common-words.php',
				'topic-wise-words.php?topic=animals',
				'topic-wise-words.php?topic=body',
				'topic-wise-words.php?topic=business',
				'topic-wise-words.php?topic=clothes',
				'topic-wise-words.php?topic=crime',
				'topic-wise-words.php?topic=culture',
				'topic-wise-words.php?topic=education',
				'topic-wise-words.php?topic=family',
				'topic-wise-words.php?topic=food',
				'topic-wise-words.php?topic=health',
				'topic-wise-words.php?topic=house',
				'topic-wise-words.php?topic=language',
				'topic-wise-words.php?topic=media',
				'topic-wise-words.php?topic=nature',
				'topic-wise-words.php?topic=personality',
				'topic-wise-words.php?topic=religion_politics',
				'topic-wise-words.php?topic=retail',
				'topic-wise-words.php?topic=science',
				'topic-wise-words.php?topic=social',
				'topic-wise-words.php?topic=technology',
				'topic-wise-words.php?topic=travel',
				'topic-wise-words.php?topic=war',
				'topic-wise-words.php?topic=work',
				'blogs.php',
				'contact-us.php',
				'about-us.php',
				'privacy.php',
				'disclaimer.php',
			);

header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

foreach($pagelist as $row){
	$url = $base_url.''.$row;
	echo '<url>'; 
	echo '<loc>'.htmlspecialchars($url).'</loc>'; 
	echo '<changefreq>weekly</changefreq>'; 
	echo '</url>'; 
}

echo '</urlset>';

?>