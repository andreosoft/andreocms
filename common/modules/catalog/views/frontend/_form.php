<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
//use yii\jui\DatePicker;
use common\widgets\wysihtml5\Wysihtml5;
use common\modules\catalog\models\CatalogCategorys;
//use common\widgets\fileupload\Fileupload;
/* @var $this yii\web\View */
/* @var $model common\modules\content\models\backend */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <div class="row">
        <div class="col-sm-4">
            <?= $model_signup_user != '' ? $form->field($model_signup_user, 'username')->textInput() : ''?>
        </div>
        
        <div class="col-sm-4">
            <?= $model_signup_user != '' ? $form->field($model_signup_user, 'password')->passwordInput() : ''?>       
        </div>
        
        <div class="col-sm-4">
            <?= $model_signup_user != '' ? $form->field($model_signup_user, 'email')->textInput() : ''?>
        </div>
        
        <div class="col-sm-8">
            <?= $form->field($model, 'category')->dropDownList(ArrayHelper::map(CatalogCategorys::find()->where(['parent' => '1'])->all(), 'id', 'name')) ?>
            <?= $form->field($model, 'user_name')->textInput() ?>
            <?= $form->field($model, 'title')->textInput() ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'user_phone')->textInput() ?>
            <?= $form->field($model, 'user_type')->dropDownList([['частное лицо'=>'частное лицо'], ['организация'=>'организация']]) ?>
            <?= $form->field($model, 'price')->textInput() ?>
            <?= $form->field($model, 'price_d')->textInput() ?>
            <?= $form->field($model, 'published')->checkbox() ?>
            
        </div>
    </div>    
 
    <?= $form->field($model, 'content')->widget(Wysihtml5::className(), ['options' => ['style' => 'width: 100%; height: 200px;']]);?>  
    
    <?= Html::img(Url::to('@webuploads/' . str_replace('.jpg', '-thumb-300.jpg', $model->image), true), ['class' => 'img-thumbnail'])?>
    <?= $form->field($model, 'file')->fileInput() ?>  
    <p>
        <?= $model->isNewRecord ? '<p>Для созания галереи фотографий необходимо создать обявление</p>' : Html::a('Редактировать галерею', ['/gallery/site/index', 'table_id' => $model->id], ['class' => 'btn btn-primary'])?>
    </p>
        
    <?php /* Fileupload::widget([
        'url' => Url::to(['/catalog/site/fileupload', 'id' => $model->id]),
        ]);*/?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
