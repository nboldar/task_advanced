<?php

use yii\db\Migration;

/**
 * Handles the creation of table `chat`.
 */
class m190102_160032_create_chat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('chat', [
            'id' => $this->primaryKey(),
            'channel'=>$this->string(),
            'message'=>$this->string(),
            'user_id'=>$this->integer(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
        $this->addForeignKey('fk_chat_user_id', 'chat', 'user_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('chat');
    }
}
