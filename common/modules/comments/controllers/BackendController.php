<?php

namespace common\modules\comments\controllers;

use Yii;
use common\modules\comments\models\Comments;
use common\modules\comments\models\CommentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BackendController implements the CRUD actions for Comments model.
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
                                'actions' => ['index', 'view', 'create', 'update', 'delete'],
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
             * Lists all Comments models.
             * @return mixed
             */
            public function actionIndex($render = 'index') {
                $ajax = Yii::$app->request->post('ajax');
                $searchModel = new CommentsSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                if ($ajax) {
                    return $this->renderAjax($render, [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                    ]);
                }
                return $this->render($render, [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
            }

            /**
             * Displays a single Comments model.
             * @param integer $id
             * @return mixed
             */
            public function actionView($id) {
                return $this->render('view', [
                            'model' => $this->findModel($id),
                ]);
            }

            /**
             * Creates a new Comments model.
             * If creation is successful, the browser will be redirected to the 'view' page.
             * @return mixed
             */
            public function actionCreate() {
                $ajax = Yii::$app->request->post('ajax');
                $model = new Comments();

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
             * Updates an existing Comments model.
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
             * Deletes an existing Comments model.
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

            /**
             * Finds the Comments model based on its primary key value.
             * If the model is not found, a 404 HTTP exception will be thrown.
             * @param integer $id
             * @return Comments the loaded model
             * @throws NotFoundHttpException if the model cannot be found
             */
            protected function findModel($id) {
                if (($model = Comments::findOne($id)) !== null) {
                    return $model;
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
            }

        }
        