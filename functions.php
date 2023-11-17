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
    $playerInfo['weapon'] = 1;
    $playerInfo['armor'] = 1;
    $playerInfo['inventory'] = [];

    save_game($playerInfo, FALSE);

    echo "Your character, {$playerInfo['name']}, has been created and saved!\n";
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

  if (!file_exists('data/player.json')) {
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
    $playerInfo = json_decode(file_get_contents('data/player.json'), TRUE);
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

    $weapon = load_item('weapon', $playerInfo['weapon']);
    echo "Weapon: " . $weapon['Name'] . "\n";

    $armor = load_item('armor', $playerInfo['armor']);
    echo "Armor: " . $armor['Name'] . "\n";

    any_key();
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
    file_put_contents('data/player.json', $playerData);
    echo "Game saved successfully!\n";
  }
}

/**
 * Exits the game.
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
        render_choice("I") . "mperium Inn\t\t\t\t" .
        render_choice("T") . "rain with your Master\n" .
        render_choice("C") . "hallenge the legendary Dampyiel\t" .
        render_choice("V") . "iew Stats\t\n" .
        render_choice("L") . "oad Game\t\t\t\t" .
        render_choice("S") . "ave Game\t\t\t\t\n" .
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
                case 'I':
                    // inn function
                    echo "You chose the Imperium Inn.\n";
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

          echo $fullMenu;
        }
    } while ($choice !== 'Q');
}

/**
 * Buy inventory, including weapons or armor.
 *
 * @param $playerInfo
 *   Player information
 */
function weapon_store(&$playerInfo) {
    $exit = false;

    do {
        echo render_border();
        echo "You are in the Weapon Store.\n";
        echo render_border();

        echo "What would you like to buy?\n";
        echo render_choice("W") . " Weapons\n";
        echo render_choice("A") . " Armor\n";
        echo render_choice("L") . " Leave store\n";

        $choice = strtoupper(readline("Enter your choice: "));

        switch ($choice) {
            case 'W':
                display_inventory("weapon", $playerInfo);
                break;
            case 'A':
                display_inventory("armor", $playerInfo);
                break;
            case 'L':
                echo "Leaving the store.\n";
                $exit = true;
                break;
            default:
                echo "Invalid choice. Please select a valid option.\n";
        }
    } while (!$exit);
}

/**
 * Display inventory available to buy
 *
 * @param $category
 *    Category of weapons or armor
 *
 * @param $playerInfo
 *    Player information
 *
 * @return void
 */
function display_inventory($category, &$playerInfo) {
  $exitInventory = false;
  $validOptions = [];
  $inventory = load_item($category);

  // Build a list of valid options and print the inventory
  $fullMenu = render_border();
  $fullMenu .= "Available $category for purchase:\n";
  foreach ($inventory as $key => $item) {
    $validOptions[] = $key + 1;
    $fullMenu .= render_choice($key + 1) . " {$item['Name']} - Cost: {$item['Cost']} gold\n";
  }
  $fullMenu .= render_border();

  do {
    echo $fullMenu;
    echo "Enter the number of the $category you want to purchase (or 'R' to return): ";
    $choice = strtolower(readline());

    $message = '';

    if ($choice === 'r') {
      echo "Returning to the previous menu.\n";
      break;
    }

    $choice = (int) $choice;

    if (in_array($choice, $validOptions)) {
      $selectedItem = $inventory[$choice - 1];

      if (isset($playerInfo[$category]) && $playerInfo[$category] === $selectedItem['ID']) {
        $message = "You already own {$selectedItem['Name']}. Choose another item or 'R' to return.\n";
      }

      $cost = $selectedItem['Cost'];

      if (!$message && $playerInfo['gold'] >= $cost) {
        $playerWeapon = load_item($category, $playerInfo[$category]);

        echo "Are you sure you want to sell your {$playerWeapon['Name']} for {$playerWeapon['Sell Cost']} gold and buy {$selectedItem['Name']}? (yes/no): ";
        $confirmation = strtolower(readline());

        if ($confirmation === 'yes') {
          $playerInfo['gold'] += $playerWeapon['Sell Cost'];
          $playerInfo['gold'] -= $selectedItem['Cost'];

          $playerInfo[$category] = $selectedItem['ID'];

          echo "You sold your {$playerWeapon['Name']} for {$playerWeapon['Sell Cost']} gold and bought {$selectedItem['Name']} for {$selectedItem['Cost']} gold!\n";
          $exitInventory = true;
        } else {
          $message = "Transaction canceled. Choose another item or 'R' to return.\n";
        }
      } elseif (!$message && $playerInfo['gold'] < $cost) {
        $message = "You don't have enough gold to purchase this item. Choose another item or 'R' to return.\n";
      }
    } else {
      $message = "Invalid choice. Please select a valid option.\n";
    }

    echo $message;
    any_key();

  } while (!$exitInventory);
}

function load_item($type, $findItem = 0) {
  $items = json_decode(file_get_contents('data/' . $type. '.json'), TRUE);

  if ($findItem == 0) {
    return $items;
  }
  else {
    foreach ($items as $item) {
      if ($item['ID'] == $findItem) {
        return $item;
      }
    }
  }
}

function any_key() {
  echo "Press enter to continue...";
  readline();
}