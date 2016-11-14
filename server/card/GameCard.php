<?php

namespace Server\Card;

use Server\Card;

class GameCard extends Card
{
    public static function getColors()
    {
        return [
            self::COLOR_BLUE,
            self::COLOR_GREEN,
            self::COLOR_RED,
            self::COLOR_YELLOW,
        ];
    }
}