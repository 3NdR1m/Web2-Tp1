<?php
class Car {
    private static $__Car_Class_Indexer = 0;
    public $maker;
    private $model_name;
    public $description;
    public $price;
    private $dbId;

    public function __construct($maker, $model_name, $price, $description)    
    {    
        $this->maker = $maker;
        $this->model_name = $model_name;
        $this->price = $price;
        $this->description = $description;
        $this->$dbId = $__Car_Class_Indexer;
        self::$__Car_Class_Indexer++;
    }  

    public function getId()
    {
        return $this->$dbId;
    }

    public function getModel()
    {
        return $this->$model_name;
    }
}
?>