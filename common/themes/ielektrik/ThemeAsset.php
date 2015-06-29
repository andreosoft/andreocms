<?php

namespace common\themes\ielektrik;

use yii\web\AssetBundle;

/**
 * Theme main asset bundle.
 */
class ThemeAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@common/themes/ielektrik/assets';
 
    public $css = [
        'css/flexslider.css',
        'css/owl.carousel.css',
        'css/owl.transitions.css',
        'css/jquery.custom-scrollbar.css',
        'css/style.css',
        'css/font-awesome.min.css',

    ];
    
    public $js = [
        'js/owl.js',
        'js/retina.js',
        'js/jquery.flexslider-min.js',
        'js/waypoints.min.js',
        'js/jquery.isotope.min.js',
        'js/owl.carousel.min.js',
        'js/jquery.tweet.min.js',
        'js/jquery.custom-scrollbar.js',
        'js/scripts.js'
  
    ];


    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
