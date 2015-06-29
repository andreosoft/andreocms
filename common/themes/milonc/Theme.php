<?php

namespace common\themes\milonc;

use Yii;

class Theme extends \yii\base\Theme
{

    public $pathMap = [
        '@frontend/views' => '@common/themes/milonc/views',
        '@common/modules' => '@common/themes/milonc/views/modules'
    ];


    public function init()
    {
        parent::init();

    }
}

