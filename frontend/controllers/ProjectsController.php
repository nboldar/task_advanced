<?php

namespace frontend\controllers;

use common\models\Project;
use common\models\Tasks;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\data\SqlDataProvider;
use yii\db\Query;

class ProjectsController extends \yii\web\Controller
{
    public function actionIndex ()
    {

        $dataProvider = new ArrayDataProvider([
            'models' => Project::find()->all(),
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionSingle ($id)
    {


        $tasks=Tasks::findAll(['project'=>$id]);
        return $this->render('../tasks/index',['tasks'=>$tasks]);
    }

}
