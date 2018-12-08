<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 08.12.2018
 * Time: 18:47
 */

namespace frontend\modules\api\controllers;


use common\models\User;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;

class TaskController extends ActiveController
{
    public $modelClass = 'common\models\Task';

    public function behaviors ()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth'],
        ];
        return $behaviors;
    }

    public function auth ($username, $password)
    {
        $user = User::findOne(['username' => $username,]);
        return $user->validatePassword($password) ? $user : null;
    }
}