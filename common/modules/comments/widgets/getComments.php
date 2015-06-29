<?php

namespace common\modules\comments\widgets;

use \yii\bootstrap\Widget;
use common\modules\comments\models\site\Comments;

class getComments extends Widget
{


    public function init()
    {
        parent::init();
    }

    public function run()
    {

        $elements = (new Comments)->getElementsById($this->id);

        return $this->render('getComments/index', [
            'elements' => $elements,
            'id' => $this->id,
        ]);
    }
}