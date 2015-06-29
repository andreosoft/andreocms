<?php $this->beginPage(); ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <?= $this->render('//layouts/head') ?>
    </head>
    <?php $this->beginBody(); ?>
        <?= $content ?>
    <?php $this->endBody(); ?>
    </html>
<?php $this->endPage(); ?>