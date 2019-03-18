<?php
    /**
     * @author jamiezilio, corrected by Benjamin Bergeron
     */
    define('DOC_TITLE', "Financement");
    define('VIEW', 'financement.php');
    
    include_once("./classes/InterestRule.php");
    include_once("./lib/lib_financing.php");

    $interest_rate_index = (int)filter_input(INPUT_POST, "interestRate", FILTER_VALIDATE_INT);

    $car_index = filter_input(INPUT_GET, "car_id", FILTER_VALIDATE_INT);

    $car = Model::getCarByID($car_index);
    $price = $car->price;

    $advance = MIN(
        // Parsing filter_input to float will force the value to 0.0f if the returned value is null or false.
        (float)filter_input(INPUT_POST, "advance", FILTER_VALIDATE_FLOAT),
        $price
    );
    $balance = getBalance($price, $advance);
    $taxes = getTaxesFromBasePrice($balance);

    $tab_interestRates = getInterestRules($balance);

    $periods_in_month = $tab_interestRates[$interest_rate_index]->month;
    $interestRates = $tab_interestRates[$interest_rate_index]->interestRate;
    
    $monthlyPayment = calculateMonthlyPayment($balance, $periods_in_month, $interestRates);

    $interests = calculateInterest($balance, $monthlyPayment, $periods_in_month );

    // Add interest to price
    $total = $balance + $interests;
?>