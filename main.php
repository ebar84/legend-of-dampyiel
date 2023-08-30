<?php

function game_start(){

    echo "Please make a choice\n
            1.) Start a new game\n
            2.) Load Game\n
            3.) Quit\n";

    $choice = readline(">> ");

    if ($choice !== "1") {
        echo "sorry brah, you made a bad choice.\n";
        game_start();
    } else {
        echo "Game will now begin!";
    }

}

game_start();