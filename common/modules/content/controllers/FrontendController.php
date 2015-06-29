<?php

namespace common\modules\content\controllers;

use yii\web\Controller;
use common\modules\content\models\Content;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class FrontendController extends Controller {

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex($class = '', $view = 'index', $order = 'publishedon desc')
    {
        $query = Content::find()->andFilterWhere(['class' => $class, 'status' => Content::STATUS_PUBLISHED]);

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $elements = $query->orderBy($order)
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
        if (empty($elements)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $this->render($view, [
            'elements' => $elements,
            'pagination' => $pagination,
        ]);
    
    }
    
    public function actionView($id, $view = 'view')
    {
        $model = $this->findModel($id);
        $view = $model->template != '' ? $model->template : $view;
        return $this->render($view, [
            'model' => $model,
        ]);
    }
    
    public function actionViewByUrl($url, $view = 'view')
    {
        $model = $this->findModel(['seo_url' => $url]);
        $view = $model->template != '' ? $model->template : $view;
        return $this->render($view, [
            'model' => $model,
        ]);
    }
    
    public function actionViewClassByUrl($url, $class, $view = 'view')
    {
        $model = $this->findModel(['seo_url' => $url, 'class' => $class]);
        $view = $model->template != '' ? $model->template : $class;
        return $this->render($view, [
            'model' => $model,
        ]);
    }
    
    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
 //           $model->load(['views' => $model->views++]);
 //           $model->save();
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
