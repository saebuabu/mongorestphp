<?php

require 'classes/Chat.php';
require dirname(__DIR__) . '/mongorestphp/vendor/autoload.php';
use Ratchet\Server\IoServer;

$server = IoServer::factory(
    new Chat(),
    8089
);

$server->run();
?>