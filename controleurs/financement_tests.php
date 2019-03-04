<?php
    include_once ('D:/wamp64/www\Web2-Tp1/controleurs/controleur_financement.php');
    echo "test pour calculer taxes 1 :";
    try{
        echo /****** Test function acompte */
        echo "valeur attendue : 2020"; //2020
    }
    catch(Exception $e){
        echo $e -> getMessage();
    }
?>