<?php

namespace app\controllers;

use yii\web\Controller;

class DashboardController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionSettings()
    {
        return $this->render('settings');
    }
}