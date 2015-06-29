<?php

namespace common\modules\forum;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\forum\controllers';

    public function init()
    {
        parent::init();

        $this->registerTranslations();
    }
    
    public function registerTranslations()
    {
        \Yii::$app->i18n->translations['forum/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/modules/forum/messages',
            'forceTranslation' => true,
            'fileMap' => [
                'forum/main' => 'main.php',
            ],
        ];
    }    
}
