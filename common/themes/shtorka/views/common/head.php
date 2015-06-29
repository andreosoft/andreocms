<?php

use common\themes\shtorka\ThemeAsset;
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

<link rel="apple-touch-icon" href="<?= \Yii::$app->assetManager->publish('@common/themes/shtorka/assets/img/apple-touch-icon.png')[1]?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?= \Yii::$app->assetManager->publish('@common/themes/shtorka/assets/img/apple-touch-icon-72x72.png')[1]?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?= \Yii::$app->assetManager->publish('@common/themes/shtorka/assets/img/apple-touch-icon-114x114.png')[1]?>">