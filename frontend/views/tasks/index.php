<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 26.11.2018
 * Time: 14:59
 */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <div class="caption">

            </div>
        </div>
    </div>

</div>

<?php foreach ($tasks as $task): ?>
    <div class="thumbnail">
        <div class="caption">
            <h3>id№<?= $task->id ?>) <?= $task->title ?></h3>
            <p>Executor of this task: <?= $task->executor0->username ?></p>

            <?php if ($task->status == 1): ?>
                <p>The task is done</p>
            <?php else: ?>
                <p>The task in process</p>
            <?php endif; ?>
            <p>
                <a href="./tasks/single?id=<?=$task->id ?>" class="btn btn-primary" role="button">Details</a>
                <a href="#" class="btn btn-default" role="button">Кнопка</a>
            </p>
        </div>
    </div>
<?php endforeach; ?>


