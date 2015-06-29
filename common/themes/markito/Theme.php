<?php


namespace common\themes\markito;

use Yii;

class Theme extends \yii\base\Theme
{

    public $pathMap = [
        '@frontend/views' => '@common/themes/markito/views',
        '@common/modules' => '@common/themes/markito/views/modules'
    ];


    public function init()
    {
        parent::init();

/*        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'sourcePath' => '@common/themes/markito/assets',
            'css' => [
                'css/style.less'
            ]
        ];
        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapPluginAsset'] = [
            'sourcePath' => '@common/themes/site/assets',
            'js' => [
                'js/bootstrap.min.js'
            ]
        ];
        Yii::$container->set('yii\grid\CheckboxColumn', [
            'checkboxOptions' => [
                'class' => 'simple'
            ]
        ]);*/
    }
}

