<?php
/*calculs*/

$price = 0.00;
$periods = 12; //months
$interestRate = 0.00;  //already transfered to decimal

define('TAX_TPS', 0.05);
define('TAX_TVQ', 0.09975);

public function calculateInterestRate($price){
    if($price <= 10 000.00 && $periods == 12){
        $interestRate = 0.0695
    }
    else if($price > 10 000.00 && $periods == 12){
        $interestRate = 0.0725
    }
    else if($price <= 10 000.00 && $periods == 24){
        $interestRate = 0.0695
    }
    else if($price > 10 000.00 && $periods == 24){
        $interestRate = 0.0725
    }
    else if($price <= 10 000.00 && $periods == 36){
        $interestRate = 0.0625
    }
    else if($price > 10 000.00 && $periods == 36){
        $interestRate = 0.0630
    }
    else if($price <= 10 000.00 && $periods == 48){
        $interestRate = 0.0610
    }
    else if($price > 10 000.00 && $periods == 48){
        $interestRate = 0.0630
    }
    else if($price <= 10 000.00 && $periods == 60){
        $interestRate = 0.0600
    }
    else if($price > 10 000.00 && $periods == 60){
        $interestRate = 0.0585
    }
}
    $advance = 0.00;
    $balance = 0.00;
    public function calculateBalance($price, $advance){
        $balance = $price - $advance;
        return $balance;
    }

    $monthlyPayment = 0.00;
    public function calculateMonthlyPayment($balance, $periods, $interestRate)
    {
        # https://en.wikipedia.org/wiki/Amortization_%28business%29
        $monthlyPayment = $balance * (( 1 - pow(1 + $interestRate, -$loanDurationInMonth)) / $interestRate);
        return $monthlyPayment;
    }

    private function applyTaxes($price)
    {
        return $price * (1 + (TAX_TPS + TAX_TVQ));
    }

        public function calculateInterests($monthlyPayment, $periods, $balance){
        $interests = ($monthlyPayment * $periods ) - $balance;
        return $interests;
    }
?>