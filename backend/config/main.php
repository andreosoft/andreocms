<?php


$params = array_merge(
        require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-andreocms-backend',
    'basePath' => dirname(__DIR__),
    'defaultRoute' => 'main/backend/index',
    'bootstrap' => ['log'],
    'modules' => [
        'calendar' => [
            'class' => 'common\modules\calendar\Module',
        ],
        'admin' => [
            'class' => 'common\modules\admin\Module',
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
        'filemanager' => [
            'class' => 'common\modules\filemanager\Module',
        ],  
        'callback' => [
            'class' => 'common\modules\callback\Module',
        ],          
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\modules\users\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['users/backend/login']
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
        'errorHandler' => [
            'errorAction' => 'ma/backend/error',
        ],
        'view' => [
            'theme' => 'common\themes\admin\Theme'
        ],
    ],
    'params' => $params,
];
