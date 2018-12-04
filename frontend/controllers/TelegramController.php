<?php

namespace frontend\controllers;

use SonkoDmitry\Yii\TelegramBot\Component;
use Yii;

class TelegramController extends \yii\web\Controller
{
    public function actionIndex ()
    {
        /**
         * @var Component $bot
         */
        $bot = Yii::$app->bot;
        $bot->setCurlOption(CURLOPT_TIMEOUT, 30);
        $bot->setCurlOption(CURLOPT_CONNECTTIMEOUT, 30);
        $bot->setCurlOption(CURLOPT_HTTPHEADER, ['Expect:']);
        $updates = $bot->getUpdates();
        $messages = [];
        foreach ($updates as $update) {
            $message = $update->getMessage();
            $username = $message->getFrom()->getUsername();
            $messages[] = [
                'text' => $message->getText(),
                'username' => $username,
            ];
        }

        return $this->render('index',['messages'=>$messages]);
    }

}
