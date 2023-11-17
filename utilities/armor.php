<?php

$armor = [
    [
        "ID" => 1,
        "Name" => "Broken Shield",
        "Defense" => 2,
        "Cost" => 10,
        "Sell Cost" => 5,
    ],
    [
        "ID" => 2,
        "Name" => "Iron Helmet",
        "Defense" => 8,
        "Cost" => 35,
        "Sell Cost" => 18,
    ],
    [
        "ID" => 3,
        "Name" => "Steel Chestplate",
        "Defense" => 15,
        "Cost" => 70,
        "Sell Cost" => 35,
    ],
    [
        "ID" => 4,
        "Name" => "Elven Boots",
        "Defense" => 10,
        "Cost" => 50,
        "Sell Cost" => 25,
    ],
    [
        "ID" => 5,
        "Name" => "Dragon Scale Armor",
        "Defense" => 25,
        "Cost" => 120,
        "Sell Cost" => 60,
    ],
    [
        "ID" => 6,
        "Name" => "Mage's Robe",
        "Defense" => 3,
        "Cost" => 25,
        "Sell Cost" => 12,
    ],
    [
        "ID" => 7,
        "Name" => "Basic Shield",
        "Defense" => 5,
        "Cost" => 30,
        "Sell Cost" => 10,
    ],
];
$armorJson = json_encode($armor, JSON_PRETTY_PRINT);

file_put_contents('../data/armor.json', $armorJson);

echo "Armor data has been saved to armor.json\n";