<?php

namespace Server\Token;

use Server\Token;
use Server\Card\GameCard as Card;
use Server\Token\Player\GamePlayer;

class Game extends Token
{
    const STATUS_MATCHMAKING = 2;
    const STATUS_PLAYING = 1;
    const STATUS_ENDED = 0;

    const MIN_PLAYERS = 2;
    const MAX_PLAYERS = 10;

    const START_CARDS = 7;

    private $status = self::STATUS_MATCHMAKING;

    private $active_cards = [];
    private $used_cards = [];
    private $players = [];

    public function __construct()
    {
        parent::__construct();

        $this->fillCards();
    }

    private function fillCards()
    {
        $this->active_cards = [];
        $this->used_cards = [];

        foreach (Card::getColors() as $color) {
            foreach (range(0, 9) as $number) {
                $this->active_cards[] = new Card($color, $number);
            }

            foreach (range(1, 9) as $number) {
                $this->active_cards[] = new Card($color, $number);
            }

            $this->active_cards[] = new Card($color, 0, Card::EFFECT_SKIP);
            $this->active_cards[] = new Card($color, 0, Card::EFFECT_SKIP);
            $this->active_cards[] = new Card($color, 0, Card::EFFECT_DRAW_TWO);
            $this->active_cards[] = new Card($color, 0, Card::EFFECT_DRAW_TWO);
            $this->active_cards[] = new Card($color, 0, Card::EFFECT_REVERSE);
            $this->active_cards[] = new Card($color, 0, Card::EFFECT_REVERSE);

            shuffle($this->active_cards);
        }

        $this->active_cards[] = new Card(Card::COLOR_WILD, 0, Card::EFFECT_WILD);
        $this->active_cards[] = new Card(Card::COLOR_WILD, 0, Card::EFFECT_WILD);
        $this->active_cards[] = new Card(Card::COLOR_WILD, 0, Card::EFFECT_WILD);
        $this->active_cards[] = new Card(Card::COLOR_WILD, 0, Card::EFFECT_WILD);

        $this->active_cards[] = new Card(Card::COLOR_WILD, 0, Card::EFFECT_WILD_DRAW_FOUR);
        $this->active_cards[] = new Card(Card::COLOR_WILD, 0, Card::EFFECT_WILD_DRAW_FOUR);
        $this->active_cards[] = new Card(Card::COLOR_WILD, 0, Card::EFFECT_WILD_DRAW_FOUR);
        $this->active_cards[] = new Card(Card::COLOR_WILD, 0, Card::EFFECT_WILD_DRAW_FOUR);

        shuffle($this->active_cards);
    }

    public function addPlayer(GamePlayer $player)
    {
        foreach (range(1, self::START_CARDS) as $number) {
            $number = array_rand($this->active_cards);

            $player->addCard($this->active_cards[$number]);

            unset($this->active_cards[$number]);
        }

        $this->players[] = $player;
    }

    public function isEnough()
    {
        return sizeof($this->players) >= self::MIN_PLAYERS && sizeof($this->players) <= self::MAX_PLAYERS;
    }

    public function isAutoStart()
    {
        return sizeof($this->players) == self::MAX_PLAYERS;
    }
}