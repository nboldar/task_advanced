<?php

namespace frontend\controllers;

use common\models\Task;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\components\ChatServer;

class TasksController extends \yii\web\Controller
{

    public function behaviors ()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //  'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['my', 'single'],
                        'allow' => true,
                        'roles' => ['user'],
                    ],
                    [
                        'actions' => ['index', 'single', 'update','my'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex ()
    {

        $chat = new ChatServer();
//        if(!$chat->start()){
//            $chat->start();
//        }
//$chat->start();
        $tasks = Task::find()->all();
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
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionMy ()
    {
        $userId = \Yii::$app->user->getId();
        $dataProvider = new ArrayDataProvider([
            'models' => Task::findAll(['executor'=>$userId]),
        ]);
       // var_dump($dataProvider->models);
        return $this->render('my',['dataProvider'=>$dataProvider]);
    }

}
