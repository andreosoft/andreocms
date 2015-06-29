<?php

namespace common\modules\cart\models;

use Yii;

/**
 * This is the model class for table "cart_customer".
 *
 * @property integer $id
 * @property string $name
 * @property string $adress
 * @property string $phone
 * @property string $email
 * @property integer $status
 * @property integer $user_id
 * @property string $comments
 */
class CartCustomer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart_customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['adress', 'comments'], 'required'],
            [['adress', 'comments'], 'string'],
            [['status', 'user_id'], 'integer'],
            [['name', 'phone', 'email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'adress' => 'Adress',
            'phone' => 'Phone',
            'email' => 'Email',
            'status' => 'Status',
            'user_id' => 'User ID',
            'comments' => 'Comments',
        ];
    }
}
