<?php

namespace common\modules\cart;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\cart\controllers';

    public function init()
    {
        parent::init();

        $this->registerTranslations();
    }
    
    public function registerTranslations()
    {
        \Yii::$app->i18n->translations['cart/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/modules/cart/messages',
            'forceTranslation' => true,
            'fileMap' => [
                'cart/main' => 'main.php',
            ],
        ];
    }    
}
