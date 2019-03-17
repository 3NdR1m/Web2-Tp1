<?php
/**
 * @author Paul LENOIR <1834889>
 */

define('DOC_TITLE', "Acceuil");
define('VIEW', "accueil.php");
$selected_maker = (int)filter_input(INPUT_POST, 'maker', FILTER_VALIDATE_INT);
$selected_cars = isset($_POST['model']) ? filter_var_array($_POST['model'], FILTER_SANITIZE_NUMBER_INT) : array(0);

$car_makers = Model::getMakers();
$maker = $car_makers[$selected_maker];
$car_models = Model::getModelsByMaker($maker);

if(isset($_POST['proceed_to_selection'])) {
   header('location: selection?selected_cars='.json_encode($selected_cars, JSON_NUMERIC_CHECK)); 
}
?>