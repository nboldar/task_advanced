<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        [
            'attribute' => 'title',
            'value' => function (\common\models\Project $models) {
                return Html::a(Html::encode($models->title), Url::to(['projects/single', 'id' => $models->id]));
            },
            'format' => 'raw',
        ]
        ,
        // 'description:ntext',

        [
            'attribute' => 'creator',
            'value' => 'creator0.username',
        ],
//
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

