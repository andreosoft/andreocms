<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\wysihtml5\Wysihtml5;

/* @var $this yii\web\View */
/* @var $model common\modules\content\models\backend */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        
    <?= $form->field($model, 'content')->widget(Wysihtml5::className(), ['options' => ['style' => 'width: 100%; height: 200px;']]);?>   
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
