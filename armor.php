<?php

$armor = [
    // Define your armor items here

    [
        "ID" => 1,
        "Name" => "Basic Shield",
        "Defense" => 5,
        "Cost" => 20,
        "Sell Cost" => 10,
    ],
];

$armorJson = json_encode($armor, JSON_PRETTY_PRINT);

file_put_contents('armor.json', $armorJson);

echo "Armor data has been saved to armor.json\n";