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

$button_maker = (!empty($_POST['reload_models'])?$_POST['reload_models'] : " ");
$button_model = (!empty($_POST['proceed'])?$_POST['proceed'] : " ");

if(isset($_POST['proceed_to_selection'])) {
   //faire validation sur les models de char selectionées
   header('location: selection?selected_cars='.$selected_cars); 
 }
?>