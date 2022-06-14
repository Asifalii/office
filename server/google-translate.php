<?php

$clientId = "116640817185410383080";
$clientSecret = "0a35f6b6c4c1ba6e814ac0417cbc8dbe3855bdb0";
$clientRedirectURL = "https://server2.mcqstudy.com/google-translate.php";
$login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/cloud-translation') . '&redirect_uri=' . urlencode($clientRedirectURL) . '&response_type=code&client_id=' . $clientId . '&access_type=online';

if (!isset($_GET['code'])){
    header("location: $login_url");
} else {
    $code = filter_var($_GET['code'], FILTER_SANITIZE_STRING);  
    $curlGet = '?client_id=' . $clientId . '&client_secret=' . $clientSecret . '&code='. $code . '&grant_type=authorization_code';
    $url = 'https://www.googleapis.com/oauth2/v4/token' . $curlGet;

    $ch = curl_init($url);      
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        
    curl_setopt($ch, CURLOPT_POST, 1);      
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $data = curl_exec($ch); 
    $data = json_decode($data, true);   
    curl_close($ch);

    $accessToken = $data['access_token'];
    $apiKey = "AIzaSyBwnv4uzptqdefMpsNIUGIFXW8G_sO-i3w";
    $projectID = "dictupdate";

    $target = "https://translation.googleapis.com/v3/projects/$projectID:translateText?key=$apiKey";

    $headers = array( 
        "Content-Type: application/json; charset=utf-8", 
        "Authorization: Bearer " . $accessToken,
        "x-goog-encode-response-if-executable: base64",
        "Accept-language: en-US,en;q=0.9,es;q=0.8"
    );

    $requestBody = array();
    $requestBody['sourceLanguageCode'] = "en";
    $requestBody['targetLanguageCode'] = "bn";
    $requestBody['contents'] = array("intentionally");
    $requestBody['mimeType'] = "text/plain";

    $ch = curl_init($target);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestBody)); 
    $data = curl_exec($ch);

    curl_close($ch);
    echo $data;
}