<?php

include 'functions.php';

// Initializing the player
$playerInfo = [];
$validChoice = true;

banner();

do {
    echo "Please make a choice\n";
    echo "1.) Start a new game\n";
    echo "2.) Load Game\n";
    echo "3.) Quit\n";

    $choice = readline(">> ");

    switch ($choice) {
        case "1":
            new_game($playerInfo);
            break;
        case "2":
            load_game($playerInfo);
            break;
        case "3":
            echo "The game will now exit\n";
            quit_game();
        default:
            $validChoice = false;
            echo "Bad choice, brah. Please choose 1, 2, or 3\n";
    }
} while (!$validChoice);
