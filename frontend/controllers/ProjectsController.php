<?php

namespace frontend\controllers;

use common\models\Project;
use common\models\Task;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;



class ProjectsController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //  'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['index','single'],
                        'allow' => true,
                        'roles' => ['user'],
                    ],
                    [
                        'actions' => ['index','single'],
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

        $dataProvider = new ArrayDataProvider([
            'models' => Project::find()->all(),
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionSingle ($id)
    {


        $tasks=Task::findAll(['project'=>$id]);
        return $this->render('../tasks/index',['tasks'=>$tasks]);
    }

}
