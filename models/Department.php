<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Department
 * @package app\models
 * @property $name String
 */
class Department extends ActiveRecord
{
    public static function tableName()
    {
        return 'department';
    }

    public function rules()
    {
        return [
            [
                ['name'], 'required'
            ],
            [
                ['name'], 'string'
            ],
            [
                ['name'], 'unique'
            ]
        ];
    }
}