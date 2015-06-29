<?php

namespace common\modules\callback;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\callback\controllers';

    public function init()
    {
        parent::init();

        $this->registerTranslations();
    }
    
    public function registerTranslations()
    {
        \Yii::$app->i18n->translations['callback/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/modules/callback/messages',
            'forceTranslation' => true,
            'fileMap' => [
                'callback/main' => 'main.php',
            ],
        ];
    }    
}
