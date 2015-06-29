<?php

namespace common\modules\catalog\models\backend;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\catalog\models\backend\CatalogProducts;

/**
 * CatalogSearch represents the model behind the search form about `common\modules\catalog\models\CatalogProducts`.
 */
class CatalogSearch extends CatalogProducts {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'parent', 'isparent', 'views', 'createdby', 'status', 'sellout'], 'integer'],
            [['name', 'introtext', 'content', 'description', 'image', 'createdon'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params, $parent) {
        $query = CatalogProducts::find();

        $query->andWhere(['parent' => $parent]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 25,
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }



        $query->andFilterWhere([
            'id' => $this->id,
            'parent' => $this->parent,
            'isparent' => $this->isparent,
            'views' => $this->views,
            'createdby' => $this->createdby,
            'createdon' => $this->createdon,
            'status' => $this->status,
            'publishedon' => $this->publishedon,
            'price' => $this->price,
            'sellout' => $this->sellout,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'introtext', $this->introtext])
                ->andFilterWhere(['like', 'content', $this->content])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }

}
