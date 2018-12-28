<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "date-off".
 *
 * @property int $id
 * @property int $id_user
 * @property string $date_create
 * @property string $date_end
 * @property int $status
 *
 * @property User $user
 */
class DateOff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'date_off';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'date_create', 'date_end', 'status'], 'required'],
            [['id_user', 'status'], 'integer'],
            [['date_create', 'date_end'], 'safe'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'date_create' => 'Date Create',
            'date_end' => 'Date End',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
