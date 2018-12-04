<?php

use yii\db\Migration;

/**
 * Handles the creation of table `telegram_offset`.
 */
class m181203_193548_create_telegram_offset_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp ()
    {
        $this->createTable('telegram_offset', [
            'id' => $this->primaryKey(),
            'timestamp_offset' => $this->timestamp(),
        ]);
        $this->alterColumn('telegram_offset', 'id', 'INT(11) NOT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown ()
    {
        $this->dropTable('telegram_offset');
    }
}
