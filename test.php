<?php

include "functions.php";

$playerInfo = json_decode(file_get_contents('player.json'), TRUE);

weapon_store($playerInfo);