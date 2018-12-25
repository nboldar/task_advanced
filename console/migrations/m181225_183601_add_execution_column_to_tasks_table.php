<?php

use yii\db\Migration;

/**
 * Handles adding execution to table `tasks`.
 */
class m181225_183601_add_execution_column_to_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tasks', 'execution', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tasks', 'execution');
    }
}
