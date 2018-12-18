<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 18.12.2018
 * Time: 21:01
 */

use yii\widgets\ListView;

?>
<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>executor</th>
        <th>Start</th>
        <th>Deadline</th>
    </tr>
    </thead>
    <tbody>
    <?=

    ListView::widget([
        'dataProvider' => $dataProvider,
        'emptyText' => 'There is no your tasks',
        'options' => [
            'tag' => 'div',
            'class' => 'list-wrapper',
            'id' => 'list-wrapper',
        ],
        'layout' => "{pager}\n{items}\n{summary}",
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_my',['model'=>$model]);
        },
    ]);
    ?>
    </tbody>
</table>


