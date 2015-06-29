<?php
use common\themes\markito\ThemeAsset;

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
        <div class="header">
            <?= $this->render('//common/header') ?>
            <?= $this->render('//common/mainMenu') ?>
        </div>
            <div class="container">
                <div class="content">               
                    <?= $content ?>
                </div>
            </div>
        <div class="footer">
            <?= $this->render('//common/footer') ?>
        </div>
<?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?> 