<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserTeam */

$this->title = 'Add Users to Team';
$this->params['breadcrumbs'][] = ['label' => 'User Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-team-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
