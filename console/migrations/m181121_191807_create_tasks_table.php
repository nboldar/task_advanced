<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181121_191807_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull(),
            'description' => $this->text(),
            'user_id' => $this->integer()->notNull(),
            'start' => $this->date()->notNull(),
            'finish' => $this->date()->notNull(),
            'done' => $this->integer()->notNull()->defaultValue('0'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
        $this->addForeignKey('fk_user_id', 'tasks', 'user_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks');
    }
}
