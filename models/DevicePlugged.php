<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "device_plugged".
 *
 * @property integer $id
 * @property integer $type_id
 * @property string $name
 */
class DevicePlugged extends \yii\db\ActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'device_plugged';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
    
    public function getType() {
        return $this->hasOne(DeviceType::className(), ['id' => 'type_id']);
    }
}