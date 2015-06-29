<?php

namespace common\themes\pxdesign;

use Yii;

class Theme extends \yii\base\Theme
{

    public $pathMap = [
        '@frontend/views' => '@common/themes/pxdesign/views',
        '@common/modules' => '@common/themes/pxdesign/views/modules'
    ];


    public function init()
    {
        parent::init();

    }
}

