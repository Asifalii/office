<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
error_reporting(0);

$lang = "bengali";

$lang_first = ucfirst($lang);

$word = str_replace("-", " ", ($_REQUEST["word"]) ? $_REQUEST["word"] : "");

require_once('connect3.php');

$word = $conn->real_escape_string(trim(strtolower($word)));

?>
<meta charset="utf8">

<?php

$no_meaning = 0;

$meaning_file = "";

if (file_exists("../../bdword.com/public_html/bn_files5/" . $word . ".txt")) {
	echo 'yes';
	die;
	$meaning_file = file_get_contents("../../bdword.com/public_html/bn_files5/" . $word . ".txt");
} else {
	$sql = "select word, bengali as mean from lang where word like '" . $word . "' limit 1";
	$query = mysqli_query($conn, $sql);

	while ($bn_row = mysqli_fetch_assoc($query)) {
		$meaning_file .= "<b>" . $bn_row["word"] . "</b>" . $parts . ": " . $bn_row["mean"];

	}

}

if ($meaning_file == "") {

	$no_meaning = 1;

	$word_is_fine = 0;

	$pspell_check = file_get_contents('https://www.bdword.com/bdword_sug_api.php?word=' . urlencode($word) . '&lang=' . $lang);


	if ($pspell_check != 1) {

		$sug_word_list = $pspell_check;

		$word_is_fine = 2;

	} else {
		$word_is_fine = 1;

	}

	if ($word_is_fine == 2) {
		?>


		<p style="color:#d9534f; font-weight:bold;">Sorry We did not find your
			word. <?= (!empty($sug_word_list) ? 'But we have found similar words for you:' : ' Please try another word!!') ?> </p>

		<?= $sug_word_list ?>

	<?php }
} ?>


<?php if ($word_is_fine != 2) { ?>


	<?php echo $meaning_file; ?>


<?php } ?>

