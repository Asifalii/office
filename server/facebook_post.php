<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once('./v5/connect.php');
define('FACEBOOK_SDK_V4_SRC_DIR', 'php-graph-sdk-5.x/src/Facebook/');
require_once('php-graph-sdk-5.x/src/Facebook/autoload.php');

$appId = '417536082670584';
$appSecret = '2a0ff3454162d9222dd1e6771ecb0ef3';
$pageId = '101421988661755';
$userAccessToken = 'EAAF7vzHjcZCgBAO8Kx2ZBnOZBcnarZBr64VZAE97vx7Ua6col4b9m3rZB1ZASrfr89jJI6gnFNQzxVLlxKKHFs4D7J75dlGreNQKpSC8fVN0LnpUHBqgvUagZBQ85VKprFCZA2cZBjsEORbKpbCjPLcZBZBmOUUoGwrttWWZBU4xd3n9agwZDZD';

$fb = new Facebook\Facebook([
    'app_id' => $appId,
    'app_secret' => $appSecret,
    'default_graph_version' => 'v2.5'
]);

$longLivedToken = $fb->getOAuth2Client()->getLongLivedAccessToken($userAccessToken);

$fb->setDefaultAccessToken($longLivedToken);

$response = $fb->sendRequest('GET', $pageId, ['fields' => 'access_token'])
    ->getDecodedBody();

$foreverPageAccessToken = $response['access_token'];

$fb = new Facebook\Facebook([
    'app_id' => $appId,
    'app_secret' => $appSecret,
    'default_graph_version' => 'v2.5'
]);


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

$lang = getLang();
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/learn-3000-plus-common-words.php';

$sql = "SELECT * FROM `3000` WHERE status = 0 LIMIT 5";
$query = mysqli_query($conn, $sql);
$mean = array();

while ($r = mysqli_fetch_assoc($query)) {
    $id[] = $r['id'];
    $words[] = $r['word'];
    $mean[strtolower($r['word'])]['word'] = $r['word'];
    $mean[strtolower($r['word'])]['sentence'] = $r['exmp'];
}

$query = mysqli_query($conn, "select `" . $lang . "` as mean, word from v3_word_mean where word in ('" . implode("','", $words) . "')");
while ($row = mysqli_fetch_assoc($query)) {
    $mean[$row['word']]['meaning'] = $row['mean'];
}

$updateQuery = "UPDATE `3000` SET status = 1 where id in (" . implode(",", $id) . ")";


if (mysqli_query($conn, $updateQuery)) {
    if (!empty($mean)) {
        $message = 'English To ' . ucfirst($lang) . ' Meaning' . chr(10) . '' . chr(10);

        foreach ($mean as $item) {
            $message .= ucfirst($item['word']) . ' (' . $item['meaning'] . ') :: ' . $item['sentence'] . chr(10);
        }
    }

    $fb->setDefaultAccessToken($foreverPageAccessToken);
    $fb->sendRequest('POST', "$pageId/feed", [
        'message' => $message,
    ]);

} else {
    echo "Error updating record: " . mysqli_error($conn);
}


?>