<table border="1">
    <tr><th>Coûts de la voiture:</th></tr>
    <tr>
        <td>Coût :</td>
        <td id="price"><?php echo number_format((float)$price, 2, '.', '');?></td>
    </tr>
    <tr>
        <td>Acompte :</td>
        <td><?php echo $advance;?></td>
    </tr>
    <tr>
        <td>Balance :</td>
        <td><?php echo $balance;?></td>
    </tr>
    <tr>
        <td>Taxes :</td>
        <td><?php echo $taxes?></td>
    </tr>
    <tr>
        <td>Intérêts : </td>
        <td><?php echo $interests?></td>
    </tr>
    <tr>
        <td>Montant à financer : </td>
        <td><?php echo $priceWithInterests ?></td>
    </tr>
    <tr>
        <td>Paiments mensuels : </td>
        <td><?php echo $monthlyPayment;?></td>
    </tr>
</table>
<form action="" method="post">
<label for="interestRate">Taux d'intérêt:</label>
<select name="interestRate">
    <?php foreach($tab_interestRates as $rate): ?>

    <option value="<?php echo $rate; ?>" <?php if($rate == $selectedInterestRate) { echo "selected"; }?>>
        <?php echo $rate ?>
    </option>

    <?php endforeach; ?>
</select>

<br>
    <label for="acompte">Acompte:</label>
    <input type="text" name="acompte" maxlength="8" size="12" value="<?php writeAdvance()?>">
<br>
<button value="Submit">calculer</button>
</form>
<?php validateAdvanceInput(); ?>