<?php

namespace common\modules\cart\models;

use Yii;

/**
 * This is the model class for table "cart_delivery".
 *
 * @property integer $id
 * @property integer $cart_id
 * @property integer $cart_delivery_type_id
 * @property integer $amount
 * @property string $price
 * @property integer $status
 * @property string $comments
 */
class CartDelivery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart_delivery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cart_id', 'cart_delivery_type_id', 'amount', 'status'], 'integer'],
            [['price'], 'number'],
            [['comments'], 'required'],
            [['comments'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cart_id' => 'Cart ID',
            'cart_delivery_type_id' => 'Cart Delivery Type ID',
            'amount' => 'Amount',
            'price' => 'Price',
            'status' => 'Status',
            'comments' => 'Comments',
        ];
    }
}
