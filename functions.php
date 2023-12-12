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
    $playerInfo['max_hp'] = 10; // Set the initial max_hp value
    $playerInfo['mp'] = 10;
    $playerInfo['max_mp'] = 10; //Set the initial max_mp value
    $playerInfo['experience'] = 0;
    $playerInfo['arena_fights'] = 25;
    $playerInfo['gold'] = 100;
    $playerInfo['charm'] = 0;
    $playerInfo['bank'] = 0;
    $playerInfo['attack'] = 1;
    $playerInfo['defense'] = 1;
    $playerInfo['weapon'] = 1;
    $playerInfo['armor'] = 1;
    $playerInfo['relationship'] = 1;
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
    echo render_border();
    echo render_white("Player Name: ") . $playerInfo['name'] . "\n";
    echo render_white("Level: ") . $playerInfo['level'] . "\n";
    echo render_white("HP: ") . $playerInfo['hp'] . "/" . $playerInfo['max_hp'] . "\n"; // Display max_hp
    echo render_white("MP: ") . $playerInfo['mp'] . "/" . $playerInfo['max_mp'] . "\n";
    echo render_white("Experience: ") . $playerInfo['experience'] . "\n";
    echo render_white("Arena Fights: ")  . $playerInfo['arena_fights'] . "\n";
    echo render_white("Gold: ") . $playerInfo['gold'] . "\n";
    echo render_white("Charm: ") . $playerInfo['charm'] . "\n";
    echo render_white("Bank: ") . $playerInfo['bank'] . "\n";
    echo render_white("Attack: ") . $playerInfo['attack'] . "\n";
    echo render_white("Defense: ") . $playerInfo['defense'] . "\n";
    echo render_white("Relationship: ") . $playerInfo['relationship'] . "\n";

    $weapon = load_item('weapon', $playerInfo['weapon']);
    echo render_white("Weapon: ") . $weapon['Name'] . "\n";

    $armor = load_item('armor', $playerInfo['armor']);
    echo render_white("Armor: ") . $armor['Name'] . "\n";
    echo render_border();

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
    $validOptions = ['F', 'M', 'I', 'T', 'C', 'V', 'L', 'S', 'Q'];
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
                    enter_arena($playerInfo);
                    echo "You chose to fight at the Arena.\n";
                    break;
                case 'M':
                    weapon_store($playerInfo);
                    echo "You chose Maximus Death Store.\n";
                    break;
                case 'I':
                    imperium_inn($playerInfo);
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
        $firstLetter = strtoupper(substr($item['Name'], 0, 1)); // Ensure the first letter is capitalized
        $validOptions[] = $firstLetter; // Store the first letter as a valid option
        $fullMenu .= render_choice($firstLetter) . " {$item['Name']} - Cost: {$item['Cost']} gold\n";
    }
    $fullMenu .= render_border();

    do {
        echo $fullMenu;
        echo "Enter the letter of the $category you want to purchase (or 'R' to return): ";
        $choice = strtolower(readline());

        $message = '';

        if ($choice === 'r') {
            echo "Returning to the previous menu.\n";
            break;
        }

        if (in_array($choice, $validOptions)) {
            $selectedItem = null;

            // Find the item whose name starts with the chosen letter
            foreach ($inventory as $item) {
                if (strtoupper(substr($item['Name'], 0, 1)) === strtoupper($choice)) {
                    $selectedItem = $item;
                    break;
                }
            }

            if ($selectedItem !== null) {
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


function calculate_experience_required($currentLevel) {
    return $currentLevel * 100;
}

function gain_experience(&$playerInfo, $experience) {
    $playerInfo['experience'] += $experience;

    // Check if the player has gained a level
    if ($playerInfo['experience'] >= calculate_experience_required($playerInfo['level'])) {
        $playerInfo['experience'] = 0;
        $playerInfo['level']++;
        $playerInfo['max_hp'] += 5;
        $playerInfo['max_mp'] += 5;
        $playerInfo['attack'] += 2;
        $playerInfo['defense'] += 2;

        echo "Congratulations! You've reached Level {$playerInfo['level']}!\n";
        echo "Your stats have been upgraded:\n";
        echo "Max HP: +5\n";
        echo "Max MP: +5\n";
        echo "Attack: +2\n";
        echo "Defense: +2\n";
    }
}

function imperium_inn(&$playerInfo) {
    $validOptions = ['S', 'F', 'H', 'Q'];

    echo render_border();
    echo "Imperium Inn - {$playerInfo['name']}'s Rest\n";
    echo render_choice("S") . "leep for the night (Cost: 20 gold)\n";
    echo render_choice("F") . "lirt with Cecilia\n";
    echo render_choice("H") . "ear banter from the locals\n";
    echo render_choice("Q") . "uit the Imperium Inn\n";
    echo render_border();

    do {
        echo "Your command, " . $playerInfo['name'] . "? : ";
        $choice = strtoupper(readline());

        if (in_array($choice, $validOptions)) {
            switch ($choice) {
                case 'S':
                    sleep_at_inn($playerInfo);
                    break;
                case 'F':
                    flirt_with_cecilia($playerInfo);
                    break;
                case 'H':
                    hear_banter();
                    break;
                case 'Q':
                    echo "Leaving the Imperium Inn.\n";
                    break;
            }
        } else {
            echo "Invalid choice. Please select a valid option.\n";
        }
    } while ($choice !== 'Q');
}

function sleep_at_inn(&$playerInfo) {
    $cost = 20;

    echo "Are you sure you want to sleep for the night? (Cost: {$cost} gold) (yes/no): ";
    $confirmation = strtolower(readline());

    if ($confirmation === 'yes') {
        if ($playerInfo['gold'] >= $cost) {
            $playerInfo['gold'] -= $cost;
            $playerInfo['hp'] = $playerInfo['max_hp'];
            $playerInfo['mp'] = $playerInfo['max_mp'];
            echo "You had a good night's rest and restored your health to its maximum!\n";
        } else {
            echo "You don't have enough gold to afford a night's rest.\n";
        }
    } else {
        echo "You decided not to sleep for the night.\n";
    }
}

function flirt_with_cecilia(&$playerInfo) {
    $relationshipLevel = $playerInfo['relationship'] ?? 1;
    $costs = [10, 50, 150, 250];
    $successChances = [75, 50, 25, 10];

    if (!isset($playerInfo['relationship'])) {
        $playerInfo['relationship'] = 1;
    }

    $currentCost = $costs[$relationshipLevel - 1];
    $currentChance = $successChances[$relationshipLevel - 1];

    echo "You approach Cecilia with a romantic gesture.\n";
    echo "Cost: {$currentCost} gold\n";
    echo "Success Chance: {$currentChance}%\n";

    if ($playerInfo['gold'] >= $currentCost) {
        echo "Are you sure you want to proceed? (yes/no): ";
        $confirmation = strtolower(readline());

        if ($confirmation === 'yes') {
            $playerInfo['gold'] -= $currentCost;

            $success = mt_rand(1, 100) <= $currentChance;

            if ($success) {
                echo "Cecilia responds positively to your gesture!\n";
                echo "You feel your relationship with her has deepened.\n";

                $playerInfo['relationship']++;

                if ($relationshipLevel === 4) {
                    echo "Congratulations! You've successfully proposed to Cecilia!\n";
                    echo "You are now married!\n";

                    $playerInfo['max_hp'] += 20;
                    $playerInfo['max_mp'] += 20;
                    $playerInfo['attack'] += 5;
                    $playerInfo['defense'] += 5;
                }
            } else {
                echo "Cecilia seems unresponsive to your gesture. Better luck next time!\n";
            }
        } else {
            echo "You decided not to proceed with your romantic gesture.\n";
        }
    } else {
        echo "You don't have enough gold to afford this romantic gesture.\n";
    }
}

function hear_banter() {
    $banterFile = 'data/banter.json';

    if (file_exists($banterFile)) {
        $banter = json_decode(file_get_contents($banterFile), true);

        if (is_array($banter) && !empty($banter)) {
            $randomIndex = array_rand($banter);
            echo "Local Banter: {$banter[$randomIndex]}\n";
        } else {
            echo "No banter available.\n";
        }
    } else {
        echo "No banter file found.\n";
    }
}

function enter_arena(&$playerInfo) {
    $validOptions = ['E', 'V', 'L'];

    do {
        echo render_border();
        echo "Colosseum - Fight for Glory!\n";
        echo render_choice("E") . "nter the colosseum\n";
        echo render_choice("V") . "iew current combatants list\n";
        echo render_choice("L") . "eave\n";
        echo render_border();

        echo "Your command, " . $playerInfo['name'] . "? : ";
        $choice = strtoupper(readline());

        if (in_array($choice, $validOptions)) {
            switch ($choice) {
                case 'E':
                    initiate_arena_fight($playerInfo);
                    break;
                case 'V':
                    view_combatants_list();
                    break;
                case 'L':
                    echo "Leaving the colosseum.\n";
                    break;
            }
        } else {
            echo "Invalid choice. Please select a valid option.\n";
        }
    } while ($choice !== 'L');
}

function initiate_arena_fight(&$playerInfo) {
    $enemies = json_decode(file_get_contents('data/enemies.json'), true);

    // Get a random enemy
    $randomIndex = array_rand($enemies);
    $enemy = $enemies[$randomIndex];

    echo "You are fighting {$enemy['name']}!\n";
    echo "Your Hitpoints: {$playerInfo['hp']}\n";
    echo "{$enemy['name']} Hitpoints: {$enemy['hp']}\n";

    do {
        echo "Your command, " . $playerInfo['name'] . "? (A)ttack or (R)un: ";
        $choice = strtoupper(readline());

        switch ($choice) {
            case 'A':
                player_attack($playerInfo, $enemy);
                if ($enemy['hp'] > 0) {
                    enemy_attack($playerInfo, $enemy);
                }
                break;
            case 'R':
                echo "You chose to run. Coward!\n";
                break;
            default:
                echo "Invalid choice. Please select a valid option.\n";
        }

    } while ($choice !== 'R' && $playerInfo['hp'] > 0 && $enemy['hp'] > 0);

    if ($playerInfo['hp'] <= 0) {
        echo "You were defeated by {$enemy['name']}!\n";
        revive_player($playerInfo);
    } elseif ($enemy['hp'] <= 0) {
        echo "Congratulations! You defeated {$enemy['name']} and earned {$enemy['gold_reward']} gold!\n";
        $playerInfo['gold'] += $enemy['gold_reward'];
        gain_experience($playerInfo, calculate_experience_required($playerInfo['level']));
    }
}

function player_attack(&$playerInfo, &$enemy) {
    $playerWeapon = load_item('weapon', $playerInfo['weapon']);
    $playerAttack = (($playerInfo['attack'] + $playerWeapon['Attack']) - $enemy['defense']) * mt_rand(80, 120) / 100;

    echo "You attack {$enemy['name']} with {$playerWeapon['Name']} for {$playerAttack} damage!\n";
    $enemy['hp'] -= $playerAttack;
}

function enemy_attack(&$playerInfo, &$enemy) {
    $playerArmor = load_item('armor', $playerInfo['armor']);
    $enemyAttack = ($enemy['attack'] - ($playerInfo['defense'] + $playerArmor['Defense'])) * mt_rand(80, 120) / 100;

    echo "{$enemy['name']} attacks you. Your {$playerArmor['Name']} absorbs some damage!\n";
    echo "{$enemy['name']} deals {$enemyAttack} damage to you!\n";

    $playerInfo['hp'] -= $enemyAttack;
}

function view_combatants_list() {
    $enemiesFile = 'data/enemies.json';

    if (!file_exists($enemiesFile)) {
        echo "Error: Enemies file not found.\n";
        return;
    }

    $enemies = json_decode(file_get_contents($enemiesFile), true);

    if (!is_array($enemies) || empty($enemies)) {
        echo "No enemies available.\n";
        return;
    }

    echo render_border();
    echo "Current Combatants List\n";
    echo render_border();

    foreach ($enemies as $enemy) {
        echo "{$enemy['name']} - HP: {$enemy['hp']}, Attack: {$enemy['attack']}, Defense: {$enemy['defense']}, Gold Reward: {$enemy['gold_reward']}\n";
    }

    echo render_border();
    any_key();
}


function revive_player(&$playerInfo) {
    $reviveCost = max(20, intval(0.25 * $playerInfo['gold']));
    $playerInfo['hp'] = 1;
    $playerInfo['gold'] -= $reviveCost;

    echo "You have been revived with 1 HP, but it cost you {$reviveCost} gold!\n";
}
