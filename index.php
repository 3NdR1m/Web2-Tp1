<?php
include_once('./models/voitures.php');
$model = new Model();

function generateView() {
    include './views/shared/_layout.php';
}

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';

switch($url[0]){
    case 'financement': 
        include './controllers/financement.php';
        break;
    case 'images':
        echo '<img src="' . $_SERVER['PATH_INFO'] . '"/>';
        exit();
        break;
    case 'selection':
        include './controllers/selection.php';
        break;
    case 'acceuil':
        include './controllers/accueil.php';
        break;
    default:
        header('location: acceuil');
        break;
}

generateView();

?>