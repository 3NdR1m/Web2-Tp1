<?php
/*calculs*/
    //$id = $_REQUEST["id"];
    //$car = getCarById($id);
    $price = 10000;
    $periods = 12; //months
    $interestRate = 0.00;  //already transfered to decimal

    define('TAX_TPS',0.05);
    define('TAX_TVQ',0.09975);

    function calculateTaxes($price){
        $taxes = $price * (TAX_TPS + TAX_TVQ);
        return number_format((float)$taxes, 2, '.', '');
    }

    $advance = 0.00;
    $balance = 0.00;
    function calculateBalance($price, $advance){
        $balance = $price - $advance;
        return number_format((float)$balance, 2, '.', '');

    }

    function applyTaxes($price)
    {
        return $price * (1 + (TAX_TPS + TAX_TVQ));
    }

    function calculateInterests($monthlyPayment, $periods, $balance){
        $interests = ($monthlyPayment * $periods ) - $balance;
        return number_format((float)$interests, 2, '.', '');
    }

    function calculatePriceWithInterests($balance, $interestRate){
        $priceWithInterests = $balance + calculateInterests();
        return number_format((float)$priceWithInterests, 2, '.', '');
    }
    
    $monthlyPayment = 0.00;
    function calculateMonthlyPayment($balance, $periods, $interestRate)
    {
        # https://en.wikipedia.org/wiki/Amortization_%28business%29
        $monthlyPayment = $balance * (( 1 - pow(1 + $interestRate, -$loanDurationInMonth)) / $interestRate);
        return number_format((float)$monthlyPayment, 2, '.', '');

    }
?>