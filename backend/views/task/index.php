<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $key, $index, $grid) {
            if ($model->finish < date('Y-m-d') && $model->status == 0) {
                return ['class' => 'alert-danger'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            // 'description:ntext',
            [
                'attribute' => 'project',
                'value' => 'project0.title',
            ],
            [
                'attribute' => 'creator',
                'value' => 'creator0.username',
            ],
            [
                'attribute' => 'executor',
                'value' => 'executor0.username',
            ],
            'start',
            'finish',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    if ($model->status == 0) {
                        return 'not done';
                    } else {
                        return 'done';
                    }
                },
            ],
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return \yii\helpers\Url::to(['task/' . $action, 'id' => $model->id]);
                },
            ],
        ],
    ]); ?>
</div>
