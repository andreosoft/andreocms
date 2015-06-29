<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
//use himiklab\ckeditor\CKEditor;
use common\widgets\wysihtml5\Wysihtml5;
use common\modules\catalog\models\CatalogCategorys;
use common\modules\catalog\models\CatalogProducts;

/* @var $this yii\web\View */
/* @var $model common\modules\content\models\backend */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-sm-8">
            <?= $form->field($model, 'category')->dropDownList(ArrayHelper::map(CatalogCategorys::find()->where(['parent' => '2'])->all(), 'id', 'name')) ?>
            <?= $form->field($model, 'user_name')->textInput() ?>
            <?= $form->field($model, 'title')->textInput() ?>
            <?= $form->field($model, 'description')->textInput() ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'user_phone')->textInput() ?>
            <?= $form->field($model, 'user_type')->dropDownList(['частное лицо'=>  CatalogProducts::USER_TYPE_PRIVATE, 'организация'=> CatalogProducts::USER_TYPE_ORG]) ?>
            <?= $form->field($model, 'price')->textInput() ?>
            <?= $form->field($model, 'published')->checkbox() ?>           
        </div>
    </div>    
 
    <?= $form->field($model, 'introtext')->widget(Wysihtml5::className(), ['options' => ['style' => 'width: 100%; height: 200px;']]);?> 
    <?= $form->field($model, 'content')->widget(Wysihtml5::className(), ['options' => ['style' => 'width: 100%; height: 200px;']]);?> 
        
    <?= Html::img(Url::to('@webuploads/' . str_replace('.jpg', '-thumb-300.jpg', $model->image), true), ['class' => 'img-thumbnail'])?>
    <?= $form->field($model, 'file')->fileInput() ?>

    <p>
        <?= $model->isNewRecord ? '<p>Для созания галереи фотографий необходимо создать профиль</p>' : Html::a('Редактировать галерею', ['/gallery/site/index', 'table_id' => $model->id], ['class' => 'btn btn-primary']);// 'onClick' => "window.open('test.html', '_blank', 'Toolbar=0, Scrollbars=1, Resizable=0, Width=640, resize=no, Height=480');"])?>
        <?php /*if ($model->isNewRecord):?>
            <p>Для созания галереи фотографий необходимо создать профиль</p>
        <?php else: ?>
            <a class="btn btn-primary" onclick="window.open('<?= Url::to(['/gallery/site/index', 'table_id' => $model->id, 'use_layout' => false])?>', '_blank', 'Toolbar=0, Scrollbars=1, Resizable=0, Width=640, resize=no, Height=480');">Редактировать галерею</a>
        <?php endif;*/?>
    </p>     

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
