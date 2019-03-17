<form method="POST" action="" id="form_acceuil">
    <div>
        <label for="select_maker"><h2>choisisez votre marque de voiture</h2></label>
        <select id="select_maker" name="maker" required size="<?php echo sizeof($car_makers); ?>">
            <?php foreach($car_makers as $index => $maker): ?>
                <option value="<?php echo $index; ?>" <?php if($index == $selected_maker) { echo "selected"; }?>> <?php echo $maker; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="reload_models" value="Réaficher les models"/>
    </div>
    <div>
        <label for="select_models"><h2>choisisez votre model de voiture</h2></label>
        <select id="select_models" name="model" required size="<?php echo sizeof($car_models); ?>" multiple>
            <?php foreach($car_models as $index => $model): ?>
                <option value="<?php echo $index; ?>" <?php if($index == 0) { echo "selected"; }?>> <?php echo $model; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="proceed_to_selection" value="Confirmer"/>
    </div>
</form>
