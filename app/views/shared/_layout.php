<!DOCTYPE html>
<html lang="fr-CA">
<head>
    <meta charset="utf-8">
    <title><?php echo DOC_TITLE; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Benjamin Bergeron, Paul Lenoir, Jamie Zilio">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
    <header>
        <a href="accueil"><h1>Rent<span>car</span></h1></a>
        <p>Vendeur de voitures par excellence depuis 1989 !</p>
    </header>
    <main>
    <?php include_once './views/'.VIEW; ?>
    </main>
    <footer>
        Copyright © Rent Car <?php echo date("Y"); ?>
    </footer>
</body>
</html>