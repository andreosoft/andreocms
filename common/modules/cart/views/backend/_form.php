<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\cart\models\Cart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'cart_customer_id')->textInput() ?>

    <?= $form->field($model, 'createdby')->textInput() ?>

    <?= $form->field($model, 'createdon')->textInput() ?>

    <?= $form->field($model, 'editedby')->textInput() ?>

    <?= $form->field($model, 'editedon')->textInput() ?>

    <?= $form->field($model, 'full_price')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'delivery_price')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'products_price')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
