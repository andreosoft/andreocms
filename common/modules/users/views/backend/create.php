<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\themes\admin\widgets\ActiveForm;

$this->title = 'New user';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$form = ActiveForm::begin(['options' => [
                'enctype' => 'multipart/form-data',
                'boxTitle' => '<i class="fa fa-pencil"></i> Создать',
                'buttonUndo' => Url::to(['index'])
        ]]);
?>
<?= $form->field($model, 'username')->textInput(['maxlength' => 255])?>
<?= $form->field($model, 'email')->textInput(['maxlength' => 255, 'type' => 'email'])?>
<?= $form->field($model, 'password')->textInput(['maxlength' => 255, 'type' => 'password'])?>

<?php ActiveForm::end(); ?>
