<!DOCTYPE html>
<head>
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <title>
        <?php if (isset($title)) : echo $title . ' - '; endif; ?>
        NeverForgetMate
    </title>
</head>
<body>
    <header>
        <h1>
            <a href="index.php">NeverForgetMate</a>
        </h1>
    </header>
    <div>
        <?php include $content; ?>
    </div>
</body>
</html>