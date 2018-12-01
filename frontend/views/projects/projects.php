<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 01.12.2018
 * Time: 19:50
 */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;


?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'title',
        // 'description:ntext',
        [
            'attribute' => 'project',
            'value' => 'project0.title',
        ],
        [
            'attribute' => 'creator',
            'value' => 'creator0.username',
        ],
        [
            'attribute' => 'executor',
            'value' => 'executor0.username',
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
        'created_at',
        'updated_at',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
