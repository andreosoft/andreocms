<?php

namespace common\modules\users\models;

use common\modules\users\models\User;
use common\modules\users\traits\ModuleTrait;
use yii\base\Model;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model {

    use ModuleTrait;

    public $email;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\modules\users\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail() {
        /* @var $user User */
        $user = User::findOne([
                    'status' => User::STATUS_ACTIVE,
                    'email' => $this->email,
        ]);

        if ($user) {
            if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
                $user->generatePasswordResetToken();
            }

            if ($user->save()) {
                $mailer = \Yii::$app->mailer();
                $mailer->htmlLayout = '@common/modules/users/mails/layouts/html';
                $mailer->textLayout = '@common/modules/users/mails/layouts/text';
                $mailer->viewPath = '@common/modules/users/mails/views';
                return $mailer->compose('ru/recovery', ['user' => $user])
                                ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                                ->setTo($this->email)
                                ->setSubject('Password reset for ' . \Yii::$app->name)
                                ->send();
            }
        }

        return false;
    }

}
