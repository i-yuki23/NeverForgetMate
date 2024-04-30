<a href="/location">Register Location</a>
<label for="isInside">Check if you are in this location:</label>
<button name="isInside" class="js-check-button">Check</button>

<p id="demo"></p>
<p>Registered Address:</p>
<?php echo $userLocationInfo['address']; ?>
<script>var homeData = <?php echo json_encode($userLocationInfo); ?>;</script>

<script src="/js/check.js"></script>

