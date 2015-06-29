<?php

namespace common\themes\milonc;

use yii\web\AssetBundle;

/**
 * Theme main asset bundle.
 */
class ThemeAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@common/themes/milonc/assets';

 
    public $css = [
        'neko-framework/external-plugins/external-plugins.min.css',
        'neko-framework/css/layout/neko-framework-layout.css',
        'neko-framework/css/color/neko-framework-color.css',
    ];
    
    public $js = [
        'neko-framework/external-plugins/modernizr/modernizr.custom.js',
        'neko-framework/external-plugins/external-plugins.min.js',
        'neko-framework/js/neko-framework.js',
        'js/custom.js',
        
    ];


    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
