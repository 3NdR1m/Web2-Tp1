<?php
class Car {
    public $maker;
    public $model_name;
    public $description;
    public $price;

    public function __construct($maker, $model_name, $price, $description)    
    {    
        $this->maker = $maker;
        $this->model_name = $model_name;
        $this->price = $price;
        $this->description = $description;
    }  
}
?>