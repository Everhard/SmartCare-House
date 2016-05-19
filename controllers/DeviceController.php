<?php

namespace app\controllers;

use \Yii;
use yii\web\Controller;
use app\models\DeviceType;

class DeviceController extends Controller
{
    public function actionIndex()
    {   
        $device_types = DeviceType::find()->all();
                
        return $this->render('index', [
            "device_types" => $device_types,
        ]);
    }
    
    public function actionAdd($id)
    {   
        $device_type = DeviceType::findOne($id);
        
        $device_class = "app\\devices\\".$device_type->classname."\\Device";
        $device = new $device_class();
        
        if ($device->load(Yii::$app->request->post()) && $device->validate())
        {
            $device->save();
            return $this->render("success");
        }
        
        return $this->render('@devices/'.$device_type->classname.'/views/index', [
            "device_type" => $device_type,
            "model" => $device,
        ]);
    }
}