<?php
    /**
    * @author Jamie Zilio, Benjamin Bergeron
    */
    chdir('../app/');
    
    require './classes/InterestRule.php';
    require './lib/lib_financing.php';

    function print_pre($var) {
        echo "<pre>";
        print_r($var);
        echo"</pre>";
    }
?>
<h1>Tests unitaires: financement</h1>
<style>
    table { margin-bottom: 8px; }
    table, td, th, tr, caption{
        border: 1px solid;
    }
</style>
<table>
    <caption>getTaxesFromBasePrice()</caption>
    <thead><th>Valeur attendue</th><th>Valeur reçue</th></thead>
    <tbody>
        <tr><td>1497.50</td><td><?php echo getTaxesFromBasePrice(10000); ?></td></tr>
        <tr><td>1347.75</td><td><?php echo getTaxesFromBasePrice(9000); ?></td></tr>
        <tr><td>1198.00</td><td><?php echo getTaxesFromBasePrice(8000); ?></td></tr>
    </tbody>
</table>
<table>
    <caption>getBalance()</caption>
    <thead><th>Valeur attendue</th><th>Valeur reçue</th></thead>
    <tbody>
        <tr><td>8000</td><td><?php echo getBalance(10000, 2000); ?></td></tr>
        <tr><td>9000</td><td><?php echo getBalance(10000, 1000); ?></td></tr>
        <tr><td>10000</td><td><?php echo getBalance(10000, 0); ?></td></tr>
    </tbody>
</table>
<table>
    <caption>calculateMonthlyPayment()</caption>
    <thead><th>Valeur attendue</th><th>Valeur reçue</th></thead>
    <tbody>
        <tr><td>865.04</td><td><?php echo calculateMonthlyPayment(10000, 12, 0.0695); ?></td></tr>
        <tr><td>431.92</td><td><?php echo calculateMonthlyPayment(10000, 24, 0.0695); ?></td></tr>
        <tr><td>286.79</td><td><?php echo calculateMonthlyPayment(10000, 36, 0.0625); ?></td></tr>
    </tbody>
</table>
<table>
    <caption>calculateInterest()</caption>
    <thead><th>Valeur attendue</th><th>Valeur reçue</th></thead>
    <tbody>
        <tr><td>380.48</td><td><?php echo calculateInterest(10000, 865.04, 12); ?></td></tr>
        <tr><td>366.08</td><td><?php echo calculateInterest(10000, 431.92, 24); ?></td></tr>
        <tr><td>324.44</td><td><?php echo calculateInterest(10000, 286.79, 36); ?></td></tr>
    </tbody>
</table>
<table>
    <caption>getInterestRules()</caption>
    <thead><th>Valeur attendue</th><th>Valeur reçue</th></thead>
    <tbody>
        <tr><td><pre>Array
(
    [0] => InterestRule Object
        (
            [month] => 12
            [interestRate] => 0.0695
        )

    [1] => InterestRule Object
        (
            [month] => 24
            [interestRate] => 0.0695
        )

    [2] => InterestRule Object
        (
            [month] => 36
            [interestRate] => 0.0625
        )

    [3] => InterestRule Object
        (
            [month] => 48
            [interestRate] => 0.061
        )

    [4] => InterestRule Object
        (
            [month] => 60
            [interestRate] => 0.06
        )

)</pre></td><td><?php print_pre(getInterestRules(10000)); ?></td></tr>
        <tr><td><pre>Array
(
    [0] => InterestRule Object
        (
            [month] => 12
            [interestRate] => 0.0725
        )

    [1] => InterestRule Object
        (
            [month] => 24
            [interestRate] => 0.0725
        )

    [2] => InterestRule Object
        (
            [month] => 36
            [interestRate] => 0.063
        )

    [3] => InterestRule Object
        (
            [month] => 48
            [interestRate] => 0.063
        )

    [4] => InterestRule Object
        (
            [month] => 60
            [interestRate] => 0.0585
        )

)</pre></td><td><?php print_pre(getInterestRules(10001)); ?></td></tr>
    </tbody>
</table>