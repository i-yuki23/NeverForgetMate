<!-- <a href="/location">Register Location</a> -->
<form action="/top/registerLocation" id="locationForm" method="post">
    <label for="locationName">Register Your Location:</label>
    <input type="text" id="locationName" name="locationName" required>
    <input type="submit" value="Register">
</form>
<label for="isInside">Check if you are in this location:</label>
<button name="isInside" class="js-check-button">Check</button>
<p>Registered Address:</p>
<?php echo $userLocationInfo['address']; ?>
<script>var homeData = <?php echo json_encode($userLocationInfo); ?>;</script>
<p id="demo"></p>
<script src="/js/checkIfInsideHome.js"></script>
