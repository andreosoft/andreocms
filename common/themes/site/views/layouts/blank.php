<?php 
use yii\helpers\Html;
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="//<?= Yii::$app->language ?>">
    <head>
        <?= $this->render('//chunks/head') ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>
        <?= $content ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>