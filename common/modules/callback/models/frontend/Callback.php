<?php

namespace common\modules\callback\models\site;

use Yii;

class Callback extends \common\modules\callback\models\Callback {

        
    public function beforeSave($insert) {
        $this->data = 'REMOTE_HOST:'.$_SERVER['REMOTE_HOST'] . 'REMOTE_ADDR:' . $_SERVER['REMOTE_ADDR'] . ' HTTP_USER_AGENT:' .$_SERVER['HTTP_USER_AGENT'];
        $this->sendEmail();
        return true;
    }


    public function sendEmail() {
        $mailer = Yii::$app->mailer;
        $mailer->htmlLayout = '@common/modules/callback/mails/layouts/html';
        $mailer->viewPath = '@common/modules/callback/mails/views';
        return $mailer->compose('ru/email', ['model' => $this])
                        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                        ->setTo([\Yii::$app->params['managerEmail']])
                        ->setSubject(\Yii::t('callback/main', 'Call back message'))
                        ->send();
    }
}
    