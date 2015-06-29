<?php

namespace common\modules\content;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\content\controllers';

    public function init()
    {
        parent::init();

        $this->registerTranslations();
    }
    
    public function registerTranslations()
    {
        \Yii::$app->i18n->translations['content/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/modules/content/messages',
            'forceTranslation' => true,
            'fileMap' => [
                'content/main' => 'main.php',
            ],
        ];
    }    
}
