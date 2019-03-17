<?php
/**
 * @author Paul LENOIR <1834889>
 */
   include ("$_SERVER[DOCUMENT_ROOT]/Web2-Tp1/models/voitures.php");
   $model = new Model();
   $tab_marque = Model::getMakers();                             //obtenir toutes les marques 

   if(!isset($_GET["acces"]) || $_GET["acces"] == "false"){ //pour 1er affiche de accueil
      $tab_modele_1 = Model::getModelsByMaker("$tab_marque[0]");    //tous les objets_car de la 1ere marque

      //obtenir les modeles de la marque Kia
         $tab_modele_2 = getModel($tab_modele_1); 

      //variable pour le header
         $tab_marque_header = serialize(Model::getMakers());
         $tab_modele_header = serialize($tab_modele_2);      
         header("location:./views/accueil.php?tab_marque=".$tab_marque_header . "&tab_modele=" . $tab_modele_header);
   }

   if($_GET["acces"] == "true"){ //quand dans accueil, le bouton valider a été cliqué
      $tab_marque = unserialize($_GET['tab_marque']); //réception marque choisie dans accueil
      $tab_modele_1 = array();
      $index = 0;
      for($i=0; $i < count($tab_marque); $i++){
         $tab_modele_temp = array(); //vide le tableau
         $tab_modele_temp = Model::getModelsByMaker($tab_marque[$i]);
         $tab_modele_temp = getModel($tab_modele_temp); 
         foreach($tab_modele_temp as $cle => $valeur){
            $tab_modele_1[$index] = $valeur;
            $index++;
         } 
      }


      $tab_marque_header = serialize(Model::getMakers());
      $tab_modele_choisi_URL_voitures = serialize($tab_modele_1); 
      header("location:../views\accueil.php?tab_marque=".$tab_marque_header . "&tab_modele=".$tab_modele_choisi_URL_voitures);
   } 




   function getModel($tab_model_parametre){ //obtenir les modeles des objet_car
      $tab_modele_2 = null;
      $index = 0;
      foreach($tab_model_parametre as $cle => $valeur1){ 
            foreach($valeur1 as $cle2 => $valeur2){
               if($cle2 == "model_name"){
                  $tab_modele_2[$index] = $valeur2; //met dans le tableau $tab_modele_2 les modeles des marques choisies
                  $index++;
               }
            }
      }
      return $tab_modele_2;
   }
?>