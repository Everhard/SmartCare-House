<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Добавление устройства "'.$device_type->name.'"'; ?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($device_connected, 'name') ?>
    <?= $form->field($device, 'config') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить') ?>
    </div>

<?php ActiveForm::end(); ?>