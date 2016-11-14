<?php

namespace Server;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Socket implements MessageComponentInterface
{
    private $data = [];
    private $clients = null;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        $this->decode($conn, $this->message('Welcome'));
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $this->data[] = $msg;

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $this->decode($client, $this->message($msg));
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->decode($conn, $this->message('Bye bye..'));
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        $this->decode($conn, $this->error($e->getMessage()));
        $conn->close();
    }

    private function message($text)
    {
        return [
            'code' => 0,
            'message' => $text,
            'data' => $this->data,
        ];
    }

    private function error($text)
    {
        return [
            'code' => 1,
            'error' => $text,
        ];
    }

    private function decode(ConnectionInterface $conn, $data)
    {
        $conn->send(json_encode($data));
    }
}