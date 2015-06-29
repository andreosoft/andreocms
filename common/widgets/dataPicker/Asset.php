<?php

namespace common\widgets\dataPicker;

use yii\web\AssetBundle;

class Asset extends AssetBundle
{
    public $autoGenerate = true;
    
    public $sourcePath = '@common/widgets/dataPicker/assets';

    public $js = [
        'bootstrap-datepicker.js',
    ];
    
    public $css = [
        'datepicker3.css',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}