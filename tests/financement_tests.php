<?php
/**
* @author Jamie Zilio <1664357>
*/
?>
<?php
    include_once('./models/voitures.php');
    include_once ('../app/controllers/controleur_financement.php');
    
    try{
        echo "****** Test function taxes ******</br>";
        echo "valeur attendue : 1497.50 --->" . calculateTaxes(10000) . "<br>";
        echo "valeur attendue : 1347.75 --->" . calculateTaxes(9000) . "<br>";
        echo "valeur attendue : 1198.00 --->" . calculateTaxes(8000) . "<br>";
    }
    catch(Exception $e){
        echo $e -> getMessage();
    }
    try{
        echo "****** Test function calculateBalance ******</br>";
        echo "valeur attendue : 8000.00 --->" . calculateBalance(10000, 2000) . "<br>";
        echo "valeur attendue : 9000.00 --->" . calculateBalance(10000, 1000) . "<br>";
        echo "valeur attendue : 10000.00 --->" . calculateBalance(10000, 0) . "<br>";
    }
    catch(Exception $e){
        echo $e -> getMessage();
    }
    try{
        echo "****** Test function applyTaxes ******</br>";
        echo "valeur attendue : 11497.50 --->" . applyTaxes(10000) . "<br>";
        echo "valeur attendue : 10347.75 --->" . applyTaxes(9000) . "<br>";
        echo "valeur attendue : 9198.00 --->" . applyTaxes(8000) . "<br>";
    }
    catch(Exception $e){
        echo $e -> getMessage();
    }
    try{
        echo "****** Test function calculateMonthlyPayments ******</br>";
        echo "valeur attendue : 865.04 --->" . calculateMonthlyPayment(10000, 12, 6.95) . "<br>";
        echo "valeur attendue : 447.50 --->" . calculateMonthlyPayment(10000, 24, 6.95) . "<br>";
        echo "valeur attendue : 305.35 --->" . calculateMonthlyPayment(10000, 36, 6.25) . "<br>";
    }
    catch(Exception $e){
        echo $e -> getMessage();
    }
    try{
        echo "****** Test function calculateInterests ******</br>";
        echo "valeur attendue : 380.48 --->" . calculateInterests(865.04, 12, 10000) . "<br>";
        echo "valeur attendue : 740.00 --->" . calculateInterests(447.50, 24, 10000) . "<br>";
        echo "valeur attendue : 992.60 --->" . calculateInterests(305.35, 36, 10000) . "<br>";
    }
    catch(Exception $e){
        echo $e -> getMessage();
    }
    
    try{
        echo "****** Test function calculatePriceWithInterests ******</br>";
        echo "valeur attendue : 10380.48 --->" . calculatePriceWithInterests(10000, 6.95, 12, 865.04) . "<br>";
        echo "valeur attendue : 10740.00 --->" . calculatePriceWithInterests(10000, 6.95, 24, 447.50) . "<br>";
        echo "valeur attendue : 10992.60 --->" . calculatePriceWithInterests(10000, 6.25, 36, 305.35) . "<br>";
    }
    catch(Exception $e){
        echo $e -> getMessage();
    }
?>