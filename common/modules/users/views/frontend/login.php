<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Войти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php echo \nodge\eauth\Widget::widget(array('action' => 'site/login')); ?>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
        <div style="color:#999;margin:1em 0">
            Если вы забыли пароль вы можете восстановить его перейдя по ссылке: <?= Html::a('сброс пароля', ['site/request-password-reset']) ?>.
        </div>
        <div class="form-group">
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>

