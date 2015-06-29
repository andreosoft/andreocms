<?php

use common\themes\pxdesign\ThemeAsset;
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
            'content' => 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'
        ]
);
$this->registerLinkTag(
        [
            'rel' => 'canonical',
            'href' => Url::canonical()
        ]
);
?>

<meta name="author" content="PxDesign">
<link type="ico" rel="shortcut icon" href="/favicon.ico">