<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_team`.
 */
class m181212_184024_create_user_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_team', [
            'id'=>$this->primaryKey(),
            'team_id' => $this->integer(),
            'user_id'=>$this->integer(),

            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
        $this->addForeignKey('fk_userTeam_id', 'user_team', 'user_id', 'user', 'id');
        $this->addForeignKey('fk_team_id', 'user_team', 'team_id', 'team', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_team');
    }
}
