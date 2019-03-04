<?php
function getCarByFabricant($fabrican){
    return $tab_voiture[$fabrican];
}

$tab_voiture = array(
    "Kia" => array(
        "Forte" => array(
            "description" => "",
            "price" => array(
                8995,
                11000,
                10995
            )
        ),
        "Optima" => array(
            "description" => "",
            "price" => array(
                10995,
                12000,
                15000
            )
        ),
        "Rio" => array(
            "description" => "",
            "price" => array(
                8295,
                7500,
                11000
            )
        )
    ),
    "Mazda" => array(
        "CX3" => array(
            "description" => "",
            "price" => array(
                23995,
                15000,
                12690
            )
        ),
        "CX5" => array(
            "description" => "",
            "price" => array(
                19995,
                9000,
                23000
            )
        ),
        "CX7" => array(
            "description" => "",
            "price" => array(
                7805,
                9635,
                6997
            )
        )
    ),
    "Toyota"=> array(
        "corolla" => array(
            "description" => "",
            "price" => array(
                15995,
                13569,
                12569
            )
        ),
        "Tundra" => array(
            "description" => "",
            "price" => array(
                19877,
                22000,
                18000
            )
        ),
        "venza" => array(
            "description" => "",
            "price" => array(
                16495,
                6352,
                7894
            )
        )
    ),
    "Mitsubichi"=> array(
        "lancer" => array(
            "description" => "",
            "price" => array(
                9595,
                5600,
                7500
            )
        ),
        "mirage" => array(
            "description" => "",
            "price" => array(
                15495,
                20000,
                13000
            )
        ),
        "outlander" => array(
            "description" => "",
            "price" => array(
                22995,
                33000,
                19999
            )
        )
    ),
    "Nissan"=> array(
        "juke" => array(
            "description" => "",
            "price" => array(
                9295,
                15000,
                13000
            )
        ),
        "micra" => array(
            "description" => "",
            "price" => array(
                12195,
                19875,
                15698
            )
        ),
        "rogue" => array(
            "description" => "",
            "price" => array(
                10977,
                12000,
                18000
            )
        )
    )
);
ksort($tab_voiture);
?>