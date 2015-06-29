<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\widgets\googleMaps\googleMaps;

$this->title = 'Задать гоординаты расположения';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= googleMaps::widget([
        'gaAddrs' => "$model->geopoint_latitude, $model->geopoint_longitude, '$model->fullAdress/n'",
]); ?>

<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-lg-6">
        <?= $form->field($model, 'geopoint_latitude')->textInput() ?>
    </div>  
    <div class="col-lg-6">  
        <?= $form->field($model, 'geopoint_longitude')->textInput() ?>
    </div>  
</div>  
<?= Html::submitButton('Обновить', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>