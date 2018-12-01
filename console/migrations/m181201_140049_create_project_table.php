<?php

use yii\db\Migration;

/**
 * Handles the creation of table `project`.
 */
class m181201_140049_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('project', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull(),
            'description' => $this->text(),
            'creator' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull()->defaultValue('0'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
        $this->addForeignKey('fk_creator_id', 'project', 'creator', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('project');
    }
}
