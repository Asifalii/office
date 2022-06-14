<?php 
require ("connect3.php"); 
require ("functions.php"); 

header("Content-type: text/xml");

	$lang = getLang();
	$url = base_url();
	$yest = date('Y-m-d',strtotime("-1 days"));
	$limit = mysql_real_escape_string($_GET['limit']);
	$start = mysql_real_escape_string($_GET['id']) * $limit;

	echo '<?xml version="1.0" encoding="UTF-8"?>';
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

$sql = "select word, ".$lang." as mean from lang where word!=".$lang." or ".$lang."!='' order by id asc limit $start, $limit";
// die($sql);
$query = mysql_query($sql) or die(mysql_error());
while($row=mysql_fetch_assoc($query))
{
	
	// $mean = strtolower(str_replace(" ","-",urlencode($row["mean"])));

	echo '<url>'; 
	echo '<loc>'.base_url().'/'.$lang.'-to-english-meaning-'.$row["mean"].'</loc> '; 
	echo '<lastmod>'.$yest.'</lastmod>'; 
	echo '<changefreq>weekly</changefreq>'; 
	echo '</url>'; 

}
	echo '</urlset>'; 
?>


