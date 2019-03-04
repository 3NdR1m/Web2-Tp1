<?php
    $page = $_GET["area"]; # Todo: trouver une facon de faire marcher ça
    switch ($page) {
        case 'financement':
            require_once "controllers/controller_financement.php"; // TODO: rename path and file
            break;
        case 'selection':
            require_once "controllers/controller_selection.php"; // TODO: rename path and file and make controler
            break;
        case 'acceuil':
        default:
            require_once "controllers/controller_accueil.php";
            break;
    }
    /*
    require('./models/voitures.php'); //charge la page avec le nom des marque
    $Marque= array_shift(array_keys($tab_voiture));

    $tab_serialiser_voiture = serialize($tab_voiture);
    header("Location: ./views/accueil.php?voiture=".$tab_serialiser_voiture."&marque=". $Marque." ");*/
?>