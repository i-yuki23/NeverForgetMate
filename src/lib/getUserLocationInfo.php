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
