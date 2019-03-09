<table border="1">
    <tr><th>Coûts de la voiture:</th></tr>
    <tr>
        <td>Coût :</td>
        <td id="price"><?php echo number_format((float)$price, 2, '.', '');?></td>
    </tr>
    <tr>
        <td>Acompte :</td>
        <td><?php $advance = getAdvance(); echo $advance;?></td>
    </tr>
    <tr>
        <td>Balance :</td>
        <td><?php $balance = calculateBalance($price, $advance); echo $balance;?></td>
    </tr>
    <tr>
        <td>Taxes :</td>
        <td><?php $taxes = calculateTaxes($balance); echo $taxes?></td>
    </tr>
    <tr>
        <td>Intérêts : </td>
        <td><?php $interests = calculateInterests($monthlyPayment, $periods, $balance); echo $interests?></td>
    </tr>
    <tr>
        <td>Montant à financer : </td>
        <td><?php $priceWithInterests = calculatePriceWithInterests($balance, $interestRate, $periods, $monthlyPayment); echo $priceWithInterests ?></td>
    </tr>
    <tr>
        <td>Paiments mensuels : </td>
        <td><?php $monthlyPayment = calculateMonthlyPayment($balance, $periods, $interestRate); echo $monthlyPayment;?></td>
    </tr>
</table>
<form action="financement.php" method="post">
<label for="interestRate">Taux d'intérêt:</label>
<select name="interestRate">
    <?php showInterestRates($price); ?>
</select>
<br>
    <label for="acompte">Acompte:</label>
    <input type="text" name="acompte" maxlength="8" size="12" value="<?php writeAdvance()?>">
<br>
<button value="Submit">calculer</button>
</form>
<?php validateAdvanceInput() ?>