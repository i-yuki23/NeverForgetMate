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
            <a href="/">NeverForgetMate</a>
        </h1>
    </header>
    <div>
        <?php echo $content; ?>
    </div>
</body>
</html>