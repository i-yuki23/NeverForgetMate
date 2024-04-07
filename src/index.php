<?php
require __DIR__ . '/lib/home.php';
?>
<!DOCTYPE html>
<html>
<body>
<h1>NeverForgetMate</h1>
<form id="locationForm" method="post">
    <label for="locationName">Location Name:</label>
    <input type="text" id="locationName" name="locationName" required>
    <input type="submit" value="Submit">
</form>

<label for="isInside">Check if you are in this location:</label>
<button id="checkButton" name="isInside">Check</button>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
    <?php $locationName = htmlspecialchars($_POST['locationName']);?>
    <?php echo getHomeInformation($locationName); ?>
<?php endif; ?>

<p id="demo"></p>
<script src="js/geolocation.js"></script>
<script src="js/loopCheckIfInsideHome.js"></script>
</body>
</html>
