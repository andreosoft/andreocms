<?php
use common\themes\ielektrik\ThemeAsset;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php $this->head(); ?>
<title><?= Html::encode($this->title); ?></title>
<?= Html::csrfMetaTags(); ?>
<meta name="author" content="<?php // Html::encode($this->author); ?>">
<meta name="keywords" content="<?php // Html::encode($this->keywords); ?>">
<meta name="description" content="<?php //Html::encode($this->description); ?>">
<?php ThemeAsset::register($this);
$this->registerLinkTag(
    [
        'rel' => 'icon',
        'href' => Yii::$app->assetManager->publish('@common/themes/ielektrik/assets/images/fav.ico')[1]
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
