<?php

function moveHttpToHttps()
{
    $q = $_GET['q'];
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: index.php?q=' . $q);
    exit;
}

function redirectToLocalTranslation()
{

    if (isset($_GET['q'])) {

        $english_characters = range('a', 'z');
        if ((trim($_SERVER['DOCUMENT_URI'], '/') == 'index.php' || trim($_SERVER['DOCUMENT_URI'], '/') == 'vfive.php') and !in_array(strtolower($_GET['q'][0]), $english_characters)) {
            header('Location: local.php?q=' . $_GET['q']);
        }
    }

}

function getLang()
{
    if ($_SERVER['HTTP_HOST'] == 'test.bdword.com') {
        return 'bengali';
    }

    $lang_by_url = array(
        'www.bdword.com' => 'bengali',
        'www.english-arabic.org' => 'arabic',
        'www.english-gujarati.com' => 'gujarati',
        'www.english-hindi.net' => 'hindi',
        'www.english-kannada.com' => 'kannada',
        'www.english-malay.net' => 'malay',
        'www.english-marathi.net' => 'marathi',
        'www.english-nepali.com' => 'nepali',
        'www.english-punjabi.net' => 'punjabi',
        'www.english-tamil.net' => 'tamil',
        'www.english-telugu.net' => 'telugu',
        'www.english-thai.net' => 'thai',
        'www.english-welsh.net' => 'welsh'

    );

    $host = explode('.', $_SERVER['HTTP_HOST']);

    if ($host[1] == 'english-dictionary') {
        return $host[0];
    }

    return $lang_by_url[$_SERVER['HTTP_HOST']];
}

function getTitle($q, $url, $sn, $lang, $ulang)
{

    $url = str_replace(array('https://', 'www.'), '', $url);

    $season = (isset($_GET['season']) && $_GET['season'] != null) ? ' - Season - ' . $_GET['season'] : '';
    $episode = (isset($_GET['episode']) && $_GET['episode'] != null) ? ' - Episode - ' . $_GET['episode'] : '';

    $title = 'English to ' . str_replace("Bengali", "Bangla", $ulang) . ' And ' . str_replace("Bengali", "Bangla", $ulang) . ' to English Dictionary';

    if ($lang == 'bengali') {
        $title = 'English to Bangla Online Dictionary | ইংরেজি ও বাংলা অভিধান ';
    }

    switch ($sn) {
        case '300-plus-toefl-words':
            $title = 'Learn 300+ TOEFL Words';
            break;

        case 'learn-3000-plus-common-words':
            $title = 'Learn 3000+ Common Words';
            break;

        case 'form-of-verbs':
            $title = 'Form of Verbs';
            break;

        case 'blogs':
            $title = 'Blog List';
            break;

        case 'commonly-confused-words':
            $title = 'Commonly Confused Words';
            break;

        case 'learn-prepositions-by-photos':
            $title = 'Learn Prepositions by Photos';
            break;

        case 'about-us':
            $title = 'About Us';
            break;

        case 'browse-words':
            $title = 'Browse Words by English and ' . str_replace("Bengali", "Bangla", $ulang);
            break;

        case 'contact-us':
            $title = 'Contact Us';
            break;

        case 'disclaimer':
            $title = 'Disclaimer';
            break;

        case 'error':
            $title = 'An Error Occured';
            break;

        case 'learn-ten-words-everyday':
            $title = 'Learn ten words everyday' . $season . $episode;
            break;

        case 'learning-materials':
            $title = 'Learning Materials';
            break;

        case 'privacy':
            $title = 'Read our privacy policy';
            break;

        case 'read-text':
            $title = 'Read Text :: English to ' . str_replace("Bengali", "Bangla", $ulang);
            break;

        case 'single':
            $title = 'Single Post';
            if ($_GET['url']) {
                $uex = explode('/', $_GET['url']);
                if ($uex[2]) {
                    $title = $uex[2];
                }
            }

            break;

        case 'vocabulary-game':
            $title = 'Play Vocabulary Game and memorize word meaning' . $season . $episode;
            break;

        case 'favourite-words':
            $title = 'Your Favorite Words';
            break;

        case 'word-history':
            $title = 'Get word search history';
            break;

        case 'index':

            if (isset($q)) {
                if (preg_match("/^[a-z]$/", $q)) {
                    $title = 'English to ' . str_replace("Bengali", "Bangla", $ulang) . ' Meaning of ' . stripslashes($q) . ' - ' . $url;
                } else {
                    $title = str_replace("Bengali", "Bangla", $ulang) . ' to English Meaning of ' . stripslashes($q) . ' - ' . $url;
                }
            }
            break;

        case 'search':

            if ($q) {
                if (preg_match("/^[a-z]$/", $_GET['q'][0])) {
                    $title = 'English to ' . str_replace("Bengali", "Bangla", $ulang) . ' Meaning of ' . $q . ' - ' . $url;
                } else {
                    $title = str_replace("Bengali", "Bangla", $ulang) . ' to English Meaning of ' . $q . ' - ' . $url;
                }
            }
            break;

        case 'vfive':

            if ($q) {
                if (preg_match("/^[a-z]$/", $_GET['q'][0])) {
                    $title = 'English to ' . str_replace("Bengali", "Bangla", $ulang) . ' Meaning of ' . $q . ' - ' . $url;
                } else {
                    $title = str_replace("Bengali", "Bangla", $ulang) . ' to English Meaning of ' . $q . ' - ' . $url;
                }
            }
            break;

        case 'local':
            if ($q) {
                $title = $q . ' - ' . str_replace("Bengali", "Bangla", $ulang) . ' to English Meaning of ' . $q . ' - ' . $url;
            }
            break;

        default:
            $title = 'English to ' . str_replace("Bengali", "Bangla", $ulang) . ' And ' . str_replace("Bengali", "Bangla", $ulang) . ' to English Dictionary';
            break;
    }

    return $title;

}

function isMobile()
{
    if (preg_match("/(android|avantgo|ipad|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
        return true;
    } else {
        return false;
    }
}

function getScriptName()
{
    return (!empty($_SERVER['DOCUMENT_URI']))?strtolower(str_replace('.php', '', trim($_SERVER['DOCUMENT_URI'], '/'))) :'';
}

function sanitize($conn)
{
    if (isset($_GET['q'])) {
        $q = $_GET['q'];
        $q = str_replace('+', '', strtolower(trim(str_replace(array('+', '-'), ' ', mysqli_real_escape_string($conn, $q)))));

        $query = mysqli_query($conn, 'select root from v3_word_list where word="' . $q . '" limit 1');


        if ($query && mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            if (isset($row['root']) && $row['root'] != null) {
                return $row['root'];
            } else {
                return $q;
            }
        } else {
            return $q;
        }
    } else {
        return '';
    }
}

function base_url()
{
    return sprintf(
        "%s://%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['HTTP_HOST']
    );
}

function getNoIndexStatus($q, $conn, $lang)
{

    // $sql = mysqli_query($conn, "select word from y_".$lang."_master where word='" . $q . "' limit 1");

    // if ($q && $sql && mysqli_num_rows($sql) == 0) {
    //     return true;
    // } else {
    //     return false;
    // }


}

function getNoIndexHTML($status)
{

    // if ($status == 1) {
    //     return '<meta name="robots" content="noindex">';
    // } else {
    //     return '';
    // }

}

function getMetaDescription($lang, $ulang, $q)
{

    $local_lang = ($lang == 'bengali') ? 'Popular as ইংরেজি বাংলা অভিধান' : '';

    $m_des = 'English To ' . ucfirst($lang) . ' - Official ' . ucfirst($lang) . ' Dictionary Specially, ' . ucfirst($lang) . ' To English Dictionary &
Dictionary English To ' . ucfirst($lang) . ' Site Are Ready To Instant Result English To ' . ucfirst($lang) . ' Translator & ' . ucfirst($lang) . ' To English Translation Online FREE.
English To ' . ucfirst($lang) . ' Translation Online Tool And ' . ucfirst($lang) . ' to English Translation App Are Available On Play Store.
English To ' . ucfirst($lang) . ' Dictionary Are Ready To Translate To ' . ucfirst($lang) . ' Any Words With Totally Free.
Also Available Different ' . ucfirst($lang) . ' keyboard layout To Typing ' . ucfirst($lang) . ' To English Translate And English To ' . ucfirst($lang) . ' Converter. ' . "Let's Enjoy It...";

    return $m_des;
}

function getKeyword($lang)
{
    $keyword = 'english to ' . $lang . ', english to ' . $lang . ' translator, ' . $lang . ' to english translation, translate to ' . $lang . ', ' . $lang . ' to english translate, english to ' . $lang . ' dictionary, english to ' . $lang . ' converter, ' . $lang . ' to english dictionary, dictionary english to ' . $lang . ', english to ' . $lang . ' meaning, translate eng to ' . $lang . ', english to ' . $lang . ' translation online, ' . $lang . ' to english meaning, ' . $lang . ' to english translation online, eng to ' . $lang . ' translate, ' . $lang . ' to english translation app, ' . $lang . ' dictionary';
    return $keyword;
}


function getAnalyticsId($url)
{
	$url = array_search($_GET['lang'],getLanguageArray());
    $lang_by_url = array(
        'afrikaans.english-dictionary.help' => 'G-ZXJZ3S3VJ2',
        'albanian.english-dictionary.help' => 'G-5E7XZ0P7LV',
        'amharic.english-dictionary.help' => 'G-C5S4H9YGCW',
        'armenian.english-dictionary.help' => 'G-1KY4K37EL9',
        'azerbaijani.english-dictionary.help' => 'G-PW6FDL5PWK',
        'basque.english-dictionary.help' => 'G-79JCHH8BD9',
        'belarusian.english-dictionary.help' => 'G-BGBXVLG5LK',
        'bosnian.english-dictionary.help' => 'G-S74D11K6PT',
        'bulgarian.english-dictionary.help' => 'G-YNV6YGFJ0Q',
        'catalan.english-dictionary.help' => 'G-51CEESCFB3',
        'cebuano.english-dictionary.help' => 'G-LJ2PRMNK12',
        'chichewa.english-dictionary.help' => 'G-EVZ3D5BDKL',
        'chinese.english-dictionary.help' => 'G-KRP8LTB1K8',
        'corsican.english-dictionary.help' => 'G-HQZXBMGQZQ',
        'croatian.english-dictionary.help' => 'G-MN7QMTN2TD',
        'czech.english-dictionary.help' => 'G-R5CKL5GTSB',
        'danish.english-dictionary.help' => 'G-CEXPWZQ4KR',
        'dutch.english-dictionary.help' => 'G-S8JSLC8NQK',
        'esperanto.english-dictionary.help' => 'G-KY4GYWB8ME',
        'estonian.english-dictionary.help' => 'G-XDZ2QVXSZV',
        'filipino.english-dictionary.help' => 'G-7ZNDN9G8YF',
        'finnish.english-dictionary.help' => 'G-PRB9HHSTKE',
        'french.english-dictionary.help' => 'G-RNMS768H96',
        'frisian.english-dictionary.help' => 'G-S0P6H9MDTD',
        'galician.english-dictionary.help' => 'G-CK70Y1HJP0',
        'georgian.english-dictionary.help' => 'G-XJ21BTHHJ3',
        'german.english-dictionary.help' => 'G-DL1HSTX439',
        'greek.english-dictionary.help' => 'G-98TSYEY5EN',
        'gujarati.english-dictionary.help' => 'G-98TSYEY5EN',
        'haitian.english-dictionary.help' => 'G-94B0RK3ZN3',
        'hausa.english-dictionary.help' => 'G-M266PNZC76',
        'hawaiian.english-dictionary.help' => 'G-H2D29XDHR0',
        'hebrew.english-dictionary.help' => 'G-60RFKZMF66',
        'hmong.english-dictionary.help' => 'G-8WK0B4B5EL',
        'hungarian.english-dictionary.help' => 'G-D9NCB099RD',
        'icelandic.english-dictionary.help' => 'G-0WQKLR2J9T',
        'igbo.english-dictionary.help' => 'G-Z7ED9C07NL',
        'indonesian.english-dictionary.help' => 'G-HPZL9EPDB9',
        'irish.english-dictionary.help' => 'G-LV05VLBJK8',
        'italian.english-dictionary.help' => 'G-722377GW6G',
        'japanese.english-dictionary.help' => 'G-31X0DLQFDV',
        'javanese.english-dictionary.help' => 'G-GP0G248Y2Z',
        'kazakh.english-dictionary.help' => 'G-G72MJNDG00',
        'khmer.english-dictionary.help' => 'G-M4M598734G',
        'korean.english-dictionary.help' => 'G-D0J03B4J13',
        'kurmanji.english-dictionary.help' => 'G-52EBBS9SC2',
        'kyrgyz.english-dictionary.help' => 'G-ES928XSEBD',
        'lao.english-dictionary.help' => 'G-TGZYE3WK5E',
        'latin.english-dictionary.help' => 'G-533QJ0VT0K',
        'latvian.english-dictionary.help' => 'G-3RRTKNZ278',
        'lithuanian.english-dictionary.help' => 'G-70E85JDFY5',
        'luxembourgish.english-dictionary.help' => 'G-S0KTFVX1CY',
        'macedonian.english-dictionary.help' => 'G-VX3RBS4FBE',
        'malagasy.english-dictionary.help' => 'G-0EB1LTSSPL',
        'malayalam.english-dictionary.help' => 'G-TXYBXBDSD9',
        'maltese.english-dictionary.help' => 'G-7KVTXY80DG',
        'maori.english-dictionary.help' => 'G-9WRE0K69HE',
        'marathi.english-dictionary.help' => 'G-GNWZ3SK0DZ',
        'mongolian.english-dictionary.help' => 'G-V6QM9G9YMF',
        'burmese.english-dictionary.help' => 'G-D4S6TB3851',
        'norwegian.english-dictionary.help' => 'G-N9W8V3JD7T',
        'pashto.english-dictionary.help' => 'G-4B7ZEZVV0Z',
        'persian.english-dictionary.help' => 'G-TYB94GG9PN',
        'polish.english-dictionary.help' => 'G-SLTVBP86PN',
        'portuguese.english-dictionary.help' => 'G-BB1LMNC55C',
        'romanian.english-dictionary.help' => 'G-4VLE06XSE2',
        'russian.english-dictionary.help' => 'G-BNG3R44SR0',
        'samoan.english-dictionary.help' => 'G-4L7ZQ67LP4',
        'scots-gaelic.english-dictionary.help' => 'G-TRYBP50K4N',
        'serbian.english-dictionary.help' => 'G-5ZVX03MEJ9',
        'shona.english-dictionary.help' => 'G-3B1L3HB5QX',
        'sindhi.english-dictionary.help' => 'G-FTSXCE1S8X',
        'sinhala.english-dictionary.help' => 'G-01RTTSG9J3',
        'slovak.english-dictionary.help' => 'G-HHSDLQCZXF',
        'slovenian.english-dictionary.help' => 'G-3ZB12VHPEN',
        'somali.english-dictionary.help' => 'G-HSNV0MGJWR',
        'spanish.english-dictionary.help' => 'G-WQTTM2PX9W',
        'sundanese.english-dictionary.help' => 'G-7B3RM1ZR7Z',
        'swahili.english-dictionary.help' => 'G-T7KDHDHJYT',
        'swedish.english-dictionary.help' => 'G-183V177H1Q',
        'tajik.english-dictionary.help' => 'G-YTT3DJPDBD',
        'turkish.english-dictionary.help' => 'G-GHYG3P6QGC',
        'ukrainian.english-dictionary.help' => 'G-35HLT7DW0D',
        'urdu.english-dictionary.help' => 'G-LNLQTCW4EG',
        'uzbek.english-dictionary.help' => 'G-DPE848YYHB',
        'vietnamese.english-dictionary.help' => 'G-PH987MFEMQ',
        'xhosa.english-dictionary.help' => 'G-0CBK285FZY',
        'yiddish.english-dictionary.help' => 'G-KK60HLSK3G',
        'yoruba.english-dictionary.help' => 'G-0KZHW0TR5P',
        'zulu.english-dictionary.help' => 'G-HT5N3BGK8H',

        'www.bdword.com' => 'G-VX41ZPZ9CT',
        'www.english-hindi.net' => 'G-YJRX0GE3NX',
        'www.english-tamil.net' => 'G-3E04Y96Z6R',
        'www.english-telugu.net' => 'G-VJJF70705T',
        'www.english-gujarati.com' => 'G-7EVQYEPS9W',
        'www.english-marathi.net' => 'G-ZTQQH9VH8G',
        'www.english-kannada.com' => 'G-PVEGP7LJ2G',
        'www.english-thai.net' => 'G-JFRDKPYK15',
        'www.english-welsh.net' => 'G-SF475JLDKK',
        'www.english-arabic.org' => 'G-G0T5TV5JRN',
        'www.english-malay.net' => 'G-ZKD5ZCZGSS',
        'www.english-nepali.com' => 'G-XK0EELQBGG',
        'www.english-punjabi.net' => 'G-G1HMBK0MGH'
    );

    return $lang_by_url[$url];
}

function getLanguageArray()
{

    $lang = array(
        'afrikaans.english-dictionary.help' => 'afrikaans',
        'albanian.english-dictionary.help' => 'albanian',
        'amharic.english-dictionary.help' => 'amharic',
        'armenian.english-dictionary.help' => 'armenian',
        'azerbaijani.english-dictionary.help' => 'azerbaijani',
        'basque.english-dictionary.help' => 'basque',
        'belarusian.english-dictionary.help' => 'belarusian',
        'bosnian.english-dictionary.help' => 'bosnian',
        'bulgarian.english-dictionary.help' => 'bulgarian',
        'catalan.english-dictionary.help' => 'catalan',
        'cebuano.english-dictionary.help' => 'cebuano',
        'chichewa.english-dictionary.help' => 'chichewa',
        'chinese.english-dictionary.help' => 'chinese',
        'corsican.english-dictionary.help' => 'corsican',
        'croatian.english-dictionary.help' => 'croatian',
        'czech.english-dictionary.help' => 'czech',
        'danish.english-dictionary.help' => 'danish',
        'dutch.english-dictionary.help' => 'dutch',
        'esperanto.english-dictionary.help' => 'esperanto',
        'estonian.english-dictionary.help' => 'estonian',
        'filipino.english-dictionary.help' => 'filipino',
        'finnish.english-dictionary.help' => 'finnish',
        'french.english-dictionary.help' => 'french',
        'frisian.english-dictionary.help' => 'frisian',
        'galician.english-dictionary.help' => 'galician',
        'georgian.english-dictionary.help' => 'georgian',
        'german.english-dictionary.help' => 'german',
        'greek.english-dictionary.help' => 'greek',
//        'gujarati.english-dictionary.help' => 'gujarati',
        'haitian.english-dictionary.help' => 'haitian',
        'hausa.english-dictionary.help' => 'hausa',
        'hawaiian.english-dictionary.help' => 'hawaiian',
        'hebrew.english-dictionary.help' => 'hebrew',
        'hmong.english-dictionary.help' => 'hmong',
        'hungarian.english-dictionary.help' => 'hungarian',
        'icelandic.english-dictionary.help' => 'icelandic',
        'igbo.english-dictionary.help' => 'igbo',
        'indonesian.english-dictionary.help' => 'indonesian',
        'irish.english-dictionary.help' => 'irish',
        'italian.english-dictionary.help' => 'italian',
        'japanese.english-dictionary.help' => 'japanese',
        'javanese.english-dictionary.help' => 'javanese',
        'kazakh.english-dictionary.help' => 'kazakh',
        'khmer.english-dictionary.help' => 'khmer',
        'korean.english-dictionary.help' => 'korean',
        'kurmanji.english-dictionary.help' => 'kurmanji',
        'kyrgyz.english-dictionary.help' => 'kyrgyz',
        'lao.english-dictionary.help' => 'lao',
        'latin.english-dictionary.help' => 'latin',
        'latvian.english-dictionary.help' => 'latvian',
        'lithuanian.english-dictionary.help' => 'lithuanian',
        'luxembourgish.english-dictionary.help' => 'luxembourgish',
        'macedonian.english-dictionary.help' => 'macedonian',
        'malagasy.english-dictionary.help' => 'malagasy',
        'malayalam.english-dictionary.help' => 'malayalam',
        'maltese.english-dictionary.help' => 'maltese',
        'maori.english-dictionary.help' => 'maori',
//        'marathi.english-dictionary.help' => 'marathi',
        'mongolian.english-dictionary.help' => 'mongolian',
        'burmese.english-dictionary.help' => 'burmese',
        'norwegian.english-dictionary.help' => 'norwegian',
        'pashto.english-dictionary.help' => 'pashto',
        'persian.english-dictionary.help' => 'persian',
        'polish.english-dictionary.help' => 'polish',
        'portuguese.english-dictionary.help' => 'portuguese',
        'romanian.english-dictionary.help' => 'romanian',
        'russian.english-dictionary.help' => 'russian',
        'samoan.english-dictionary.help' => 'samoan',
//        'scots-gaelic.english-dictionary.help' => 'scots',
        'serbian.english-dictionary.help' => 'serbian',
        'shona.english-dictionary.help' => 'shona',
        'sindhi.english-dictionary.help' => 'sindhi',
        'sinhala.english-dictionary.help' => 'sinhala',
        'slovak.english-dictionary.help' => 'slovak',
        'slovenian.english-dictionary.help' => 'slovenian',
        'somali.english-dictionary.help' => 'somali',
        'spanish.english-dictionary.help' => 'spanish',
        'sundanese.english-dictionary.help' => 'sundanese',
        'swahili.english-dictionary.help' => 'swahili',
        'swedish.english-dictionary.help' => 'swedish',
        'tajik.english-dictionary.help' => 'tajik',
        'turkish.english-dictionary.help' => 'turkish',
        'ukrainian.english-dictionary.help' => 'ukrainian',
        'urdu.english-dictionary.help' => 'urdu',
        'uzbek.english-dictionary.help' => 'uzbek',
        'vietnamese.english-dictionary.help' => 'vietnamese',
        'xhosa.english-dictionary.help' => 'xhosa',
        'yiddish.english-dictionary.help' => 'yiddish',
        'yoruba.english-dictionary.help' => 'yoruba',
        'zulu.english-dictionary.help' => 'zulu',

        'www.bdword.com' => 'bengali',
        'www.english-hindi.net' => 'hindi',
        'www.english-tamil.net' => 'tamil',
        'www.english-telugu.net' => 'telugu',
        'www.english-gujarati.com' => 'gujarati',
        'www.english-marathi.net' => 'marathi',
        'www.english-kannada.com' => 'kannada',
        'www.english-thai.net' => 'thai',
        'www.english-welsh.net' => 'welsh',
        'www.english-arabic.org' => 'arabic',
        'www.english-malay.net' => 'malay',
        'www.english-nepali.com' => 'nepali',
        'www.english-punjabi.net' => 'punjabi'
    );

    return $lang;
}

function getCanonicalLink($conn, $sn, $lang, $base_url, $q)
{

    switch ($sn) {

        case 'index':

            $url = $base_url;

            if ($q) {
                if (preg_match("/^[a-z]$/", strtolower($q[0]))) {
                    $url = $base_url . 'english-to-' . $lang . '-meaning-' . stripslashes($q);
                } else {
                    $url = $base_url . '' . $lang . '-to-english-meaning-' . stripslashes($q);
                }
            }

            break;

        case 'search':
            $url = $base_url;

            if ($q) {
                if (preg_match("/^[a-z]$/", $q[0])) {
                    $url = $base_url . 'english-to-' . $lang . '-meaning-' . sanitize($q, $conn);
                } else {
                    $url = $base_url . '' . $lang . '-to-english-meaning-' . sanitize($q, $conn);
                }
            }

            break;

        case 'about-us':
            $url = $base_url . 'about-us';
            break;

        case 'browse':
            $url = $base_url . 'browse-words';
            break;

        case 'contact':
            $url = $base_url . 'contact-us';
            break;

        case 'disclaimer':
            $url = $base_url . 'disclaimer';
            break;

        case 'error':
            $url = $base_url . 'browse-words';
            break;

        case 'learn-ten-words-everyday':
            $url = $base_url . 'learn-ten-words-everyday';
            break;

        case 'learning-materials':
            $url = $base_url . 'learning-materials';
            break;

        case 'privacy':
            $url = $base_url . 'privacy';
            break;

        case 'read-text':
            $url = $base_url . 'read-text';
            break;

        case 'single':
            $url = $base_url . '/post';
            if ($_GET['url']) {
                $uex = explode('/', $_GET['url']);
                if ($uex[2]) {
                    $url = $base_url . $uex[2];
                }
            }

            break;

        case 'vocabulary-game':
            $url = $base_url . 'vocabulary-game';
            break;

        case 'favorite':
            $url = $base_url . 'favorite-words';
            break;

        case 'history':
            $url = $base_url . 'word-history';
            break;

        case 'learn-common-translations':
            $url = $base_url . 'learn-common-translations.php';
            break;

        case 'topic-wise-words':
            $url = $base_url . 'learn-common-translations.php';
            break;

        case 'learn-3000-plus-common-words':
            $url = $base_url . 'learn-3000-plus-common-words.php';
            break;

        case 'learn-common-gre-words':
            $url = $base_url . 'learn-common-gre-words.php';
            break;

        default:
            $url = $base_url;
            break;
    }

    return strtolower(str_replace(' ', '-', $url));

}

function getGoogleSiteVerify($lang)
{

    $webmaster_id = array(
        'bengali' => 'vYS2sLocPMRzbRv-SYyfc7GeUT_1FfszJqBurJIa6Uc',
        'arabic' => 'vYS2sLocPMRzbRv-SYyfc7GeUT_1FfszJqBurJIa6Uc',
        'gujarati' => 'lHHYBQpg7lf8hLoRNpu1aPO35U36_xvq8ucyCEcmCcY',
        'hindi' => 'PlirFPnzgNvVlPMWbVsAORv-CXqwyRLOdEKeiIDkZr8',
        'kannada' => '8z27f7qJKcXs2PWA6sBx9SS2saqkFTIFbqPtbN-Ol80',
        'malay' => 'C6sno1Xq3tAfKHsZAR0cawNTpqiJGXbpcM8hMX-If_4',
        'marathi' => '19-UOjenucUnvgAGCazcEKWhHKQu9C_3K138IaYP6aw',
        'nepali' => 'j5LoTsmkSvUHmybLb3PnamQcGoAJHst8z0QVDLeDMBM',
        'punjabi' => 'I3nBRdEGxZUaYUJ8rwTknQULK0YWHjXUyajwwKz9R2M',
        'tamil' => 'gyS0p4e2iE3euY0wDynn-0CyGsMMOGQV_l_9ry7A1T8',
        'telugu' => 'dXbMwSUlX6JQcxjmtAf8nz_LTRgTEwrdDxBImpaKV7k',
        'thai' => 'nO85DOA1A-qS9U3rUmZPA7tafgQNF2e1G5Xi_uIYJ7s',
        'welsh' => 'MYyER_jZPQn2wOE_qYzUrC-Xf6sUBzi_Xts79dm0ph0'
    );

    if (isset($webmaster_id[$lang])) {
        return $webmaster_id[$lang];
    } else {
        return '-CFrcPgOTFdQlz-3bz0K8XedhyUElAg0_oiSXBFNmdQ';
    }

}

function getAutoAd($isWordBanned)
{

    $str = '';

    if ($isWordBanned == false) {
        $str = '<script data-ad-client="ca-pub-2642708445471409" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>';
    }

    return $str;
}

function getAllAdCodes($isMobile, $isWordBanned, $sn, $lang)
{

    $adCodeArray = array();

    $adCodeArray['mobile_head'] = '';
    $adCodeArray['body_top'] = '';
    $adCodeArray['300'] = '';
    $adCodeArray['300_2'] = '';
    $adCodeArray['336'] = '';
    $adCodeArray['auto'] = '';



    $code = '';

    $top_slot_id = '1847329881';
    $mid_slot_id = '6432811883';


    if ($lang == 'bengali' and $sn == 'index') {
        $top_slot_id = '2002612288';
        $mid_slot_id = '4956078682';
    }

    if ($isWordBanned == false) {

        if (isMobile()) {
            $adCodeArray['mobile_head'] = '';
            // $adCodeArray['mobile_head'] = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            // <script>
            //     (adsbygoogle = window.adsbygoogle || []).push({
            //     google_ad_client: "ca-pub-2642708445471409",
            //     enable_page_level_ads: true
            //     });
            // </script>';
        }

        $adCodeArray['auto'] = '<script data-ad-client="ca-pub-2642708445471409" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>';


        $adCodeArray['body_top'] = '<style>
        .top_res_1 { width: 320px; height: 100px; }
        @media(min-width: 500px) { .top_res_1 { width: 468px; height: 60px; } }
        @media(min-width: 800px) { .top_res_1 { width: 728px; height: 90px; } }
        </style>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- top-res -->
        <ins class="adsbygoogle top_res_1"
             style="display:inline-block"
             data-ad-client="ca-pub-2642708445471409"
             data-ad-slot="' . $top_slot_id . '"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>';
        $adCodeArray['300'] = '<div style="height:250px !important; background:#ccc;">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- top-res-middle -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-2642708445471409"
             data-ad-slot="' . $mid_slot_id . '"
             data-ad-format="rectangle"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script></div>';
        $adCodeArray['300_2'] = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- bdword-bn-300-250 -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:300px;height:250px"
             data-ad-client="ca-pub-2642708445471409"
             data-ad-slot="0201440774"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>';
        $adCodeArray['336'] = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- 336-red -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:336px;height:280px"
             data-ad-client="ca-pub-2642708445471409"
             data-ad-slot="3618946282"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>';

    }
    return $adCodeArray;
}

function getWordBannedStatus($conn, $q)
{

    $status = false;

    $q = strtolower($q);
    $sql = mysqli_query($conn, "select * from restrictad where word='" . $q . "' limit 1");

    if ($sql) {

        $mqueryNum = mysqli_num_rows($sql);

        if (preg_match("/@/", $_SERVER['REQUEST_URI']) or $mqueryNum == 1) {
            $status = true;
        } else {
            $status = false;
        }

    }

    return $status;

}

function getLogoText($lang, $ulang)
{

    return ($lang == 'bengali') ? 'BDWORD' : $ulang;

}

function getJumboDownloadBox($lang, $device, $url)
{

    $str = '';

    if ($lang == 'bengali') {

        if ($device == 'ios') {
            $download_link = 'https://itunes.apple.com/us/app/english-bengali-dictionary/id1213381239?ls=1&mt=8';
            $download_text = 'ios app';
        } elseif ($device == 'android') {
            $download_link = 'https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary';
            $download_text = 'android app';
        } elseif ($device == 'pc') {
            $download_link = 'https://chrome.google.com/webstore/detail/bdword-english-to-bengali/cogjmeckpkinhnidokapabgaoelhkbcl';
            $download_text = 'chrome extension';
        }


        $str = '<div class="download_box">
        
        <a href="https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary" style="display:block"><div class="pull-left download_box_img"><i class="icon-<?=$download_text?>"></i></div><div class="list-group-item-heading pull-left download_box_text"> Download ' . $download_text . '</div></a>
        
        <div class="pull-right download_box_remove"><img src="' . $url . '/imgs/clear.png"></div>
        
        </div>';


    }

    return $str;

}

function getDevice()
{
    $iPod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");
    $iPhone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
    $iPad = strpos($_SERVER['HTTP_USER_AGENT'], "iPad");
    $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
    if ($iPad || $iPhone || $iPod) {
        return 'ios';
    } else if ($android) {
        return 'android';
    } else {
        return 'pc';
    }
}

function getHOneTitle($q, $ulang)
{

    $str = '';

    if ($q) {
        if (preg_match("/^[a-z]$/", $q[0])) {
            $str = '<h1 style="font-size:20px;">English to ' . str_replace("Bengali", "Bangla", $ulang) . ' Meaning :: ' . $q . '</h1>';
        } else {
            $str = '<h1 style="font-size:20px;">' . str_replace("Bengali", "Bangla", $ulang) . ' to English Meaning :: ' . $q . '</h1>';
        }
    } else {
        $str = '<h1 style="font-size:20px;">English to ' . str_replace("Bengali", "Bangla", $ulang) . ' Dictionary</h1>';
    }

    return $str;
}

function getMainData($conn, $q, $type, $lang)
{


    if (preg_match('#::#', $q)) {
        $q_ex = explode('::', $q);
        $q = trim($q_ex[1]);
    }

    if ($type == 1) {
        $mquery = mysqli_query($conn, "select word, `" . $lang . "` as `mean` from `lang` where `" . $lang . "`='" . $q . "' limit 10");

        if (mysqli_num_rows($mquery) == 0) {
            $msg = 'No word meaning found for: ' . $q;
            echo json_encode(array('main' => '', 'data' => '', 'mean' => '', 'error' => 1, 'msg' => $msg, 'type' => 1));
            exit;
        }

        $rows = array();
        while ($row = mysqli_fetch_assoc($mquery)) {
            $rows[] = $row;
        }

        return json_encode(array('main' => '', 'data' => $rows, 'mean' => '', 'error' => 0, 'msg' => '', 'type' => 1));
        exit;

    } else {
        $mquery = mysqli_query($conn, "select " . $lang . " from lang where word='" . $q . "' limit 1");
        $mrow = mysqli_fetch_assoc($mquery);

        if (mysqli_num_rows($mquery) == 0) {
            $msg = 'No word meaning found for: ' . $q;
            $pspell_array = '[]';

            $pspell_array = file_get_contents('http://sug.bdword.com/api_multiple.php?word=' . urlencode($q));

            if (in_array($q, json_decode($pspell_array), true) and strpos($q, " ") == false) {
                @mysqli_query($conn, 'insert into com_words (word) values ("' . $q . '")');
            }

            return json_encode(array('main' => '', 'data' => '', 'mean' => '', 'error' => 1, 'msg' => $msg, 'sug' => $pspell_array, 'type' => 0));

            exit;
        }
        $sql = 'select word, ' . $lang . ', id, data from word_frame where word=\'' . $q . '\' limit 1';
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);

        $id = $row['id'];
        $data = json_decode($row['data']);
        $mean = json_decode($row[$lang]);


        if ($lang == 'bengali') {
            $img_check = mysqli_num_rows(mysqli_query($conn, 'select word from img_words where word=\'' . $q . '\' limit 1'));
            if ($img_check) {
                $data->img = $q;
            }
        }

        $related_query = mysqli_query($conn, 'select variant from variants where word=\'' . $q . '\'');
        $related_words = array();
        while ($related_row = mysqli_fetch_assoc($related_query)) {
            if ($related_row['variant'] != $q) {
                $related_words[] = $related_row['variant'];
            }

        }


        $related_words_imp = "'" . implode("','", $related_words) . "'";

        $related_mean_query = mysqli_query($conn, "select " . $lang . " as mean, word from lang where word in (" . $related_words_imp . ")");
        $related_mean_array = array();
        while ($related_mean_row = mysqli_fetch_assoc($related_mean_query)) {
            $related_mean_array[$related_mean_row['word']] = $related_mean_row['mean'];
        }


        return json_encode(array('main' => $mrow[$lang], 'data' => $data, 'related' => $related_mean_array, 'mean' => $mean, 'type' => 0));
        exit;
    }

}


function getSidebarAppDetails($conn, $lang)
{

    $str = '';

    if ($lang == 'bengali') {

        $str = '<div class="panel panel-primary ">
        
                    <div class="panel-body app_links_body">
                        <a href="https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary" class="btn btn-primary btn-raised" style="width:100% !important;"><table><tr><td><i class="icon-android"></i></td><td class="left_padding"> Android APP</td></tr></table></a>
                        <a href="https://itunes.apple.com/us/app/english-bengali-dictionary/id1213381239?ls=1&mt=8" class="btn btn-primary btn-raised" style="width:100% !important;"><table><tr><td><i class="icon-ios"></i></td><td class="left_padding"> iPhone APP</td></tr></table></a>
                        <a href="https://chrome.google.com/webstore/detail/bdword-english-to-bengali/cogjmeckpkinhnidokapabgaoelhkbcl" class="btn btn-primary btn-raised" style="width:100% !important;"><table><tr><td><i class="icon-chrome"></i></td><td class="left_padding"> Chrome Extension</td></tr></table></a>
                    </div>
                
                </div>';

    } else {

        $getAppId = mysqli_fetch_assoc(mysqli_query($conn, "select AppId from AppIds where Lang='".$lang."' limit 1"));
        $appId = $getAppId['AppId'];
        $download_link = 'https://itunes.apple.com/us/app/english-' . $lang . '-dictionary/id' . $appId . '?ls=1&mt=8';

        $str = '<div class="panel panel-primary ">
        
                    <div class="panel-body app_links_body">
                        <a href="https://play.google.com/store/apps/details?id=com.bdword.e2' . $lang . 'dictionary" class="btn btn-primary btn-raised" style="width:100% !important;"><table><tr><td><i class="icon-android"></i></td><td class="left_padding"> Android APP</td></tr></table></a>
                        <a href="' . $download_link . '" class="btn btn-primary btn-raised" style="width:100% !important;"><table><tr><td><i class="icon-ios"></i></td><td class="left_padding"> iPhone APP</td></tr></table></a>
                    </div>
        
                </div>';


    }


    return $str;

}

function getSuggestionForWrongWord($word)
{

    $word = trim($word);
    $pspell_link = pspell_new("en");

    // $pspell_config = pspell_config_create("en");
    // pspell_config_personal($pspell_config, "/var/dictionaries/custom.pws");
    // pspell_config_repl($pspell_config, "/var/dictionaries/custom.repl");
    // $pspell_link = pspell_new_personal($pspell_config, "en");

    // $pspell_config = pspell_config_create("en");
    // $pspell_link = pspell_new_config($pspell_config);
    
    $suggestions_pre = pspell_suggest($pspell_link, $word);

    foreach ($suggestions_pre as $pre_sug) {
        if (strlen($pre_sug) > 3 and !preg_match("#\'#", $pre_sug) and !preg_match("#\s#", $pre_sug) and !preg_match("#\-#", $pre_sug)) {
            $array[] = $pre_sug;
        }
    }

    return $array;

}

function getGrammar($conn, $base_url)
{
    $content = '';

    $sql = 'select id,title,data from blogs where cat=2';

    $get_blogs = mysqli_query($conn, $sql);


    while ($blog_row = mysqli_fetch_assoc($get_blogs)) {
        $url_title = str_replace(' ', '-', strtolower($blog_row['title']));

        $content .= '<a title="' . $blog_row['title'] . '" href="' . $base_url . 'english-to-'.$_GET['lang'].'-dictionary-grammar-' . $url_title . '"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="https://content2.mcqstudy.com/bw-static-files/img/direction_arrow2.png" width="22" height="22" alt="icon"><span>' . ucwords(strtolower($blog_row['title'])) . '</span></a>';
    }

    return $content;
}

function PageShortIntro($limit, $tableName, $pageName, $infoTitle, $conn)
{
    //connectWithCharSet();

    $content = '<legend>' . $infoTitle . '</legend><div class="fieldset_body inner_details">';

    $content .= '';

    $query = mysqli_query($conn, 'SELECT sentence, trans FROM `' . $tableName . '` ORDER BY RAND() LIMIT ' . $limit);
    $i = 1;


    while ($row = mysqli_fetch_assoc($query)) {

        $content .= "<span><div class='label_font'>" . $row['sentence'] . " : </div> " . $row['trans'] . "</span>";
        $i++;
    }


    $content .= '</div><button class="btn_default5 bdr_radius2"><a href="' . $pageName . '">More</a></button>';

    return $content;
}

function redirectOlds($baselang)
{

    $urlex = explode('.', $_SERVER['HTTP_HOST']);

    $lang_by_url = array(
        'bengali' => 'www.bdword.com',
        'arabic' => 'www.english-arabic.org',
        'gujarati' => 'www.english-gujarati.com',
        'hindi' => 'www.english-hindi.net',
        'kannada' => 'www.english-kannada.com',
        'malay' => 'www.english-malay.net',
        'marathi' => 'www.english-marathi.net',
        'nepali' => 'www.english-nepali.com',
        'punjabi' => 'www.english-punjabi.net',
        'tamil' => 'www.english-tamil.net',
        'telugu' => 'www.english-telugu.net',
        'thai' => 'www.english-thai.net',
        'welsh' => 'www.english-welsh.net'
    );

    $lang_keys = array(
        'bengali',
        'arabic',
        'gujarati',
        'hindi',
        'kannada',
        'malay',
        'marathi',
        'nepali',
        'punjabi',
        'tamil',
        'telugu',
        'thai',
        'welsh'
    );

    $q = isset($_GET['q']) ? $_GET['q'] : null;
    $lang = isset($_GET['lang']) ? $_GET['lang'] : null;

    if ($lang && $q && $lang != $baselang) {
        $q = strtolower($q);
        $lang = strtolower($lang);
        $red_url = 'https://' . $lang . '.english-dictionary.help/english-to-' . strtolower($lang) . '-meaning-' . $q;

        if (in_array($lang, $lang_keys)) {
            $red_url = 'https://' . $lang_by_url[$lang] . '/english-to-' . strtolower($lang) . '-meaning-' . $q;
        }

        header("HTTP/1.1 301 Moved Permanently");
        header('Location: ' . $red_url);
        exit;
    }
    if ($lang && !$q && $lang != $baselang) {
        $red_url = 'https://' . $lang . '.english-dictionary.help';
        if (in_array($lang, $lang_keys)) {
            $red_url = 'https://' . $lang_by_url[$lang];
        }
        header("HTTP/1.1 301 Moved Permanently");
        header('Location: ' . $red_url);
        exit;
    }

}

function getAmpWord($conn, $q)
{

    $str = '';

    $query = mysqli_query($conn, 'select word from img_words where word=\'' . $q . '\' limit 1');

    if ($query) {
        $row = mysqli_fetch_assoc($query);
        $str = $row['word'];
    }

    return $str;

}

function getCountryBySite($url)
{
    $lang_by_url = array(
        'afrikaans.english-dictionary.help' => 'Central African Republic',
        'albanian.english-dictionary.help' => 'Albania',
       'amharic.english-dictionary.help' => 'Amharic',
        'armenian.english-dictionary.help' => 'Armenia',
        'azerbaijani.english-dictionary.help' => 'Azerbaijan',
        'basque.english-dictionary.help' => 'Spain',
        'belarusian.english-dictionary.help' => 'Belarus',
        'bosnian.english-dictionary.help' => 'Bosnia and Herzegovina',
        'bulgarian.english-dictionary.help' => 'Bulgaria',
        'catalan.english-dictionary.help' => 'Spain',
        'cebuano.english-dictionary.help' => 'Philippines',
        'chichewa.english-dictionary.help' => 'Central African Republic',
        'chinese.english-dictionary.help' => 'China',
        'corsican.english-dictionary.help' => 'French',
       'croatian.english-dictionary.help' => 'croatian',
        'czech.english-dictionary.help' => 'Czech Republic',
        'danish.english-dictionary.help' => 'Denmark',
        'dutch.english-dictionary.help' => 'Netherlands',
        'esperanto.english-dictionary.help' => 'Poland',
        'estonian.english-dictionary.help' => 'Finland',
        'filipino.english-dictionary.help' => 'Philippines',
        'finnish.english-dictionary.help' => 'Finland',
        'french.english-dictionary.help' => 'French',
        'frisian.english-dictionary.help' => 'Netherlands',
        'galician.english-dictionary.help' => 'Spain',
        'georgian.english-dictionary.help' => 'Georgia',
        'german.english-dictionary.help' => 'Germany',
        'greek.english-dictionary.help' => 'Greece',
        'gujarati.english-dictionary.help' => 'gujarati',
        'haitian.english-dictionary.help' => 'Haiti',
       'hausa.english-dictionary.help' => 'hausa',
       'hawaiian.english-dictionary.help' => 'hawaiian',
        'hebrew.english-dictionary.help' => 'Israel',
        'hmong.english-dictionary.help' => 'China',
        'hungarian.english-dictionary.help' => 'Hungary',
        'icelandic.english-dictionary.help' => 'Iceland',
        'igbo.english-dictionary.help' => 'Nigeria',
        'indonesian.english-dictionary.help' => 'Indonesia',
        'irish.english-dictionary.help' => 'Ireland',
        'italian.english-dictionary.help' => 'Italy',
        'japanese.english-dictionary.help' => 'Japan',
        'javanese.english-dictionary.help' => 'Indonesia',
        'kazakh.english-dictionary.help' => 'Kazakhstan',
       'khmer.english-dictionary.help' => 'khmer',
        'korean.english-dictionary.help' => 'North Korea',
       'kurmanji.english-dictionary.help' => 'kurmanji',
        'kyrgyz.english-dictionary.help' => 'Kyrgyzstan',
        'lao.english-dictionary.help' => 'Laos',
        'latin.english-dictionary.help' => 'Mexico',
       'latvian.english-dictionary.help' => 'latvian',
        'lithuanian.english-dictionary.help' => 'Lithuania',
        'luxembourgish.english-dictionary.help' => 'Luxembourg',
        'macedonian.english-dictionary.help' => 'Macedonia',
        'malagasy.english-dictionary.help' => 'Madagascar',
        'maltese.english-dictionary.help' => 'Malta',
        'maori.english-dictionary.help' => 'New Zealand',
        'mongolian.english-dictionary.help' => 'Mongolia',
       'burmese.english-dictionary.help' => 'burmese',
        'norwegian.english-dictionary.help' => 'Norway',
        'pashto.english-dictionary.help' => 'Afghanistan',
        'persian.english-dictionary.help' => 'Iran',
        'polish.english-dictionary.help' => 'Poland',
        'portuguese.english-dictionary.help' => 'Portugal',
        'romanian.english-dictionary.help' => 'Romania',
        'russian.english-dictionary.help' => 'Russia',
        'samoan.english-dictionary.help' => 'Samoa',
        'scots-gaelic.english-dictionary.help' => 'Canada',
        'serbian.english-dictionary.help' => 'Serbia',
        'shona.english-dictionary.help' => 'Zimbabwe',
        'sindhi.english-dictionary.help' => 'Pakistan',
        'sinhala.english-dictionary.help' => 'Sri Lanka',
        'slovak.english-dictionary.help' => 'Slovakia',
        'slovenian.english-dictionary.help' => 'Slovenia',
        'somali.english-dictionary.help' => 'Somalia',
        'spanish.english-dictionary.help' => 'Spain',
        'sundanese.english-dictionary.help' => 'Indonesia',
        'swahili.english-dictionary.help' => 'South Africa',
        'swedish.english-dictionary.help' => 'Sweden',
        'tajik.english-dictionary.help' => 'Tajikistan',
        'turkish.english-dictionary.help' => 'Turkey',
        'ukrainian.english-dictionary.help' => 'Ukraine',
        'urdu.english-dictionary.help' => 'Pakistan',
        'uzbek.english-dictionary.help' => 'Uzbekistan',
        'vietnamese.english-dictionary.help' => 'Vietnam',
        'xhosa.english-dictionary.help' => 'South Africa',
        'yiddish.english-dictionary.help' => 'yiddish',
        'yoruba.english-dictionary.help' => 'Nigeria',
        'zulu.english-dictionary.help' => 'South Africa',
        'www.english-thai.net' => 'Thailand',
        'www.english-welsh.net' => 'welsh',
        'www.english-arabic.org' => 'arabic',
        'www.english-malay.net' => 'Malaysia',
        'www.english-nepali.com' => 'Nepal',
        'www.english-hindi.net' => 'Hindi',
        'www.bdword.com' => 'Bangla',
    );

    return $lang_by_url[$url];
}

function getTranslateText()
{

    $lang = array(
        'Vertaal woord' => 'afrikaans',
        'Përkthe fjalën' => 'albanian',
        'ቃል ይተርጉሙ' => 'amharic',
        'Թարգմանել բառը' => 'armenian',
        'Sözü tərcümə edin' => 'azerbaijani',
        'Itzuli hitza' => 'basque',
        'Перакладзіце слова' => 'belarusian',
        'Prevedi riječ' => 'bosnian',
        'Преведете дума' => 'bulgarian',
        'Tradueix la paraula' => 'catalan',
        'Paghubad sa pulong' => 'cebuano',
        'Translate Word' => 'chichewa',
        '翻译单词' => 'chinese',
        'Traduce a parolla' => 'corsican',
        'Prevedi riječ' => 'croatian',
        'Přeložit slovo' => 'czech',
        'Oversæt ord' => 'danish',
        'Vertaal woord' => 'dutch',
        'Traduki vorton' => 'esperanto',
        'Tõlgi sõna' => 'estonian',
        'Salin ng salita' => 'filipino',
        'Käännä sana' => 'finnish',
        'Traduire le mot' => 'french',
        'Wort übersetzen' => 'frisian',
        'Traducir palabra' => 'galician',
        'თარგმნეთ სიტყვა' => 'georgian',
        'Wort übersetzen' => 'german',
        'Μετάφραση λέξης' => 'greek',
        'Tradwi mo' => 'haitian',
        'Fassara kalma' => 'hausa',
        'Unuhi i ka ʻōlelo' => 'hawaiian',
        'תרגם מילה' => 'hebrew',
        'Txhais lo lus' => 'hmong',
        'Szó lefordítása' => 'hungarian',
        'Þýða orð' => 'icelandic',
        'Tugharia okwu' => 'igbo',
        'Terjemahkan kata' => 'indonesian',
        'Aistrigh focal' => 'irish',
        'Traduci parola' => 'italian',
        '単語を翻訳' => 'japanese',
        'Narjamahake tembung' => 'javanese',
        'Сөзді аудару' => 'kazakh',
        'បកប្រែពាក្យ' => 'khmer',
        '단어 번역' => 'korean',
        'Translate Word' => 'kurmanji',
        'Сөздү которуу' => 'kyrgyz',
        'ແປ ຄຳ' => 'lao',
        'Nec verbum' => 'latin',
        'Tulkot vārdu' => 'latvian',
        'Išversti žodį' => 'lithuanian',
        'Wuert iwwersetzen' => 'luxembourgish',
        'Преведи збор' => 'macedonian',
        'Teny adika' => 'malagasy',
        'പദം വിവർത്തനം ചെയ്യുക' => 'malayalam',
        'Ittraduċi kelma' => 'maltese',
        'Kupu whakamaori' => 'maori',
        'Үгийг орчуулах' => 'mongolian',
        'စကားလုံးဘာသာပြန်ပါ' => 'burmese',
        'Oversett ord' => 'norwegian',
        'کلمه وژباړه' => 'pashto',
        'ترجمه کلمه' => 'persian',
        'Przetłumacz słowo' => 'polish',
        'Traduzir palavra' => 'portuguese',
        'Traduceți cuvântul' => 'romanian',
        'Перевести слово' => 'russian',
        'Faʻaliliu upu' => 'samoan',
        'Преведи реч' => 'serbian',
        'Dudziro izwi' => 'shona',
        'لفظ ترجمو ڪريو' => 'sindhi',
        'වචනය පරිවර්තනය කරන්න' => 'sinhala',
        'Preložiť slovo' => 'slovak',
        'Prevedi besedo' => 'slovenian',
        'Turjum ereyga' => 'somali',
        'Traducir palabra' => 'spanish',
        'Tarjamahkeun kecap' => 'sundanese',
        'Tafsiri neno' => 'swahili',
        'Översätt ord' => 'swedish',
        'Калимаро тарҷума кунед' => 'tajik',
        'kelimeyi çevir' => 'turkish',
        'Перекладіть слово' => 'ukrainian',
        'لفظ کا ترجمہ کریں' => 'urdu',
        "So'zni tarjima qiling" => 'uzbek',
        'Dịch từ' => 'vietnamese',
        'Guqula igama' => 'xhosa',
        'איבערזעצן וואָרט' => 'yiddish',
        'Tumọ ọrọ' => 'yoruba',
        'Humusha igama' => 'zulu',
        'শব্দ অনুবাদ' => 'bengali',
        'शब्द का अनुवाद करें' => 'hindi',
        'வார்த்தையை மொழிபெயர்க்கவும்' => 'tamil',
        'పదాన్ని అనువదించండి' => 'telugu',
        'શબ્દ ભાષાંતર કરો' => 'gujarati',
        'शब्द भाषांतर करा' => 'marathi',
        'ಪದವನ್ನು ಅನುವಾದಿಸಿ' => 'kannada',
        'แปลคำ' => 'thai',
        'Cyfieithwch air' => 'welsh',
        'ترجمة كلمة' => 'arabic',
        'Terjemahkan perkataan' => 'malay',
        'शब्द अनुवाद गर्नुहोस्' => 'nepali',
        'ਸ਼ਬਦ ਦਾ ਅਨੁਵਾਦ ਕਰੋ' => 'punjabi'
    );
	
	$lang = array_map('strtolower', $lang);

    return $lang;
}

?>