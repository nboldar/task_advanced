<?php

use yii\db\Migration;

/**
 * Handles the creation of table `telegram_project_sign`.
 */
class m181204_191756_create_telegram_project_sign_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp ()
    {
        $this->createTable('telegram_project_sign', [
            'id' => $this->primaryKey(),
            'telegram_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown ()
    {
        $this->dropTable('telegram_project_sign');
    }
}
