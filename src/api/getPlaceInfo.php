<?php
require __DIR__ . '/../vendor/autoload.php';

function getPlaceInfo($searchQuery)
{
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->safeLoad();
    $googleCloudApiKey = $_ENV['GOOGLE_CLOUD_API_KEY'];
    
    $encodedApiKey = urlencode($googleCloudApiKey);
    $encodedSearchQuery = urlencode($searchQuery);
    $url = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json?fields=formatted_address%2Cname%2Cgeometry&input=" . $encodedSearchQuery . "&inputtype=textquery&key=" . $encodedApiKey;

    //cURLセッションを初期化する
    $ch = curl_init();

    //URLとオプションを指定する
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //URLの情報を取得する
    $res_json =  curl_exec($ch);
    $res_array = json_decode($res_json, true);

    return $res_array;
}