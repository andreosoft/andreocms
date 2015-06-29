<?php

use yii\helpers\Html;
use common\themes\admin\widgets\ActiveForm;
?>

<?php

$form = ActiveForm::begin(['options' => [
                'enctype' => 'multipart/form-data',
                'boxTitle' => $options['title'],
                'buttonUndo' => $options['buttonUndo']
        ]]);
?>

<?= $form->field($model, 'id')->textInput() ?>
<?= $form->field($model, 'table_id')->textInput() ?>
<?= $form->field($model, 'table_name')->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'parent')->textInput() ?>
<?= $form->field($model, 'parent_id')->textInput() ?>
<?= $form->field($model, 'createdby')->textInput() ?>
<?= $form->field($model, 'createdon')->textInput() ?>
<?= $form->field($model, 'rate')->textInput() ?>
<?= $form->field($model, 'rate_num')->textInput() ?>
<?= $form->field($model, 'like')->textInput() ?>
<?= $form->field($model, 'dislike')->textInput() ?>
<?= $form->field($model, 'status')->textInput() ?>
<?= $form->field($model, 'deleted')->textInput() ?>
<?= $form->field($model, 'deletedby')->textInput() ?>
<?= $form->field($model, 'deletedon')->textInput() ?>
<?= $form->field($model, 'editedby')->textInput() ?>
<?= $form->field($model, 'editedon')->textInput() ?>
<?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'introtext')->textarea(['rows' => 6]) ?>
<?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
<?= $form->field($model, 'image')->textInput(['maxlength' => 255]) ?>

<?php ActiveForm::end(); ?>
