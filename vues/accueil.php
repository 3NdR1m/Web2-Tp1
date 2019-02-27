<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css">
        <title>Accueil</title>
    </head>
    <body>
        <header>
            <img src="../images/logo.PNG" alt="logo" id="center" height="200"/> <!-- le faire dans une autre page -->
        </header>
        <div>
                <form name="formulaire"  method="post" action="">
                <select name="Marque">
                    <option class="style1"> Marque </option>
                        <?php
                            $tab_deserialiser_voiture = unserialize($_GET['voiture']); 
                            foreach($tab_deserialiser_voiture as $cle1 => $valeur1){
                                echo "<option value= '" . $cle1 . "' ".(($Marque == $cle1) ? "selected" : "").">";
                                echo $cle1;
                                echo "</option>";
                            }
                        ?>
                </select>
                <!-- <a href="../modeles/voitures.php" target="_blank"><input type="button" name="MAJ" value="MAJ"/></a> -->
                <br>
                <select name="Modèle">
                <?php
                    require ('../modeles/voitures.php'); //charge la page avec le nom des marque
                    ksort($tab_voiture); //ordre alphabetique de la cle 
                    foreach($tab_voiture as $Marque => $valeur2){
                        echo "<option value= $valeur2 >";
                        echo $valeur2;
                    ?>
                        </option> <br>
                    <?php
                    }
                ?>
                </select>
                <input type="submit" name="Rechercher" value="Rechercher"/>
            </form>
        </div>
        <footer>
        </footer>
    </body>
</html>
