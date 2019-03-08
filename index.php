<?php
// With the help of https://phpocean.com/tutorials/back-end/how-to-start-your-own-php-mvc-framework-in-4-steps/28
$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';

switch($url[0]){
    case 'financement': 
        require_once "./controllers/controller_financement.php";
        break;
    case 'selection':
        require_once "./controllers/selection.php";
        break;
    case 'acceuil':
    default:
        require_once "./controllers/controller_accueil.php";
        break;
}

?>