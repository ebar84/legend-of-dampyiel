<?php

function game_start(){

    echo "Please make a choice\n
            1.) Start a new game\n
            2.) Load Game\n
            3.) Quit\n";

    $choice = readline(">> ");

    if ($choice === "1"){
        echo "Start a new game";
    } elseif ($choice === "2"){
        echo "Load game";
    } elseif ($choice === "3"){
        exit();
    } else {
        echo "Invalid choice. Please try again\n";
        game_start();
    }
}

game_start();