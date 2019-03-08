<?php define('DOC_TITLE', "Sélection"); require_once "shared/_header.php";  ?>
<h1>Comparer</h1>
<div class="car-info-group">
    <?php foreach ($selected_cars as $car): ?>
        <div class="car-info-card">
            <div>
                <h2><?php echo $car->full_name ?></h2>
                <q><?php echo $car->description ?></q>
                <p>
                    <span class="car-price"><?php echo number_format($car->price, 0, '.', ',') ?></span>
                    <a href="financement.php?model=<?php echo $car->dbId; ?>">Financement</a>
                </p>  
            </div>
            <a href="./images/cars/<?php echo $car->full_name ?>">
                <img src="./images/cars/<?php echo $car->full_name ?>.jpg" alt="<?php echo $car->full_name ?>">
            </a>
        </div>
    <?php endforeach ?>
</div>

<?php require_once "shared/_footer.php"; ?>