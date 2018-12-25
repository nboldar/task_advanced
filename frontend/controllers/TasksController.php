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
                        'actions' => ['index', 'single', 'done', 'outdated','ok'],
                        'allow' => true,
                        'roles' => ['user'],
                    ],
                    [
                        'actions' => ['index', 'single', 'update', 'my','ok'],
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

        // $chat = new ChatServer();
//        if(!$chat->start()){
//            $chat->start();
//        }
//$chat->start();
        $userId = \Yii::$app->user->getId();
        $dataProvider = new ArrayDataProvider([
            'models' => Task::findAll(['executor' => $userId]),
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
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

    public function actionDone ()
    {
        $userId = \Yii::$app->user->getId();
        $dataProvider = new ArrayDataProvider([
            'models' => Task::findAll(['status' => '1', 'executor' => $userId]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionOutdated ()
    {
        $userId = \Yii::$app->user->getId();
        $dataProvider = new ArrayDataProvider([
            'models' => Task::find()
                ->where(['status' => '0'])
                ->andWhere('finish < curdate()')
                ->andWhere(['executor' => $userId])
                ->all(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionOk ($id)
    {
        $model = $this->findModel($id);
        $model->status=1;
        $model->execution=date('Y-m-d');
        $model->save();
        return $this->redirect(\Yii::$app->request->referrer);
    }

}
