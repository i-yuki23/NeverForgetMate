<form action="/location/create" id="locationForm" method="post">
    <label for="locationName">Location Name:</label>
    <input type="text" id="locationName" name="locationName" required>
    <input type="submit" value="Submit">
</form>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
    <?php echo $homeInformation; ?>
<?php endif; ?>