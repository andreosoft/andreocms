<?php

namespace common\themes\artlife;

use Yii;

class Theme extends \yii\base\Theme
{

    public $pathMap = [
        '@frontend/views' => '@common/themes/artlife/views',
        '@common/modules' => '@common/themes/artlife/views/modules'
    ];


    public function init()
    {
        parent::init();

    }
}

