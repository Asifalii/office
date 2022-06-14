<?php
$word = urldecode($_GET['word']);
$lang = $_GET['lang'];
$pspell_link = pspell_new("en");

$word_ex = explode(' ', $word);

$word = $word_ex[0];

if (!pspell_check($pspell_link, ucfirst($word)))
{
	
	 $suggestions_pre = pspell_suggest($pspell_link, $word);
		
		$suggestions = array();
		
		foreach($suggestions_pre as $pre_sug)
		{
			if(strlen($pre_sug)>3 and !preg_match("#\'#",$pre_sug) and  !preg_match("#\s#",$pre_sug) and !preg_match("#\-#",$pre_sug) )
			{
				$suggestions[] = $pre_sug;
			}
		}
	
	
		for($i=0;$i<count($suggestions);$i++)
		{
			$sug_word_list .= "<a target='_blank' style='color:#d9534f;' href='https://www.bdword.com/search.php?q=$suggestions[$i]&lang=$lang'>".$suggestions[$i]."</a><br>";
		
		}
		
	echo $sug_word_list;
		
}else{

	echo 1;

}

?>