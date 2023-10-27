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

    save_game($playerInfo);

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
 * Views a player's current stats.
 *
 * @param $playerInfo
 *   Player information
 *
 * @return void
 */
function view_stats($playerInfo) {
    echo "Player Name: " . $playerInfo['name'] . "\n";
    echo "Class: " . $playerInfo['class'] . "\n";
    echo "Race: " . $playerInfo['race'] . "\n";
}


/**
 * Saves a player's current game.
 *
 * @param $playerInfo
 *   Player information
 *
 * @return void
 */
function save_game($playerInfo) {
    $playerData = json_encode($playerInfo, JSON_PRETTY_PRINT);
    file_put_contents('player.json', $playerData);
}

/**
 * Exit's the game.
 *
 * @return void
 */
function quit_game() {
    exit();
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
    $validOptions = ['F', 'M', 'Y', 'T', 'C', 'V', 'S', 'Q'];

    do {
        echo "\nMain Menu Options:\n";
        echo "(F)ight at the Arena\n";
        echo "(M)aximus Death Store\n";
        echo "(Y)e Olde Inn\n";
        echo "(T)rain with your Master\n";
        echo "(C)hallenge the legend Dampyiel\n";
        echo "(V)iew Stats\n";
        echo "(S)ave Game\n";
        echo "(Q)uit Game\n";

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
                view_stats($playerInfo);
                break;
            case 'S':
                echo "You chose to save the game.\n";
                save_game($playerInfo);
                echo "Game saved successfully!\n";
                break;
            case 'Q':
                echo "Quitting the game. Goodbye!\n";
                quit_game();
        }
    } while ($choice !== 'Q');
}

