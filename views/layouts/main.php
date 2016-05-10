<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="css/styles.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
    <h1>SmartCare House</h1>
    <section class="clock">
      20:04
    </section>
</header>
<nav class="zones">
    <a href="#"><img src="img/icon-kitchen.png" alt="" /> Рабочий стол</a>
    <a href="#"><img src="img/icon-kitchen.png" alt="" /> Кухня</a>
    <a href="#"><img src="img/icon-kitchen.png" alt="" /> Прихожая</a>
    <a href="#"><img src="img/icon-kitchen.png" alt="" /> Комната</a>
    <a href="#"><img src="img/icon-kitchen.png" alt="" /> Чердак</a>
</nav>
<section class="main">
    <h2>Рабочий стол</h2>
    <?= $content ?>
</section>
<footer>
    <nav>
      <a href="#"><img src="img/timer.png" alt="" /></a>
      <a href="#"><img src="img/timer.png" alt="" /></a>
      <a class="settings" href="#"><img src="img/timer.png" alt="" /></a>
    </nav>
</footer>
<script src="js/scripts.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>