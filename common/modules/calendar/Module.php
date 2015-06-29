<?php

namespace common\modules\calendar;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\calendar\controllers';

    public function init()
    {
        parent::init();

        $this->registerTranslations();
    }
    
    public function registerTranslations()
    {
        \Yii::$app->i18n->translations['calendar/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/modules/calendar/messages',
            'forceTranslation' => true,
            'fileMap' => [
                'calendar/main' => 'main.php',
            ],
        ];
    }    
}