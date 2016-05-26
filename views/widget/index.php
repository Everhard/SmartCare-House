<?php

/* @var $this yii\web\View */
/* @var $widget_types */
/* @var $widgets_plugged */

use yii\helpers\Url;

$this->title = 'Виджеты';
?>

<p>Подключенные виджеты:</p>

<table class="devices-table">
  <thead>
    <tr>
      <th>Название виджета</th>
      <th>Тип</th>
      <th>Управление</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($widgets_plugged as $widget_plugged) { ?>
    <tr>
        <td><?= $widget_plugged->name ?></td>
        <td><?= $widget_plugged->type->name ?></td>
        <td><a href="<?= Url::to(["widget/edit", "id" => $widget_plugged->id]) ?>">Настройки</a> <a href="<?= Url::to(["widget/delete", "id" => $widget_plugged->id]) ?>">Удалить</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<p>Доступные виджеты:</p>
<table class="devices-table">
  <thead>
    <tr>
      <th>Название виджета</th>
      <th>Управление</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($widget_types as $widget_type) { ?>
    <tr>
        <td><?= $widget_type->name ?></td>
        <td><a href="<?= Url::to(["widget/add", "id" => $widget_type->id]) ?>">Добавить</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>