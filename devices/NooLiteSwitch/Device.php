<?php

namespace app\devices\NooLiteSwitch;

use app\models\DeviceInterface;

/**
 * This is the model class for table "device_nooliteswitch".
 *
 * @property integer $id
 * @property string $config
 */
class Device extends \yii\db\ActiveRecord implements DeviceInterface
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'device_nooliteswitch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['config'], 'required'],
            [['config'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'config' => 'Config',
        ];
    }
    
    public function turnOn() {
        echo "ON";
    }
    
    public function turnOff() {
        echo "OFF";
    }
    
    public static function getMethodNames() {
        return [
            "turnOn" => "Включить",
            "turnOff" => "Выключить",
        ];
    }
    
    public static function getDescription() {
        return "Переключатель для оборудования NooLite.";
    }
}