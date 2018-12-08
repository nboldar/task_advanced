<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 08.12.2018
 * Time: 17:35
 */

namespace common\components;


use common\models\Project;
use common\models\TelegramProjectSign;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;

class Bootstrap extends Component implements BootstrapInterface
{
    public function bootstrap ($app)
    {
        Event::on(Project::className(), Project::EVENT_AFTER_INSERT, function (Event $e) {
            $title = $e->sender->title;
            $creator = $e->sender->creator0->username;
            $message = "New project\"{$title}\" created. Creator: {$creator}";
            $subscribers = TelegramProjectSign::find()->asArray()->all();
            foreach ($subscribers as $subscriber) {
                /**
                 * @var $bot \SonkoDmitry\Yii\TelegramBot\Component
                 */
                $bot = \Yii::$app->bot;
                $bot->sendMessage($subscriber['telegram_id'], $message);
            }
        });
    }

}