<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\themes\admin\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(['options' => [
                'enctype' => 'multipart/form-data',
                'boxTitle' => '<i class="fa fa-pencil"></i> Новый пароль',
                'buttonUndo' => Url::to(['update', 'id' => $id]),
        ]]);
?>

<?= $form->field($model, 'password')->textInput(['type' => 'password', 'maxlength' => 255]) ?>

<?php ActiveForm::end(); ?>