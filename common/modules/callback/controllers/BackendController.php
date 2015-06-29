<?php

namespace common\modules\callback\controllers;

use Yii;
use common\modules\callback\models\backend\Callback;
use common\modules\callback\models\CallbackSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BackendController implements the CRUD actions for Callback model.
 */
class BackendController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    $this->redirect(['/users/backend/login']);
                },
                        'rules' => [
                            [
                                'actions' => ['index', 'view', 'create', 'update', 'delete', 'batch-delete'],
                                'allow' => true,
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
             * Lists all Callback models.
             * @return mixed
             */
            public function actionIndex($render = 'index') {

                $ajax = Yii::$app->request->post('ajax');
                $searchModel = new CallbackSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                if ($ajax) {
                    return $this->renderAjax($render, [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                                'ajax' => $ajax,
                    ]);
                } else {
                    return $this->render($render, [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                                'ajax' => $ajax,
                    ]);
                }
            }

            /**
             * Displays a single Callback model.
             * @param integer $id
             * @return mixed
             */
            public function actionView($id) {
                return $this->render('view', [
                            'model' => $this->findModel($id),
                ]);
            }

            /**
             * Creates a new Callback model.
             * If creation is successful, the browser will be redirected to the 'view' page.
             * @return mixed
             */
            public function actionCreate() {
                $model = new Callback();

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['index']);
                } else {
                    return $this->render('create', [
                                'model' => $model,
                    ]);
                }
            }

            /**
             * Updates an existing Callback model.
             * If update is successful, the browser will be redirected to the 'view' page.
             * @param integer $id
             * @return mixed
             */
            public function actionUpdate($id) {
                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['index']);
                } else {
                    return $this->render('update', [
                                'model' => $model,
                    ]);
                }
            }

            /**
             * Deletes an existing Callback model.
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
                        $this->actionDelete($id);
                    }
                    return $this->redirect(['index', 'class' => $class]);
                } else {
                    throw new HttpException(400);
                }
            }

            /**
             * Finds the Callback model based on its primary key value.
             * If the model is not found, a 404 HTTP exception will be thrown.
             * @param integer $id
             * @return Callback the loaded model
             * @throws NotFoundHttpException if the model cannot be found
             */
            protected function findModel($id) {
                if (($model = Callback::findOne($id)) !== null) {
                    return $model;
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
            }

        }
        