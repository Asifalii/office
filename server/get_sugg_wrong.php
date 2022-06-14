<?php
header('Access-Control-Allow-Origin: *');
require_once('connect4.php');
require_once('search-functions.php');
$q = $_REQUEST['word'];
$word = str_replace("-", " ", $q);
$lang = $_REQUEST['lang'];
$pspell_array = getSuggestionForWrongWord($word);

if ($pspell_array[0]) {
    $sql = "select * from missing_words where word = '" . $pspell_array[0] . "'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);

    if (empty($result)) {
        $sql = "INSERT INTO missing_words (word,web)
        VALUES ('" . $pspell_array[0] .
            "','" . $web . "')";

        if ($conn->query($sql) === TRUE) {

        }
    }
}

header('Content-Type: application/text');
echo json_encode($pspell_array);

?>




