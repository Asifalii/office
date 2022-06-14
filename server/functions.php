<?php
//require_once('db_functions.php');
$dbhost = 'localhost';
$dbuser = 'root2';
$dbpass = '#Bdw0rd3101';
$dbname = 'bdword.v3';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    die('Could not connects : ' . mysqli_error());
}

function getKeyword($lang)
{
    $keyword = 'english to ' . $lang . ', english to ' . $lang . ' translator, ' . $lang . ' to english translation, translate to ' . $lang . ', ' . $lang . ' to english translate, english to ' . $lang . ' dictionary, english to ' . $lang . ' converter, ' . $lang . ' to english dictionary, dictionary english to ' . $lang . ', english to ' . $lang . ' meaning, translate eng to ' . $lang . ', english to ' . $lang . ' translation online, ' . $lang . ' to english meaning, ' . $lang . ' to english translation online, eng to ' . $lang . ' translate, ' . $lang . ' to english translation app, ' . $lang . ' dictionary';
    return $keyword;
}


function getMetaDescription($lang, $ulang)
{

    $local_lang = ($lang == 'bengali') ? 'Popular as ইংরেজি বাংলা অভিধান' : '';

    $m_des = 'English To ' . ucfirst($lang) . ' - Official ' . ucfirst($lang) . ' Dictionary Specially, ' . ucfirst($lang) . ' To English Dictionary &
Dictionary English To ' . ucfirst($lang) . ' Site Are Ready To Instant Result English To ' . ucfirst($lang) . ' Translator & ' . ucfirst($lang) . ' To English Translation Online FREE.
English To ' . ucfirst($lang) . ' Translation Online Tool And ' . ucfirst($lang) . ' to English Translation App Are Available On Play Store.
English To ' . ucfirst($lang) . ' Dictionary Are Ready To Translate To ' . ucfirst($lang) . ' Any Words With Totally Free.
Also Available Different ' . ucfirst($lang) . ' keyboard layout To Typing ' . ucfirst($lang) . ' To English Translate And English To ' . ucfirst($lang) . ' Converter. ' . "Let's Enjoy It...";

    return $m_des;
}

function getSuggestionForWrongWord($word)
{

    $word = trim($word);
    $pspell_link = pspell_new("en");

    $suggestions_pre = pspell_suggest($pspell_link, $word);

    foreach ($suggestions_pre as $pre_sug) {
        if (strlen($pre_sug) > 3 and !preg_match("#\'#", $pre_sug) and !preg_match("#\s#", $pre_sug) and !preg_match("#\-#", $pre_sug)) {
            $array[] = $pre_sug;
        }
    }

    return $array;

}

function isUserAgent()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) && !$_SERVER["HTTP_USER_AGENT"]) {
        die("nothing!");
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

function redirectOlds()
{
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
	
	$_GET['q'] = isset($_GET['q']) ? $_GET['q'] : '';

    if ($_GET['lang'] && $_GET['q'] && getLang() != $_GET['lang']) {
        $red_url = 'https://' . $_GET['lang'] . '.english-dictionary.help/english-to-' . strtolower($_GET['lang']) . '-meaning-' . urlencode($_GET['q']);


        if (in_array($_GET['lang'], $lang_keys)) {


            $red_url = 'https://' . $lang_by_url[$_GET['lang']] . '/english-to-' . strtolower($_GET['lang']) . '-meaning-' . urlencode($_GET['q']);
        }

        header("HTTP/1.1 301 Moved Permanently");
        header('Location: ' . $red_url);
        exit;
    }
    if ($_GET['lang'] && empty($_GET['q']) && getLang() != $_GET['lang']) {
        $red_url = 'https://' . $_GET['lang'] . '.english-dictionary.help';
        if (in_array($_GET['lang'], $lang_keys)) {
            $red_url = 'https://' . $lang_by_url[$_GET['lang']];
        }
        header("HTTP/1.1 301 Moved Permanently");
        header('Location: ' . $red_url);
        exit;
    }

	$_GET['p'] = isset($_GET['p']) ? $_GET['p'] : '';
	
    if ($_GET['p'] and $_GET['cat'] and getScriptName() == 'single') {
        $red_url = base_url() . '/post/' . $_GET['p'] . '/' . $_GET['cat'];

        header("HTTP/1.1 301 Moved Permanently");
        header('Location: ' . $red_url);
        exit;
    }


}


function getURI()
{
    return strtolower(trim($_SERVER['REQUEST_URI'], '/'));
}

function sanitize($q, $conn)
{
    $q = str_replace('+', '', strtolower(trim(str_replace(array('+', '-'), ' ', mysqli_real_escape_string($conn, $q)))));

    $query = mysqli_query($conn, "select root from v3_word_list where word='" . $q . "' limit 1");


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

}

function getLang()
{
    return $_GET['lang'];
}

function analyticsId()
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
	
	$lang = array_map('strtolower', $lang);

    return $lang;
}


function getScriptName()
{
		
	if(isset($_SERVER['SCRIPT_NAME'])){
		return strtolower(str_replace('.php', '', trim($_SERVER['SCRIPT_NAME'], '/')));
	}
	
	//if(isset($_SERVER['HTTP_HOST']) && isset($_SERVER['REQUEST_URI'])){
	//	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	//	$url = parse_url($actual_link);
	//	return strtolower(str_replace('.php', '', trim($url['path'], '/')));
	//}
	
}

function getTitle($q, $url)
{

    $url = str_replace(array('https://', 'www.'), '', $url);
    $sn = getScriptName();
    $lang = $_GET['lang'];
    $ulang = ucfirst($lang);
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

        case 'blank-quiz':
            $title = 'Fill in the Blanks';
            break;

        case 'search_history':
            $title = 'Word Search History';
            break;

        case 'form-of-verbs':
            $title = 'Form of Verbs';
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

            if ($q) {
                if (preg_match("/^[a-z]$/", $_GET['q'][0])) {
                    $title = $q . ' - English to ' . str_replace("Bengali", "Bangla", $ulang) . ' Meaning of ' . $q . ' - ' . $url;
                } else {
                    $title = $q . ' - ' . str_replace("Bengali", "Bangla", $ulang) . ' to English Meaning of ' . $q . ' - ' . $url;
                }
            }
            break;

        case 'search':
            if ($_GET['q']) {
                $title = 'English to ' . str_replace("Bengali", "Bangla", $ulang) . ' Meaning of ' . $_GET['q'];
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

function canonical($conn)
{

    $sn = getScriptName();
    $lang = getLang();
    $base_url = base_url();
    switch ($sn) {

        case 'index':

            $url = $base_url;

            if ($_GET['q']) {
                if (preg_match("/^[a-z]$/", strtolower($_GET['q'][0]))) {
                    $url = $base_url . '/english-to-' . $lang . '-meaning-' . sanitize($_GET['q'], $conn);
                } else {
                    $url = $base_url . '/' . $lang . '-to-english-meaning-' . sanitize($_GET['q'], $conn);
                }
            }

            break;

        case 'search':
            $url = $base_url;

            if ($_GET['q']) {
                if (preg_match("/^[a-z]$/", $_GET['q'][0])) {
                    $url = $base_url . '/english-to-' . $lang . '-meaning-' . sanitize($_GET['q'], $conn);
                } else {
                    $url = $base_url . '/' . $lang . '-to-english-meaning-' . sanitize($_GET['q'], $conn);
                }
            }

            break;

        case 'about-us':
            $url = $base_url . '/about-us';
            break;

        case 'browse':
            $url = $base_url . '/browse-words';
            break;

        case 'contact':
            $url = $base_url . '/contact-us';
            break;

        case 'disclaimer':
            $url = $base_url . '/disclaimer';
            break;

        case 'error':
            $url = $base_url . '/browse-words';
            break;

        case 'learn-ten-words-everyday':
            $url = $base_url . '/learn-ten-words-everyday';
            break;

        case 'learning-materials':
            $url = $base_url . '/learning-materials';
            break;

        case 'privacy':
            $url = $base_url . '/privacy';
            break;

        case 'read-text':
            $url = $base_url . '/read-text';
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
            $url = $base_url . '/vocabulary-game';
            break;

        case 'favorite':
            $url = $base_url . '/favorite-words';
            break;

        case 'history':
            $url = $base_url . '/word-history';
            break;

        case 'learn-common-translations':
            $url = $base_url . '/learn-common-translations.php';
            break;

        case 'topic-wise-words':
            $url = $base_url . '/learn-common-translations.php';
            break;

        case 'learn-3000-plus-common-words':
            $url = $base_url . '/learn-3000-plus-common-words.php';
            break;

        case 'learn-common-gre-words':
            $url = $base_url . '/learn-common-gre-words.php';
            break;

        default:
            $url = $base_url;
            break;
    }

    return strtolower(str_replace(' ', '-', $url));

}

function isMobile()
{
	if(isset($_SERVER["HTTP_USER_AGENT"])){
		if (preg_match("/(android|avantgo|ipad|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
			return true;
		} else {
			return false;
		}
	}
}

function checkBot()
{
	if(isset($_SERVER['HTTP_USER_AGENT'])){
		if (strpos($_SERVER['HTTP_USER_AGENT'], "Googlebot") === false or
			strpos($_SERVER['HTTP_USER_AGENT'], "Mediapartners-Google") === false or
			strpos($_SERVER['HTTP_USER_AGENT'], "AdsBot-Google") === false or
			strpos($_SERVER['HTTP_USER_AGENT'], "Googlebot-Mobile") === false or
			strpos($_SERVER['HTTP_USER_AGENT'], "Googlebot-Image") === false or
			strpos($_SERVER['HTTP_USER_AGENT'], "Baiduspider") === false or
			strpos($_SERVER['HTTP_USER_AGENT'], "Bingbot") === false or
			strpos($_SERVER['HTTP_USER_AGENT'], "YahooSeeker") === false) {
				if(isset($_SESSION[$_SERVER['REMOTE_ADDR']])){
					$_SESSION[$_SERVER['REMOTE_ADDR']]++;

			if ($_SESSION[$_SERVER['REMOTE_ADDR']] > 200) {
				echo json_encode(array('main' => '', 'data' => '', 'mean' => '', 'error' => 2, 'msg' => 'You have crossed the translation limit of maximum 200 words per day.', 'type' => 1));
				exit;
			}
				}
			
		}
	}
}

function isWordBanned($q, $conn)
{
    $q = strtolower($q);
    $mqueryNum = mysqli_num_rows(mysqli_query($conn, "select * from restrictad where word='" . $q . "' limit 1"));

    if (isset($_SERVER['REQUEST_URI']) && preg_match("/@/", $_SERVER['REQUEST_URI']) or $mqueryNum == 1) {
        return true;
    } else {
        return false;
    }

}


function getSuggestion($word)
{

    $word = trim(urldecode($word));
    $pspell_link = pspell_new("en");

    $word_ex = explode(' ', $word);

    $array = array();

    if (count($word_ex) > 1 and count($word_ex) < 5) {
        $long_word = '';

        foreach ($word_ex as $w) {
            $suggestions_pre = pspell_suggest($pspell_link, $w);
            $long_word .= $suggestions_pre[0] . ' ';
        }

        $array[0] = trim($long_word);

    } else {

        $suggestions_pre = pspell_suggest($pspell_link, $word);

        foreach ($suggestions_pre as $pre_sug) {
            if (strlen($pre_sug) > 3 and !preg_match("#\'#", $pre_sug) and !preg_match("#\s#", $pre_sug) and !preg_match("#\-#", $pre_sug)) {
                $array[] = $pre_sug;
            }
        }
    }

    return $array;

}

function showAds($q, $area, $conn)
{
    if (isset($_GET['msg']) && ($_GET['msg'] == 'not-found')) {
        return '';
    }
    $code = '';

    $top_slot_id = '1847329881';
    $mid_slot_id = '6432811883';

    $sn = getScriptName();

    if (getLang() == 'bengali' and $sn == 'index') {
        $top_slot_id = '2002612288';
        $mid_slot_id = '4956078682';
    }

    if (isWordBanned($q, $conn) == false) {
        switch ($area) {
            case 'mobile-head':

                if (isMobile()) {
                    $code = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({
						google_ad_client: "ca-pub-2642708445471409",
						enable_page_level_ads: true
						});
					</script>';
                } else {
                    $code = '';
                }
                break;

            case 'body-top':
                $code = '<style>
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

                break;
            case '300':
                $code = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- top-res-middle -->
				<ins class="adsbygoogle"
					 style="display:block"
					 data-ad-client="ca-pub-2642708445471409"
					 data-ad-slot="' . $mid_slot_id . '"
					 data-ad-format="auto"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>';

                break;

            case '300_2':
                $code = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- bdword-bn-300-250 -->
				<ins class="adsbygoogle"
					 style="display:inline-block;width:300px;height:250px"
					 data-ad-client="ca-pub-2642708445471409"
					 data-ad-slot="0201440774"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>';

                break;

            case '336':
                $code = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- 336-red -->
						<ins class="adsbygoogle"
							 style="display:inline-block;width:336px;height:280px"
							 data-ad-client="ca-pub-2642708445471409"
							 data-ad-slot="3618946282"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>';

                break;

            default:
                $code = '';
                break;
        }
    }
    return $code;
}

function getHrefLang()
{
    $array = array("afrikaans" => "af", "albanian" => "sq", "amharic" => "am", "arabic" => "ar", "armenian" => "hy", "azerbaijani" => "az", "basque" => "eu", "belarusian" => "be", "bengali" => "bn", "bosnian" => "bs", "bulgarian" => "bg", "catalan" => "ca", "cebuano" => "ceb", "chichewa" => "ny", "chinese" => "zh-CN", "corsican" => "co", "croatian" => "hr", "czech" => "cs", "danish" => "da", "dutch" => "nl", "esperanto" => "eo", "estonian" => "et", "filipino" => "tl", "finnish" => "fi", "french" => "fr", "frisian" => "fy", "galician" => "gl", "georgian" => "ka", "german" => "de", "greek" => "el", "gujarati" => "gu", "haitian" => "ht", "hausa" => "ha", "hawaiian" => "haw", "hebrew" => "iw", "hindi" => "hi", "hmong" => "hmn", "hungarian" => "hu", "icelandic" => "is", "igbo" => "ig", "indonesian" => "id", "irish" => "ga", "italian" => "it", "japanese" => "ja", "javanese" => "jw", "kannada" => "kn", "kazakh" => "kk", "khmer" => "km", "korean" => "ko", "kurmanji" => "ku", "kyrgyz" => "ky", "lao" => "lo", "latin" => "la", "latvian" => "lv", "lithuanian" => "lt", "luxembourgish" => "lb", "macedonian" => "mk", "malagasy" => "mg", "malay" => "ms", "malayalam" => "ml", "maltese" => "mt", "maori" => "mi", "marathi" => "mr", "mongolian" => "mn", "burmese" => "my", "nepali" => "ne", "norwegian" => "no", "pashto" => "ps", "persian" => "fa", "polish" => "pl", "portuguese" => "pt", "punjabi" => "pa", "romanian" => "ro", "russian" => "ru", "samoan" => "sm", "scots-gaelic" => "gd", "serbian" => "sr", "sesotho" => "st", "shona" => "sn", "sindhi" => "sd", "sinhala" => "si", "slovak" => "sk", "slovenian" => "sl", "somali" => "so", "spanish" => "es", "sundanese" => "su", "swahili" => "sw", "swedish" => "sv", "tajik" => "tg", "tamil" => "ta", "telugu" => "te", "thai" => "th", "turkish" => "tr", "ukrainian" => "uk", "urdu" => "ur", "uzbek" => "uz", "vietnamese" => "vi", "welsh" => "cy", "xhosa" => "xh", "yiddish" => "yi", "yoruba" => "yo", "zulu" => "zu");

    $lang = getLang();
    if ($array[$lang]) {
        return $array[$lang];
    }

    return 'en';
}

function getHrefLang2()
{

    $lang_by_url = array(
        'www.bdword.com',
        'www.english-arabic.org',
        'www.english-gujarati.com',
        'www.english-hindi.net',
        'www.english-kannada.com',
        'www.english-malay.net',
        'www.english-marathi.net',
        'www.english-nepali.com',
        'www.english-punjabi.net',
        'www.english-tamil.net',
        'www.english-telugu.net',
        'www.english-thai.net',
        'www.english-welsh.net'
    );

    $array = array("afrikaans" => "af", "albanian" => "sq", "amharic" => "am", "arabic" => "ar", "armenian" => "hy", "azerbaijani" => "az", "basque" => "eu", "belarusian" => "be", "bengali" => "bn", "bosnian" => "bs", "bulgarian" => "bg", "catalan" => "ca", "cebuano" => "ceb", "chichewa" => "ny", "chinese" => "zh-CN", "corsican" => "co", "croatian" => "hr", "czech" => "cs", "danish" => "da", "dutch" => "nl", "esperanto" => "eo", "estonian" => "et", "filipino" => "tl", "finnish" => "fi", "french" => "fr", "frisian" => "fy", "galician" => "gl", "georgian" => "ka", "german" => "de", "greek" => "el", "gujarati" => "gu", "haitian" => "ht", "hausa" => "ha", "hawaiian" => "haw", "hebrew" => "iw", "hindi" => "hi", "hmong" => "hmn", "hungarian" => "hu", "icelandic" => "is", "igbo" => "ig", "indonesian" => "id", "irish" => "ga", "italian" => "it", "japanese" => "ja", "javanese" => "jw", "kannada" => "kn", "kazakh" => "kk", "khmer" => "km", "korean" => "ko", "kurmanji" => "ku", "kyrgyz" => "ky", "lao" => "lo", "latin" => "la", "latvian" => "lv", "lithuanian" => "lt", "luxembourgish" => "lb", "macedonian" => "mk", "malagasy" => "mg", "malay" => "ms", "malayalam" => "ml", "maltese" => "mt", "maori" => "mi", "marathi" => "mr", "mongolian" => "mn", "burmese" => "my", "nepali" => "ne", "norwegian" => "no", "pashto" => "ps", "persian" => "fa", "polish" => "pl", "portuguese" => "pt", "punjabi" => "pa", "romanian" => "ro", "russian" => "ru", "samoan" => "sm", "scots-gaelic" => "gd", "serbian" => "sr", "sesotho" => "st", "shona" => "sn", "sindhi" => "sd", "sinhala" => "si", "slovak" => "sk", "slovenian" => "sl", "somali" => "so", "spanish" => "es", "sundanese" => "su", "swahili" => "sw", "swedish" => "sv", "tajik" => "tg", "tamil" => "ta", "telugu" => "te", "thai" => "th", "turkish" => "tr", "ukrainian" => "uk", "urdu" => "ur", "uzbek" => "uz", "vietnamese" => "vi", "welsh" => "cy", "xhosa" => "xh", "yiddish" => "yi", "yoruba" => "yo", "zulu" => "zu");

    $lang = getLang();
    $url = base_url();
    if ($array[$lang] && !in_array($_SERVER['HTTP_HOST'], $lang_by_url)) {
        return '<link rel="alternate" href="' . $url . '" hreflang="' . $array[$lang] . '" />';
    }

    return '';
}

function googleSiteVerify()
{
    $lang = getLang();
    $webmaster_id = array(
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



function inWordList($q, $lang)
{
    //connect();
    $mquery = mysqli_query($conn, "select " . $lang . " from lang where word='" . $q . "' limit 1");

    if (mysqli_num_rows($mquery) > 0) {
        return true;
    } else {
        return false;
    }

}

function activeIndex($q)
{

}

function getData($q, $type)
{

//connectWithCharSet();

    $q = trim(mysqli_real_escape_string($conn, $q));
    $lang = getLang();
    $type = trim(mysql_real_escape_string($conn, $type));

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
        $sql = "select word, " . $lang . ", id, data from word_frame where word='" . $q . "' limit 1";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);

        $id = $row['id'];
        $data = json_decode($row['data']);
        $mean = json_decode($row[$lang]);


        if ($lang == 'bengali') {
            $img_check = mysqli_num_rows(mysql_query($conn, "select word from img_words where word='" . $q . "' limit 1"));
            if ($img_check) {
                $data->img = $q;
            }
        }

        $related_query = mysqli_query($conn, "select variant from variants where word='" . $q . "'");
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

function findDevice()
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

function PageCreator($conn, $perPage, $tableName, $pageName, $lang, $base_url)
{
		if (!empty($argv[2])) {
			$_GET['page'] = $argv[2];
		}
    //connectWithCharSet();

    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $startAt = $perPage * ($page - 1);

    $query = "SELECT COUNT(*) as total FROM $tableName";
    $r = mysqli_fetch_assoc(mysqli_query($conn, $query));

    $totalPages = ceil($r['total'] / $perPage);

    $links = '<div class="pagination">';

    for ($i = 1; $i <= $totalPages; $i++) {
        $links .= ($i != $page)
		? "<a href='".$base_url."english-to-". $lang."-dictionary-learn-translations-page-".$i."'>$i</a>"
            : "<a class='active'>$page</a>";
    }

    $links .= '</div>';

    $query = "SELECT * FROM $tableName
	ORDER BY id DESC LIMIT $startAt, $perPage";

    $r = mysqli_query($conn, $query);

    $pageContent = '<legend><h1>Learn Common 500+ Translations PAGE #' . $page . '</h1></legend>';


    $pageContent .= '<div class="fieldset_body inner_details">';
    if ($page > 1) {
        $pageContent .= '<button class="btn_pre bdr_radius2"><a class="" href="' . $base_url. 'english-to-' . $lang .'-dictionary-learn-translations-page-' . ($page - 1) . '">← Previous</a></button>';
    }
    if ($page < $totalPages) {
        $pageContent .= '<button class="btn_next bdr_radius2"><a class="" href="' . $base_url. 'english-to-' . $lang .'-dictionary-learn-translations-page-' . ($page + 1) . '">Next →</a></button>';
    }
    //$pageContent .= '<div style="clear: both;">&nbsp;</div>';
    //$pageContent .= '</div>';

    while ($row = mysqli_fetch_assoc($r)) {
        $pageContent .= "<span><div class='label_font'>" . $row['id'] . ". " . $row['sentence'] . " :</div> " . $row['trans'] . "</span>";
    }

    $pageContent .= '</div>';

    $pageContent .= $links;

    return $pageContent;

}

function PageShortIntro($limit, $tableName, $pageName, $infoTitle, $conn, $base_url, $lang)
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
    $content .= '</div><button class="btn_default5 bdr_radius2"><a href="' . $base_url.'english-to-' . $lang.'-dictionary-learn-translations'. '">More</a></button>';

    return $content;
}

function GetAllTopics($pageName, $activeTopic)
{
    //connect();
    $query = mysqli_query($conn, 'select distinct topic from TopicWiseWords');
    $topics = '';
    while ($row = mysqli_fetch_assoc($query)) {
        $topics .= '<a class="btn btn-raised ' . (($activeTopic != $row['topic']) ? '' : 'btn-primary') . '" href="' . $pageName . '?topic=' . $row['topic'] . '">' . $row['topic'] . '</a>&nbsp;&nbsp;';
    }
    return $topics . '<hr>';
}

function TopicWiseWords($perPage, $tableName, $pageName, $topic)
{

    //connect();

    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $startAt = $perPage * ($page - 1);

    $query = "SELECT COUNT(*) as total FROM $tableName WHERE topic='" . $topic . "'";
    $r = mysqli_fetch_assoc(mysqli_query($conn, $query));

    $totalPages = ceil($r['total'] / $perPage);

    $links = '<ul class="pagination">';

    for ($i = 1; $i <= $totalPages; $i++) {
        $links .= ($i != $page)
            ? "<li><a href='$pageName?page=$i&topic=$topic'>$i</a></li>"
            : "<li class='active'><a>Page $page</a></li>";
    }

    $links .= '</ul>';

    $query = "SELECT * FROM $tableName WHERE topic='" . $topic . "' ORDER BY id ASC LIMIT $startAt, $perPage";

    $r = mysqli_query($conn, $query);

    $pageContent = '<h3><b>' . $topic . ':: PAGE #' . $page . '</b></h3><hr>';


    $pageContent .= '<div>';
    if ($page > 1) {
        $pageContent .= '<a class="btn btn-raised btn-primary pull-left" href="' . $pageName . '?page=' . ($page - 1) . '&topic=' . $topic . '">Previous</a>';
    }
    if ($page < $totalPages) {
        $pageContent .= '<a class="btn btn-raised btn-primary pull-right" href="' . $pageName . '?page=' . ($page + 1) . '&topic=' . $topic . '">Next</a>';
    }
    $pageContent .= '<div style="clear: both;">&nbsp;</div>';
    $pageContent .= '</div>';
    $i = ($page * $perPage) - $perPage;
    while ($row = mysqli_fetch_assoc($r)) {
        $i++;
        $pageContent .= '<div style="font-size:18px;cursor:pointer;" onclick="show_meaning(\'' . $row['word'] . '\')">' . $i . '. ' . $row['word'] . '</div><hr>';
    }

    $pageContent .= $links;

    return $pageContent;

}

function Common3000Words($perPage, $tableName, $pageName, $topic)
{

    //connect();

    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $startAt = $perPage * ($page - 1);

    $query = "SELECT COUNT(*) as total FROM `$tableName` WHERE topic='" . $topic . "'";
    $r = mysqli_fetch_assoc(mysqli_query($conn, $query));

    $totalPages = ceil($r['total'] / $perPage);

    $links = '<ul class="pagination">';

    for ($i = 1; $i <= $totalPages; $i++) {
        $links .= ($i != $page)
            ? "<li><a href='$pageName?page=$i&topic=$topic'>$i</a></li>"
            : "<li class='active'><a>Page $page</a></li>";
    }

    $links .= '</ul>';

    $query = "SELECT * FROM `$tableName` WHERE topic='" . $topic . "' ORDER BY id ASC LIMIT $startAt, $perPage";

    $r = mysqli_query($conn, $query);

    $pageContent = '<h3><b>' . $topic . ':: PAGE #' . $page . '</b></h3><hr>';


    $pageContent .= '<div>';
    if ($page > 1) {
        $pageContent .= '<a class="btn btn-raised btn-primary pull-left" href="' . $pageName . '?page=' . ($page - 1) . '&topic=' . $topic . '">Previous</a>';
    }
    if ($page < $totalPages) {
        $pageContent .= '<a class="btn btn-raised btn-primary pull-right" href="' . $pageName . '?page=' . ($page + 1) . '&topic=' . $topic . '">Next</a>';
    }
    $pageContent .= '<div style="clear: both;">&nbsp;</div>';
    $pageContent .= '</div>';
    $i = ($page * $perPage) - $perPage;
    while ($row = mysqli_fetch_assoc($r)) {
        $i++;
        $pageContent .= '<div style="font-size:18px;cursor:pointer;" onclick="show_meaning(\'' . $row['word'] . '\')">' . $i . '. ' . $row['word'] . '</div><hr>';
    }

    $pageContent .= $links;

    return $pageContent;

}

function Common3000WordsShort($pageName, $activeTopic)
{
    //connect();
    $query = mysqli_query($conn, 'select distinct topic from `3000`');
    $topics = '';
    while ($row = mysqli_fetch_assoc($query)) {
        $topics .= '<a class="btn btn-raised ' . (($activeTopic != $row['topic']) ? '' : 'btn-primary') . '" href="' . $pageName . '?topic=' . $row['topic'] . '">' . $row['topic'] . '</a>&nbsp;&nbsp;';
    }
    return $topics . '<hr>';
}

function getGrammar($conn)
{
	$base_url = 'https://'.array_search($_GET['lang'],getLanguageArray()) . '/';
    $content = '';
    //connect();

    $sql = 'select id,title,data from blogs where cat=2';

    $get_blogs = mysqli_query($conn, $sql);


    while ($blog_row = mysqli_fetch_assoc($get_blogs)) {
        $url_title = str_replace(' ', '-', strtolower($blog_row['title']));
		$content .= '<a title="' . $blog_row['title'] . '" href="' . $base_url . 'english-to-'.$_GET['lang'].'-dictionary-grammar-' . $url_title . '"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="https://content2.mcqstudy.com/bw-static-files/img/direction_arrow2.png" width="22" height="22" alt="icon"><span>' . ucwords(strtolower($blog_row['title'])) . '</span></a>';
    }

    return $content;
}

function CommonGREWords($perPage, $tableName, $pageName, $topic)
{

    //connect();

    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $startAt = $perPage * ($page - 1);

    $query = "SELECT COUNT(*) as total FROM `$tableName` WHERE topic='" . $topic . "'";
    $r = mysqli_fetch_assoc(mysqli_query($conn, $query));

    $totalPages = ceil($r['total'] / $perPage);

    $links = '<ul class="pagination">';

    for ($i = 1; $i <= $totalPages; $i++) {
        $links .= ($i != $page)
            ? "<li><a href='$pageName?page=$i&topic=$topic'>$i</a></li>"
            : "<li class='active'><a>Page $page</a></li>";
    }

    $links .= '</ul>';

    $query = "SELECT * FROM `$tableName` WHERE topic='" . $topic . "' ORDER BY id ASC LIMIT $startAt, $perPage";

    $r = mysqli_query($conn, $query);

    $pageContent = '<h3><b>' . $topic . ':: PAGE #' . $page . '</b></h3><hr>';


    $pageContent .= '<div>';
    if ($page > 1) {
        $pageContent .= '<a class="btn btn-raised btn-primary pull-left" href="' . $pageName . '?page=' . ($page - 1) . '&topic=' . $topic . '">Previous</a>';
    }
    if ($page < $totalPages) {
        $pageContent .= '<a class="btn btn-raised btn-primary pull-right" href="' . $pageName . '?page=' . ($page + 1) . '&topic=' . $topic . '">Next</a>';
    }
    $pageContent .= '<div style="clear: both;">&nbsp;</div>';
    $pageContent .= '</div>';
    $i = ($page * $perPage) - $perPage;
    while ($row = mysqli_fetch_assoc($r)) {
        $i++;
        $pageContent .= '<div style="font-size:18px;cursor:pointer;" onclick="show_meaning(\'' . $row['word'] . '\')">' . $i . '. ' . $row['word'] . '</div><hr>';
    }

    $pageContent .= $links;

    return $pageContent;

}

function CommonGREWordsShort($pageName, $activeTopic)
{
    //connect();
    $query = mysqli_query($conn, 'select distinct topic from `3000`');
    $topics = '';
    while ($row = mysqli_fetch_assoc($query)) {
        $topics .= '<a class="btn btn-raised ' . (($activeTopic != $row['topic']) ? '' : 'btn-primary') . '" href="' . $pageName . '?topic=' . $row['topic'] . '">' . $row['topic'] . '</a>&nbsp;&nbsp;';
    }
    return $topics . '<hr>';
}

function getCountryBySite()
{
	$mainUrl = array_search($_GET['lang'],getLanguageArray());
    $lang_by_url = array(
        'afrikaans.english-dictionary.help' => 'Central African Republic',
        'albanian.english-dictionary.help' => 'Albania',
//        'amharic.english-dictionary.help' => 'Amharic',
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
//        'croatian.english-dictionary.help' => 'croatian',
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
//        'hausa.english-dictionary.help' => 'hausa',
//        'hawaiian.english-dictionary.help' => 'hawaiian',
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
//        'khmer.english-dictionary.help' => 'khmer',
        'korean.english-dictionary.help' => 'North Korea',
//        'kurmanji.english-dictionary.help' => 'kurmanji',
        'kyrgyz.english-dictionary.help' => 'Kyrgyzstan',
        'lao.english-dictionary.help' => 'Laos',
        'latin.english-dictionary.help' => 'Mexico',
//        'latvian.english-dictionary.help' => 'latvian',
        'lithuanian.english-dictionary.help' => 'Lithuania',
        'luxembourgish.english-dictionary.help' => 'Luxembourg',
        'macedonian.english-dictionary.help' => 'Macedonia',
        'malagasy.english-dictionary.help' => 'Madagascar',
        'maltese.english-dictionary.help' => 'Malta',
        'maori.english-dictionary.help' => 'New Zealand',
        'mongolian.english-dictionary.help' => 'Mongolia',
//        'burmese.english-dictionary.help' => 'burmese',
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
//        'yiddish.english-dictionary.help' => 'yiddish',
        'yoruba.english-dictionary.help' => 'Nigeria',
        'zulu.english-dictionary.help' => 'South Africa',
        'www.english-thai.net' => 'Thailand',
//        'www.english-welsh.net' => 'welsh',
//        'www.english-arabic.org' => 'arabic',
        'www.english-malay.net' => 'Malaysia',
        'www.english-nepali.com' => 'Nepal',
    );
	
	if (array_key_exists($mainUrl, $lang_by_url)) {
		return $lang_by_url[$mainUrl];
	}  
}

function getCanonicalLink($conn, $sn, $lang, $base_url, $q)
{
    switch ($sn) {

        case 'index':

            $url = $base_url;

            if ($q) {
                if (preg_match("/^[a-z]$/", strtolower($q[0]))) {
                    $url = $base_url . 'english-to-' . $lang . '-meaning-' . $q;
                } else {
                    $url = $base_url . '' . $lang . '-to-english-meaning-' . $q;
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
            $url = $base_url . 'english-to-'. $lang . '-dictionary-about-us';
            break;

        case 'browse':
            $url = $base_url . 'browse-words';
            break;

        case 'contact-us':
            $url = $base_url . 'english-to-'. $lang.'-dictionary-contact-us';
            break;

        case 'disclaimer':
            $url = $base_url . 'english-to-'. $lang .'-dictionary-disclaimer';
            break;

        case 'error':
            $url = $base_url . 'browse-words';
            break;

        case 'learn-ten-words-everyday':
            $url = $base_url . 'english-to-'. $lang .'-dictionary-learn-ten-words-everyday';
			
			if(!empty($_GET['season'])){
			$url = $base_url . 'english-to-'. $lang .'-dictionary-learn-ten-words-everyday-season-'. $_GET['season'];	
			}
			if(!empty($_GET['episode']) && !empty($_GET['season'])){
			$url = $base_url . 'english-to-'. $lang .'-dictionary-learn-ten-words-everyday-season-'. $_GET['season'].'-episode-'. $_GET['episode'];		
			}
            break;

        case 'learning-materials':
            $url = $base_url . 'learning-materials';
            break;

        case 'privacy':
            $url = $base_url . 'english-to-'. $lang .'-dictionary-privacy';
            break;

        case 'read-text':	
            $url = $base_url . 'english-to-'. strtolower($lang).'-read-text-with-translation';
            break;
			
		case 'learn-prepositions-by-photos':	
            $url = $base_url . 'english-to-'. $lang .'-dictionary-learn-prepositions';
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
             $url = $base_url . 'english-to-'. $lang .'-dictionary-vocabulary-game';
			
			if(!empty($_GET['season'])){
			$url = $base_url . 'english-to-'. $lang .'-dictionary-vocabulary-game-season-'. $_GET['season'];	
			}
			if(!empty($_GET['episode']) && !empty($_GET['season'])){
			$url = $base_url . 'english-to-'. $lang .'-dictionary-vocabulary-game-season-'. $_GET['season'].'-episode-'. $_GET['episode'];		
			}
            break;


		case 'blank-quiz':
            $url = $base_url . 'english-to-'. $lang.'-dictionary-fill-in-the-blanks-page-'. $_GET['page'];
            break;

        case 'favourite-words':
            $url = $base_url . 'english-to-'. $lang .'-dictionary-favourite-words';
            break;

        case 'search_history':
            $url = $base_url . 'english-to-'. $lang .'-dictionary-search-history';
            break;

        case 'learn-common-translations':
            $url = $base_url . 'english-to-'. $lang .'-dictionary-learn-translations';
			
			if(isset($_GET['page'])){
			$url = $base_url . 'english-to-'. $lang .'-dictionary-learn-translations-page-'.$_GET['page'];	
			}
            break;

        case 'topic-wise-words':
			$url = $base_url . 'english-to-'. $lang.'-dictionary-topic-wise-words-'. $_GET['topic'];

			if(!empty($_GET['topic']) && !empty($_GET['page'])){
			$url = $base_url . 'english-to-'. $lang .'-dictionary-topic-wise-words-'. $_GET['topic'].'-page-'. $_GET['page'];		
			}
            break;

        case 'learn-3000-plus-common-words':
            $url = $base_url . 'english-to-'. $lang.'-dictionary-learn-3000-plus-common-words';
			
			if(!empty($_GET['topic'])){
			$url = $base_url . 'english-to-'. $lang .'-dictionary-learn-3000-plus-common-words-'. $_GET['topic'];	
			}
			if(!empty($_GET['topic']) && !empty($_GET['page'])){
			$url = $base_url . 'english-to-'. $lang .'-dictionary-learn-3000-plus-common-words-'. $_GET['topic'].'-page-'. $_GET['page'];		
			}
			
            break;

        case 'learn-common-gre-words':
           $url = $base_url . 'english-to-'. $lang.'-dictionary-learn-common-gre-words';
			
			if(!empty($_GET['topic'])){
			$url = $base_url . 'english-to-'. $lang .'-dictionary-learn-common-gre-words-'. $_GET['topic'];	
			}
			if(!empty($_GET['topic']) && !empty($_GET['page'])){
			$url = $base_url . 'english-to-'. $lang .'-dictionary-learn-common-gre-words-'. $_GET['topic'].'-page-'. $_GET['page'];		
			}
			
            break;

		case 'post':
            $url = $base_url . 'english-to-'. $lang .'-dictionary-grammar-'. $_GET['title'];
            break;
			
		case 'blogs':
            $url = $base_url . 'english-to-'. $lang .'-dictionary-browse-all-blogs';
            break;
			
		case 'commonly-confused-words':
            $url = $base_url . 'english-to-'. $lang .'-dictionary-commonly-confused-words';
            break;
			
		case 'form-of-verbs':
            $url = $base_url . 'english-to-'. $lang .'-dictionary-form-of-verbs';
            break;
			
		case '300-plus-toefl-words':
            $url = $base_url . 'english-to-'. $lang .'-dictionary-300-plus-toefl-words';
            break;
			
		case 'browse-words':
           $url = $base_url . 'browse-'. $lang .'-to-english-words';
			
			if(!empty($_GET['word'])){
			$url = $base_url . 'browse-'. $lang .'-to-english-word-'. $_GET['word'];
			}
		
			if(!empty($_GET['start_with'])){
			$url = $base_url . 'browse-'. $lang .'-to-english-two-word-'. $_GET['start_with'];
			}
			
            break;

        default:
            $url = $base_url;
            break;
    }

    return strtolower(str_replace(' ', '-', $url));

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
        $adCodeArray['300'] = '<div style="height:250px !important; background:#ccc;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
	
	if(empty($q)){
		return false;
	}
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

function getAutoAd($isWordBanned)
{

    $str = '';

    if ($isWordBanned == false) {
        $str = '<script data-ad-client="ca-pub-2642708445471409" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>';
    }

    return $str;
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