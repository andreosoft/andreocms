<?php

namespace common\modules\comments;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\comments\controllers';

    public function init()
    {
        parent::init();

        $this->registerTranslations();
    }
    
    public function registerTranslations()
    {
        \Yii::$app->i18n->translations['comments/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/modules/comments/messages',
            'forceTranslation' => true,
            'fileMap' => [
                'comments/main' => 'main.php',
            ],
        ];
    }    
}