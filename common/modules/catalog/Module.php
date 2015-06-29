<?php

namespace common\modules\catalog;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\catalog\controllers';

    public function init()
    {
        parent::init();

        $this->registerTranslations();
    }
    
    public function registerTranslations()
    {
        \Yii::$app->i18n->translations['catalog/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/modules/catalog/messages',
            'forceTranslation' => true,
            'fileMap' => [
                'catalog/main' => 'main.php',
            ],
        ];
    }
}
