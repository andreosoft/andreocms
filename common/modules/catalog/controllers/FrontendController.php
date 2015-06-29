<?php

namespace common\modules\catalog\controllers;

use yii\web\Controller;
use common\modules\catalog\models\CatalogProducts;
use common\modules\catalog\Asset;
use yii\data\Pagination;
use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

class FrontendController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    $this->redirect(['/users/site/login']);
                },
                        'only' => ['index', 'search', 'view', 'view-by-url'],
                        'rules' => [
                            [
                                'allow' => true,
                                'actions' => ['index', 'search', 'view', 'view-by-url'],
                                'roles' => ['?'],
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

            public function actionIndex($parent = 0, $sortname = 'publishedon', $sortdirection = 'desc', $condition = '', $pageSize = 20, $render = 'index', $tpl = 'main') {
                
                $ajax = Yii::$app->request->post('ajax');
//                $parents = [];
//                $elements = CatalogProducts::find()->where(['parent' => $parent, 'isparent' => true, 'status' => CatalogProducts::STATUS_PUBLISHED])->all();
//                foreach ($elements as $el) {
//                    $parents[] = $el->id;
//                }
                $query = CatalogProducts::find();
//                $query->where(['parent' => $parents, 'isparent' => false, 'status' => CatalogProducts::STATUS_PUBLISHED]);
                $query->where(['parent' => $parent, 'isparent' => false, 'status' => CatalogProducts::STATUS_PUBLISHED]);
                $query->andWhere($condition);
                $pagination = new Pagination([
                    'defaultPageSize' => $pageSize,
                    'totalCount' => $query->count(),
                ]);

                $elements = $query->orderBy($sortname . ' ' . $sortdirection)
                        ->offset($pagination->offset)
                        ->limit($pagination->limit)
                        ->all();
                
                if ($ajax) {
                    return $this->renderAjax($render, [
                                'elements' => $elements,
                                'pagination' => $pagination,
                                'parent' => $parent,
                                'sortname' => $sortname,
                                'sortdirection' => $sortdirection,
                                'tpl' => $tpl,
                                'condition' => $condition,
                    ]);                   
                } else {
                    return $this->render($render, [
                                'elements' => $elements,
                                'pagination' => $pagination,
                                'parent' => $parent,
                                'sortname' => $sortname,
                                'sortdirection' => $sortdirection,
                                'tpl' => $tpl,
                                'condition' => $condition,
                    ]);
                }
            }

            public function actionSearch($q, $sortname = 'price', $sortdirection = 'asc', $pageSize = 20, $condition = '', $render = 'index', $tpl = 'main') {
                $ajax = Yii::$app->request->post('ajax');
                
                $q_lower = mb_strtolower($q, 'UTF-8');
                $qstring = " LOWER (`name`) LIKE '%$q_lower%'";
                $qstring .= " OR LOWER (`price`) LIKE '%$q_lower%'";
                $qstring .= " OR LOWER (`introtext`) LIKE '%$q_lower%'";
                $qstring .= " OR LOWER (`content`) LIKE '%$q_lower%'";

                
                $query = CatalogProducts::find()->where(['isparent' => false, 'status' => CatalogProducts::STATUS_PUBLISHED]);
                $query->andWhere($condition);
                $query->andWhere($qstring);

                $pagination = new Pagination([
                    'defaultPageSize' => $pageSize,
                    'totalCount' => $query->count(),
                ]);
                $elements = $query->orderBy($sortname . ' ' . $sortdirection)
                        ->offset($pagination->offset)
                        ->limit($pagination->limit)
                        ->all();
                
                if ($ajax) {
                    return $this->renderAjax($render, [
                                'elements' => $elements,
                                'pagination' => $pagination,
                                'parent' => $parent,
                                'sortname' => $sortname,
                                'sortdirection' => $sortdirection,
                                'tpl' => $tpl,
                                'condition' => $condition,
                                'search' => $q,
                    ]);                   
                } else {
                    return $this->render($render, [
                                'elements' => $elements,
                                'pagination' => $pagination,
                                'parent' => $parent,
                                'sortname' => $sortname,
                                'sortdirection' => $sortdirection,
                                'tpl' => $tpl,
                                'condition' => $condition,
                                'search' => $q,
                    ]);
                }
            }

            public function actionView($id, $view = 'view') {
                $model = (new CatalogProducts())->findModel($id);
                $model->updateViews();
                return $this->render($view, [
                            'model' => $model,
                ]);
            }

            public function actionViewByUrl($url, $view = 'view') {
                return $this->render($view, [
                            'model' => (new CatalogProducts())->findModel(['seo_url' => $url]),
                ]);
            }

            protected function registerClientScript() {
                $view = $this->getView();
                Asset::register($view);
            }

        }
        