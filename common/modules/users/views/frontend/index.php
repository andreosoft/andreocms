<?php

use common\modules\catalog\widgets\getUserProducts\getUserProducts;
use common\modules\catalog\models\CatalogProfiles;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\modules\comments\widgets\getCommentsByUser;
use common\widgets\wysihtml5\Wysihtml5;

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>




<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#user-products" role="tab" data-toggle="tab">Мои объявления</a></li>
    <li><a href="#user-profile" role="tab" data-toggle="tab">Мой профиль</a></li>
    <li><a href="#user-comments" role="tab" data-toggle="tab">Комментарии</a></li>
    <li><a href="<?= Url::to(['/catalog/site/create']) ?>">Новое объявление</a></li>
</ul>

<div class="tab-content">   
    <div class="tab-pane active" id="user-products">
        <div class="products products-list">
            <?= getUserProducts::widget() ?>
        </div>
    </div>
    <div class="tab-pane" id="user-profile">
        <div class="products products-list">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'fullname')->textInput() ?>
                    <?= $form->field($model, 'phone')->textInput() ?>
                    <?= $form->field($model, 'address')->textInput() ?>
                    <?= $form->field($model, 'city')->textInput() ?>
                    <?= $form->field($model, 'country')->textInput() ?> 
                    <?= $form->field($model, 'zip')->textInput() ?>            
                    <?= $form->field($model, 'state')->textInput() ?>
                    <?= Html::a('Задать расположение на карте', ['/users/site/pos'], ['class' => 'btn btn-primary']) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'type')->dropDownList(['частное лицо' => 'частное лицо', 'организация' => 'организация']) ?>
                    <?= $form->field($model, 'website')->textInput() ?>
                    <?= $form->field($model, 'skype')->textInput() ?> 
                    <?= $form->field($model, 'workingtime')->textInput() ?>
                    <?= $form->field($model, 'about')->widget(Wysihtml5::className(), ['options' => ['style' => 'width: 100%; height: 200px;']]); ?>                   
                </div>
            </div>

            <?= Html::img(Url::to('@webuploads/' . $model->image), ['class' => 'img-thumbnail']) ?>
            <?= $form->field($model, 'file[]')->fileInput(['multiple' => true]) ?>          
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
            <?php
            if ($model = (new CatalogProfiles)->findProfile()) {
                echo Html::a('Обновить профиль специалиста', ['/catalog/site/update-profile', 'id' => $model->id], ['class' => 'btn btn-primary']);
            } else {
                echo Html::a('Создать профиль специалиста', ['/catalog/site/create-profile'], ['class' => 'btn btn-primary']);
            }
            ?>
        </div>
    </div>
    <div class="tab-pane" id="user-comments">
        <div class="products products-list">
            <?= getCommentsByUser::widget(['id' => \Yii::$app->user->getId()]) ?>
        </div>
    </div>        
</div> 