<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

$this->title = 'Запрос для сброса пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <?= Html::a('<b>' . Yii::$app->name . '</b>', Yii::$app->homeUrl) ?>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg"><?php echo Html::encode($this->title); ?></p>
            <p>Пожалуйста, введите ваш адрес email. Ссылка для сброса пароля будет выслана на него</p>
            <p>Please fill out your email. A link to reset password will be sent there.</p>

            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
            <?= $form->field($model, 'email') ?>
            <div class="form-group">
                <?= Html::submitButton('Послать', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</body>
