<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Привязать ваш аккаунт к сети';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin(['id' => 'signup-auth-form']); ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <div style="color:#999;margin:1em 0">
            Либо вам необходимо пройти короткую регистрацию: <?= Html::a('регистрация', ['site/signup']) ?>.
        </div>
        <div class="form-group">
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>
