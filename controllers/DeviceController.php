<?php

namespace app\controllers;

use \Yii;
use yii\web\Controller;
use app\models\DeviceType;
use app\models\DeviceConnected;

class DeviceController extends Controller
{
    public function actionIndex()
    {   
        $device_types = DeviceType::find()->all();
        $devices = DeviceConnected::find()->all();
                
        return $this->render('index', [
            "device_types" => $device_types,
            "devices" => $devices,
        ]);
    }
    
    public function actionAdd($id)
    {   
        $device_type = DeviceType::findOne($id);
        
        $device_class = "app\\devices\\".$device_type->classname."\\Device";
        $device = new $device_class();
        
        if ($device->load(Yii::$app->request->post()) && $device->validate())
        {
            $device_connected = new DeviceConnected([
                "type_id" => $device_type->id,
                "name" => $device->name,
            ]);
            $device_connected->save();
            
            $device->сid = $device_connected->id;
            $device->save();
            
            return $this->render("success");
        }
        
        return $this->render('@devices/'.$device_type->classname.'/views/index', [
            "device_type" => $device_type,
            "model" => $device,
        ]);
    }
}