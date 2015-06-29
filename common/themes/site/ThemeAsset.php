<?php

namespace common\themes\site;

use yii\web\AssetBundle;

/**
 * Theme main asset bundle.
 */
class ThemeAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@common/themes/site/assets';

 /*
    public $css = [
        'css/style.min.css',
    ];
*/
    public $js = [
//        'js/jquery-1.10.2.min.js',
//        'js/jquery-migrate-1.2.1.min.js',
//        'js/bootstrap.min.js',        
        'js/jquery.cycle2.min.js',
        'js/jquery.cycle2.carousel.min.js',        
        'js/jquery.cycle2.swipe.min.js',
        'js/jquery.nouislider.min.js',
        'js/fancybox/jquery.fancybox.pack.js',
        'js/custom.js',
        
    ];


    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
