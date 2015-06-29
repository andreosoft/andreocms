<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;
use yii\helpers\ArrayHelper;
use common\widgets\dataPicker\DatePicker;
//use kartik\datecontrol\DateControl;
use common\themes\admin\widgets\ActiveForm;
use andreosoft\summernote\Summernote;
use common\modules\catalog\models\CatalogProducts;
use common\modules\catalog\models\CatalogCategorys;
use common\modules\filemanager\widgets\Image;
use yii\grid\CheckboxColumn;
use yii\widgets\ListView;
use common\themes\admin\widgets\GridView;
use common\themes\admin\widgets\GridViewEdited;
use common\modules\comments\models\CommentsSearch;
use common\modules\gallery\models\GallerySearch;
use common\modules\gallery\widgets\Galleryinline;
use common\themes\admin\widgets\ActionColumn;
use common\modules\filemanager\widgets\ImageColumn;
use yii\helpers\Url;
?>

<?php

$form = ActiveForm::begin(['options' => [
                'enctype' => 'multipart/form-data',
                'boxTitle' => $options['title'],
                'buttonUndo' => $options['buttonUndo']
        ]]);
?>

<?=
Tabs::widget([
    'options' => [
        'class' => 'nav-tabs-custom',
    ],
    'items' => [
        [
            'label' => \Yii::t('catalog/main', 'Main'),
            'content' => 
            $form->field($model, 'name')->textInput(['maxlength' => 255])
            . $form->field($model, 'introtext')->widget(Summernote::className(), ['editorOptions' => ['height' => 200,]])
            . $form->field($model, 'content')->widget(Summernote::className(), ['editorOptions' => ['height' => 400,]]),
            'active' => true
        ],
        [
            'label' => \Yii::t('catalog/main', 'Info'),
            'content' =>     
                $form->field($model, 'tag')->textInput(['maxlength' => 255]).
                $form->field($model, 'image')->widget(Image::className()).   
                $form->field($model, 'price')->textInput(['maxlength' => 11]).
                $form->field($model, 'price_d')->textInput(['maxlength' => 11]).
                $form->field($model, 'discont')->dropDownList([ 0 => Yii::t('catalog/main', 'No'), 1 => Yii::t('catalog/main', 'Yes')])
        ],
        [
            'label' => \Yii::t('catalog/main', 'Seo'),
            'content' =>
                $form->field($model, 'seo_url')->textInput(['maxlength' => 255]).
                $form->field($model, 'seo_title')->textInput(['maxlength' => 255]).
                $form->field($model, 'seo_description')->textarea().
                $form->field($model, 'seo_keyword')->textInput(['maxlength' => 255])
        ],
        [
            'label' => \Yii::t('catalog/main', 'Manager'),
            'content' =>
                $form->field($model, 'isparent')->dropDownList([ 0 => Yii::t('catalog/main', 'No'), 1 => Yii::t('catalog/main', 'Yes')]).
                $form->field($model, 'parent')->dropDownList(ArrayHelper::merge(['0' => 'No'], ArrayHelper::map(CatalogProducts::find()->where(['isparent' => '1'])->all(), 'id', 'fullname'))).            
                $form->field($model, 'status')->dropDownList(CatalogProducts::getStatusArray()).
                $form->field($model, 'publishedondate')->widget(DatePicker::className()).
                $form->field($model, 'publishedontime')->textInput().
                $form->field($model, 'sort')->textInput()
        ],          
        [
            'label' => 'Comments',
            'content' =>
            isset($model->id) ?
                \common\themes\admin\widgets\GridViewEdited::widget([
                    'dataProvider' => (new CommentsSearch())->search(['CommentsSearch' => ['table_name' => 'catalog', 'table_id' => $model->id]]),
                    'actionUpdate' => Url::to(['/comments/backend/update']),
                    'createModel' => new \common\modules\comments\models\Comments,
                    'defaultValue' => [
                        'Comments[table_id]' => $model->id,
                        'Comments[table_name]' => 'catalog',
                    ],
                    'columns' => [
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Html::activeDropDownList($model, 'status', [ 'Unpublished', 'Published'], ['class' => 'form-control', 'style' => 'width:100%;', 'prompt' => 'Выберите']);
                            }
                        ],
                        [
                            'attribute' => 'content',
                        ],
                            [
                                'class' => \common\themes\admin\widgets\ActionColumn::className(),
                                'template' => '{delete}',
                                'controller' => '/comments/backend',
                            ],                                
                    ],
                ]) :
                    '<div class="alert alert-warning alert-dismissable">'.
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.
                    '<h4><i class="icon fa fa-warning"></i> Внимение!</h4>'.
                    \Yii::t('catalog/main', 'Save befor use it').
                   '</div>'.
                    Html::submitButton('Save', ['class' => 'btn btn-success']),
        ],       
        [
            'label' => \Yii::t('catalog/main', 'Gallery'),
            'content' =>
            isset($model->id) ?
                    \common\themes\admin\widgets\GridViewEdited::widget([
                        'dataProvider' => (new \common\modules\gallery\models\GallerySearch())->search(['GallerySearch' => ['table_name' => 'catalog', 'table_id' => $model->id]]),
                        'actionUpdate' => Url::to(['/gallery/backend/update']),
                        'createModel' => new \common\modules\gallery\models\Gallery,
                        'defaultValue' => [
                            'Gallery[table_id]' => $model->id,
                            'Gallery[table_name]' => 'catalog',
                        ],
                        'columns' => [
                            [
                                'class' => common\modules\filemanager\widgets\ImageColumn::className(),
                                'attribute' => 'image',
                            ],
                            [
                                'attribute' => 'status',
                                'value' => function ($model) {
                                    return Html::activeDropDownList($model, 'status', \common\modules\gallery\models\Gallery::getStatusArray(), ['class' => 'form-control', 'style' => 'width:100%;', 'prompt' => 'Выберите']);
                                }
                            ],
                            'content',
                            'sort',
                            [
                                'class' => \common\themes\admin\widgets\ActionColumn::className(),
                                'template' => '{delete}',
                                'controller' => '/gallery/backend',
                            ],
                        ],
                ]) : 
                    '<div class="alert alert-warning alert-dismissable">'.
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.
                    '<h4><i class="icon fa fa-warning"></i> Внимение!</h4>'.
                    \Yii::t('catalog/main', 'Save befor use it').
                   '</div>'.
                    Html::submitButton('Save', ['class' => 'btn btn-success']),
        ], 
/*        [
            'label' => \Yii::t('catalog/main', 'Gallery1'),
            'content' =>
            isset($model->id) ?
                    common\modules\gallery\widgets\getGallery::widget([
                        'dataProvider' => (new \common\modules\gallery\models\GallerySearch())->search(['GallerySearch' => ['table_name' => 'catalog', 'table_id' => $model->id]]),
                ]) : '<br> '.\Yii::t('catalog/main', 'Save befor use it').' </br>',
        ],  */                                   
    ],
]);
        ?>
        <?php ActiveForm::end(); ?>
