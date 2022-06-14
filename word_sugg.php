<?php
die('test');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once('./v5/connect.php');

function sampling($chars, $size, $combinations = array())
{

    if (empty($combinations)) {
        $combinations = $chars;
    }

    if ($size == 1) {
        return $combinations;
    }

    $new_combinations = array();

    foreach ($combinations as $combination) {
        foreach ($chars as $char) {
            $new_combinations[] = $combination . $char;
        }
    }

    return sampling($chars, $size - 1, $new_combinations);
}

$sql = "SELECT *
FROM `3000` AS a
WHERE LENGTH(a.`word`) = 6
LIMIT 500,100";

$query = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    $string = $row['word'];
    $stringArray = str_split($string);

    $result = [];
    $correct = [];
    for ($i = 3; $i <= count($stringArray); $i++) {
        $output = array_unique(sampling($stringArray, $i));
        $result = array_merge($result, $output);
    }

    if (!empty($result)) {
        $pspell_link = pspell_new("en");

        foreach ($result as $insert) {
            if (pspell_check($pspell_link, $insert)) {
                $sql = "INSERT INTO word_combination (original_word,word)
                VALUES ('" . $string .
                    "','" . $insert . "')";

                if ($conn->query($sql) === TRUE) {
                    echo $string . '---' . $insert . ' success<br>';
                } else {
                    echo $string . '---' . $insert . ' failed<br>' . "Error: " . mysqli_error($conn) . '<br>';
                }
            }
        }
    }
}

?>