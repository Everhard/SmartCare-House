<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "device_type".
 *
 * @property integer $id
 * @property string $classname
 * @property string $name
 * @property string $description
 */
class DeviceType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'device_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classname', 'name', 'description'], 'required'],
            [['classname', 'name', 'description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'classname' => 'Class Name',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }
}
