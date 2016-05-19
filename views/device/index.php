<?php

/* @var $this yii\web\View */
/* @var $device_types */

use yii\helpers\Url;

$this->title = 'Устройства';
?>

<p>Подключенные устройства:</p>

<table class="devices-table">
  <thead>
    <tr>
      <th>Название устройства</th>
      <th>Управление</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="2">Подключённых устройств нет.</td>
    </tr>

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