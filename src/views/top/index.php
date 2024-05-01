<form action="/top/registerLocation" id="locationForm" method="post">
    <label for="locationName">Register Your Location:</label>
    <input type="text" id="locationName" name="locationName" required>
    <input type="submit" value="Register">
</form>
<label for="isInside">Check if you are in this location:</label>
<button name="isInside" class="js-check-button">Check</button>
<form action="/top/registerTime" id="alertTimeForm" method="post">
    <label for="alertTime">Register Alert Time:</label>
    <input type="time" id="alertTime" name="alertTime" required>
    <input type="submit" value="Register">
</form>
<?php if (isset($userLocationInfo['address'])): ?>
    <p>Registered Address:</p>
    <?php echo $userLocationInfo['address']; ?>
<?php endif; ?>
<?php if (isset($userLocationInfo['alert_time'])): ?>
    <p>Registered Alert Time:</p>
    <?php echo $userLocationInfo['alert_time']; ?>
<?php endif; ?>
<script>var homeData = <?php echo json_encode($userLocationInfo); ?>;</script>
<p id="demo"></p>
<script src="/js/checkIfInsideHome.js"></script>
