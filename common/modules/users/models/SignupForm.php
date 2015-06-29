<?php

namespace common\modules\users\models;

use common\modules\users\models\User;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model {

    public $username;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\modules\users\models\User', 'message' => 'Пользователь с таким логином уже существует.'],
            ['username', 'string', 'min' => 5, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\modules\users\models\User', 'message' => 'Пользователь с таким адресом уже существует.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels() {
        return [
            'username' => 'Логин',
            'email' => 'Адрес email',
            'password' => 'Пароль',
        ];
    }
    public function attributeHints() {
        return [
            'username' => 'Логин',
            'email' => 'Адрес email',
            'password' => 'Пароль',
        ];        
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();
//            $this->sendEmail($user);
            return $user;
        }

        return null;
    }

    public function sendEmail($user) {

        return $this->module->mail
                        ->compose('ru/signup', ['model' => $user])
                        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                        ->setTo($this->email)
                        ->setSubject('Подтверждение регистрации на сайте ' . \Yii::$app->name)
                        ->send();
    }

}
