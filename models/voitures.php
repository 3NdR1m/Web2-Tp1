<?php
/**
 * @author Benjamin Bergeron <1833271>
 */

include_once("./classes/Car.php");

function carClassSort(Car $a, Car $b) {
    $al = $a->maker;
    $bl = $b->maker;
    if ($al == $bl) {
        return 0;
    }
    return ($al > $bl) ? +1 : -1;
}

/**
 * @static
 */
class Model {
    private static $car_database = array();
    private static $makers_list = array();

    public function __construct() {
        /*if(self::$car_database == null)
        {
            self::$car_database = array(
                "kia" => new CarMaker("Kia")
            );
        }*/
        if(self::$car_database == null)
        {
            self::$car_database = array(
                #https://www.kia.ca/rio?sourceid=new-nav
                new Car("Kia", "Forte", 18245, "Le segment des voitures compactes avait besoin d'une révolution, et la voici. Pleine de technologie et agréable à conduire, la Forte 2019 a été complètement repensée pour vous en donner plus. Plus de conduite sportive. Plus de plaisir au volant. Toujours connectée et technologiquement avancée. Et avec son nouveau look audacieux et sa finition haut de gamme, elle fait vraiment tourner les têtes."),
                new Car("Kia", "Optima", 16395, "FAITE POUR DÉPASSER VOS ATTENTES! Avec sa nouvelle allure élégante et un éventail complet de technologies, la Rio prochaine génération se démarque partout où elle va."),
                new Car("Kia", "Rio", 26795, "Conçue pour attirer. Conduite pour plaire. L’Optima est la berline qui prouve que la sécurité et le confort peuvent rimer avec conduite mémorable."),
                #https://www.mazda.fr/showroom/
                new Car("Mazda", "CX3", 20390, "Le Mazda CX-3 vous donne le sourire dès les premiers tours de roue. Ce crossover urbain a tout d’un grand séducteur : un design athlétique et élégant, un charme irrésistible et des prestations à la hauteur du niveau de performance. Grâce à l’évolution du design KODO, l’extérieur prend une allure audacieuse et raffinée et l’intérieur vous impressionne par le soin apporté à chaque détail et la qualité des finitions. "),
                new Car("Mazda", "CX5", 24350, "Avec le Mazda CX-5, entrez dans une nouvelle dimension où le conducteur est placé au centre de toutes les attentions. Repensé de fond en comble, notre SUV compact est aussi agréable et confortable pour les passagers que pour le conducteur. Conçu pour célébrer le plaisir de conduire, le Mazda CX-5 suscite chez chaque occupant un puissant sentiment Jinba Ittai, cette formidable sensation d’osmose et de lien avec la voiture."),
                new Car("Mazda", "Cx7", 16450, "La Mazda2, qui allie plaisir de conduire et style, est incomparable. Chaque Mazda est inspirée de la philosophie Jinba Ittai, pour créer une osmose entre le conducteur et la voiture, à l’instar de l’union entre le cavalier et sa monture. Ressentez le lien fusionnel qui vous unit à votre Mazda2 et qui se renforce chaque fois que vous parcourez les rues de la ville ou les routes sinueuses de la campagne. Les dernières Technologies SKYACTIV et SKYACTIV-VEHICLE DYNAMICS rendent ce lien encore plus intense et agréable."),
                #https://www.toyota.fr/
                new Car("Toyota", "Corolla 2017", 23950, "Berline compacte aux lignes racées et au regard affûté, la Nouvelle Corolla est prête à attaquer la route. Ressentez le dynamisme et l'énergie de ses deux motorisations Hybrides 122 ch et 180 ch, en profitant de sensations de conduite inégalées. Son look distinctif allié à un intérieur design et technologique font de la Nouvelle Corolla, la référence Hybride. Installez-vous pour vivre une expérience unique."),
                new Car("Toyota", "Highlander 2017", 31520, ""),
                new Car("Toyota", "RAV4 2017", 16495, ""),
                new Car("Mitsubichi", "Lancer 2016", 9595, ""),
                new Car("Mitsubichi", "Mirage 2017", 20000, ""),
                new Car("Mitsubichi", "Outlander 2013", 22995, ""),
                new Car("Nissan", "Juke", 13000, ""),
                new Car("Nissan", "Sentra 2016", 15698, ""),
                new Car("Nissan", "Versa", 10977, ""),
            );
        }
        if(self::$makers_list == null)
        {
            foreach (self::$car_database as $car) {
                if(!in_array($car->maker, self::$makers_list))
                {
                    self::$makers_list[] = $car->maker;
                }
            }
            asort(self::$makers_list);
        }
    }

    public static function getMakers() {
        return self::$makers_list;
    }

    public static function getModelsByMaker(String $maker) {
        if(!in_array($maker, self::$makers_list)) {
           throw new Exception("Maker named \"".$maker."\" doesn't exist", 1);
        }
        $model_list = array();
        foreach (self::$car_database as $car) {
            if($car->maker == $maker)
            {
                $model_list[] = $car;
            }
        }

        return $model_list;
    }

    public static function getModelsByMakerId(int $maker_id) {
        if(!in_array($maker, self::$makers_list)) {
            throw new Exception("Maker named \"".$maker."\" doesn't exist", 1);
        }
        $model_list = array();
        foreach (self::$car_database as $car) {
            if($car->maker == $maker)
            {
                $model_list[] = $car;
            }
        }

        return $model_list;
    }

    /**
     * get a specific car instance by it's database id.
     *
     * @param integer $id
     * @return Car
     */
    public static function getCarByID(int $id) {
        if($id < sizeof(self::$car_database) && $id >=0)
        {
            return self::$car_database[$id];
        }
        else {
            throw new Exception("The index ($id) is out of bound", 1);
        }
    }
}



?>