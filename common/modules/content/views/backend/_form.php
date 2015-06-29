<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Tabs;
use common\themes\admin\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\widgets\dataPicker\DatePicker;
use andreosoft\summernote\Summernote;

use common\modules\filemanager\widgets\Image;
use common\modules\content\models\backend\Content;
use yii\grid\CheckboxColumn;
use common\themes\admin\widgets\GridView;
use common\modules\comments\models\CommentsSearch;
use common\modules\gallery\widgets\Galleryinline;
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
            'label' => \Yii::t('content/main', 'Main'),
            'content' => 
//            $form->field($model, 'id')->textInput(['disabled' => 'true'])
//            . $form->field($model, 'title')->textInput()
              $form->field($model, 'name')->textInput(['maxlength' => 255])
//            . $form->field($model, 'published')->dropDownList(['0' => 'No', '1' => 'Yes'])
//            . $form->field($model, 'publishedondate')->widget(\common\widgets\dataPicker\DatePicker::className())
//            . $form->field($model, 'publishedontime')->textInput()
//            . $form->field($model, 'deleted')->dropDownList(['0' => 'No', '1' => 'Yes'])
            . $form->field($model, 'introtext')->widget(Summernote::className(), ['editorOptions' => ['height' => 200,]])
            . $form->field($model, 'content')->widget(Summernote::className(), ['editorOptions' => ['height' => 400,]])
//            . $form->field($model, 'image')->widget(Image::className())
            ,
            'active' => true
        ],
        [
            'label' => \Yii::t('content/main', 'Info'),
            'content' =>
//                $form->field($model, 'isparent')->dropDownList([ 0 => Yii::t('content/main', 'No'), 1 => Yii::t('content/main', 'Yes')]).
//                $form->field($model, 'parent')->dropDownList(ArrayHelper::map(Content::find()->where(['isparent' => '1'])->all(), 'id', 'name')).
                $form->field($model, 'tag')->textInput(['maxlength' => 255]).
                $form->field($model, 'image')->widget(Image::className())
            
        ],        
        [
            'label' => \Yii::t('content/main', 'Seo'),
            'content' =>
                $form->field($model, 'seo_url')->textInput(['maxlength' => 255]).
                $form->field($model, 'seo_title')->textInput(['maxlength' => 255]).
                $form->field($model, 'seo_description')->textarea().
                $form->field($model, 'seo_keyword')->textInput(['maxlength' => 255])
        ],
        [
            'label' => \Yii::t('content/main', 'Manager'),
            'content' =>
                $form->field($model, 'status')->dropDownList(Content::getStatusArray()).
                $form->field($model, 'publishedondate')->widget(DatePicker::className()).
                $form->field($model, 'publishedontime')->textInput().
                $form->field($model, 'template')->textInput(['maxlength' => 255])
        ], 
        [
            'label' => 'Comments',
            'content' =>
            isset($model->id) ?
                \common\themes\admin\widgets\GridViewEdited::widget([
                    'dataProvider' => (new CommentsSearch())->search(['CommentsSearch' => ['table_name' => 'content', 'table_id' => $model->id]]),
                    'actionUpdate' => Url::to(['/comments/backend/update']),
                    'createModel' => new \common\modules\comments\models\Comments,
                    'defaultValue' => [
                        'Comments[table_id]' => $model->id,
                        'Comments[table_name]' => 'content',
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
                    \Yii::t('content/main', 'Save befor use it').
                   '</div>'.
                    Html::submitButton('Save', ['class' => 'btn btn-success']),
        ],         
        [
            'label' => \Yii::t('content/main', 'Gallery'),
            'content' =>
            isset($model->id) ?
                    \common\themes\admin\widgets\GridViewEdited::widget([
                        'dataProvider' => (new \common\modules\gallery\models\GallerySearch())->search(['GallerySearch' => ['table_name' => $model->tableName(), 'table_id' => $model->id]]),
                        'actionUpdate' => Url::to(['/gallery/backend/update']),
                        'createModel' => new \common\modules\gallery\models\Gallery,
                        'defaultValue' => [
                            'Gallery[table_id]' => $model->id,
                            'Gallery[table_name]' => $model->tableName(),
                        ],
                        'columns' => [
                            [
                                'class' => common\modules\filemanager\widgets\ImageColumn::className(),
                                'attribute' => 'image',
                            ],
                            [
                                'attribute' => 'status',
                                'value' => function ($model) {
                                    return Html::activeDropDownList($model, 'status', [ 'Unpublished', 'Published'], ['class' => 'form-control', 'style' => 'width:100%;', 'prompt' => 'Выберите']);
                                }
                            ],
                            'content',
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
                    \Yii::t('content/main', 'Save befor use it').
                   '</div>'.
                    Html::submitButton('Save', ['class' => 'btn btn-success']),
        ],        
/*        [
            'label' => 'Comments',
            'content' =>
            isset($model->id) ? Galleryinline::widget([
                'options' => [
                    'table_name' => 'content',
                    'table_id' => $model->id,
                ],
            ]) : '<br> Save befor use it </br>',
        ],*/
    ],
]);
?>

<?= $form->field($model, 'class', ['template' => '{input}'])->hiddenInput(['value' => $class]) ?>
<?php ActiveForm::end(); ?>


