<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 27.11.2018
 * Time: 20:50
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Task */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Update Tasks: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

?>
<div class="tasks-form">

    <?php $form = ActiveForm::begin([
        'action' => ["./tasks/update?id={$model->id}"],
        'method' => 'post',
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php $users = User::find()->select(['id', 'username'])->all(); ?>
    <!--    --><?//= $form->field($model, 'creator')->dropDownList(ArrayHelper::map($users, 'id', 'username')) ?>

    <?= $form->field($model, 'executor')->dropDownList(ArrayHelper::map($users, 'id', 'username')) ?>

<!--    --><?//= $form->field($model, 'start')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'finish')->textInput(['type' => 'date']) ?>

    <?php $status = [
        ['value' => '0', 'title' => 'not done'],
        ['value' => '1', 'title' => 'done'],
    ] ?>
    <?= $form->field($model, 'status')->dropDownList(ArrayHelper::map($status, 'value', 'title')) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

