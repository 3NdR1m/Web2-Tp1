<?php

include_once("./classes/Car.php"); 

class Model {
    private static $car_database = null;
    private static $makers_list = null;

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
        if(self::$makers_list == null)
        {
            foreach ($car_database as $car) {
                if(!in_array($car::maker, $makers_list))
                {
                    $makers_list[] = $car::maker;
                }
            }
            ksort($makers_list);
        }
    }

    public function getMakers()
    {
        return self::$makers_list;
    }

    public function getCarByID($id)
    {
        return self::$car_database[$id];
    }
}
?>