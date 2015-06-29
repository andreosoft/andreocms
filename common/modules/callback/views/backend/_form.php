<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\themes\admin\widgets\ActiveForm;
use common\modules\callback\models\backend\Callback;

/* @var $this yii\web\View */
/* @var $model common\modules\callback\models\Callback */
/* @var $form yii\widgets\ActiveForm */
?>
<?php

$form = ActiveForm::begin(['options' => [
                'enctype' => 'multipart/form-data',
                'boxTitle' => $options['title'],
                'buttonUndo' => $options['buttonUndo']
        ]]);
?>

<?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'adress')->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'phone')->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
<?= $form->field($model, 'status')->dropDownList(Callback::getStatusArray()) ?>
<?= $form->field($model, 'data')->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'url')->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'createdby')->textInput() ?>
<?= $form->field($model, 'createdon')->textInput() ?>
<?= $form->field($model, 'editedby')->textInput() ?>
<?= $form->field($model, 'editedon')->textInput() ?>

<?php ActiveForm::end(); ?>

