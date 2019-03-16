<?php
/**
 * @author Paul LENOIR <1834889>
 */
$tab_marque = unserialize($_GET['tab_marque']); 
$tab_modele = unserialize($_GET['tab_modele']); 


$valider = (!empty($_POST['valider'])?$_POST['valider'] = "true" : "false");
$tab_marque_choisi = (isset($_POST["marque"]))?$_POST["marque"]:null;

$Rechercher = (!empty($_POST['Rechercher'])?$_POST['Rechercher'] = "true" : "");
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
    <br>
    <input type="submit" name="valider" value="valider votre/vos marque(s)"/> 
    <br>
    <br>     
    <?php		
		if(isset($_POST['valider']) && $_POST['valider'] == "true"){ //bouton valider marque pour generer les modeles
            $true = "true";
            $tab_modele_choisi_URL = serialize($tab_marque_choisi); 
            header("location:..\controllers\controleur_accueil.php?tab_marque=".$tab_modele_choisi_URL . "&acces=" .$true);
        }
        
    ?>
        <select name="modele[]" type="select" multiple="true" size="3"> <!--  liste deroulante modele -->
		<?php		
            for($i = 0; $i < count($tab_modele); $i++){
                if (isset($_POST['modele']) && $_POST['modele'] == $cle){
                    $selected = 'selected=selected';
                }
                else{
                    $selected = '';
                };
				echo '<option value="'.$tab_modele[$i]. '"' . $selected . '>';
				echo $tab_modele[$i];
				echo "</option>";
            } 
		?>
	</select>

<br><br>
        <input type="submit" name="Rechercher" value="Rechercher"/>
    </form>
</div> 
<?php		
		if(isset($_POST['Rechercher']) && $_POST['Rechercher'] == "true"){
             if(isset($_POST["modele"])){ 
                $tab_modele_choisi_URL = serialize($_POST["modele"]); 
               header("location:..\controllers\selection.php?selected_cars=".$tab_modele_choisi_URL); //bouton recherche envoie modele à selection.php
            }  
        }
    ?>