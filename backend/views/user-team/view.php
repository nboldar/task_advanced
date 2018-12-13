<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserTeam */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-team-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update Team', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete User from Team', ['delete', 'id' => $model->id], [
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
            [
                'attribute' => 'team_id',
                'value' => $model->team->title,
            ],
            [
                'attribute' => 'user_id',
                'value' => $model->user->username,
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
