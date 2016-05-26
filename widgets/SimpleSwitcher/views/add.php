<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Добавление виджета "'.$widget_type->name.'"'; ?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($widget_plugged, 'name') ?>
    <?= $form->field($widget, 'config') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить') ?>
    </div>

<?php ActiveForm::end(); ?>