<?php

namespace common\modules\content\models\backend;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\content\models\Content;

/**
 * AdminSearch represents the model behind the search form about `common\modules\content\models\backend`.
 */
class ContentSearch extends Content
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'content', 'createdby', 'status'], 'integer'],
            [['name','seo_url', 'class', 'title', 'image', 'createdon', 'updatedon'], 'safe'],
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
        $query = Content::find();
        $query->where(['class' => $params['class']]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'id' => $this->id,
            'class' => $this->class,
            'content' => $this->content,
            'createdby' => $this->createdby,
            'createdon' => $this->createdon,
            'updatedon' => $this->updatedon,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'seo_url', $this->seo_url])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
