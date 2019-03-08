<?php
include_once("./models/voitures.php");
$model = new Model();

// Input query must have "selected_car"
if(isset($_GET["selected_cars"]))
{
    // query selected car is stored in json format.
    $json_input = json_decode($_GET["selected_cars"]);
    if(json_last_error() == JSON_ERROR_NONE) {
        $selected_cars = array_map(
            'Model::getCarByID', 
            json_decode($_GET["selected_cars"])
        );
        include "./views/selection.php";
        exit();
    }
}
else
{
    http_response_code(400);
    echo "Error 400. The request was incorrect.<br><a>Go back<a>";
}
?>