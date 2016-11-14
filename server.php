<?php

require __DIR__ . '/vendor/autoload.php';

use Server\Socket;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

$ws = new WsServer(new Socket);
$ws->disableVersion(0);
$server = IoServer::factory(new HttpServer($ws), '3001');
$server->run();