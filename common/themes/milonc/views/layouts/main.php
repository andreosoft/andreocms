<?php
use common\themes\milonc\ThemeAsset;

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
            <main id="content">
                <?= $content ?>
            </main>
            <?= $this->render('//common/footer') ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?> 

