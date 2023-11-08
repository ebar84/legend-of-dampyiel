<?php

$weapons = [
    [
        "ID" => 1,
        "Name" => "Wooden Sword",
        "Attack" => 5,
        "Defense" => 2,
        "Cost" => 30,
        "Sell Cost" => 15,
    ],
    [
        "ID" => 2,
        "Name" => "Axe",
        "Attack" => 12,
        "Defense" => 3,
        "Cost" => 120,
        "Sell Cost" => 60,
    ],
    [
        "ID" => 3,
        "Name" => "Bow",
        "Attack" => 8,
        "Defense" => 2,
        "Cost" => 80,
        "Sell Cost" => 40,
    ],
    [
        "ID" => 4,
        "Name" => "Staff",
        "Attack" => 6,
        "Defense" => 6,
        "Cost" => 90,
        "Sell Cost" => 45,
    ],
    [
        "ID" => 5,
        "Name" => "Dagger",
        "Attack" => 7,
        "Defense" => 3,
        "Cost" => 100,
        "Sell Cost" => 50,
    ],
    [
        "ID" => 6,
        "Name" => "Short Sword",
        "Attack" => 9,
        "Defense" => 4,
        "Cost" => 150,
        "Sell Cost" => 75,
    ],
    [
        "ID" => 7,
        "Name" => "Sword",
        "Attack" => 10,
        "Defense" => 5,
        "Cost" => 100,
        "Sell Cost" => 50,
    ],
];

$weaponsJson = json_encode($weapons, JSON_PRETTY_PRINT);

file_put_contents('weapons.json', $weaponsJson);

echo "Weapons data has been saved to weapons.json\n";
