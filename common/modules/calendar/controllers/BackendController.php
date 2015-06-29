<?php

namespace common\modules\calendar\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\modules\calendar\Asset;
use common\modules\calendar\models\Calendar;


class BackendController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    $this->redirect(['/users/backend/login']);
                },
                        'only' => ['index'],
                        'rules' => [
                            [
                                'allow' => true,
                                'actions' => ['index'],
                                'roles' => ['manager', 'admin'],
                            ],
                        ],
                    ],
            'verbs' => [
                        'class' => VerbFilter::className(),
                        'actions' => [
                            'delete' => ['post'],
                        ],
                    ],
                ];
            }


    public function actionIndex() {
        $this->registerClientScript();
        return $this->render('index');
    }
    
     public function actionGetEvents($start,$end) {
        $query = Calendar::find();
        $query->andWhere(['createdby' => \Yii::$app->user->getId()]);
        $query->andWhere("start >= '{$start}' AND start <= '{$end}'");
        $elements = $query->asArray()->all();
        
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                
        return $elements;
    }   
 
    public function actionCreateEvents() {
        
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        $model = new Calendar();
                
        $model->load(Yii::$app->request->post());
        $model->createdby = \Yii::$app->user->getId();
        $model->createdon = date('Y-m-d H:i:s', time());
        if ($model->save()) {
            return true;
        } else {
            return false;
        }
    }
    
    protected function registerClientScript() {
        $view = $this->getView();
        Asset::register($view);
    }

}
        