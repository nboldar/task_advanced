<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserTeam */

$this->title = 'Update User Team: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-team-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
