<?php

namespace Server;

class Card
{
    const COLOR_BLUE = 3;
    const COLOR_GREEN = 2;
    const COLOR_RED = 1;
    const COLOR_YELLOW = 4;
    const COLOR_WILD = 0;

    const EFFECT_NONE = 0;
    const EFFECT_SKIP = 1;
    const EFFECT_DRAW_TWO = 2;
    const EFFECT_REVERSE = 5;
    const EFFECT_WILD = 3;
    const EFFECT_WILD_DRAW_FOUR = 4;

    private $color = self::COLOR_WILD;
    private $number = 0;
    private $points = 0;
    private $effect = self::EFFECT_NONE;

    public function __construct($color, $number = 0, $effect = self::EFFECT_NONE)
    {
        $this->color = $color;
        $this->number = $number;
        $this->effect = $effect;

        $this->calculatePoints();
    }

    private function calculatePoints()
    {
        if (in_array($this->effect, [self::EFFECT_WILD, self::EFFECT_WILD_DRAW_FOUR])) {
            $this->points = 50;
        } else if (in_array($this->effect, [self::EFFECT_SKIP, self::EFFECT_REVERSE, self::EFFECT_DRAW_TWO])) {
            $this->points = 20;
        } else {
            $this->points = $this->number;
        }
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function getEffect()
    {
        return $this->effect;
    }
}