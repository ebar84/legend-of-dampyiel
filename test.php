<?php
function save_player($player) {
  $jsonString = json_encode($player) . "\n";
  file_put_contents('player.json', $jsonString);
}

function load_player($filename) {
  echo "Loading the file...\n";
  $json = file_get_contents('player.json');
  echo $json;
  echo "Turning json back into an array...\n";
  $player = json_decode($json, true);

  return $player;
}

// Sample PHP array
$data = array(
  "name" => "Bob Doe",
  "age" => 30,
  "email" => "johndoe@example.com"
);
save_player($data);

$player = load_player('player.json');
var_dump($player);
?>