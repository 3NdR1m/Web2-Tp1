<div class="financing-info">
    <h1>Financement: <?php echo $car; ?></h1>
    <table>
        <tbody>
            <tr><td>Coût :</td><td id="price"><?php echoAsFinancial($price);?></td></tr>
            <tr><td>Acompte :</td><td><?php echoAsFinancial($advance);?></td></tr>
            <tr><td>Balance :</td><td><?php echoAsFinancial($balance);?></td></tr>
            <tr><td>Taxes :</td><td><?php echoAsFinancial($taxes)?></td></tr>
            <tr><td>Intérêts : </td><td><?php echoAsFinancial($interests); ?></td></tr>
            <tr><td>Montant à financer : </td><td><?php echoAsFinancial($total); ?></td></tr>
            <tr><td>Paiments mensuels : </td><td><?php echoAsFinancial($monthlyPayment);?></td></tr>
        </tbody>
    </table>
    <form action="" method="POST">
        <label for="select_interestRate">Taux d'intérêt:</label>
        <select id="select_interestRate" name="interestRate" required>
            <?php foreach($tab_interestRates as $index => $interestRule): ?>
            <option value="<?php echo $index; ?>" <?php if($index == $interest_rate_index) { echo "selected"; }?> required>
                <?php echo $interestRule; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="input_advance">Acompte:</label>
        <input type="number" name="advance" id="input_advance" step="500" value="<?php echo $advance; ?>" min="0" max="<?php echo $price; ?>" required>
        <br>
        <button value="Submit">calculer</button>
    </form>
</div>