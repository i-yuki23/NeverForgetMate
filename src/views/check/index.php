<a href="/location">Register Location</a>
<form action="/check/create" id="checkButton" method="post">
    <label for="isInside">Check if you are in this location:</label>
    <button id="checkButton" name="isInside">Check</button>
</form>

<p id="demo"></p>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
    <p>Registered Address:</p>
    <?php echo $userLocationInfo['address']; ?>
<?php endif; ?>

<script src="js/geolocation.js"></script>
<script src="js/loopCheckIfInsideHome.js"></script>

