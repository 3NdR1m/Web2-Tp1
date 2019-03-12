<?php
/**
 * @author Paul LENOIR <1834889>
 */
$marque = (!empty($_POST['marque'])?$_POST['marque'] : "");
if(($_POST['Modèle']) && !empty($_POST['Modèle'])){ 
    $tab_modele_get = $_POST['Modèle']; 
} 
?>

<div>
<form name="formulaire"  method="post" action="">
        <label for="Marque">Marque :
            <span class = "custom_dropdown">
                <select name="Marque">
                        <?php
                            $tab_marque = unserialize($_GET['tab_marque']); 

                            for($i = 0; $i < count($tab_marque);$i++){
                                if (isset($_POST['marque']) && $_POST['marque'] == $tab_marque[$i]){
                                    $selected = 'selected=selected';
                                }
                                else{
                                    $selected = '';
                                };
                                echo '<option value="'.$tab_marque[$i]. '"' . $selected . '>';
                                echo $tab_marque[$i];
                                echo "</option>";
                            } 
                        ?>
                </select>
            </span>
        </label>
        <br>
        <select name="Modèle[]" multiple="multiple" size="4"> 
            <?php
                include_once("./models/voitures.php");
                $tab_model = getModelsByMaker($_POST['marque']);

                for($i = 0; $i < count($tab_model); $i++){
                    echo "<option value= ".$tab_model[$i]." >";
                    echo $tab_model[$i];
                    echo "</option> <br>";
                } 
            ?>
        </select>
        <input type="submit" name="Rechercher" value="Rechercher"/>
    </form>
</div>
<?php
if($_POST['Rechercher'] != ""){
    $tab_modele_selected = serialize($tab_modele_get);
    header("location:./controllers/selection.php?tab_modele_selected=" .$tab_modele_selected);

    //Benjamin pour recuperer les valeurs modeles selectionnees 
    //$tab_modele_recu = unserialize($_GET['tab_modele_selected']); 
}
?>