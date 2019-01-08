<?php

namespace console\controllers;

use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;


class WebsocketController extends \yii\console\Controller
{
    public function actionIndex ()
    {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new \console\components\WebsocketServer()
                )),
            8080);
        $server->run();
    }

}
