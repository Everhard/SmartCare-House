<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "widget_type".
 *
 * @property integer $id
 * @property string $classname
 * @property string $name
 */
class WidgetType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'widget_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classname', 'name'], 'required'],
            [['classname', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'classname' => 'Classname',
            'name' => 'Name',
        ];
    }
}