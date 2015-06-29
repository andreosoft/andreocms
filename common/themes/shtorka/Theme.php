<?php

namespace common\themes\shtorka;

use Yii;

class Theme extends \yii\base\Theme
{

    public $pathMap = [
        '@frontend/views' => '@common/themes/shtorka/views',
        '@common/modules' => '@common/themes/shtorka/views/modules'
    ];


    public function init()
    {
        parent::init();

    }
}

