<?php

namespace common\modules\users;

class Module extends \yii\base\Module
{
    private $_mail;
    
    public $controllerNamespace = 'common\modules\users\controllers';

    public function init()
    {
        parent::init();

        $this->registerTranslations();
    }
    
    public function registerTranslations()
    {
        \Yii::$app->i18n->translations['users/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/modules/users/messages',
            'forceTranslation' => true,
            'fileMap' => [
                'users/main' => 'users.php',
            ],
        ];
    }
    
    public function getMail()
    {
        if ($this->_mail === null) {
            $this->_mail = \Yii::$app->getMailer();
            $this->_mail->htmlLayout = '@common/modules/users/mails/layouts/html';
            $this->_mail->textLayout = '@common/modules/users/mails/layouts/text';
            $this->_mail->viewPath = '@common/modules/users/mails/views';
        }
        return $this->_mail;
    }
}
