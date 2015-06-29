<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

$this->title = 'Сброс пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Пожалуйста, введите новый пароль:</p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-group">
                <?= Html::submitButton('Записать', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
    