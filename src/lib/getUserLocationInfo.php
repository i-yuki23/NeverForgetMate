<?php
require __DIR__ . '/../api/getPlaceInfo.php';

function getUserLocationInfo($placeName) {
    $placeInfo = getPlaceInfo($placeName);
    if (!empty($placeInfo['candidates'])) {
        $candidate = $placeInfo['candidates'][0];              // extract the first candidate
        // $homeName = $candidate['name'];
        $geometry = $candidate['geometry'];
        $userLocationInfo = [
            'address' => $candidate['formatted_address'],
            'southwest_lat' => $geometry['viewport']['southwest']['lat'],
            'southwest_lng' => $geometry['viewport']['southwest']['lng'],
            'northeast_lat' => $geometry['viewport']['northeast']['lat'],
            'northeast_lng' => $geometry['viewport']['northeast']['lng']
        ];

        return $userLocationInfo;
    } else {
        return [];
    }
}

// JSONでJavaScriptに渡すためのデータ
// $homeData = json_encode([
//     'center' => $geometry['location'],
//     'viewport' => $geometry['viewport']
// ]);


// HTMLの生成
// $html = "<p>Name: $homeName</p>
// <p>Address: $homeAddress</p>
// <p>$homeData</p>
// <script>
// var homeData = $homeData;
// </script>";