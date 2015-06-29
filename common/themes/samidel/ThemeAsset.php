<?php

namespace common\themes\samidel;

use yii\web\AssetBundle;

/**
 * Theme main asset bundle.
 */
class ThemeAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@common/themes/samidel/assets';

 
    public $css = [
        'css/style.css',
        'css/style-responsive.css',
        'css/animate.min.css',
        'css/vertical-rhythm.min.css',
        'css/owl.carousel.css',
        'css/magnific-popup.css',
        'css/plusstyle.css'
    ];
    
    public $js = [
        'js/jquery.easing.1.3.js',
        'js/SmoothScroll.js',
        'js/jquery.scrollTo.min.js',
        'js/jquery.localScroll.min.js',
        'js/jquery.viewport.mini.js',
        'js/jquery.countTo.js',
        'js/jquery.appear.js',
        'js/jquery.sticky.js',
        'js/jquery.parallax-1.1.3.js',
        'js/jquery.fitvids.js',
        'js/owl.carousel.min.js',
        'js/isotope.pkgd.min.js',
        'js/imagesloaded.pkgd.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/gmap3.min.js',
        'js/wow.min.js',
        'js/masonry.pkgd.min.js',
        'js/jquery.simple-text-rotator.min.js',
        'js/all.js',
        'js/contact-form.js',
        'js/jquery.ajaxchimp.min.js'
    ];


    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
