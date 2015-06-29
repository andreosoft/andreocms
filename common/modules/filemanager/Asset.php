<?php

namespace common\modules\filemanager;

use yii\web\AssetBundle;

/**
 * Module asset bundle.
 */
class Asset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@common/modules/filemanager/assets';

    /**
     * @inheritdoc
     */
    public $js = [
//        'js/filemanager.js'
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}