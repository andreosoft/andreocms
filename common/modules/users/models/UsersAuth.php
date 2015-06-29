<?php

namespace common\modules\users\models;

use Yii;

/**
 * This is the model class for table "users_auth".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $auth_id
 * @property string $service
 */
class UsersAuth extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%users_auth}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'auth_id', 'service'], 'required'],
            [['id', 'user_id'], 'integer'],
            [['auth_id', 'service'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'auth_id' => 'Auth ID',
            'service' => 'Service',
        ];
    }

    public static function getUserId($auth_id, $service) {
        if ($user_id = UsersAuth::findOne(['auth_id' => $auth_id, 'service' => $service])) {
            return $user_id->user_id;
        };

        return NULL;
    }

    public function signup() {
        $this->user_id = Yii::$app->user->getId();
        if ($this->validate()) {
            return $this->save();
        }

        return null;
    }

}
