<?php

/* @var $this yii\web\View */
/* @var $device_types */
/* @var $devices */

use yii\helpers\Url;

$this->title = 'Устройства';
?>

<p>Подключенные устройства:</p>

<table class="devices-table">
  <thead>
    <tr>
      <th>Название устройства</th>
      <th>Тип</th>
      <th>Управление</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($devices as $device) { ?>
    <tr>
        <td><?= $device->name ?></td>
        <td><?= $device->type->name ?></td>
        <td><a href="<?= Url::to(["device/edit", "id" => $device->id]) ?>">Настройки</a> <a href="<?= Url::to(["device/delete", "id" => $device->id]) ?>">Удалить</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<p>Доступные устройства:</p>
<table class="devices-table">
  <thead>
    <tr>
      <th>Название устройства</th>
      <th>Управление</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($device_types as $device_type) { ?>
    <tr>
        <td><a href="#"><?= $device_type->name ?></a></td>
        <td><a href="<?= Url::to(["device/add", "id" => $device_type->id]) ?>">Подключить</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>