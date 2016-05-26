<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "widget_plugged".
 *
 * @property integer $id
 * @property integer $type_id
 * @property integer $order_id
 * @property string $name
 */
class WidgetPlugged extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'widget_plugged';
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
            'name' => 'Name',
        ];
    }
    
    public function getType() {
        return $this->hasOne(WidgetType::className(), ['id' => 'type_id']);
    }
}