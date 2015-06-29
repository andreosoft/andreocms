<?php

namespace common\modules\gallery\controllers;

use Yii;
use common\modules\gallery\models\Gallery;
use common\modules\gallery\models\GallerySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BackendController implements the CRUD actions for Gallery model.
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
             * Lists all Gallery models.
             * @return mixed
             */
            public function actionIndex($render = 'index') {
                $ajax = Yii::$app->request->post('ajax');
                $searchModel = new GallerySearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                
                if ($ajax) {
                    return $this->renderAjax($render, [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                    ]);
                } else {
                    return $this->render($render, [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                    ]);
                }
            }

            /**
             * Displays a single Gallery model.
             * @param integer $id
             * @return mixed
             */
            public function actionView($id) {
                return $this->render('view', [
                            'model' => $this->findModel($id),
                ]);
            }

            /**
             * Creates a new Gallery model.
             * If creation is successful, the browser will be redirected to the 'view' page.
             * @return mixed
             */
            public function actionCreate() {
                $ajax = Yii::$app->request->post('ajax');
                $model = new Gallery();

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    if ($ajax) { return json_encode($model->toArray()); }
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    if ($ajax) { return json_encode($model->getErrors()); }
                    return $this->render('create', [
                                'model' => $model,
                    ]);
                }
            }

            /**
             * Updates an existing Gallery model.
             * If update is successful, the browser will be redirected to the 'view' page.
             * @param integer $id
             * @return mixed
             */
            public function actionUpdate($id, $render = 'index') {
                $ajax = Yii::$app->request->post('ajax');
                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    if ($ajax) { return json_encode($model->toArray()); }
                    return $this->redirect(['view', 'id' => $model->id]); 
                } else {
                    if ($ajax) { return ; }
                    return $this->render('update', [
                                'model' => $model,
                        ]);
                }
            }

            /**
             * Deletes an existing Gallery model.
             * If deletion is successful, the browser will be redirected to the 'index' page.
             * @param integer $id
             * @return mixed
             */
            public function actionDelete($id) {
                $ajax = Yii::$app->request->post('ajax');
                $this->findModel($id)->delete();
                if ($ajax) {
                    return json_encode(['id' => $id]);
                }
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
             * Finds the Gallery model based on its primary key value.
             * If the model is not found, a 404 HTTP exception will be thrown.
             * @param integer $id
             * @return Gallery the loaded model
             * @throws NotFoundHttpException if the model cannot be found
             */
            protected function findModel($id) {
                if (($model = Gallery::findOne($id)) !== null) {
                    return $model;
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
            }

        }
        