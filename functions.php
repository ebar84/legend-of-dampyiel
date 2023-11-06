<?php

include 'weapons.php';

function banner() {
  echo "⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀\033[31m⢀⣀⣀⣠⣤⣤⣤⣤⣤⣤⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣀⣤⣶⡄⢸⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣠⣾⣿⣿⣶⣦⣄⡀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⣀⣴⣾⣿⣿⣿⣿⣼⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣷⣤⡀
⠀⠀⠀⠀⠀⣠⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⠟⠋⠉
⠀⠀⠀⠀⣴⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠿⠟⠛⢉⣉⣉⣉⣉⣉⡉⠙⠛⠻⠿⣿⠟⠋⠀⠀⠀⠀
⠀⠀⢀⣤⣌⣻⣿⣿⣿⣿⣿⣿⠟⢉⣠⣴⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣶⠄⠀⠀⠀⠀⠀⠀⠀
⠀⠀⣼⣿⣿⣿⣿⣿⣿⣿⠟⢁⣴⠿⠛⠋⣉⣁⣀⣀⣀⣉⡉⠛⠻⢿⡿⠃⠀⠀⠀⠀⠀⠀⠀⠀
⠀⢰⣿⣿⣿⣿⣿⣿⣿⠃⡴⠋\033[93m⣁⣴⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⣦⣄\033[31m⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⣼⣿⣿⣿⣿⣿⣿⠃⠜\033[93m⢠⣾⣿⣿⣿⣿⣿⣿⡿⠿⠿⠛⠛⠛⠿⠿⢿⣆\033[31m⠀⠀⠀⠀⠀⠀⠀⠀
⠀⣿⣿⣿⣿⣿⣿⡟⠀\033[93m⢰⣿⣿⣿⡿⠛⢋⣁⣤⣤⣴⣶⣶⣶⣶⣶⣤⣤⣀⣴⣾\033[31m⠀⠀⠀⠀⠀⠀
⠀⢿⣿⣿⣿⣿⣿⠇⠀\033[93m⣿⣿⣿⣿⠃⣼⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\033[31m⠀⠀⠀⠀⠀⠀
⠀⣶⣿⣿⣿⣿⣿⠀\033[93m⢰⣿⣿⣿⡏⢰⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿\033[31m⠀⠀⠀⠀⠀⠀
⠀⣿⣿⣿⣿⣿⠇⠀\033[93m⢸⣿⣿⣿⢀⣿⣿⣿⣿⣿⣿⡿⠛⠋⠉⠉⠉⠛⢿⣿⣿⣿\033[31m⠀⠀⠀⠀⠀⠀
⠀⣿⣿⣿⣿⠏⠀⠀\033[93m⢸⣿⣿⣷⣄⡙⢿⣿⣿⣿⣿⣿⣦⡀⠀⠀⠀⠀⠈⢿⣿⣿\033[31m⠀⠀⠀⠀⠀⠀
⣸⣿⡿⠟⠁⠀⠀⠀\033[93m⢸⣿⣿⣿⣿⣿⣄⠙⢿⣿⣿⣿⣿⣿⣷⣶⣤⡄⠀⢸⣿⣿\033[31m⠀⠀⠀⠀⠀⠀
⠉⠀⠀⠀⠀⠀⠀⠀\033[93m⢸⣿⣿⣿⣿⣿⣿⣧⠈⢻⣿⣿⣿⣿⣿⣿⣿⡇⠀⢸⣿⣿\033[31m⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀\033[93m⣿⣿⣿⣿⣿⣿⣿⣿⣧⠀⢿⣿⣿⣿⣿⣿⣿⣿⡀⠀⠙⠿⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀\033[93m⢀⣼⣿⣿⣿⣿⣿⣿⣿⣿⣿⡀⢸⣿⣿⣿⣿⣿⣿⣿⣷⡀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠙⠻⠿⣿⣿⣿⣿⣿⡿⠿⠛⠁⠀⣿⣿⣿⣿⣿⣿⣿⣿⣷⡀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣄⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠸⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⠃⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⠉⠙⠛⠛⠛⠋⠉⠁⠀⠀⠀⠀⠀\n
\t\033[34mWelcome to the Legends of Dampyiel\033[32m\n\n";

}

function render_choice($choice) {
  return "(\033[93m" . $choice . "\033[32m)";
}

function render_white($text) {
  return "\033[97m" . $text . "\033[32m";
}

function render_border() {
  $border = "-=-=-=-=-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-";
  $new_border = '';

  $i = 0;
  foreach (str_split($border) as $t) {
    if ($i % 2) {
      $new_border .= "\033[93m" . $t;
    }
    else {
      $new_border .= "\033[92m" . $t;
    }
    $i++;
  }

  return $new_border . "\033[32m\n";
}

/**
 * Begins a new game.
 *
 * @param $playerInfo
 *   Player information
 *
 * @return void
 */
function new_game(&$playerInfo) {
    $playerInfo['name'] = readline("Welcome to your new adventure! Enter your name: ");
    $playerInfo['level'] = 1;
    $playerInfo['hp'] = 10;
    $playerInfo['mp'] = 10;
    $playerInfo['experience'] = 0;
    $playerInfo['arena_fights'] = 25;
    $playerInfo['gold'] = 100;
    $playerInfo['charm'] = 0;
    $playerInfo['bank'] = 0;
    $playerInfo['attack'] = 1;
    $playerInfo['defense'] = 1;
    $playerInfo['weapon'] = 0;
    $playerInfo['armor'] = 0;
    $playerInfo['inventory'] = [];

    save_game($playerInfo, FALSE);

    echo "Your character has been created and saved!\n";
    echo "Here are your character's stats:\n";
    view_stats($playerInfo);
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
function load_game(&$playerInfo, $prompt = TRUE) {

  $load_game = TRUE;

  if (!file_exists('player.json')) {
    echo "No saved game found. Starting a new game.\n";
    new_game($playerInfo);
  }

  if ($prompt) {
    do {
      $confirmation = strtolower(readline("Load a saved game? (yes/no): "));

      if ($confirmation == 'no') {
        $load_game = FALSE;
      }

    } while($confirmation != 'yes' && $confirmation != 'no');
  }

  if ($load_game) {
    $playerInfo = json_decode(file_get_contents('player.json'), TRUE);
    echo "Game loaded successfully!\n";
    enter_world($playerInfo);
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
    echo "Level: " . $playerInfo['level'] . "\n";
    echo "HP: " . $playerInfo['hp'] . "\n";
    echo "MP: " . $playerInfo['mp'] . "\n";
    echo "Experience: " . $playerInfo['experience'] . "\n";
    echo "Arena Fights: " . $playerInfo['arena_fights'] . "\n";
    echo "Gold: " . $playerInfo['gold'] . "\n";
    echo "Charm: " . $playerInfo['charm'] . "\n";
    echo "Bank: " . $playerInfo['bank'] . "\n";
    echo "Attack: " . $playerInfo['attack'] . "\n";
    echo "Defense: " . $playerInfo['defense'] . "\n";
    echo "Weapon: " . $playerInfo['weapon'] . "\n";
    echo "Armor: " . $playerInfo['armor'] . "\n";
}


/**
 * Saves a player's current game.
 *
 * @param $playerInfo
 *   Player information
 *
 * @return void
 */
function save_game($playerInfo, $prompt = TRUE) {
  $save_game = TRUE;

  if ($prompt) {
    do {
      echo "Do you want to save the game? (yes/no): ";
      $confirmation = strtolower(readline());

      if ($confirmation == 'no') {
        $save_game = FALSE;
      }

    } while ($confirmation != 'yes' && $confirmation != 'no');
  }

  if ($save_game) {
    $playerData = json_encode($playerInfo, JSON_PRETTY_PRINT);
    file_put_contents('player.json', $playerData);
    echo "Game saved successfully!\n";
  }
}

/**
 * Exit's the game.
 *
 * @return void
 */
function quit_game($prompt = true) {
    $quit_game = true;

    if ($prompt) {
        do {
            echo "Are you sure you want to quit? (yes/no): ";
            $confirmation = strtolower(readline());

            if ($confirmation === 'no') {
                $quit_game = false;
            }
        } while ($confirmation !== 'yes' && $confirmation !== 'no');
    }

    if ($quit_game) {
        exit();
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
    $validOptions = ['F', 'M', 'Y', 'T', 'C', 'V', 'L', 'S', 'Q'];
    $location = 'The Town Square';

    $fullMenu = render_white("\nLegend of Dampyiel - ") . $location . "\n" .
        render_border() . "The streets are crowded with mercenaries, thieves, and other unsavory types.\n\n" .
        render_choice("F") . "ight at the Arena\t\t\t" .
        render_choice("M") . "aximus Death Store\n" .
        render_choice("Y") . "e Olde Inn\t\t\t\t" .
        render_choice("T") . "rain with your Master\n" .
        render_choice("C") . "hallenge the legendary Dampyiel\t" .
        render_choice("V") . "iew Stats\t\n" .
        render_choice("L") . "oad Game\t\t\t\t" .
        render_choice("S") . "ave Game\t\t\t\t" .
        render_choice("Q") . "uit Game\n" .
        render_border();

    echo $fullMenu;

    do {
        echo $location . " (? for menu)\n";
        echo "(" . implode(', ', $validOptions) . ")\n";
        echo "Your command, " . $playerInfo['name'] . "? : ";
        $choice = strtoupper(readline());

        if ($choice == '?') {
            echo $fullMenu;
            continue;
        }

        if (in_array($choice, $validOptions)) {
            switch ($choice) {
                case 'F':
                    // fight function
                    echo "You chose to fight at the Arena.\n";
                    break;
                case 'M':
                    weapon_store($playerInfo);
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
                    save_game($playerInfo);
                    break;
                case 'L':
                    load_game($playerInfo);
                    break;
                case 'Q':
                    quit_game();
            }
        }
    } while ($choice !== 'Q');
}

function weapon_store(&$playerInfo) {
    echo "Welcome to Maximus Death Store!\n";
    echo "What would you like to do?\n";
    echo "1. Buy inventory\n";
    echo "2. Leave store\n";

    $choice = (int)readline("Enter your choice: ");

    if ($choice === 1) {
        buy_inventory($playerInfo);
    } elseif ($choice === 2) {
        echo "Leaving the store.\n";
    } else {
        echo "Invalid choice. Please select a valid option.\n";
        weapon_store($playerInfo);
    }
}

function buy_inventory(&$playerInfo) {
    echo "What would you like to buy?\n";
    echo "1. Weapons\n";
    echo "2. Armor\n";
    echo "3. Leave\n";

    $choice = (int)readline("Enter your choice: ");

    if ($choice === 1) {
        display_inventory("Weapons", $playerInfo['weapons'], $playerInfo);
    } elseif ($choice === 2) {
        display_inventory("Armor", $playerInfo['armor'], $playerInfo);
    } elseif ($choice === 3) {
        echo "Leaving the store.\n";
    } else {
        echo "Invalid choice. Please select a valid option.\n";
        buy_inventory($playerInfo);
    }
}

function display_inventory($category, $inventory, &$playerInfo) {
    echo "$category available for purchase:\n";
    $playerGold = $playerInfo['gold'];

    for ($i = 0; $i < count($inventory); $i++) {
        $item = $inventory[$i];
        $cost = $item['Cost'];
        echo ($i + 1) . ". " . $item['Name'] . " - {$cost} gold\n";
    }
    echo (count($inventory) + 1) . ". Leave\n";

    $choice = (int)readline("Enter the number of the $category you want to purchase: ");

    if ($choice > 0 && $choice <= count($inventory)) {
        $selectedItem = $inventory[$choice - 1];
        $cost = $selectedItem['Cost'];

        if ($playerGold >= $cost) {
            $playerGold -= $cost;
            $playerInfo[$category] = $selectedItem;
            $playerInfo['gold'] = $playerGold;

            echo "You purchased a {$selectedItem['Name']} for {$cost} gold!\n";
        } else {
            echo "You don't have enough gold to purchase this item.\n";
        }

        weapon_store($playerInfo, $playerInfo['weapon'], $playerInfo['armor']);
    } elseif ($choice === count($inventory) + 1) {
        echo "Leaving the store.\n";
    } else {
        echo "Invalid choice. Please select a valid option.\n";
        display_inventory($category, $inventory, $playerInfo);
    }
}