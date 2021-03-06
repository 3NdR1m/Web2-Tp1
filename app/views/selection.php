<h1>Comparer</h1>
<div class="car-info-group">
    <?php foreach ($selected_cars as $car): ?>
        <div class="car-info-card">
            <div>
                <h2><?php echo $car ?></h2>
                <q><?php echo $car->description ?></q>
                <p>
                    <span class="car-price"><?php echo number_format($car->price, 0, '.', ',') ?></span>
                    <a href="financement?car_id=<?php echo $car->dbId; ?>">Financement</a>
                </p>  
            </div>
            <a href="<?php echo $car->image_path ?>" class="thumbnail">
                <img src="<?php echo $car->thumbnail_path ?>" alt="<?php echo $car ?>">
            </a>
        </div>
    <?php endforeach ?>
</div>