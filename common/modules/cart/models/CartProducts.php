<?php

namespace common\modules\cart\models;

use Yii;

/**
 * This is the model class for table "cart_products".
 *
 * @property integer $id
 * @property integer $cart_id
 * @property integer $product_id
 * @property integer $amount
 * @property string $price
 * @property integer $status
 * @property string $comments
 */
class CartProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cart_id', 'product_id', 'amount', 'status'], 'integer'],
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
            'product_id' => 'Product ID',
            'amount' => 'Amount',
            'price' => 'Price',
            'status' => 'Status',
            'comments' => 'Comments',
        ];
    }
}
