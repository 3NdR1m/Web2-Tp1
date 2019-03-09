<?php

    include_once("../models/voitures.php");
    $model = new Model();

    $price = getPrice();
    function getPrice(){
        $id = $_GET['car_id'];
        $car = Model::getCarByID($id);
        return $car->price;
    }
    
    
    $selectedInterestRate = (isset($_POST['interestRate'])) ? $_POST['interestRate'] : null;

    $periods = getPeriods();
    function getPeriods(){
        $string = (isset($_POST['interestRate'])) ? $_POST['interestRate'] : null;
            if($string == null){
                $price = getPrice();
                $tab_interestRates = determineInterestRates($price);
                $string = $tab_interestRates[0];
            }
        $periods = substr($string, 10, 13);
        return (float)$periods;
    }
    
    $interestRate = getInterestRate();
    function getInterestRate(){
        $string = (isset($_POST['interestRate'])) ? $_POST['interestRate'] : null;
            if($string == null){
                $price = getPrice();
                $tab_interestRates = determineInterestRates($price);
                $string = $tab_interestRates[0];
            }
        $interestRate = substr($string, 10, 13);
        return (float)$interestRate;
    }

    $tab_interestRates = determineInterestRates($price);
    function determineInterestRates($price){
        if($price <= 10000){
            $tab_interestRates = array("12 mois - 6.95%", "24 mois - 6.95%", "36 mois - 6.25%", "48 mois - 6.10%","60 mois - 6.00%");
        }
        else{
            $tab_interestRates = array("12 mois - 7.25%", "24 mois - 7.25%", "36 mois - 6.30%", "48 mois - 6.30%", "60 mois - 5.85%");
        }
        return $tab_interestRates;
    }

    $advance = getAdvance();
    function getAdvance(){
        $advance = (isset($_POST['acompte'])) ? $_POST["acompte"] : null;
        return number_format((float)$advance, 2, '.', '');;
    }
    function writeAdvance(){
        $advance = (isset($_POST['acompte'])) ? $_POST["acompte"] : null;
        echo floor($advance);
    }
    
    $balance = calculateBalance($price, $advance);
    function calculateBalance($price, $advance){
        $balance = $price - $advance;
        return number_format((float)$balance, 2, '.', '');
    }

    $taxes = calculateTaxes($balance);
    function calculateTaxes($balance){
        define('TAX_TPS', 0.05);
        define('TAX_TVQ', 0.09975);
        $taxes = $balance * (TAX_TPS + TAX_TVQ);
        return number_format((float)$taxes, 2, '.', '');
    }

    function applyTaxes($price)
    {
        $priceWithTaxes = $price * (1 + (TAX_TPS + TAX_TVQ));
        return number_format((float)$priceWithTaxes, 2, '.', '');
    }

    $monthlyPayment = calculateMonthlyPayment($balance, $periods, $interestRate);
    function calculateMonthlyPayment($balance, $periods, $interestRate)
    {
        # https://en.wikipedia.org/wiki/Amortization_%282business%29
        $monthlyPayment = $balance * ((($interestRate/100)/12)* pow(1+(($interestRate/100)/12), $periods) / (pow((1+($interestRate/100)/12), $periods) -1));
        return number_format((float)$monthlyPayment, 2, '.', '');
    }

    $interests = calculateInterests($monthlyPayment, $periods, $balance);
    function calculateInterests($monthlyPayment, $periods, $balance){
        $interests = ($monthlyPayment * $periods ) - $balance;
        return number_format((float)$interests, 2, '.', '');
    }

    $priceWithInterests = calculatePriceWithInterests($balance, $interestRate, $periods, $monthlyPayment);
    function calculatePriceWithInterests($balance, $interestRate, $periods, $monthlyPayment){

        $priceWithInterests = $balance + calculateInterests($monthlyPayment, $periods, $balance);
        return number_format((float)$priceWithInterests, 2, '.', '');
    }

    function validateAdvanceInput(){
        $advance = getAdvance();
        $price = getPrice();
        if($advance > $price){
            throw new exception("L'acompte entré doit être plus petit que le prix de la voiture");
        }
    }
    try {
        validateAdvanceInput();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
        
    include_once("../views/financement.php");
?>