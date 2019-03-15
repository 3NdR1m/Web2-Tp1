<?php
/**
 * @author Paul LENOIR <1834889>
 */
    include_once("../models/voitures.php");
    $model = new Model();

    if($_GET["acces"] != "true"){
      $tab_marque = Model::getMakers();                             //toutes les marques 
      $tab_modele_1 = Model::getModelsByMaker("$tab_marque[0]");    //tous les objets car de la 1ere marque
  
      //obtenir les modeles de la marque Kia
        $tab_modele_2 = null;
        $index = 0;
        foreach($tab_modele_1 as $cle => $valeur1){ 
              foreach($valeur1 as $cle2 => $valeur2){
                 if($cle2 == "model_name"){
                    $tab_modele_2[$index] = $valeur2;
                    $index++;
                 }
              }
        }
  
     //variable pour le header
        $tab_marque_header = serialize(Model::getMakers());
        $tab_modele_header = serialize($tab_modele_2);      
        header("location:./views/accueil.php?tab_marque=".$tab_marque_header . "&tab_modele=" . $tab_modele_header);
    }

   //traitement page accueil
   if($_GET["acces"] == "true"){
      echo "toto";
   }
   
?>