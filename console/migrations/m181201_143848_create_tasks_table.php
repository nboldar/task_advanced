<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181201_143848_create_tasks_table extends Migration
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
            'creator' => $this->integer()->notNull(),
            'executor' => $this->integer()->notNull(),
            'start' => $this->date()->notNull(),
            'finish' => $this->date()->notNull(),
            'status' => $this->integer()->notNull()->defaultValue('0'),
            'project' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
        $this->addForeignKey('fk_project_id', 'tasks', 'project', 'project', 'id');
        $this->addForeignKey('fk_task_executor_id', 'tasks', 'executor', 'user', 'id');
        $this->addForeignKey('fk_task_creator_id', 'tasks', 'creator', 'user', 'id');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks');
    }
}
