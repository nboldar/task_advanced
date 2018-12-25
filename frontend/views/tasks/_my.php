<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

if ($model->finish < date('Y-m-d') && $model->status == 0) {
   $class= 'alert-danger';
}else{
    $class=null;
}

?>
<?php Pjax::begin()?>
<tr class="<?= $class?>">
    <td><?= $model->id ?></td>
    <td><a href="./single?id=<?= $model->id ?>"><?= $model->title ?></a></td>
    <td><?= $model->executor0->username ?></td>
    <td><?= $model->start ?></td>
    <td><?= $model->finish ?></td>
    <td>
        <?php if ($model->status == 0): ?>
            <!-- @var $disabled boolean-->
            <?php $disabled = false ?>
            Not done
        <?php else: ?>
            <?php $disabled = true ?>
            Done
        <?php endif; ?>
    </td>
    <td><?php ?>
        <?= Html::a(Html::encode('This task is done'),
            Url::to(['tasks/ok', 'id' => $model->id]),
            $options = ['class' => 'btn btn-default', 'disabled' => $disabled]) ?>
    </td>
</tr>
<?php Pjax::end()?>