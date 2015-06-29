<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('users/main', 'Authorization');
?>
<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <?= Html::a('<b>' . Yii::$app->name . '</b>', Yii::$app->homeUrl) ?>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg"><?php echo Html::encode($this->title); ?></p>
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'username')->textInput(['placeholder' => $model->getAttributeLabel('username')])->label(false) ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password')])->label(false) ?>
            <div class="row">
                <div class="col-xs-8"> 
                    <div class="checkbox icheck">
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>
                </div>
                <div class="col-xs-4">
                    <?= Html::submitButton(Yii::t('users/main', 'Login'), ['class' => 'btn bg-olive btn-block']) ?>
                </div>
            </div>    
            <p><?= Html::a(Yii::t('users/main', 'Login recovery'), ['request-password-reset']) ?></p>
        </div>

        <?php ActiveForm::end(); ?>
    </div>  
</body>

`