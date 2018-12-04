<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php $users = User::find()->select(['id', 'username'])->all(); ?>
    <?= $form->field($model, 'creator')->dropDownList(ArrayHelper::map($users, 'id', 'username')) ?>

    <?php $status = [
        ['value' => '0', 'title' => 'not done'],
        ['value' => '1', 'title' => 'done'],
    ] ?>
    <?= $form->field($model, 'status')->dropDownList(ArrayHelper::map($status, 'value', 'title')) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
