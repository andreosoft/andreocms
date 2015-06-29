<?php

namespace common\modules\comments\models\site;

class Comments extends \common\modules\comments\models\Comments {
    
    public $username;
    
    public $commentTableName = 'catalog';
    public $limit = 5;
    public $order = 'createdon desc';   
    
    public function getElementsById($id) {
        $query = $this->queryById($id);
        $elements = $query->orderBy($this->order)
            ->limit($this->limit)
            ->all();   
        return $elements;
    }
    
    public function getElementsByUser($id) {
        $query = $this->queryByUser($id);
        $elements = $query->orderBy($this->order)
            ->limit($this->limit)
            ->all();   
        return $elements;
    }
    
    public function queryById($id) {
        $query = $this->find()
                ->select(['comments.createdon AS createdon', 'comments.content AS content', 'users.username AS username'])
                ->andFilterWhere(['table_id' => $id, 'table_name' => $this->commentTableName])
                ->leftJoin('users', 'comments.createdby = users.id');
        return $query;
    }
    
    public function queryByUser($id) {
        $query = $this->find()
                ->select(['comments.createdon AS createdon', 'comments.content AS content', 'users.username AS username', 'catalog_products.createdby AS userid'])
                ->andFilterWhere(['table_name' => $this->commentTableName, 'catalog_products.createdby' => $id])
                ->leftJoin('users', 'comments.createdby = users.id')
                ->leftJoin('catalog_products', 'comments.table_id = catalog_products.id');
        return $query;
    }
}