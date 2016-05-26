<?php

namespace app\controllers;

use \Yii;
use yii\web\Controller;
use app\models\WidgetType;
use app\models\WidgetPlugged;

class WidgetController extends Controller
{
    public function actionIndex()
    {
        $widget_types = WidgetType::find()->all();
        $widgets_plugged = WidgetPlugged::find()->all();
        
        return $this->render('index', [
            "widget_types" => $widget_types,
            "widgets_plugged" => $widgets_plugged,
        ]);
    }
    
    public function actionAdd($id)
    {
        $widget_type = WidgetType::findOne($id);
        $widget_plugged = new WidgetPlugged();
        
        $widget_class = "app\\widgets\\".$widget_type->classname."\\Widget";
        $widget = new $widget_class();
        
        if ($widget->load(Yii::$app->request->post()) && $widget_plugged->load(Yii::$app->request->post()))
        {
            if ($widget_plugged->validate() && $widget->validate())
            {
                if ($widget->save())
                {
                    $widget_plugged->type_id = $widget_type->id;
                    $widget_plugged->order_id = $widget->id;
                    if ($widget_plugged->save())
                    {
                        return $this->render("success");
                    }
                }
            }
        }
        
        return $this->render('@widgets/'.$widget_type->classname.'/views/add', [
            "widget_plugged" => $widget_plugged,
            "widget_type" => $widget_type,
            "widget" => $widget,
        ]);
    }
    
    public function actionEdit($id)
    {
        $widget_plugged = WidgetPlugged::findOne($id);
        
        $widget_class = "app\\widgets\\".$widget_plugged->type->classname."\\Widget";
        $widget = $widget_class::findOne($widget_plugged->order_id);
        
        if ($widget->load(Yii::$app->request->post()) && $widget->validate())
        {
            $widget->save();
        }
        
        if ($widget_plugged->load(Yii::$app->request->post()) && $widget_plugged->validate())
        {
            $widget_plugged->save();
        }
        
        return $this->render('@widgets/'.$widget_plugged->type->classname.'/views/edit', [
            "widget_plugged" => $widget_plugged,
            "widget" => $widget,
        ]);
    }
    
    public function actionDelete($id)
    {
        $widget_plugged = WidgetPlugged::findOne($id);
        
        $widget_class = "app\\widgets\\".$widget_plugged->type->classname."\\Widget";
        $widget = $widget_class::findOne($widget_plugged->order_id);
        
        if ($widget->delete() && $widget_plugged->delete()) {
            return $this->redirect(["widget/index"]);
        }
    }
}