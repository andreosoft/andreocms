<?php

use yii\widgets\Breadcrumbs;
use common\themes\site\ThemeAsset;

ThemeAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
<?= $this->render('//chunks/head') ?>
    </head>
    <body> 
        <?php $this->beginBody(); ?>
            <?= $this->render('//chunks/topBar') ?>
        <header class="header">
        <?= $this->render('//chunks/header') ?>
        </header>
        <?= $this->render('//chunks/mainMenu') ?>
        <div class="content-wrapper container">
            <div class="content">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
                <?= $content ?>
            </div>
        </div>
        <footer class="footer">
        <?= $this->render('//chunks/footer') ?>
        </footer>
<?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?> 
