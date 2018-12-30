<?php

namespace console\controllers;

use common\models\TelegramOffset;
use common\models\TelegramProjectSign;
use TelegramBot\Api\Types\Message;
use TelegramBot\Api\Types\Update;
use yii\console\Controller;
use SonkoDmitry\Yii\TelegramBot\Component;

class TelegramController extends Controller
{
    /**
     * @var $bot Component
     */
    private $bot;
    private $offset = 0;

    public function init ()
    {
        parent::init();
        $this->bot = \Yii::$app->bot;
        $this->bot->setCurlOption(CURLOPT_TIMEOUT, 30);
        $this->bot->setCurlOption(CURLOPT_CONNECTTIMEOUT, 30);
        $this->bot->setCurlOption(CURLOPT_HTTPHEADER, ['Expect:']);
        set_time_limit(0);
    }

    public function actionIndex ()
    {
        while (true) {
            $updates = $this->bot->getUpdates($this->getOffset() + 1);
            $updCount = count($updates);
            if ($updCount > 0) {
                echo "New messages: " . $updCount . PHP_EOL;
                foreach ($updates as $update) {
                    $this->updateOffset($update);
                    if ($message = $update->getMessage()) {
                        $this->processCommand($message);
                    }
                }
            } else {
                echo "There is no new messages" . PHP_EOL;
                sleep(3);
            }
        }

    }

    private function getOffset ()
    {
        $max = TelegramOffset::find()->select('id')->max('id');
        if ($max > 0) {
            $this->offset = $max;
        }
        return $this->offset;
    }

    private function updateOffset (Update $update)
    {
        $model = new TelegramOffset([
            'id' => $update->getUpdateId(),
            'timestamp_offset' => date('Y-m-d H:i:s'),
        ]);
        $model->save();
    }

    private function processCommand (Message $message)
    {
        $params = explode(" ", $message->getText());
        $command = $params[0];
        $response = "";
        $telegramId = $message->getFrom()->getId();
        switch ($command) {
            case "/help":
                $response = "Available commands: \n";
                $response .= "/help -commands list; \n";
                $response .= "/project_create ##project_name## -create new project with specified name; \n";
                $response .= "/project_signup  -sign up for getting message when new project was started; \n";
                $response .= "/task_create  ##task_name## -create new task with specified name; \n";
                break;
            case '/project_signup':

                $model = new TelegramProjectSign([
                    'telegram_id' => $telegramId,
                ]);
                $model->save();
                $response = "You are signed up to know about new project \n";
                break;
            default:
                $response = "unknown command \n";
        }
        $this->bot->sendMessage($telegramId, $response);
    }

}
