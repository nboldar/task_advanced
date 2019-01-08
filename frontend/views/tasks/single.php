<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 27.11.2018
 * Time: 20:28
 */

/**
 * @var \common\models\Chat $history
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
        <form action="#" name="chat_form" id="chat_form">
            <label for="">
                print the message
                <input type="hidden" name="channel" value="<?= $channel?>">
                <input type="hidden" name="user_id" value="<?= \Yii::$app->user->getId()?>">
                <input type="text" name="message">
                <input type="submit">
            </label>
            <hr>
            <div id="root_chat">
                <?php foreach ($history as $msg):?>
                <div>
                    <span><?= $msg->user->username?>: <?= $msg->message?></span>
                </div>
                <?php endforeach;?>

            </div>
        </form>

    </div>
</div>