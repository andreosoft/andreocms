<?php

namespace common\modules\comments\widgets;

use yii\bootstrap\Widget;
use yii\data\Pagination;
use common\modules\comments\models\site\Comments;

class getCommentsByUser extends Widget {

    public function init() {
        parent::init();
    }

    public function run() {
        $model = new Comments();
        $query = $model->queryByUser($this->id);
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);
        $elements = $query->orderBy($model->order)
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        return $this->render('getElementsByUser/index', [
                    'elements' => $elements,
                    'pagination' => $pagination,
                    'id' => $this->id,
        ]);
    }

}
