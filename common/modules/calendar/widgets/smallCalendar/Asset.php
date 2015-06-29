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
    public $sourcePath = '@common/modules/widgets/smallCalendar/assets';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/catalog.js'
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}