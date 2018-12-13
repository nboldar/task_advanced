<?php

namespace backend\controllers;

use common\models\User;
use Yii;
use common\models\UserTeam;
use backend\models\search\UserTeamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserTeamController implements the CRUD actions for UserTeam model.
 */
class UserTeamController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors ()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserTeam models.
     * @return mixed
     */
    public function actionIndex ()
    {
        $searchModel = new UserTeamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserTeam model.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView ($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserTeam model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate ()
    {
        $request = \Yii::$app->request->post();
        if (array_key_exists('UserTeam', $request)) {
            $params = ($request)['UserTeam'];
            $user_ids = $params['user_id'];
            foreach ($user_ids as $user_id) {
                $model = new UserTeam([
                    'team_id' => $params['team_id'],
                    'user_id' => $user_id,
                ]);
                $model->save();
            }
            return $this->redirect('index');
        }
        $model = new UserTeam();
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserTeam model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate ($id)
    {
        $request = Yii::$app->request->post();
        if (array_key_exists('UserTeam', $request)) {
            $params = $request['UserTeam'];
            $models = UserTeam::findAll(['team_id' => $params['team_id']]);
            $users_in_team = UserTeam::find()
                ->select('user_id')
                ->where(['team_id' => $params['team_id']])
                ->column();

            /**
             * @var $model
             */
            foreach ($models as $model) {
                if (in_array($model->user_id, $params['user_id'])) {
                    continue;
                } else {
                    $model->delete();
                }
            }
            foreach ($params['user_id'] as $user) {
                if (in_array($user, $users_in_team)) {
                    continue;
                } else {
                    $model = new UserTeam([
                        'team_id' => $params['team_id'],
                        'user_id' => $user,
                    ]);
                    $model->save();
                }
            }
            return $this->redirect('index');
        }

        $model = $this->findModel($id);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserTeam model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete ($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserTeam model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return UserTeam the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel ($id)
    {
        if (($model = UserTeam::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
