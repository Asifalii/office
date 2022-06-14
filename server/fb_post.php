<?php

require_once('./v5/connect.php');
define('FACEBOOK_SDK_V4_SRC_DIR', 'php-graph-sdk-5.x/src/Facebook/');
require_once('php-graph-sdk-5.x/src/Facebook/autoload.php');

$lang = array(
    'afrikaans' => '108578051288554',
    'albanian' => '112748357535091',
    'amharic' => '111658974311860',
    'armenian' => '105094081643920',
    'azerbaijani' => '104028731753219',
    'basque' => '105279001632084',
);

foreach ($lang as $key => $row) {

    $appId = '187727196179870';
    $appSecret = '2108a556999ee75ed17b51153532e4e5';
    $pageId = $row;
    $userAccessToken = 'EAACqvKTXzZA4BAGrwWaKvJZCrZBu6bxSuyFVz57cJu3ARIzQrjHqyYo7Wf8O0GrsVsYPpSs6MiHBsgETUKerfRvQyG0zs1aZCyVZAnJA2DhAj39VOOGcM7yL65njgHrRbrDo3O04ZBjqo8qZAjjXXsh88H0a4HjbwDUQOCFZCroH6QZDZD';
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
    $lang = $key;

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

}

$updateQuery = "UPDATE `3000` SET status = 1 where id in (" . implode(",", $id) . ")";

if (mysqli_query($conn, $updateQuery)) {
    echo 'Post done';
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

?>