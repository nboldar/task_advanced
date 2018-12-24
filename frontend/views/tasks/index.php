<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 26.11.2018
 * Time: 14:59
 */

use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-7">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>executor</th>
                <th>Start</th>
                <th>Deadline</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php Pjax::begin()?>
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
                    return $this->render('_my', ['model' => $model]);
                },
            ]);
            ?>
            <?php Pjax::end()?>
            </tbody>
        </table>
    </div>
    <div class="col-md-2">
        <h4>Username:</h4> <br/>
        <input id="username" type="text">
        <button id="btnSetUsername">Set username</button>

        <div id="chat" style="width:400px; height: 250px; overflow: scroll;"></div>

        <h4>Message:</h4><br/>
        <input id="message" type="text">
        <button id="btnSend">Send</button>
        <div id="response" style="color:#D00"></div>

    </div>
</div>
