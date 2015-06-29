<?php

namespace common\modules\catalog\controllers;

use Yii;
use common\modules\catalog\models\backend\CatalogSearch;
use common\modules\catalog\models\CatalogCategorys;
use common\modules\catalog\models\backend\CatalogProducts;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BackendController implements the CRUD actions for CatalogCategorys model.
 */
class BackendController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    $this->redirect(['/users/backend/login']);
                },
                        'only' => ['index', 'view', 'create', 'update', 'delete'],
                        'rules' => [
                            [
                                'allow' => true,
                                'actions' => ['index', 'view', 'create', 'update', 'delete', 'batch-delete'],
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

            /**
             * Lists all CatalogCategorys models.
             * @return mixed
             */
            public function actionIndex($render = 'index', $parent = 0) {
                $ajax = Yii::$app->request->post('ajax');
                $parentModel = (new CatalogProducts)->findOne(['id' => $parent]);
                $searchModel = new CatalogSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $parent);
                if ($ajax) {
                    return $this->renderAjax($render, [
                                'parentModel' => $parentModel,
                                'dataProvider' => $dataProvider,
                                'searchModel' => $searchModel,
                                'ajax' => $ajax,
                    ]);
                } else {
                    return $this->render($render, [
                                'parentModel' => $parentModel,
                                'dataProvider' => $dataProvider,
                                'searchModel' => $searchModel,
                                'ajax' => $ajax,
                    ]);
                }
            }

            /**
             * Displays a single CatalogCategorys model.
             * @param integer $id
             * @return mixed
             */
            public function actionView($id) {
                return $this->render('view', [
                            'model' => $this->findModel($id),
                ]);
            }

            /**
             * Creates a new CatalogCategorys model.
             * If creation is successful, the browser will be redirected to the 'view' page.
             * @return mixed
             */
            public function actionCreate($redirect = 'true') {
                $model = new CatalogProducts();

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    if (!$redirect) {
                        return $this->render('create', [
                                    'model' => $model,
                        ]);
                    }
                    return $this->redirect(['index', 'parent' => $model->parent]);
                } else {
                    return $this->render('create', [
                                'model' => $model,
                    ]);
                }
            }

            /**
             * Updates an existing CatalogCategorys model.
             * If update is successful, the browser will be redirected to the 'view' page.
             * @param integer $id
             * @return mixed
             */
            public function actionUpdate($id) {
                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['index', 'parent' => $model->parent]);
                } else {
                    return $this->render('update', [
                                'model' => $model,
                    ]);
                }
            }

            /**
             * Deletes an existing CatalogCategorys model.
             * If deletion is successful, the browser will be redirected to the 'index' page.
             * @param integer $id
             * @return mixed
             */
            public function actionDelete($id) {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
            }

            public function actionBatchDelete() {
                if (($ids = Yii::$app->request->post('ids')) !== null) {
                    foreach ($ids as $id) {
                        $model = $this->findModel($id);
                        $model->delete();
                    }
                    return $this->redirect(['index']);
                } else {
                    throw new HttpException(400);
                }
            }

            /**
             * Finds the CatalogCategorys model based on its primary key value.
             * If the model is not found, a 404 HTTP exception will be thrown.
             * @param integer $id
             * @return CatalogCategorys the loaded model
             * @throws NotFoundHttpException if the model cannot be found
             */
            protected function findModel($id) {
                if (($model = CatalogProducts::findOne($id)) !== null) {
                    return $model;
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
            }

        }
        