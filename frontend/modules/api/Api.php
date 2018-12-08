<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 08.12.2018
 * Time: 19:10
 */

namespace frontend\modules\api;

use yii\base\Module;

class Api extends Module
{
    public $controllerNamespace = 'frontend\modules\api\controllers';

    public function init ()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }
}