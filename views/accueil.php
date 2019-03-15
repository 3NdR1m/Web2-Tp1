<?php
/**
 * @author Paul LENOIR <1834889>
 */
$tab_marque = unserialize($_GET['tab_marque']); 
$tab_model = unserialize($_GET['tab_modele']); 


$valider = (!empty($_POST['valider'])?$_POST['valider'] = "true" : "");
$tab_marque_choisi = (isset($_POST["marque"]))?$_POST["marque"]:null;
?>

<div>
<form name="formulaire"  method="post" action="">
    <label for="marque"> choisisez votre marque de voiture :</label> <br>
        <select name="marque[]" type="select" multiple="true" size="4">
                <?php		
                    foreach($tab_marque as $cle => $valeur){                            //tableau que je recois de URL
                        if (isset($_POST['marque']) && $_POST['marque'] == $valeur){    //valeur = nom de la marque
                            $selected = 'selected=selected';
                        }
                        else{
                            $selected = '';
                        };
                        echo '<option value="'.$valeur. '"' . $selected . '>';
                        echo $valeur;
                        echo "</option>";
                    } 
                ?>
            </select>
    <br>
    <input type="submit" name="valider" value="valider Marque"/> 
    <br>
        
    <?php		
		if($_POST['valider'] == "true"){
            $true = "true";
            header("location:..\controllers\controleur_accueil.php?tab_marque=".$tab_marque_choisi . "&acces=" .$true);
        }
        
        //$tab_model_GET = unserialize($_GET['modele_liste']); 
	?>
<br><br>
        <input type="submit" name="Rechercher" value="Rechercher"/>
    </form>
</div>