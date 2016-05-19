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
        $device_connected = new DeviceConnected();
        
        $device_class = "app\\devices\\".$device_type->classname."\\Device";
        $device = new $device_class();
        
        if ($device->load(Yii::$app->request->post()) && $device_connected->load(Yii::$app->request->post()))
        {
            if ($device_connected->validate() && $device->validate())
            {
                if ($device->save())
                {
                    $device_connected->type_id = $device_type->id;
                    $device_connected->order_id = $device->id;
                    if ($device_connected->save())
                    {
                        return $this->render("success");
                    }
                }
            }
        }
        
        return $this->render('@devices/'.$device_type->classname.'/views/add', [
            "device_connected" => $device_connected,
            "device_type" => $device_type,
            "device" => $device,
        ]);
    }
    
    public function actionEdit($id)
    {
        $device_connected = DeviceConnected::findOne($id);
        
        $device_class = "app\\devices\\".$device_connected->type->classname."\\Device";
        $device = $device_class::findOne($device_connected->order_id);
        
        if ($device->load(Yii::$app->request->post()) && $device->validate())
        {
            $device->save();
        }
        
        if ($device_connected->load(Yii::$app->request->post()) && $device_connected->validate())
        {
            $device_connected->save();
        }
        
        return $this->render('@devices/'.$device_connected->type->classname.'/views/edit', [
            "device_connected" => $device_connected,
            "device" => $device,
        ]);
    }
    
    public function actionDelete($id)
    {
        $device_connected = DeviceConnected::findOne($id);
        
        $device_class = "app\\devices\\".$device_connected->type->classname."\\Device";
        $device = $device_class::findOne($device_connected->order_id);
        
        if ($device->delete() && $device_connected->delete()) {
            return $this->redirect(["device/index"]);
        }
    }
}