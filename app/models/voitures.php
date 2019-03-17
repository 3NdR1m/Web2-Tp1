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
        if (!file_exists('./images/cars/thumbnails')) {
            mkdir('./images/cars/thumbnails', 0777, true);
        }
        if(self::$car_database == null)
        {
            self::$car_database = array(
                #https://www.kia.ca/rio?sourceid=new-nav
                new Car("Kia", "Forte", 18245, "Le segment des voitures compactes avait besoin d'une révolution, et la voici. Pleine de technologie et agréable à conduire, la Forte a été complètement repensée pour vous en donner plus. Plus de conduite sportive. Plus de plaisir au volant. Toujours connectée et technologiquement avancée. Et avec son nouveau look audacieux et sa finition haut de gamme, elle fait vraiment tourner les têtes."),
                new Car("Kia", "Optima", 16395, "Conçue pour attirer. Conduite pour plaire. L’Optima est la berline qui prouve que la sécurité et le confort peuvent rimer avec conduite mémorable."),
                new Car("Kia", "Rio", 26795, "FAITE POUR DÉPASSER VOS ATTENTES! Avec sa nouvelle allure élégante et un éventail complet de technologies, la Rio prochaine génération se démarque partout où elle va."),
                #https://www.mazda.fr/showroom/
                new Car("Mazda", "CX3", 20390, "Le Mazda CX-3 vous donne le sourire dès les premiers tours de roue. Ce crossover urbain a tout d’un grand séducteur : un design athlétique et élégant, un charme irrésistible et des prestations à la hauteur du niveau de performance. Grâce à l’évolution du design KODO, l’extérieur prend une allure audacieuse et raffinée et l’intérieur vous impressionne par le soin apporté à chaque détail et la qualité des finitions. "),
                new Car("Mazda", "CX5", 24350, "Avec le Mazda CX-5, entrez dans une nouvelle dimension où le conducteur est placé au centre de toutes les attentions. Repensé de fond en comble, notre SUV compact est aussi agréable et confortable pour les passagers que pour le conducteur. Conçu pour célébrer le plaisir de conduire, le Mazda CX-5 suscite chez chaque occupant un puissant sentiment Jinba Ittai, cette formidable sensation d’osmose et de lien avec la voiture."),
                new Car("Mazda", "Cx7", 16450, "Avec le Mazda CX-7, entrez dans une nouvelle dimension où le conducteur est placé au centre de toutes les attentions. Repensé de fond en comble, notre SUV compact est aussi agréable et confortable pour les passagers que pour le conducteur. Conçu pour célébrer le plaisir de conduire, le Mazda CX-5 suscite chez chaque occupant un puissant sentiment Jinba Ittai, cette formidable sensation d’osmose et de lien avec la voiture."),
                #https://www.toyota.fr/
                new Car("Toyota", "Corolla 2017", 23950, "Berline compacte aux lignes racées et au regard affûté, la Nouvelle Corolla est prête à attaquer la route. Ressentez le dynamisme et l'énergie de ses deux motorisations Hybrides 122 ch et 180 ch, en profitant de sensations de conduite inégalées. Son look distinctif allié à un intérieur design et technologique font de la Nouvelle Corolla, la référence Hybride. Installez-vous pour vivre une expérience unique."),
                new Car("Toyota", "Highlander 2017", 31520, "Le Highlander offre des sièges capitaine chauffants à l’avant en tissu, en cuir (XLE AWD/hybride) ou en cuir perforé et ventilé (Limited/Limited hybride). La 2e rangée comprend une banquette divisée 60/40 (LE FWD, LE AWD et XLE AWD) ou des sièges capitaine (en option sur les modèles SE AWD et Limited). Une banquette divisée 60/40 rabattable à plat de 3e rangée est offert sur tous les modèles. Le contrôle automatique de la température à trois zones indépendantes assure un confort douillet sur les modèles XLE et supérieurs."),
                new Car("Toyota", "RAV4 2017", 16495, "Construit sur la nouvelle plateforme révolutionnaire de Toyota, le tout nouveau RAV4 apporte une nouvelle énergie au segment avec sa posture puissante et son allure ciselée. Mais son attrait n’est pas seulement superficiel. Le RAV4 tire parti de son empattement allongé et de sa largeur de voie plus imposante pour procurer une expérience de conduite stable et assurée. De plus, ses porte-à-faux raccourcis et sa garde au sol accrue lui permettent d’affronter pratiquement tous les terrains."),
                #https://https://www.mitsubishi-motors.fr/
                new Car("Mitsubichi", "Lancer 2016", 9595, "Jamais accidenté * Garantie motopropulseur jusqu'en janvier 2025 avec possibilité d'extension d`un an / 20 000 km sur la garantie pare-choc à pare-choc!  toujours parmi les moins chers, rapport qualité prix, nos inspections certifiées sont parmi les plus rigoureuses du marché (126 points)."),
                new Car("Mitsubichi", "Mirage 2017", 20000, "Bien que compacte, la Mitsubishi Mirage 2018 assure à ses occupants une sécurité sans compromis. Roulez sans inquiétude en vous sachant protégés de toutes parts grâce à un système de sept sacs gonflables de série, composé de deux sacs gonflables à l’avant, de rideaux gonflables latéraux (pour les occupants avant et arrière), de sacs gonflables latéraux intégrés aux sièges avant et d’un sac gonflable pour les genoux du conducteur."),
                new Car("Mitsubichi", "Outlander 2013", 22995, "L’Outlander de Mitsubishi vous permet audacieusement d’aller au bout de vos ambitions. Son allure avant-gardiste et son ingénierie inventive procurent une conduite haute confiance, un confort exceptionnel et suffisamment d’espace pour toute la famille."),
                #https://www.nissan.fr/
                new Car("Nissan", "Juke", 13000, "Nissan Intelligent Mobility redéfinit la façon dont nous utilisons nos voitures. C’est une vision qui nous permet de conduire avec plus d’assurance, en vivant des moments plus forts et en étant mieux connectés au monde qui nous entoure. Découvrez une expérience de conduite plus riche et plus intense à bord de la nouvelle gamme du Nissan JUKE. Ce crossover est doté des dernières technologies Nissan Intelligent Mobility qui veillent sur vous."),
                new Car("Nissan", "Sentra 2016", 15698, "La belle vie est à votre portée. Nissan Intelligent MobilityMC vous aide à vous déplacer en toute confiance grâce au système de freinage d’urgence intelligent, tout en vous offrant une connectivité sans faille pour téléphone intelligent[*][*]. Ces caractéristiques sont combinées avec un style qui ne passe pas inaperçu, à un intérieur impressionnant et à une consommation de 6,3 L/100 km (45 mi/gal)"),
                new Car("Nissan", "Versa", 10977, "Les lignes de caisse audacieuses des portières contribuent au profil aérodynamique de la VersaMD NoteMD, tandis que des angles incisifs bien placés se joignent à des courbes fluides pour produire une apparence moderne et dynamique."),
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

    public static function isCarIndexValid(int $carId) {
        return ($carId >= 0 && $carId < sizeof(self::$model_list));
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

$model = new Model();

?>