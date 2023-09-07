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

game_start();