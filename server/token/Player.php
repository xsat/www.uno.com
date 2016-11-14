<?php

namespace Server\Token;

use Server\Token;

class Player extends Token
{
    private $name = '';
    private $avatar_id = 0;

    public function __construct($name, $avatar_id)
    {
        $this->name = $name;
        $this->avatar_id = $avatar_id;

        parent::__construct();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAvatarId()
    {
        return $this->avatar_id;
    }
}