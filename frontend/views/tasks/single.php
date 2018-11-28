<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 27.11.2018
 * Time: 20:28
 */

use yii\widgets\DetailView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-7">
        <?php
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'title',                                           // title свойство (обычный текст)
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
                        } else {
                            return 'done';
                        }
                    },
                ],
                'created_at:datetime',
                'updated_at:datetime',
                // дата создания в формате datetime
            ],
        ]);
        ?>
        <a href="./update?id=<?= $model->id ?>" class="btn btn-primary" role="button">Update</a>
    </div>
    <div class="col-md-5">
        comments

    </div>
</div>