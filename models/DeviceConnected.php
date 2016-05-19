<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "device_connected".
 *
 * @property integer $id
 * @property integer $type_id
 * @property string $name
 */
class DeviceConnected extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'device_connected';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'name'], 'required'],
            [['type_id'], 'integer'],
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
            'type_id' => 'Device Type ID',
            'name' => 'Name',
        ];
    }
    
    public function getType() {
        return $this->hasOne(DeviceType::className(), ['id' => 'type_id']);
    }
}