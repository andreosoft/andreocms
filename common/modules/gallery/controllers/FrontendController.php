<?php

namespace common\modules\gallery\controllers;

use Yii;
use common\modules\gallery\models\Gallery;
use common\modules\catalog\models\CatalogProducts;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * FrontendController implements the CRUD actions for Gallery model.
 */
class FrontendController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    $this->redirect(['/users/site/login']);
                },
                        'only' => ['index', 'create', 'update', 'delete'],
                        'rules' => [
                            [
                                'allow' => true,
                                'actions' => [],
                                'roles' => ['?'],
                            ],
                            [
                                'allow' => true,
                                'actions' => ['index', 'create', 'update', 'delete'],
                                'roles' => ['@'],
                            ],
                        ],
                    ],
                ];
            }
            /**
             * Lists all Gallery models.
             * @return mixed
             */
            public function actionIndex($table_id, $use_layout = true) {
                if (CatalogProducts::findOne($table_id)->createdby == \Yii::$app->user->getId()) {
                    $query = Gallery::find()->andFilterWhere(['table_id' => $table_id, 'table_name' => 'catalog']);
                    $dataProvider = new ActiveDataProvider([
                        'query' => $query,
                    ]);
                    if (!$use_layout) {
                        $this->layout = '//blank';
                    } else {
                        $this->layout = '//main';
                    }
                    return $this->render('index', [
                                'dataProvider' => $dataProvider,
                                'table_id' => $table_id,
                    ]);
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
            }

            /**
             * Creates a new Gallery model.
             * If creation is successful, the browser will be redirected to the 'view' page.
             * @return mixed
             */
            public function actionCreate($table_id) {

                if (CatalogProducts::findOne($table_id)->createdby == \Yii::$app->user->getId()) {
                    $model = new Gallery();

                    if ($model->load(Yii::$app->request->post())) {
                        $model->table_id = $table_id;
                        $model->table_name = 'catalog';
                        if ($model->save()) {
                            $this->actionUpload($model);
                            return $this->redirect(['index', 'table_id' => $table_id]);
                        } else {
                            return $this->render('create', [
                                        'model' => $model,
                                        'table_id' => $table_id,
                            ]);
                        }
                    } else {
                        return $this->render('create', [
                                    'model' => $model,
                                    'table_id' => $table_id,
                        ]);
                    }
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
            }

            /**
             * Updates an existing Gallery model.
             * If update is successful, the browser will be redirected to the 'view' page.
             * @param integer $id
             * @return mixed
             */
            public function actionUpdate($id) {
                $model = $this->findModel($id);
                if (CatalogProducts::findOne($model->table_id)->createdby == \Yii::$app->user->getId()) {

                    if ($model->load(Yii::$app->request->post())) {
                        if ($model->save()) {
                            $this->actionUpload($model);
                            return $this->redirect(['index', 'table_id' => $model->table_id]);
                        } else {
                            return $this->render('update', [
                                        'model' => $model,
                                        'table_id' => $model->table_id,
                            ]);
                        }
                    } else {
                        return $this->render('update', [
                                    'model' => $model,
                                    'table_id' => $model->table_id,
                        ]);
                    }
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
            }

            /**
             * Deletes an existing Gallery model.
             * If deletion is successful, the browser will be redirected to the 'index' page.
             * @param integer $id
             * @return mixed
             */
            public function actionDelete($id) {
                $model = $this->findModel($id);
                if ($model->createdby == \Yii::$app->user->getId()) {
                    $table_id = $model->table_id;
                    $model->delete();
                    return $this->redirect(['index', 'table_id' => $table_id]);
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
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

            protected function actionUpload($model) {

                $file = UploadedFile::getInstance($model, 'file');
                if ($file && $model->validate()) {
                    $uploads = \Yii::getAlias('@uploads');
                    $path = 'gallery/';
                    if (!is_dir($uploads . $path)) {
                        mkdir($uploads . $path);
                    }
                    $baseName = md5($file->baseName . time());
                    $fileName = $path . $baseName . '.' . $file->extension;
                    $file->saveAs($uploads . $fileName);
                    Image::thumbnail($uploads . $fileName, 200, 200)
                            ->save(Yii::getAlias($uploads . $path . $baseName . '-thumb-200.jpg'), ['quality' => 50]);
                    Image::thumbnail($uploads . $fileName, 300, 300)
                            ->save(Yii::getAlias($uploads . $path . $baseName . '-thumb-300.jpg'), ['quality' => 50]);
                    Image::thumbnail($uploads . $fileName, 88, 88)
                            ->save(Yii::getAlias($uploads . $path . $baseName . '-thumb-88.jpg'), ['quality' => 50]);
                    Image::thumbnail($uploads . $fileName, 58, 58)
                            ->save(Yii::getAlias($uploads . $path . $baseName . '-thumb-58.jpg'), ['quality' => 50]);
                    $model->url = $fileName;
                    $model->url_preview = $path . $baseName . '-thumb-200.jpg';
                    $model->save();
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
            }

        }
        