<a href="/location">Register Location</a>
<form action="/check/create" method="post">
    <label for="isInside">Check if you are in this location:</label>
    <button name="isInside">Fetch</button>
</form>

<p id="demo"></p>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
    <p>Registered Address:</p>
    <?php echo $userLocationInfo['address']; ?>
    <script>var homeData = <?php echo json_encode($userLocationInfo); ?>;</script>
    <script>console.log(homeData);</script>
<?php endif; ?>
<button class="js-check-button">Check</button>
<script src="/js/geolocation.js"></script>
<script src="/js/loopCheckIfInsideHome.js"></script>

