<?php define('DOC_TITLE', "Sélection"); require_once "shared/_header.php";  ?>

<?php foreach ($selected_car as $car_id): ?>
<div class="car-info-card">
    <h2>  <?php echo $car["company"]." ".$car["Model"]?></h2>
    <img src="<?php echo $car["picture_href"]?>" alt="<?php echo $car["company"]." ".$car["Model"]?>">
    <p><?php echo $car["description"] ?></p>
    <p>
        <span class="car-price"><?php echo $car["price"] ?></span>
        <a href="financement.php?model=<?php echo $car_id; ?>">Financement</a>
    </p>
</div>
<?php endforeach ?>

<?php require_once "shared/_footer.php"; ?>