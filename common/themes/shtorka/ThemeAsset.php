<?php

namespace common\themes\shtorka;

use yii\web\AssetBundle;

/**
 * Theme main asset bundle.
 */
class ThemeAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@common/themes/shtorka/assets';

 
    public $css = [
        'css/font-awesome.css',
        'css/jquery.navgoco.css',
        'css/sb-search.css',
        'css/owl.carousel.css',
        'css/owl.theme.css',
        'css/colorbox.css',
        'css/woocommerce.css',
        'css/style.css',
    ];
    
    public $js = [
        'js/modernizr.custom.js',
        'js/custom.js',
    ];


    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
