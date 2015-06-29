<?php

namespace common\modules\comments\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\comments\models\Comments;

/**
 * CommentsSearch represents the model behind the search form about `common\modules\comments\models\Comments`.
 */
class CommentsSearch extends Comments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'table_id', 'parent_id', 'createdby', 'rate_num', 'like', 'dislike', 'status', 'deletedby', 'editedby'], 'integer'],
            [['table_name', 'createdon', 'deletedon', 'editedon', 'name', 'introtext', 'content', 'image'], 'safe'],
            [['parent', 'rate', 'deleted'], 'number'],
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
        $query = Comments::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'table_id' => $this->table_id,
            'parent' => $this->parent,
            'parent_id' => $this->parent_id,
            'createdby' => $this->createdby,
            'createdon' => $this->createdon,
            'rate' => $this->rate,
            'rate_num' => $this->rate_num,
            'like' => $this->like,
            'dislike' => $this->dislike,
            'status' => $this->status,
            'deleted' => $this->deleted,
            'deletedby' => $this->deletedby,
            'deletedon' => $this->deletedon,
            'editedby' => $this->editedby,
            'editedon' => $this->editedon,
        ]);

        $query->andFilterWhere(['like', 'table_name', $this->table_name])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'introtext', $this->introtext])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
