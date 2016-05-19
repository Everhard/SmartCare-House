<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Изменение настроек устройства "'.$device_connected->type->name.'"'; ?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($device_connected, 'name') ?>
    <?= $form->field($device, 'config') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить') ?>
    </div>

<?php ActiveForm::end(); ?>