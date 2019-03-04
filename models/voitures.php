<?php

include_once("./classes/Car.php"); 

class Model {
    private static $car_database = null;

    public function __construct()
    {
        if(self::$car_database == null)
        {
            self::$car_database = array(
                new Car("Kia", "Forte", 11000, ""),
                new Car("Kia", "Optima", 12000, ""),
                new Car("Kia", "Rio", 7500, ""),
                new Car("Mazda", "CX3", 11000, ""),
                new Car("Mazda", "CX5", 9000, ""),
                new Car("Mazda", "CX7", 23000, ""),
                new Car("Toyota", "Corolla", 13569, ""),
                new Car("Toyota", "Tundra", 19877, ""),
                new Car("Toyota", "Venza", 16495, ""),
                new Car("Mitsubichi", "Lancer", 9595, ""),
                new Car("Mitsubichi", "Mirage", 20000, ""),
                new Car("Mitsubichi", "Outlander", 22995, ""),
                new Car("Nissan", "Juke", 13000, ""),
                new Car("Nissan", "Micra", 15698, ""),
                new Car("Nissan", "Rogue", 10977, ""),
            );
            ksort($car_database);
        }
    }

    public function getCarByID($id)
    {
        return $car_database[$id];
    }
}
?>