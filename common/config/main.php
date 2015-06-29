<?php

return [
    'name' => 'Shtorka',
    'timeZone' => 'Europe/Moscow',
    'language' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=shtorka',
            'username' => 'root',
            'password' => '739618',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
//            'viewPath' => '@common/mail',
            'useFileTransport' => true,
            'transport' => [
                'class' => 'Swift_MailTransport',
//                'class' => 'Swift_SmtpTransport',
//                'host' => 'smtp.mail.ru',
//                'username' => '',
//                'password' => '',
//                'port' => '465',
//                'encryption' => 'ssl',
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['user', 'manager', 'admin'],
            'itemFile' => '@common/modules/rbac/data/items.php',
            'assignmentFile' => '@common/modules/rbac/data/assignments.php',
            'ruleFile' => '@common/modules/rbac/data/rules.php'
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.y',
            'datetimeFormat' => 'HH:mm:ss dd.MM.y',
            'currencyCode' => 'RUB',
        ],
    ],
    'params' => [
        'author' => 'Andrey Zagorets',
        'adminEmail' => 'a_l_zagorets@mail.ru',
        'supportEmail' => 'a_l_zagorets@mail.ru',
        'managerEmail' => 'a_l_zagorets@mail.ru',
        'user.passwordResetTokenExpire' => 3600,
    ],
];
