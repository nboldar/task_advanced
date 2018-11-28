<?php

namespace frontend\controllers;

use common\models\Tasks;
use yii\web\NotFoundHttpException;
use common\components\ChatServer;

class TasksController extends \yii\web\Controller
{
    public function actionIndex ()
    {

        $chat = new ChatServer();
//        if(!$chat->start()){
//            $chat->start();
//        }
//$chat->start();
        $tasks = Tasks::find()->all();
        return $this->render('index', ['tasks' => $tasks,]);
    }

    public function actionSingle ($id)
    {
        $model = $this->findModel($id);
        return $this->render('single', ['model' => $model,]);
    }

    public function actionUpdate ($id)
    {
        $model = $this->findModel($id);
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['tasks/single', 'id' => $model->id]);
        }
        return $this->render('update', ['model' => $model,]);
    }

    protected function findModel ($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
