<?php
define('DOC_TITLE', "Sélection");
include "./views/shared/_header.php";

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';
switch($url[0]){
    case 'financement': 
        require_once "./controllers/controleur_financement.php";
        break;
    case "images":
        $image = glob($_SERVER['PATH_INFO']);
        echo '<img src="' . $image . '"/>';
        break;
    case 'selection':
        require_once "./controllers/selection.php";
        break;
    case 'acceuil':
    default:
        require_once "./controllers/controller_accueil.php";
        break;
}
include "./views/shared/_footer.php";
?>