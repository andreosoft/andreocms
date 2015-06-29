<?php

namespace common\modules\callback\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\callback\models\Callback;

/**
 * CallbackSearch represents the model behind the search form about `common\modules\callback\models\Callback`.
 */
class CallbackSearch extends Callback
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'createdby', 'editedby', 'status'], 'integer'],
            [['name', 'adress', 'email', 'phone', 'content', 'data', 'url', 'createdon', 'editedon'], 'safe'],
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
        $query = Callback::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'createdby' => $this->createdby,
            'createdon' => $this->createdon,
            'editedby' => $this->editedby,
            'editedon' => $this->editedon,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
