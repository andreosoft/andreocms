<?php

use common\themes\samidel\ThemeAsset;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<title><?= Html::encode($this->title); ?></title>
<?= Html::csrfMetaTags(); ?>
<?php $this->head(); ?>

<?php
ThemeAsset::register($this);

$this->registerMetaTag(
        [
            'charset' => Yii::$app->charset
        ]
);
$this->registerMetaTag(
        [
            'name' => 'viewport',
            'content' => 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes'
        ]
);
$this->registerLinkTag(
        [
            'rel' => 'canonical',
            'href' => Url::canonical()
        ]
);
?>
<link rel="shortcut icon" href="images/favicon.png">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">