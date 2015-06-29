<?php

$params = array_merge(
        require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-pxdesign',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'main/frontend/index',
    'modules' => [
        'main' => [
            'class' => 'common\modules\main\Module',
        ],
        'users' => [
            'class' => 'common\modules\users\Module',
        ],
        'comments' => [
            'class' => 'common\modules\comments\Module',
        ],
        'content' => [
            'class' => 'common\modules\content\Module',
        ],
        'catalog' => [
            'class' => 'common\modules\catalog\Module',
        ],
        'gallery' => [
            'class' => 'common\modules\gallery\Module',
        ],
        'callback' => [
            'class' => 'common\modules\callback\Module',
        ],        
    ],
    'components' => [
        'view' => [
            'theme' => 'common\themes\pxdesign\Theme',
        ],
        'user' => [
            'identityClass' => 'common\modules\users\models\User',
            'enableAutoLogin' => true,
        ],
        'assetManager' => [
            'converter' => [
                'class' => 'yii\web\AssetConverter',
                'commands' => [
                    'less' => ['css', 'lessc {from} {to} --no-color'],
                    'ts' => ['js', 'tsc --out {to} {from}'],
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'suffix' => '/',
            'rules' => [
                // site
                '' => 'main/frontend/index',
                // content                    
                [
                    'suffix' => '.html',
                    'pattern' => '<url>',
                    'route' => 'content/frontend/view-by-url',
                ],
                [
                    'suffix' => '.html',
                    'pattern' => '<class>/<url>',
                    'route' => 'content/frontend/view-class-by-url',
                ],                
                [
                    'pattern' => '<class>',
                    'route' => 'content/frontend/index',
                ],
                // catalog
                [
                    'pattern' => 'catalog/index/',
                    'route' => 'catalog/frontend/index',
                ],
                [
                    'suffix' => '.html',
                    'pattern' => 'catalog/view/<id:\d+>',
                    'route' => 'catalog/frontend/view',
                ],
                [
                    'suffix' => '.html',
                    'pattern' => 'catalog/view/<url:\w.+>',
                    'route' => 'catalog/frontend/view-by-url',
                ],
                'catalog/search' => 'catalog/frontend/search',
                'callback/create' => 'callback/frontend/create',
                'callback/view' => 'callback/frontend/view',
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'main/frontend/error',
        ],
        'i18n' => [
            'translations' => [
                'callback/*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/modules/callback/messages',
                    'forceTranslation' => true,
                    'fileMap' => [
                        'callback/main' => 'main.php',
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
];
