<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Team;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\UserTeam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-team-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $teams = Team::find()->all() ?>
    <?= $form->field($model, 'team_id')
        ->dropDownList(ArrayHelper::map($teams, 'id', 'title'))
    ?>
    <?php $users = User::find()->select(['id', 'username'])->all() ?>
    <?= $form->field($model, 'user_id')
        ->checkboxList(ArrayHelper::map($users, 'id', 'username'))
    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
