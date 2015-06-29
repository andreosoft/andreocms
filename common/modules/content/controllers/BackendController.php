<?php

namespace common\modules\content\controllers;

use Yii;
use common\modules\content\models\backend\Content;
use common\modules\content\models\backend\ContentSearch;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BackendController implements the CRUD actions for Admin model.
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
             * Lists all Admin models.
             * @return mixed
             */
            public function actionIndex($render = 'index', $class = '') {

                $ajax = Yii::$app->request->post('ajax');
                $searchModel = new ContentSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                if ($ajax) {
                    return $this->renderAjax($render, [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                                'class' => $class,
                                'ajax' => $ajax,
                    ]);
                } else {
                    return $this->render($render, [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                                'class' => $class,
                                'ajax' => $ajax,
                    ]);
                }
            }

            /**
             * Displays a single Admin model.
             * @param integer $id
             * @return mixed
             */
            public function actionView($id) {
                return $this->render('view', [
                            'model' => (new Content)->findModel($id),
                ]);
            }

            /**
             * Creates a new Admin model.
             * If creation is successful, the browser will be redirected to the 'view' page.
             * @return mixed
             */
            public function actionCreate() {
                $model = new Content();
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
//                    return $this->redirect(['index', 'class' => $model->class]);
                    return $this->redirect(['update', 'id' => $model->id]);
                } else {
                    return $this->render('create', ['model' => $model ]);
                }
            }

            /**
             * Updates an existing Admin model.
             * If update is successful, the browser will be redirected to the 'view' page.
             * @param integer $id
             * @return mixed
             */
            public function actionUpdate($id) {
                $model = $this->findModel($id);
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
//                    return $this->redirect(['index', 'class' => $model->class]);
                    return $this->render('update', [ 'model' => $model ]);
                } else {
                    return $this->render('update', ['model' => $model ]);
                }
            }

            /**
             * Deletes an existing Admin model.
             * If deletion is successful, the browser will be redirected to the 'index' page.
             * @param integer $id
             * @return mixed
             */
            public function actionDelete($id) {
                $model = $this->findModel($id);
                $class = $model->class;
                $model->delete();

                return $this->redirect(['index', 'class' => $class]);
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
             * Finds the Admin model based on its primary key value.
             * If the model is not found, a 404 HTTP exception will be thrown.
             * @param integer $id
             * @return Admin the loaded model
             * @throws NotFoundHttpException if the model cannot be found
             */
            private function findModel($id) {
                if (($model = Content::findOne($id)) !== null) {
                    return $model;
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
            }

        }
        