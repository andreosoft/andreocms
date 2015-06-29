<?php

namespace common\modules\gallery\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\gallery\models\Gallery;

/**
 * GallerySearch represents the model behind the search form about `common\modules\gallery\models\Gallery`.
 */
class GallerySearch extends Gallery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'table_id', 'parent', 'parent_id', 'status', 'createdby', 'like', 'dislike', 'views', 'rate', 'rate_num'], 'integer'],
            [['table_name', 'createdon', 'image', 'name', 'introtext', 'content'], 'safe'],
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
        $query = Gallery::find();

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
            'status' => $this->status,
            'createdby' => $this->createdby,
            'createdon' => $this->createdon,
            'like' => $this->like,
            'dislike' => $this->dislike,
            'views' => $this->views,
            'rate' => $this->rate,
            'rate_num' => $this->rate_num,
        ]);

        $query->andFilterWhere(['like', 'table_name', $this->table_name])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'introtext', $this->introtext])
            ->andFilterWhere(['like', 'content', $this->content]);
        
        $query->orderBy('sort');
        
        return $dataProvider;
    }
}
