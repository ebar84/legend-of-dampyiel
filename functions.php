<?php

function new_game(&$playerInfo) {
    do {
        echo "Welcome to your new adventure!\n";
        $playerInfo['name'] = readline("Enter your name: ");

        $validClasses = ['Warrior', 'Mage', 'Archer', 'Thief'];
        $validRaces = ['Human', 'Elf', 'Dwarf', 'Orc'];

        do {
            echo "Choose your class:\n";
            for ($i = 0; $i < count($validClasses); $i++) {
                echo ($i + 1) . ". {$validClasses[$i]}\n";
            }
            $classChoice = (int)readline("Choose your class (enter the number): ");

            if ($classChoice < 1 || $classChoice > count($validClasses)) {
                echo "Invalid choice. Please select a valid class number.\n";
            }
        } while ($classChoice < 1 || $classChoice > count($validClasses));

        do {
            echo "Choose your race:\n";
            for ($i = 0; $i < count($validRaces); $i++) {
                echo ($i + 1) . ". {$validRaces[$i]}\n";
            }
            $raceChoice = (int)readline("Choose your race (enter the number): ");

            if ($raceChoice < 1 || $raceChoice > count($validRaces)) {
                echo "Invalid choice. Please select a valid race number.\n";
            }
        } while ($raceChoice < 1 || $raceChoice > count($validRaces));


        echo "Your awesome new hero has been created!\n";
        echo "Name: " . $playerInfo['name'] . "\n";
        echo "Class: " . $validClasses[$classChoice - 1] . "\n";
        echo "Race: " . $validRaces[$raceChoice - 1] . "\n";

        $playerInfo['class'] = $validClasses[$classChoice - 1];
        $playerInfo['race'] = $validRaces[$raceChoice - 1];

        $confirm = strtolower(readline("Is this what you want? (yes/no): "));
    } while ($confirm !== 'yes');

    $fileName = 'player.json';
    file_put_contents($fileName, json_encode($playerInfo, JSON_PRETTY_PRINT));

    echo "Character has been saved!\n";
    enter_world($playerInfo);
}

function load_game(&$playerInfo) {
  if (file_exists('player.json')) {
    $playerInfo = json_decode(file_get_contents('player.json'), true);
    enter_world($playerInfo);
  } else {
    echo "No saved game found. Starting a new game.\n";
    new_game($playerInfo);
  }
}

function enter_world(&$playerInfo) {
   // The game begins

}


