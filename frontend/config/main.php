<?php

$params = array_merge(
        require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-shtorka',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'site/default/index',
    'modules' => [
        'site' => [
            'class' => 'common\modules\site\Module',
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
            'theme' => 'common\themes\shtorka\Theme',
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
                '' => 'site/default/index',
                // content                    
                [
                    'suffix' => '.html',
                    'pattern' => '<view>/<url>',
                    'route' => 'content/site/view-by-url',
                ],
                [
                    'pattern' => '<class>',
                    'route' => 'content/site/index',
                ],
                // catalog
                [
                    'pattern' => 'catalog/index/',
                    'route' => 'catalog/site/index',
                ],
                [
                    'suffix' => '.html',
                    'pattern' => 'catalog/view/<id:\d+>',
                    'route' => 'catalog/site/view',
                ],
                [
                    'suffix' => '.html',
                    'pattern' => 'catalog/view/<url:\w.+>',
                    'route' => 'catalog/site/view-by-url',
                ],
                'catalog/search' => 'catalog/site/search',
                'callback/create' => 'callback/site/create',
                'callback/view' => 'callback/site/view',
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/default/error',
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
