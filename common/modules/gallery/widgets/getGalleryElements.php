<?php

namespace common\modules\gallery\widgets;

use \yii\bootstrap\Widget;
use common\modules\gallery\models\Gallery;

class getGalleryElements extends Widget
{
    public $table_name = 'catalog';


    public function init()
    {
        parent::init();
    }

    public function run()
    {

        $model = new Gallery();
        
        $elements = $model
                ->find()
                ->where("table_id = {$this->id} AND table_name = '{$this->table_name}'")
                ->all();

        return $this->render('getGalleryElements/index', [
            'elements' => $elements,
        ]);
    }
}