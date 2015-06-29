<?php

namespace common\modules\users\traits;

use common\modules\users\Module;
use Yii;

trait ModuleTrait
{

    private $_module;

    public function getModule()
    {
        if ($this->_module === null) {
            $module = Module::getInstance();
            if ($module instanceof Module) {
                $this->_module = $module;
            } else {
                $this->_module = Yii::$app->getModule('users');
            }
        }
        return $this->_module;
    }
}
