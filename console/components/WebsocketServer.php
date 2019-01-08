<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 02.01.2019
 * Time: 17:10
 */

namespace console\components;

use common\models\Chat;
use common\models\User;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;


class WebsocketServer implements MessageComponentInterface
{
    protected $clients = [];

    public function onOpen (ConnectionInterface $conn)
    {
        $queryString = $conn->httpRequest->getUri()->getQuery();
        $channel = explode("=", $queryString)[1];
        $this->clients[$channel][$conn->resourceId] = $conn;
        echo "new connection: {$conn->resourceId}\n";
    }

    public function onClose (ConnectionInterface $conn)
    {
        foreach ($this->clients as $clients) {
            foreach ($clients as $key => $item) {
                if ($key == $conn->resourceId) {
                    unset($clients[$key]);
                    break;
                }
            }
        }
        echo "\n conn {$conn->resourceId} disconnect \n";
    }

    public function onError (ConnectionInterface $conn, \Exception $e)
    {
        $conn->close();
        echo $e->getMessage();
        echo "\n conn {$conn->resourceId} closed with error \n";
    }

    public function onMessage (ConnectionInterface $from, $data)
    {
        $data = json_decode($data, true);
        (new Chat($data))->save();
        $lastIdChatInsert = \Yii::$app->db->lastInsertID;
        $lastChatMsg = Chat::findOne(['id' => $lastIdChatInsert]);
        $channel = $data['channel'];
        $sender = User::findOne(['id' => $data['user_id']])->username;

        $msg = [
            'sender' => $sender,
            'message' => $data['message'],
            'time' => $lastChatMsg->created_at,
        ];


        foreach ($this->clients[$channel] as $client) {
            $client->send(json_encode($msg));
        }
    }

}