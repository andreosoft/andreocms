<?php

namespace common\modules\filemanager;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\filemanager\controllers';

    public function init()
    {
        parent::init();

        $this->registerTranslations();
    }
    
    public function registerTranslations()
    {
        \Yii::$app->i18n->translations['filemanager/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/modules/filemanager/messages',
            'forceTranslation' => true,
            'fileMap' => [
                'filemanager/main' => 'main.php',
            ],
        ];
    }    
}
