<?php

namespace common\themes\admin;

use Yii;

class Theme extends \yii\base\Theme {

    public $pathMap = [
        '@backend/views' => '@common/themes/admin/views',
        '@backend/modules' => '@common/themes/admin/modules'
    ];

    public function init() {
        parent::init();
        Yii::$container->set('yii\grid\CheckboxColumn', [
            'checkboxOptions' => [
                'class' => 'simple'
            ]
        ]);

        $this->registerTranslations();
    }

    private function registerTranslations() {
        \Yii::$app->i18n->translations['theme/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/themes/admin/messages',
            'forceTranslation' => true,
            'fileMap' => [
                'theme/admin' => 'admin.php',
                'theme/widgets/box' => 'widgets/box.php'
            ],
        ];
    }
}
    