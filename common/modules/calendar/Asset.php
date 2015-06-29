<?php

namespace common\modules\calendar;

use yii\web\AssetBundle;

/**
 * Module asset bundle.
 */
class Asset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@common/modules/calendar/assets';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/lib/moment.min.js',
        'js/fullcalendar.js',
        'js/initcalendar.js',
    ];
    
    public $css = [
        'css/fullcalendar.css',
 //       'css/fullcalendar.print.css',
        
    ];
    
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',      
        'yii\jui\JuiAsset',
        'yii\bootstrap\BootstrapAsset',        
    ];
}