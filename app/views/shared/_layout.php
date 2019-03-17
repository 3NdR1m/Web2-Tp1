<!DOCTYPE html>
<html lang="fr-CA">
<head>
    <meta charset="utf-8">
    <title><?php echo DOC_TITLE; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
    <header>
        <h1>Rent<span>car</span></h1>
        <p>Vendeur de voiture par excellence depuis 1989!</p>
    </header>
    <main>
    <?php include_once './views/'.VIEW; ?>
    </main>
    <footer>
        Copyright © Rent Car <?php echo date("Y"); ?>
    </footer>
</body>
</html>