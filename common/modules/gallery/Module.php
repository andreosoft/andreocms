<?php

namespace common\modules\gallery;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\gallery\controllers';

    public function init()
    {
        parent::init();

        $this->registerTranslations();
    }
    
    public function registerTranslations()
    {
        \Yii::$app->i18n->translations['gallery/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/modules/gallery/messages',
            'forceTranslation' => true,
            'fileMap' => [
                'gallery/main' => 'main.php',
            ],
        ];
    }    
}