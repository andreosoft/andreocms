<?php

namespace common\modules\filemanager\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\data\Pagination;
use andreosoft\image\Image;
use common\modules\filemanager\models\File;

class FileController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    $this->redirect(['/users/backend/login']);
                },
                        'rules' => [
                            [
                                'actions' => ['index', 'upload', 'folder', 'delete', 'view', 'update'],
                                'allow' => true,
                                'roles' => ['admin'],
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

            public function actionIndex ($view = 'index', $rootAlias = '@common') {
                return $this->render($view, [
                    'rootAlias' => $rootAlias,
                ]);
            }
            
            public function actionView($filter_name = '', $directory = '', $page = 1, $target = '', $thumb = '', $rootAlias = '@common') {
                $filter_name = rtrim(str_replace(array('../', '..\\', '..', '*'), '', $filter_name), '/');
                $root = \Yii::getAlias($rootAlias);
                $directory = rtrim(str_replace(array('../', '..\\', '..'), '', $directory), '/');

                $directories = glob($root . $directory . '/' . $filter_name . '*', GLOB_ONLYDIR);
                if (!$directories) {
                    $directories = array();
                }
                $files = glob($root . $directory . '/' . $filter_name . '*.*', GLOB_BRACE);

                if (!$files) {
                    $files = array();
                }

                $items = array_merge($directories, $files);
                $items_total = count($items);

                $items = array_splice($items, ($page - 1) * 16, 16);
                $data = [];
                foreach ($items as $item) {
                    $name = str_split(basename($item), 14);
                    $ext = strtolower(pathinfo($item, PATHINFO_EXTENSION));
                    if (is_dir($item)) {
                        $data['files'][] = array(
                            'thumb' => '',
                            'name' => implode(' ', $name),
                            'type' => 'directory',
                            'path' => substr($item, strlen($root)),
                            'href' => '',
                        );
                    } elseif ((is_file($item)) &&  ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif')) {
                        $data['files'][] = array(
                            'thumb' => Image::thumb(substr($item, strlen($root)), 100, 100, ['root' => \Yii::getAlias('@app')]),
                            'name' => implode(' ', $name),
                            'type' => 'image',
                            'path' => substr($item, strlen($root)),
                            'href' => '',
                        );
                    } elseif ((is_file($item)) && ($ext == 'php' || $ext == 'html' || $ext == 'css' || $ext == 'js')) {
                        $data['files'][] = array(
                            'thumb' => '',
                            'name' => implode(' ', $name),
                            'type' => 'edited',
                            'path' => substr($item, strlen($root)),
                            'href' => '',
                        );
                    } else  {
                        $data['files'][] = array(
                            'thumb' => '',
                            'name' => implode(' ', $name),
                            'type' => 'file',
                            'path' => substr($item, strlen($root)),
                            'href' => '',
                        );
                    }                    
                }

                $pos = strrpos($directory, '/');
                $parent = '';
                if ($pos) {
                    $parent = (substr($directory, 0, $pos));
                }
                $pagination = new Pagination([
                    'defaultPageSize' => 16,
                    'totalCount' => $image_total,
                ]);

                return $this->renderAjax('view', [
                            'files' => $data['files'],
                            'parent' => $parent,
                            'current' => $directory,
                            'target' => $target,
                            'thumb' => $thumb,
                            'pagination' => $pagination,
                            'rootAlias' => $rootAlias,
                ]);
            }

            public function actionFolder($directory, $rootAlias = '@common') {
                $json = array();
                $folder = Yii::$app->request->post()['folder'];
                $root = \Yii::getAlias($rootAlias);
                if (!is_dir($root . $directory)) {
                    $json['error'] = \Yii::t('filemanager/main', 'Warning: Directory does not exist!');
                } else {
                    $folder = str_replace(array('../', '..\\', '..'), '', basename(html_entity_decode($folder, ENT_QUOTES, 'UTF-8')));
                    if ((strlen($folder) < 1) || (strlen($folder) > 128)) {
                        $json['error'] = \Yii::t('filemanager/main', 'Warning: Folder name must be a between 1 and 255!');
                    }
                    if (is_dir($root . $directory . '/' . $folder)) {
                        $json['error'] = \Yii::t('filemanager/main', 'Warning: A file or directory with the same name already exists!');
                    }
                }
                if (!$json) {
                    mkdir($root . $directory . '/' . $folder, 0777);
                    $json['success'] = \Yii::t('filemanager/main', 'Success: Directory created!');
                }

                return json_encode($json);
            }

            public function actionDelete($rootAlias = '@common') {
                $root = \Yii::getAlias($rootAlias);
                $paths = Yii::$app->request->post('path');

                foreach ($paths as $path) {
                    $path = rtrim($root . str_replace(array('../', '..\\', '..'), '', $path), '/');

                    // If path is just a file delete it
                    if (is_file($path)) {
                        unlink($path);

                        // If path is a directory beging deleting each file and sub folder
                    } elseif (is_dir($path)) {
                        $files = array();

                        // Make path into an array
                        $path = array($path . '*');

                        // While the path array is still populated keep looping through
                        while (count($path) != 0) {
                            $next = array_shift($path);

                            foreach (glob($next) as $file) {
                                // If directory add to path array
                                if (is_dir($file)) {
                                    $path[] = $file . '/*';
                                }

                                // Add the file to the files to be deleted array
                                $files[] = $file;
                            }
                        }

                        // Reverse sort the file array
                        rsort($files);

                        foreach ($files as $file) {
                            // If file just delete
                            if (is_file($file)) {
                                unlink($file);

                                // If directory use the remove directory function
                            } elseif (is_dir($file)) {
                                rmdir($file);
                            }
                        }
                    }
                }

                $json['success'] = \Yii::t('filemanager/main', 'Success: Your file or directory has been deleted!');
                return json_encode($json);
            }

            public function actionUpload($directory = '', $rootAlias = '@common') {
                echo 'hello';
                return;
                $json = array();
                $model = new File();
                $model->file = UploadedFile::getInstances($model, 'file');
                if ($model->file && $model->validate()) {
                    $root = \Yii::getAlias($rootAlias);
                    foreach ($model->file as $file) {
                        $fileName = $root . $directory . '/' . $file;
                        if ($file->saveAs($fileName)) {
                            $json['success'] = \Yii::t('filemanager/main', 'Success: Your file has been uploaded!');
                        }
                    }
                }
                if (!json) {
                    $json['error'] = \Yii::t('filemanager/main', 'Warning: File could not be uploaded for an unknown reason!');
                }

                return json_encode($json);
            }
            
            public function actionUpdate($path, $rootAlias = '@common') {
                $root = \Yii::getAlias($rootAlias);
                $model = new File();
                $model->path = $root . $path;
                $model->loadContent();
                if ($model->load(Yii::$app->request->post()) && $model->saveContent()) {
                    return $this->redirect(['index']);
                } else {
                    return $this->render('update', [
                                'model' => $model,
                                'path' => $path,
                                'rootAlias' => $rootAlias,
                    ]);
                }
            }

        }
        