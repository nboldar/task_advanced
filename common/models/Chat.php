<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "chat".
 *
 * @property int $id
 * @property string $channel
 * @property string $message
 * @property int $user_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */
class Chat extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return 'chat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [['user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['channel', 'message'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'id' => 'ID',
            'channel' => 'Channel',
            'message' => 'Message',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors ()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser ()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function getChannelHistory ($channel)
    {
        return static::find()
            ->where(['channel' => $channel])
            ->orderBy('created_at')
            ->all();
    }
}
