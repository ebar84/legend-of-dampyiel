<?php

/**
 * Begins a new game.
 *
 * @param $playerInfo
 *   Player information
 *
 * @return void
 */
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

/**
 * Loads a saved game.
 *
 * @param $playerInfo
 *   Player information
 *
 * @return void
 */
function load_game(&$playerInfo) {
  if (file_exists('player.json')) {
    $playerInfo = json_decode(file_get_contents('player.json'), true);
    enter_world($playerInfo);
  } else {
    echo "No saved game found. Starting a new game.\n";
    new_game($playerInfo);
  }
}

/**
 * Enters into the game world.
 *
 * @param $playerInfo
 *  Player Information
 *
 * @return void
 */
function enter_world(&$playerInfo) {
   // The game begins

    $validOptions = ['F', 'M', 'Y', 'T', 'C', 'V', 'S', 'Q'];

    while (true) {
        echo "\nMain Menu Options:\n";
        echo "Fight at the Arena (F)\n";
        echo "Maximus Death Store (M)\n";
        echo "Ye Olde Inn (Y)\n";
        echo "Train with your Master (T)\n";
        echo "Challenge the legend Dampyiel (C)\n";
        echo "View Stats (V)\n";
        echo "Save Game (S)\n";
        echo "Quit Game (Q)\n";

        $choice = strtoupper(readline("Choose an option: "));

        if (!in_array($choice, $validOptions)) {
            echo "Invalid choice. Please select a valid option.\n";
            continue;
        }

        switch ($choice) {
            case 'F':
                // fight function
                echo "You chose to fight at the Arena.\n";
                break;
            case 'M':
                // store function
                echo "You chose Maximus Death Store.\n";
                break;
            case 'Y':
                // inn function
                echo "You chose Ye Olde Inn.\n";
                break;
            case 'T':
                // train function
                echo "You chose to train with your Master.\n";
                break;
            case 'C':
                // challenge function
                echo "You chose to challenge the legend Dampyiel.\n";
                break;
            case 'V':
                echo "You chose to view your stats:\n";

                // Define the primary stats
                $attack = 100;
                $defense = 100;
                $hp = 100;
                $mp = 100;

                // Display the primary stats
                echo "Primary Stats:\n";
                echo "Attack: $attack\n";
                echo "Defense: $defense\n";
                echo "HP: $hp\n";
                echo "MP: $mp\n";
                break;
            case 'S':
                echo "You chose to save the game.\n";
                $playerData = json_encode($playerInfo, JSON_PRETTY_PRINT);
                file_put_contents('player.json', $playerData);

                echo "Game saved successfully!\n";
                break;
            case 'Q':
                echo "Quitting the game. Goodbye!\n";
                exit();
        }
    }
}

