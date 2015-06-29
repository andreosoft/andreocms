<?php

namespace common\modules\cart\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property integer $status
 * @property integer $cart_customer_id
 * @property integer $createdby
 * @property string $createdon
 * @property integer $editedby
 * @property string $editedon
 * @property string $full_price
 * @property string $delivery_price
 * @property string $products_price
 * @property string $comments
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'cart_customer_id', 'createdby', 'editedby'], 'integer'],
            [['createdon', 'editedon'], 'safe'],
            [['full_price', 'delivery_price', 'products_price'], 'number'],
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
            'status' => 'Status',
            'cart_customer_id' => 'Cart Customer ID',
            'createdby' => 'Createdby',
            'createdon' => 'Createdon',
            'editedby' => 'Editedby',
            'editedon' => 'Editedon',
            'full_price' => 'Full Price',
            'delivery_price' => 'Delivery Price',
            'products_price' => 'Products Price',
            'comments' => 'Comments',
        ];
    }
}
