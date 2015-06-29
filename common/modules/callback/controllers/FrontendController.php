<?php

namespace common\modules\callback\controllers;

use Yii;
use common\modules\callback\models\site\Callback;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BackendController implements the CRUD actions for Callback model.
 */
class FrontendController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionView()
    {
        return $this->render('view');
    }
    
    public function actionCreate()
    {
        $ajax = Yii::$app->request->post('ajax');
        $model = new Callback();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($ajax) {
                return $this->renderAjax('view', [
                                'model' => $model,
                    ]);            
            } 
            return $this->redirect(['view']);
        } else {
            if ($ajax) {
                return $this->renderAjax('create', [
                                'model' => $model,
                    ]);            
            }                 
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

}
