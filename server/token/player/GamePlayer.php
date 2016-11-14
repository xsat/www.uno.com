<?php

namespace Server\Token\Player;

use Server\Card;
use Server\Token\Player;

class GamePlayer extends Player
{
    private $cards = [];

    public function addCard(Card $card)
    {
        $this->cards[] = $card;
    }
}