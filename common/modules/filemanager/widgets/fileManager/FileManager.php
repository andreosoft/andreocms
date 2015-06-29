<?php

namespace common\modules\filemanager\widgets\fileManager;

use yii\base\Widget;
use yii\helpers\Html;


class FileManager extends Widget
{
    public $options = [
        'rootAlias' => '@app'
    ];
            
    public function init()
    {
        parent::init();
        $view = $this->getView();
        $view->registerJs($this->render('filemanager.js',['rootAlias' => $this->options['rootAlias']]));

    }

    public function run()
    {
        echo Html::tag('div', '', ['id' => 'file-block']);
    }
}