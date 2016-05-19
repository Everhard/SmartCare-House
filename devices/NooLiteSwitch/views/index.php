<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Добавление устройства "'.$device_type->name.'"'; ?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'config') ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить') ?>
    </div>

<?php ActiveForm::end(); ?>