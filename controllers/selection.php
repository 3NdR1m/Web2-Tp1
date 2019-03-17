<?php
define('DOC_TITLE', 'Sélection');
define('VIEW', 'Sélection.php');

if(isset($_GET["selected_cars"]))
{
    $json_input = json_decode($_GET["selected_cars"]);
    if(json_last_error() == JSON_ERROR_NONE) {
        $selected_cars = 
            array_filter(
            array_map(
                'Model::getCarByID', 
                json_decode($_GET["selected_cars"])
        ));
        
        exit();
    }
}
http_response_code(400);
echo 'Error 400. The request was incorrect.';

?>