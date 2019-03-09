<h1>Comparer</h1>
<div class="car-info-group">
    <?php foreach ($selected_cars as $car): ?>
        <div class="car-info-card">
            <div>
                <h2><?php echo $car->full_name ?></h2>
                <q><?php echo $car->description ?></q>
                <p>
                    <span class="car-price"><?php echo number_format($car->price, 0, '.', ',') ?></span>
                    <a href="financement?car_index=<?php echo $car->dbId; ?>">Financement</a>
                </p>  
            </div>
            <a href="./images/cars/<?php echo $car->full_name ?>.jpg">
                <img src="./images/cars/<?php echo $car->full_name ?>.jpg" alt="<?php echo $car->full_name ?>">
            </a>
        </div>
    <?php endforeach ?>
</div>