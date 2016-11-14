<?php

namespace Server;

class Token
{
    private $token = null;

    public function __construct()
    {
        $this->generateToken();
    }

    private function generateToken()
    {
        $this->token = sha1(mt_rand(0, 99999999999999) . mt_rand(0, 99999999999999) . mt_rand(0, 99999999999999));
    }

    public function getToken()
    {
        return $this->token;
    }
}