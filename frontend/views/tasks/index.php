<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 26.11.2018
 * Time: 14:59
 */

use yii\widgets\ListView;


$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-10">
        <table class="table table-hover ">
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

            <?=

            ListView::widget([
                'dataProvider' => $dataProvider,
                'emptyText' => 'There is no your tasks',
                'itemView' =>'_my',
            ]);
            ?>

            </tbody>
        </table>
    </div>
    <div class="col-md-1">
<!--        <h4>Username:</h4> <br/>-->
<!--        <input id="username" type="text">-->
<!--        <button id="btnSetUsername">Set username</button>-->
<!---->
<!--        <div id="chat" style="width:400px; height: 250px; overflow: scroll;"></div>-->
<!---->
<!--        <h4>Message:</h4><br/>-->
<!--        <input id="message" type="text">-->
<!--        <button id="btnSend">Send</button>-->
<!--        <div id="response" style="color:#D00"></div>-->

    </div>
</div>
