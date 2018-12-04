<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "telegram_project_sign".
 *
 * @property int $id
 * @property int $telegram_id
 */
class TelegramProjectSign extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telegram_project_sign';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telegram_id'], 'required'],
            [['telegram_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'telegram_id' => 'Telegram ID',
        ];
    }
}
