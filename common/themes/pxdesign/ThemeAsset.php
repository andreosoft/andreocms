<?php

namespace common\themes\pxdesign;

use yii\web\AssetBundle;

/**
 * Theme main asset bundle.
 */
class ThemeAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@common/themes/pxdesign/assets';

 
    public $css = [
        'css/bootstrap/bootstrap.min.css',
        'css/bootstrap/bootstrap-responsive.min.css',
        'font/fontello.css',
        'css/style.css',
        'css/media-queries.css',
    ];
    
    public $js = [
        'js/bootstrap/bootstrap.min.js',
        'js/modernizr.custom.js',
        'js/nav/jquery.scrollTo.js',
        'js/nav/jquery.nav.js',
        'js/retina/retina.js',
        'js/fancybox/jquery.fancybox.pack.js',
        'js/jquery.fitvids.min.js',
        'js/jquery.placeholder.min.js',
        'js/jquery-func.js',
    ];


    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
