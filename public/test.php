<?php

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);
set_time_limit(0);

use Server\Token\Game;
use Server\Token\Player\GamePlayer;


$player = new GamePlayer('Xsat', 1);
$game = new Game();
$game->addPlayer($player);

exit;