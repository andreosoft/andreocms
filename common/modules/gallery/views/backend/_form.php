<?php

use yii\helpers\Html;
use common\themes\admin\widgets\ActiveForm;
use common\modules\filemanager\widgets\Image;
use andreosoft\summernote\Summernote;
?>
<?php $form = ActiveForm::begin(['options' => [
                'enctype' => 'multipart/form-data',
                'boxTitle' => $options['title'],
                'buttonUndo' => $options['buttonUndo']
        ]]); ?>

    <?= $form->field($model, 'table_id')->textInput() ?>
    <?= $form->field($model, 'table_name')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'parent')->checkbox() ?>
    <?= $form->field($model, 'parent_id')->textInput() ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <?= $form->field($model, 'createdby')->textInput() ?>
    <?= $form->field($model, 'createdon')->textInput() ?>
    <?= $form->field($model, 'image')->widget(Image::className()) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'introtext')->widget(Summernote::className(), ['editorOptions' => ['height' => 200,]]) ?>
    <?= $form->field($model, 'content')->widget(Summernote::className(), ['editorOptions' => ['height' => 400,]]) ?>
    <?= $form->field($model, 'like')->textInput() ?>
    <?= $form->field($model, 'dislike')->textInput() ?>
    <?= $form->field($model, 'views')->textInput() ?>
    <?= $form->field($model, 'rate')->textInput() ?>
    <?= $form->field($model, 'rate_num')->textInput() ?>

    <?php ActiveForm::end(); ?>

