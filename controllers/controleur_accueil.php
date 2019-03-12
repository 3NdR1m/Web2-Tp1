<?php
/**
 * @author Paul LENOIR <1834889>
 */
    include_once("./models/voitures.php");

    $model = new Model();
    $tab = Model::getMakers();
    print_r($tab);

    //$tab = array("toto", "titi", "tata");
   // $tab_marque = serialize($tab);
   // header("location:./views/accueil.php?tab_marque=".$tab_marque);
?>