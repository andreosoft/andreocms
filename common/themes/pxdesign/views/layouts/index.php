<?php

use common\themes\pxdesign\ThemeAsset;

ThemeAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <?= $this->render('//common/head') ?>
    </head>
    <body> 
        <?php $this->beginBody(); ?>
        
            <?= $this->render('//common/header') ?>

            <?= $content ?>

            <?= $this->render('//common/footer') ?>
        </div>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?> 
