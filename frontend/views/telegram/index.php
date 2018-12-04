<?php
/* @var $this yii\web\View */
?>
<h1>telegram messages</h1>

<div class="messages-container">
    <?php foreach ($messages as $message):?>
    <div>
        <strong><?= $message['username']?></strong>
        <p><?= $message['text']?></p>
    </div>
    <?php endforeach;?>
</div>
