<?php

namespace common\themes\site;

use Yii;

class Theme extends \yii\base\Theme
{

    public $pathMap = [
        '@frontend/views' => '@common/themes/site/views',
        '@frontend/modules' => '@common/themes/site/modules'
    ];


    public function init()
    {
        parent::init();

        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'sourcePath' => '@common/themes/site/assets',
            'css' => [
//                'css/style.min.css'
                'css/style.less'
            ]
        ];
        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapPluginAsset'] = [
            'sourcePath' => '@common/themes/site/assets',
            'js' => [
                'js/bootstrap.min.js'
            ]
        ];
 /*       Yii::$container->set('yii\grid\CheckboxColumn', [
            'checkboxOptions' => [
                'class' => 'simple'
            ]
        ]);*/
    }
}

