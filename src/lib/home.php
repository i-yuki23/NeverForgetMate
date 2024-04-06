<?php
require __DIR__ . '/../api/getPlaceInfo.php';

function getHomeInformation($homeName) {
    $homeInfo = getPlaceInfo($homeName);
    if (!empty($homeInfo['candidates'])) {
        $candidate = $homeInfo['candidates'][0];
        $homeName = $candidate['name'];
        $homeAddress = $candidate['formatted_address'];
        $geometry = $candidate['geometry'];

        // JSONでJavaScriptに渡すためのデータ
        $homeData = json_encode([
            'center' => $geometry['location'],
            'viewport' => $geometry['viewport']
        ]);

        // HTMLの生成
        $html = "<h2>Home</h2>
        <p>Name: $homeName</p>
        <p>Address: $homeAddress</p>
        <script>
        var homeData = $homeData;
        </script>";

        return $html;
    } else {
        return "<p>Home information could not be retrieved.</p>";
    }
}
