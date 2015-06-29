<?php

namespace common\themes\ielektrik;

use Yii;

class Theme extends \yii\base\Theme
{

    public $pathMap = [
        '@frontend/views' => '@common/themes/ielektrik/views',
        '@common/modules' => '@common/themes/ielektrik/views/modules'
    ];


    public function init()
    {
        parent::init();

    }
}

