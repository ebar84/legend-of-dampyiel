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

function new_game(){
    $playerInfo = array();

    echo "Welcome to your new adventure!\n";
    $playerInfo['name'] = readline("Enter your name: ");


    echo "Choose your class:\n";
    echo "Warrior\n";
    echo "Mage\n";
    echo "Archer\n";
    echo "Thief\n";
    $playerInfo['class'] = readline("Choose your class: ");

    echo "Choose your race:\n";
    echo "Human\n";
    echo "Elf\n";
    echo "Dwarf\n";
    echo "Orc\n";
    $playerInfo['race'] = readline("Choose your race: ");

    echo "Your awesome new hero has been created!\n";
    echo "Name: " . $playerInfo['name'] . "\n";
    echo "Class: " . $playerInfo['class'] . "\n";
    echo "Race: " . $playerInfo['race'] . "\n";

    $saveFile = json_encode($playerInfo);
    $fileName = 'playerinfo.php';

    file_put_contents($fileName, '<?php $playerInfo = ' . var_export($saveFile, true) . ';', LOCK_EX);
}

