<?php
require __DIR__ . '/lib/home.php';

?>
<!DOCTYPE html>
<html>
<body>
<h1>NeverForgetMate</h1>
<p>Click the button to get your house coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<script src="js/geolocation.js"></script>

<?php echo getHomeInformation("東北大学ユニバーシティハウス青葉山"); ?>



</body>
</html>
