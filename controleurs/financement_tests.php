<?php
//test1
    //arrange
    define('TAX_TPS', 0.05);
    define('TAX_TVQ', 0.09975);

    $price = 10 000.00;
    $advance = 0.00;
    $balance = calculateBalance($price, $advance);
    $periods = 12;
    $interestRate = calculateInterestRate($price);
    //act
    $monthlyPayments = calculateMonthlyPayment()

    //assert

//test2
?>