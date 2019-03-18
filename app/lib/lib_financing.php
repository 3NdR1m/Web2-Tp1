<?php
define('TAX_TPS', 0.05);
define('TAX_TVQ', 0.09975);

function calculateMonthlyPayment(float $balance, float $loanDurationInMonth, float $interestRate) {
    $interestRate = $interestRate / $loanDurationInMonth;
    $recursive_equation_pattern = pow(1 + $interestRate, $loanDurationInMonth); // this is a piece of equation that appear more than two time. It will only be calculated once.
    return $balance * (($interestRate * $recursive_equation_pattern) / ($recursive_equation_pattern - 1));
}

function getTaxesFromBasePrice(float $priceBeforeTaxes) {
    return $priceBeforeTaxes * (TAX_TPS + TAX_TVQ);
}

function calculateInterest(float $balance, float $monthlyPayment, float $loanDurationInMonth)
{
    return ($monthlyPayment * $loanDurationInMonth ) - $balance;
}

function getBalance(float $fullPrice, float $advance) {
    return $fullPrice - $advance;
}

function echoAsFinancial(float $value) {
    echo number_format($value, 2, '.', ',').'$';
}

function getInterestRules(float $amount) {
    if($amount <= 10000) {
        return array(
            new InterestRule(60, 0.06),
            new InterestRule(48, 0.061),
            new InterestRule(36, 0.0625),
            new InterestRule(24, 0.0695),
            new InterestRule(12, 0.0695)
        );
    }
    else {
        return array(
            new InterestRule(60, 0.0585),
            new InterestRule(48, 0.063),
            new InterestRule(36, 0.063),
            new InterestRule(24, 0.0725),
            new InterestRule(12, 0.0725)
        );
    }
}
?>