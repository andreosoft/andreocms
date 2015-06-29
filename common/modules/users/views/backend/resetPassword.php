<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

$this->title = 'Сброс пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <?= Html::a('<b>' . Yii::$app->name . '</b>', Yii::$app->homeUrl) ?>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg"><?php echo Html::encode($this->title); ?></p>

            <p>Пожалуйста, введите новый пароль:</p>

            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Записать', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>  
    </div> 
</body>
