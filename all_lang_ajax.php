<?php 
header('Access-Control-Allow-Origin: *');
error_reporting(0);

$lang = $_REQUEST["lang"];

$lang_first = ucfirst($lang);

$word = str_replace("-", " ", ($_REQUEST["word"]) ? $_REQUEST["word"] : "");
$word_first = ucfirst($word);

require_once('connect3.php');

$word = $conn->real_escape_string(trim(strtolower($word)));

?>
<meta charset="utf8">

<?php

$no_meaning = 0;

$meaning_file = "";

$y = mysqli_fetch_assoc(mysqli_query($conn, "select details from y_" . $lang . " where word='" . $word . "' limit 1"));
$y_details = json_decode($y['details'], true);

if(!empty($y_details['result'])){
	$meaning_file .= "<b>" . $lang_first . " meaning of '" . $word_first . "'</b>" . ": " . $y_details['result'];
}

if ($meaning_file == "") {

	$no_meaning = 1;

	$word_is_fine = 0;

	$pspell_check = file_get_contents('https://www.bdword.com/all_lang_sug_api.php?word=' . urlencode($word) . '&lang=' . $lang);


	if ($pspell_check != 1) {

		$sug_word_list = $pspell_check;

		$word_is_fine = 2;

	} else {
		$word_is_fine = 1;

	}

	if ($word_is_fine == 2) {
		?>


		<p style="color:#d9534f; font-weight:bold;">Sorry We have not found the
			word "<?= $word_first ?>" in <?= $lang_first ?>. <?= (!empty($sug_word_list) ? 'But we have found similar words for you:' : 'Please try another word!!') ?> </p>

		<?= $sug_word_list ?>

	<?php }
} ?>


<?php if ($word_is_fine != 2) { ?>


		<?= (!empty($meaning_file) ? $meaning_file : '<p style="color:#d9534f; font-weight:bold;">Sorry We have not found the
			word "'. $word_first .'" in '. $lang_first.'. Please try another word!!</p>') ?>

<?php } ?>



