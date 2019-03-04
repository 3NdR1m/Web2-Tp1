<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Selection</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css">
    <script src="main.js"></script>
</head>
<body>
    <?php foreach ($model_list as $key => $car): ?>
        <h1>
            <?php echo $car["description"] ?>
        </h1>
    <?php endforeach?>
</body>
</html>