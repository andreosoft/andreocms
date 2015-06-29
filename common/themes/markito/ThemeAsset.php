<?php

namespace common\themes\markito;

use yii\web\AssetBundle;

/**
 * Theme main asset bundle.
 */
class ThemeAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@common/themes/markito/assets';

 
    public $css = [
        'css/style.css',
        'css/etalage.css',
        'css/megamenu.css',
        'css/owl.carousel.css'
    ];
    
    public $js = [
        'js/easing.js',
        'js/jquery.etalage.min.js',
        'js/jquery.wmuSlider.js',
        'js/megamenu.js',
        'js/move-top.js',
        'js/owl.carousel.js',
        'js/simpleCart.min.js',
        'js/main.js'
        
    ];


    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
