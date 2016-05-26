<?php

namespace app\widgets\SimpleSwitcher;

/**
 * This is the model class for table "device_nooliteswitch".
 *
 * @property integer $id
 * @property string $config
 */
class Widget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'widget_simpleswitcher';
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
}