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
                        <?php
                            $tab_deserialiser_voiture = unserialize($_GET['voiture']); 
                            foreach($tab_deserialiser_voiture as $cle1 => $valeur1){
                                echo "<option value= '" . $cle1 . "' ".(($Marque == $cle1) ? "selected" : "").">";
                                echo $cle1;
                                echo "</option>";
                            }
                        ?>
                </select>
                <br>
                <select name="Modèle">
                <?php
                    foreach($tab_deserialiser_voiture as $_GET['marque'] => $valeur2){
                        echo "<option value= $valeur2 >";
                        echo $valeur2;
                        echo "</option> <br>";
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
