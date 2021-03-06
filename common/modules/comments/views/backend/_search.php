<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\comments\models\CommentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'table_id') ?>

    <?= $form->field($model, 'table_name') ?>

    <?= $form->field($model, 'parent') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?php // echo $form->field($model, 'createdby') ?>

    <?php // echo $form->field($model, 'createdon') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <?php // echo $form->field($model, 'rate_num') ?>

    <?php // echo $form->field($model, 'like') ?>

    <?php // echo $form->field($model, 'dislike') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <?php // echo $form->field($model, 'deletedby') ?>

    <?php // echo $form->field($model, 'deletedon') ?>

    <?php // echo $form->field($model, 'editedby') ?>

    <?php // echo $form->field($model, 'editedon') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'introtext') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'image') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
