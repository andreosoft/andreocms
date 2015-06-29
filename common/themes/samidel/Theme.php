<?php

namespace common\themes\samidel;

use Yii;

class Theme extends \yii\base\Theme
{

    public $pathMap = [
        '@frontend/views' => '@common/themes/samidel/views',
        '@common/modules' => '@common/themes/samidel/views/modules'
    ];


    public function init()
    {
        parent::init();

    }
}

