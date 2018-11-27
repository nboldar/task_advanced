<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\swiftmailer\Mailer;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $creator
 * @property int $executor
 * @property string $start
 * @property string $finish
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $creator0
 * @property User $executor0
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'executor', 'start', 'finish'], 'required'],
            [['description'], 'string'],
            [['creator', 'executor', 'status'], 'integer'],
            [['start', 'finish', 'created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['creator'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creator' => 'id']],
            [['executor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['executor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'creator' => 'Creator',
            'executor' => 'Executor',
            'start' => 'Start',
            'finish' => 'Finish',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
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
    public function getCreator0()
    {
        return $this->hasOne(User::className(), ['id' => 'creator']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExecutor0()
    {
        return $this->hasOne(User::className(), ['id' => 'executor']);
    }

    public function insert ($runValidation = true, $attributes = null)
    {
        $this->setAttribute('creator', \Yii::$app->user->getId());
        return parent::insert($runValidation, $attributes);
    }


}
