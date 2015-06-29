<?php

namespace common\modules\cart\models;

use Yii;

/**
 * This is the model class for table "cart_delivery_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $amount
 * @property string $price
 * @property integer $status
 * @property string $comments
 */
class DeliveryType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart_delivery_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'status'], 'integer'],
            [['price'], 'number'],
            [['comments'], 'required'],
            [['comments'], 'string'],
            [['name', 'description'], 'string', 'max' => 255]
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
            'description' => 'Description',
            'amount' => 'Amount',
            'price' => 'Price',
            'status' => 'Status',
            'comments' => 'Comments',
        ];
    }
}
