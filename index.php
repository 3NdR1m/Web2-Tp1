<?php
include_once('./models/voitures.php');
$model = new Model();

function generateView() {
    include './views/shared/_layout.php';
}

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';

if(phpversion() < '7.3.1') {
    echo 'VOTTRE DISTRIBUTION PHP EST OBSOLETTE ( < 7.3.1 ).';
}

switch($url[0]){
    case 'financement': 
        include './controllers/financement.php';
        generateView();
        break;
    case 'images':
        echo '<img src="' . $_SERVER['PATH_INFO'] . '"/>';
        break;
    case 'selection':
        include './controllers/selection.php';
        generateView();
        break;
    case 'acceuil':
        include './controllers/accueil.php';
        generateView();
        break;
    default:
        header('location: acceuil');
        exit();
        break;
}


?>