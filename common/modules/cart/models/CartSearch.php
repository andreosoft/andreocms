<?php

namespace common\modules\cart\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\cart\models\Cart;

/**
 * CartSearch represents the model behind the search form about `common\modules\cart\models\Cart`.
 */
class CartSearch extends Cart
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'cart_customer_id', 'createdby', 'editedby'], 'integer'],
            [['createdon', 'editedon', 'comments'], 'safe'],
            [['full_price', 'delivery_price', 'products_price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Cart::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'cart_customer_id' => $this->cart_customer_id,
            'createdby' => $this->createdby,
            'createdon' => $this->createdon,
            'editedby' => $this->editedby,
            'editedon' => $this->editedon,
            'full_price' => $this->full_price,
            'delivery_price' => $this->delivery_price,
            'products_price' => $this->products_price,
        ]);

        $query->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
