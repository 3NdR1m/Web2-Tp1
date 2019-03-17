<?php
include_once('./models/voitures.php');

function invokeController(string $controller_name) {
    $controller_path = './controllers/' . $controller_name;
    if(!file_exists($controller_path)) {
        throw new Exception('Controller "'. $controller_path .'" does not exist', 1);
        die();
    }
    else {
        include $controller_path;
        include './views/shared/_layout.php';
    }
}
function echo_r($var) {
    echo "<pre>";
    print_r($var);
    echo"</pre>";
}

$url = isset($_GET['url']) ? explode('/', ltrim($_GET['url'],'/')) : '/';

if(phpversion() < '7.3.1') {
    echo 'VOTTRE DISTRIBUTION PHP EST OBSOLETTE ( < 7.3.1 ).';
}
switch($url[0]){
    case 'financement': 
        invokeController('financement.php');
        break;
    case 'images':
        echo '<img src="' . $_SERVER['PATH_INFO'] . '"/>';
        break;
    case 'selection':
        invokeController('selection.php');
        break;
    case 'accueil':
        invokeController('accueil.php');
        break;
    default:
        header('location: ./accueil');
        exit();
        break;
}

?>