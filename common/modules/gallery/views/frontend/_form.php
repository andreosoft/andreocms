<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="gallery-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <?= Html::img(Url::to( '@webuploads' . str_replace('.jpg', '-thumb-300.jpg', $model->url), true), ['class' => 'img-thumbnail'])?>
    <?= $form->field($model, 'file')->fileInput() ?> 

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
