<?php
    /**
     * @author jamiezilio, corrected by Benjamin Bergeron
     */
    define('DOC_TITLE', "Financement");
    define('VIEW', 'financement.php');
    
    include_once("./classes/InterestRule.php");

    define('TAX_TPS', 0.05);
    define('TAX_TVQ', 0.09975);

    function getInterestRules(float $amount) {
        if($amount <= 10000) {
            return array(
                new InterestRule(12, 0.0695),
                new InterestRule(24, 0.0695),
                new InterestRule(36, 0.0625),
                new InterestRule(48, 0.061),
                new InterestRule(60, 0.06)
            );
        }
        else {
            return array(
                new InterestRule(12, 0.0725),
                new InterestRule(24, 0.0725),
                new InterestRule(36, 0.063),
                new InterestRule(48, 0.063),
                new InterestRule(60, 0.0585)
            );
        }
    }

    function calculateMonthlyPayment($balance, $loanDurationInMonth, $interestRate) {
        $interestRate = $interestRate / $loanDurationInMonth;
        $recursive_equation_pattern = pow(1 + $interestRate, $loanDurationInMonth); // this is a piece of equation that appear more than two time. It will only be calculated once.
        return $balance * (($interestRate * $recursive_equation_pattern) / ($recursive_equation_pattern - 1));
    }

    function getTaxesFromBasePrice($priceBeforeTaxes) {
        return $priceBeforeTaxes * (TAX_TPS + TAX_TVQ);
    }

    function calculateInterest($balance, $monthlyPayment, $loanDurationInMonth)
    {
        return ($monthlyPayment * $loanDurationInMonth ) - $balance;
    }

    $interest_rate_index = (int)filter_input(INPUT_POST, "interestRate", FILTER_VALIDATE_INT);

    $car_index = filter_input(INPUT_GET, "car_id", FILTER_VALIDATE_INT);

    $car = Model::getCarByID($car_index);
    $price = $car->price;

    $advance = MIN(
        // Parsing filter_input to float will force the value to 0.0f if the returned value is null or false.
        (float)filter_input(INPUT_POST, "advance", FILTER_VALIDATE_FLOAT),
        $price
    );
    $balance = $price - $advance;
    $taxes = getTaxesFromBasePrice($balance);

    $tab_interestRates = getInterestRules($balance);

    $periods_in_month = $tab_interestRates[$interest_rate_index]->month;
    $interestRates = $tab_interestRates[$interest_rate_index]->interestRate;
    
    $monthlyPayment = calculateMonthlyPayment($balance, $periods_in_month, $interestRates);

    $interests = calculateInterest($balance, $monthlyPayment, $periods_in_month );

    $total = $balance + $interests;

    function echoAsFinancial($value) {
        echo number_format($value, 2, '.', ',').'$';
    }
?>