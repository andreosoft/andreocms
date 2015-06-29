<?php

namespace common\modules\comments\controllers;

use yii\web\Controller;
use common\modules\comments\models\site\Comments;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;
use Yii;

class FrontendController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    $this->redirect(['/users/site/login']);
                },
                        'only' => ['index', 'create'],
                        'rules' => [
                            [
                                'allow' => true,
                                'actions' => ['index'],
                                'roles' => ['?'],
                            ],
                            [
                                'allow' => true,
                                'actions' => ['index', 'create'],
                                'roles' => ['@'],
                            ],
                        ],
                    ],
                ];
            }

            public function actions() {
                return [
                    'error' => [
                        'class' => 'yii\web\ErrorAction',
                    ],
                ];
            }

            public function actionIndex($id) {
                $model = new Comments();
                $query = $model->queryById($id);
                $pagination = new Pagination([
                    'defaultPageSize' => 10,
                    'totalCount' => $query->count(),
                ]);
                $elements = $query->orderBy($model->order)
                        ->offset($pagination->offset)
                        ->limit($pagination->limit)
                        ->all();
                return $this->render('index', [
                            'elements' => $elements,
                            'pagination' => $pagination,
                            'id' => $id,
                ]);
            }

            public function actionCreate($table_id, $table_name) {
                $model = new Comments();
                if (isset(Yii::$app->request->post()[Comments])) {
                    $loadArray = array_merge(Yii::$app->request->queryParams, Yii::$app->request->post()[Comments]);
                    if ($model->load([Comments => $loadArray])) {
                        $model->createdby = \Yii::$app->user->getId();
                        $model->createdon = date('Y-m-d H:i:s', time());
                        if ($model->save()) {
                            return $this->redirect(['index', 'id' => $table_id]);
                        } else {
                            throw new NotFoundHttpException('The requested page not allowed.');
                        }
                    } else {
                        return $this->render('create', [
                                    'model' => $model,
                                    'id' => $table_id,
                        ]);
                    }
                } else {
                    return $this->render('create', [
                                'model' => $model,
                                'id' => $table_id,
                    ]);
                }
            }

        }
        