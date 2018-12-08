<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Task */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'project',
                'value' => $model->project0->title,
            ],
            'description:ntext',

            [
                'attribute' => 'creator',
                'value' => $model->creator0->username,
            ],
            [
                'attribute' => 'executor',
                'value' => $model->executor0->username,
            ],
            'start',
            'finish',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    if ($model->status == 0) {
                        return 'not done';
                    }else{
                        return 'done';
                    }
                },
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
