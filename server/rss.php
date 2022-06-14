<?php 

require ("connect3.php"); 


function base_url(){
  return sprintf(
    "%s://%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['HTTP_HOST']
  );
}

function getLang(){
	
	
	if($_SERVER['HTTP_HOST']=='test.bdword.com'){
		return 'bengali';
	}
	
	$lang_by_url = array(
		'www.bdword.com'					=> 'bengali',
		'www.english-arabic.org'			=> 'arabic',
		'www.english-gujarati.com'			=> 'gujarati',
		'www.english-hindi.net'				=> 'hindi',
		'www.english-kannada.com'			=> 'kannada',
		'www.english-malay.net'				=> 'malay',
		'www.english-marathi.net'			=> 'marathi',
		'www.english-nepali.com'			=> 'nepali',
		'www.english-punjabi.net'			=> 'punjabi',
		'www.english-tamil.net'				=> 'tamil',
		'www.english-telugu.net'			=> 'telugu',
		'www.english-thai.net'				=> 'thai',
		'www.english-welsh.net'				=> 'welsh'
		
	);
	
	$host = explode('.', $_SERVER['HTTP_HOST']);
	
	if($host[1] == 'english-dictionary')
	{
		return $host[0];
	}
	
	return $lang_by_url[$_SERVER['HTTP_HOST']];
}


header("Content-type: text/xml");

	$lang = getLang();
	$url = base_url();
	$yest = date('Y-m-d',strtotime("-1 days"));
	$limit = (int)$_GET['limit'];
	$start = (int)$_GET['id'] * $limit;

	echo '<?xml version="1.0" encoding="UTF-8"?>';
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

	$query = mysqli_query($conn,"select word from cacheable_words limit $start, $limit");
	while($row=mysqli_fetch_assoc($query))
	{
		echo '<url>'; 
		echo '<loc>'.base_url().'/english-to-'.$lang.'-meaning-'.$row["word"].'</loc> '; 
		echo '<lastmod>'.$yest.'</lastmod>'; 
		echo '<changefreq>weekly</changefreq>'; 
		echo '</url>'; 

	}
	echo '</urlset>'; 
?>


