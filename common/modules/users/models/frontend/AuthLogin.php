<?php

namespace common\modules\users\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class AuthLogin extends Model {

    public $auth_id;
    public $service;
    public $rememberMe = true;
    private $_user = false;

    public function rules() {
        return [
            [['service', 'auth_id'], 'required'],
            ['rememberMe', 'boolean'],
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login() {
        if ($user = $this->getUser()) {
            return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    public function getUser() {
        if ($this->_user === false && $this->validate() ) {
            $this->_user = User::findIdentity(UsersAuth::getUserId($this->auth_id, $this->service));
        }

        return $this->_user;
    }

}
