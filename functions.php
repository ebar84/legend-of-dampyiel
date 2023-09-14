<?php

function game_start(){
    $validChoice = true;

    do {
        echo "Please make a choice\n
            1.) Start a new game\n
            2.) Load Game\n
            3.) Quit\n";

        $choice = readline(">> ");

        switch ($choice) {
            case "1":
                echo "Your game is beginning\n";
                echo new_game();
                break;
            case "2":
                echo "Your game is now loading\n";
                break;
            case "3":
                echo "The game will now exit\n";
                exit();
            default:
                $validChoice = false;
                echo "Bad choice, brah. Please choose 1, 2, or 3\n";
        }
    } while (!$validChoice);
}

function new_game() {
    $playerInfo = array();

    echo "Welcome to your new adventure!\n";
    $playerInfo['name'] = readline("Enter your name: ");

    $validClasses = ['Warrior', 'Mage', 'Archer', 'Thief'];
    $validRaces = ['Human', 'Elf', 'Dwarf', 'Orc'];

    echo "Choose your class:\n";
    foreach ($validClasses as $classOption) {
        echo "$classOption\n";
    }
    $classChoice = readline("Choose your class: ");

    if (!in_array($classChoice, $validClasses)) {
        echo "Sorry, that is not one of the listed choices.\n";
        return;
    }

    echo "Choose your race:\n";
    foreach ($validRaces as $raceOption) {
        echo "$raceOption\n";
    }
    $raceChoice = readline("Choose your race: ");

    if (!in_array($raceChoice, $validRaces)) {
        echo "Sorry, that is not one of the listed choices.\n";
        return;
    }

    echo "Your awesome new hero has been created!\n";
    echo "Name: " . $playerInfo['name'] . "\n";
    echo "Class: " . $classChoice . "\n";
    echo "Race: " . $raceChoice . "\n";

    $playerInfo['class'] = $classChoice;
    $playerInfo['race'] = $raceChoice;

    $saveFile = json_encode($playerInfo);
    $fileName = 'playerinfo.php';

    file_put_contents($fileName, '<?php $playerInfo = ' . var_export($saveFile, true) . ';', LOCK_EX);
}

