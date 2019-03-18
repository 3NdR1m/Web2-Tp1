<?php
/**
 * @author Benjamin Bergeron
 */
define('DOC_TITLE', 'Sélection');
define('VIEW', 'selection.php');

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
    }
    else {
        http_response_code(400);
    }
}
else {
    http_response_code(400);
}

?>