<?php

namespace common\modules\callback\widgets;

use \yii\bootstrap\Widget;
use common\modules\callback\models\site\Callback;

class callbackModal extends Widget
{
    public $render = 'index';

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $model = new Callback();
        return $this->render($this->render, [
            'model' => $model,
            'id' => $this->options['id'],
        ]);
    }
}
