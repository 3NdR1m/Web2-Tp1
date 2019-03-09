<?php
define('CAR_IMAGE_FOLDER', '');

class Car {
    private static $Car_Class_Indexer = 0;
    public $maker;
    public $model_name;
    public $description;
    public $price;
    public $dbId;
    public $full_name;

    public function __construct(string $maker, string $model_name, $price, $description)    
    {    
        $this->maker = $maker;
        $this->model_name = $model_name;
        $this->full_name = $maker." ".$model_name;
        $this->price = $price;
        $this->description = $description;
        $this->dbId = self::$Car_Class_Indexer++;
    }
}
?>