<?php
use common\themes\artlife\ThemeAsset;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php $this->head(); ?>
<title><?= Html::encode($this->title); ?></title>
<?= Html::csrfMetaTags(); ?>
<?php ThemeAsset::register($this);
$this->registerLinkTag(
    [
        'rel' => 'icon',
        'href' => Yii::$app->assetManager->publish('@common/themes/artlife/assets/images/fav.ico')[1]
    ]
);
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
); ?>
