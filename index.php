<?php
    require('./modeles/voitures.php'); //charge la page avec le nom des marque
    ksort($tab_voiture); //ordre alphabetique de la cle 
    
    $tab_serialiser_voiture = serialize($tab_voiture);
    header("Location:./vues/accueil.php?voiture=".$tab_serialiser_voiture." ");
?>
 
