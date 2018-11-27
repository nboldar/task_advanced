<?php

namespace frontend\controllers;

use common\models\Tasks;
use yii\web\NotFoundHttpException;

class TasksController extends \yii\web\Controller
{
    public function actionIndex ()
    {
        $model = new Tasks();
        $tasks = Tasks::find()->all();
        return $this->render('index', ['tasks' => $tasks, 'model' => $model]);
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
