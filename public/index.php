<?php define('RAND_VERSION', rand()) ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uno game</title>
    <link rel="stylesheet" href="css/style.css?v-<?= RAND_VERSION ?>">
</head>
<body>
<script src="js/pixi/bin/pixi.js"></script>
<script src="js/card.js?v-<?= RAND_VERSION ?>"></script>
<script src="js/player.js?v-<?= RAND_VERSION ?>"></script>
<script src="js/socket.js?v-<?= RAND_VERSION ?>"></script>
<script src="js/game.js?v-<?= RAND_VERSION ?>"></script>
<script src="js/main.js?v-<?= RAND_VERSION ?>"></script>
</body>
</html>