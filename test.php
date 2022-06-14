<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// require_once('./v5/connect.php');

$array = array("afrikaans" => "af", "albanian" => "sq", "amharic" => "am", "arabic" => "ar", "armenian" => "hy", "azerbaijani" => "az", "basque" => "eu", "belarusian" => "be", "bengali" => "bn", "bosnian" => "bs", "bulgarian" => "bg", "catalan" => "ca", "cebuano" => "ceb", "chichewa" => "ny", "chinese" => "zh-CN", "corsican" => "co", "croatian" => "hr", "czech" => "cs", "danish" => "da", "dutch" => "nl", "esperanto" => "eo", "estonian" => "et", "filipino" => "tl", "finnish" => "fi", "french" => "fr", "frisian" => "fy", "galician" => "gl", "georgian" => "ka", "german" => "de", "greek" => "el", "gujarati" => "gu", "haitian" => "ht", "hausa" => "ha", "hawaiian" => "haw", "hebrew" => "iw", "hindi" => "hi", "hmong" => "hmn", "hungarian" => "hu", "icelandic" => "is", "igbo" => "ig", "indonesian" => "id", "irish" => "ga", "italian" => "it", "japanese" => "ja", "javanese" => "jw", "kannada" => "kn", "kazakh" => "kk", "khmer" => "km", "korean" => "ko", "kurmanji" => "ku", "kyrgyz" => "ky", "lao" => "lo", "latin" => "la", "latvian" => "lv", "lithuanian" => "lt", "luxembourgish" => "lb", "macedonian" => "mk", "malagasy" => "mg", "malay" => "ms", "malayalam" => "ml", "maltese" => "mt", "maori" => "mi", "marathi" => "mr", "mongolian" => "mn", "burmese" => "my", "nepali" => "ne", "norwegian" => "no", "pashto" => "ps", "persian" => "fa", "polish" => "pl", "portuguese" => "pt", "punjabi" => "pa", "romanian" => "ro", "russian" => "ru", "samoan" => "sm", "scots-gaelic" => "gd", "serbian" => "sr", "sesotho" => "st", "shona" => "sn", "sindhi" => "sd", "sinhala" => "si", "slovak" => "sk", "slovenian" => "sl", "somali" => "so", "spanish" => "es", "sundanese" => "su", "swahili" => "sw", "swedish" => "sv", "tajik" => "tg", "tamil" => "ta", "telugu" => "te", "thai" => "th", "turkish" => "tr", "ukrainian" => "uk", "urdu" => "ur", "uzbek" => "uz", "vietnamese" => "vi", "welsh" => "cy", "xhosa" => "xh", "yiddish" => "yi", "yoruba" => "yo", "zulu" => "zu");

// $array = getLanguageArray();

// $array = array_multisort($array);

foreach($array as $k=>$v){

    echo "cp ads.txt.gz /mnt/volume_sgp1_05/all_cache_files/".$k."/<br>";

    // echo "<a href='https://search.google.com/u/1/search-console/users?resource_id=https%3A%2F%2F".$k.".english-dictionary.help%2F'>".$k."</a><br>";

}

// $sql = "SELECT * FROM `variants` Where word!=variant";

// $query = mysqli_query($conn, $sql);

// $i=0;
// while ($row = mysqli_fetch_assoc($query)) {
//     $i++;
//     $string = $row['variant'];
//     echo $string.'<br>';
// }

?>
