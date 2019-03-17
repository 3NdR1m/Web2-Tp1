<?php
/**
 * @author Paul LENOIR <1834889>
 */

define('DOC_TITLE', "Acceuil");
define('VIEW', "accueil.php");

$selected_maker = (int)filter_input(INPUT_POST, 'maker', FILTER_VALIDATE_INT);
$selected_cars = filter_input(INPUT_POST, 'car_id');

$car_makers = Model::getMakers();
$maker = $car_makers[$selected_maker];
$car_models = Model::getModelsByMaker($maker);

if(isset($_POST['proceed'])) {
   echo 'yeet';
}


/*
if($_GET["acces"] != "true"){

$tab_modele_1 = Model::getModelsByMaker($tab_marque[0]);    //tous les objets car de la 1ere marque

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
}

//traitement page accueil
if($_GET["acces"] == "true"){
   echo "toto";
}
   */
?>