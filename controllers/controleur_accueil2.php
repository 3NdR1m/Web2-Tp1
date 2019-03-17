<?php
/**
 * @author Paul LENOIR <1834889>
 */
   include("../models/voitures.php");
    //traitement page accueil
    if($_GET["acces"] == "true"){
      $tab_marque = unserialize($_GET['tab_marque']); //marque choisie
  
      $model = new Model();
      $tab_modele_1 = Model::getModelsByMaker($tab_marque[0]); //objet car des marques choisies
  
      $tab_modele_2 = null;
      $index = 0;
      foreach($tab_modele_1 as $cle => $valeur1){ 
            foreach($valeur1 as $cle2 => $valeur2){
               if($cle2 == "model_name"){
                  $tab_modele_2[$index] = $valeur2; //met dans le tableau $tab_modele_2 les modeles des marques choisies
                  $index++;
               }
            }
      }
  
      $tab_modele_choisi_URL_voitures = serialize($tab_modele_2); 
      header("location:../views\accueil.php?tab_modele=".$tab_modele_choisi_URL_voitures . "&acces=" .$true);
   } 
?>