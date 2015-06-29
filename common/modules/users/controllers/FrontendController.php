<?php

namespace common\modules\users\controllers;

use Yii;
use yii\web\Controller;
use common\modules\users\models\LoginForm;
use common\modules\users\models\SignupForm;
use common\modules\users\models\UserProfile;
use common\modules\users\models\PasswordResetRequestForm;
use common\modules\users\models\ResetPasswordForm;
use common\modules\users\models\AuthLogin;
use common\modules\users\models\UsersAuth;
use common\modules\users\models\User;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\data\Pagination;

use common\modules\catalog\models\CatalogProducts;
use yii\helpers\VarDumper;

class FrontendController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    $this->redirect(['login']);
                },
                        'rules' => [
                            [
                                'actions' => ['login', 'view', 'error', 'request-password-reset', 'reset-password', 'signup-auth', 'pos-owner'],
                                'allow' => true,
                                'roles' => ['?'],
                            ],
                            [
                                'actions' => ['logout', 'view', 'pos', 'pos-owner', 'index', 'request-password-reset', 'reset-password'],
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                        ],
                    ],
                    'eauth' => [
                        // required to disable csrf validation on OpenID requests
                        'class' => \nodge\eauth\openid\ControllerBehavior::className(),
                        'only' => ['login'],
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

            public function actionIndex() {
                
                $model = (new UserProfile)->getProfile();
                if ($model->load(Yii::$app->request->post())) {
                    $model->id = \Yii::$app->user->getId();
                    if ($model->save()) {
                        $this->actionUpload($model);
                        return $this->redirect(['/users/site/index']);
                    } else {
                        return $this->render('index', [
                                    'model' => $model,
                        ]);
                    }
                } else {
                    return $this->render('index', [
                                'model' => $model,
                    ]);
                }
                return $this->render('index');
            }
            
            public function actionView($id) {
                $modelUser = User::findOne(['id' => $id, 'status' => User::STATUS_ACTIVE]);
                $modelUserProfile = UserProfile::findOne(['user_id' => $modelUser->id]);
                $queryProducts = CatalogProducts::find()->where(['published' => true]);
                $queryProducts->andWhere(['createdby' => $modelUser->id]);
                $pagination = new Pagination([
                    'defaultPageSize' => 10,
                    'totalCount' => $queryProducts->count(),
                ]);
                $elements = $queryProducts->orderBy('publishedon' . ' ' . 'desc')
                        ->offset($pagination->offset)
                        ->limit($pagination->limit)
                        ->all();                
                return $this->render('viewOwner', [
                            'modelUser' => $modelUser,
                            'modelUserProfile' => $modelUserProfile,
                            'elements' => $elements,
                            'pagination' => $pagination,
                ]);
            }
            
            public function actionPos() {
                $model = UserProfile::getProfile();
                if ($model->load(Yii::$app->request->post())) {
                    if ($model->save()) {
                        return $this->redirect(['/users/site/index']);
                    }
                }
                return $this->render('viewPos', [
                     'model' => $model,
                ]);
            }

            public function actionPosOwner($id) {
                $model = UserProfile::findOne(['user_id' => $id]);
                return $this->render('viewPosOwner', [
                     'model' => $model,
                ]);
            }
            
            public function actionLogin() {

                if (!\Yii::$app->user->isGuest) {
                    return $this->goHome();
                }

                $serviceName = Yii::$app->getRequest()->getQueryParam('service');
                if (isset($serviceName)) {
                    /** @var $eauth \nodge\eauth\ServiceBase */
                    $eauth = Yii::$app->get('eauth')->getIdentity($serviceName);
                    $eauth->setRedirectUrl(Yii::$app->getUser()->getReturnUrl());
                    $eauth->setCancelUrl(Yii::$app->getUrlManager()->createAbsoluteUrl('/users/site/login'));

                    try {
                        $modelAuth = new AuthLogin();
                        if ($eauth->authenticate() && $modelAuth->load(['AuthLogin' => ['auth_id' => $eauth->getId(), 'service' => $eauth->getServiceName()]])) {
                            if ($modelAuth->login()) {
                                return $eauth->redirect();
                            } else {
                                $eauth->redirect(Yii::$app->getUrlManager()->createAbsoluteUrl(['/users/site/signup-auth', 'auth_id' => $eauth->getId(), 'service' => $eauth->getServiceName()]));
                            }
                        } else {
                           return $eauth->cancel();
                        }
                    } catch (\nodge\eauth\ErrorException $e) {
                        // save error to show it later
                        Yii::$app->getSession()->setFlash('error', 'EAuthException: ' . $e->getMessage());

                        $eauth->redirect($eauth->getCancelUrl());
                    }
                }

                 $model = new LoginForm();
                if ($model->load(Yii::$app->request->post()) && $model->login()) {
                    return $this->redirect(Yii::$app->getUser()->getReturnUrl());
                } else {
                    return $this->render('login', [
                                'model' => $model,
                    ]);
                }
            }

            public function actionLogout() {
                Yii::$app->user->logout();

                return $this->goHome();
            }

            public function actionSignupAuth($auth_id, $service) {
                $modeluser = new LoginForm();
                $modelauth = new UsersAuth();
                if ($modeluser->load(Yii::$app->request->post()) && $modelauth->load(['UsersAuth' => ['auth_id' => $auth_id, 'service' => $service]]) && $modeluser->login() && $modelauth->signup()) {
                    return $this->goBack();
                }
                return $this->render('signupAuth', [
                            'model' => $modeluser,
                ]);
            }

            public function actionSignup() {
                $model = new SignupForm();
                if ($model->load(Yii::$app->request->post())) {
                    if ($user = $model->signup()) {
                        if (Yii::$app->getUser()->login($user)) {
                            return $this->goBack();
                        }
                    }
                }

                return $this->render('signup', [
                            'model' => $model,
                ]);
            }

            public function actionActivation($token) {
                /*                $model = new ActivationForm(['token' => $token]);

                  if ($model->validate() && $model->activation()) {
                  Yii::$app->session->setFlash('success', 'Ваша учётная запись была успешно активирована.');
                  } else {
                  Yii::$app->session->setFlash('danger', 'Неверный код активации или возмоможно аккаунт был уже ранее активирован.');
                  }

                  return $this->goHome();
                 */
            }

            public function actionRequestPasswordReset() {
                $model = new PasswordResetRequestForm();
                if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                    if ($model->sendEmail()) {
                        Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');
                        return $this->goHome();
                    } else {
                        Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
                    }
                }

                return $this->render('requestPasswordResetToken', [
                            'model' => $model,
                ]);
            }

            public function actionResetPassword($token) {
                try {
                    $model = new ResetPasswordForm($token);
                } catch (InvalidParamException $e) {
                    throw new BadRequestHttpException($e->getMessage());
                }

                if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
                    Yii::$app->getSession()->setFlash('success', 'New password was saved.');

                    return $this->goHome();
                }

                return $this->render('resetPassword', [
                            'model' => $model,
                ]);
            }

            public function actionUpload($model) {
                $model->file = UploadedFile::getInstance($model, 'file');
                if ($model->file && $model->validate()) {
                    $uploads = \Yii::getAlias('@uploads');
                    $path = 'users/' . $model->id . '/';
                    if (!is_dir($uploads . $path)) {
                        mkdir($uploads . $path);
                    }
                    $file = $path . $model->file->baseName . '.' . $model->file->extension;
                    $model->file->saveAs($uploads . $file);
                    Image::thumbnail($uploads . $file, 200, 200)
                            ->save(Yii::getAlias($uploads . $path . $model->file->baseName . '-thumb-200.jpg'), ['quality' => 50]);
                    Image::thumbnail($uploads . $file, 300, 300)
                            ->save(Yii::getAlias($uploads . $path . $model->file->baseName . '-thumb-300.jpg'), ['quality' => 50]);
                    Image::thumbnail($uploads . $file, 88, 88)
                            ->save(Yii::getAlias($uploads . $path . $model->file->baseName . '-thumb-88.jpg'), ['quality' => 50]);
                    $model->file = '';
                    $model->image = $file;
                    $model->save();
                }
            }

        }
        