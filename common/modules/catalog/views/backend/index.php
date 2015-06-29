<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use common\themes\admin\widgets\Box;
use common\themes\admin\widgets\GridView;
use common\modules\catalog\models\CatalogCategorys;
use common\modules\catalog\models\backend\CatalogProducts;
use common\themes\admin\widgets\ActionColumn;
use yii\grid\CheckboxColumn;
use common\widgets\dataPicker\DatePicker;
use andreosoft\image\Image;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\catalog\models\CatalogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if (empty($parentModel->name)) {
    $this->title = Yii::t('catalog/main', 'Index');
} else {
    $this->title = $parentModel->name;
}

$this->params['breadcrumbs'][] = $this->title;
?>

<?=

GridView::widget([
    'options' => [
        'boxTitle' => Yii::t('catalog/main', 'Catalog') ,
        'buttonUp' => Url::to(['index', 'parent' => $parentModel->parent]),
        'buttonCreate' => Url::to(['create', 'class' => $class]),
        'buttonUndo' => Url::home(),
        'buttonDelete' => Url::to(['batch-delete']),
        'ajax' => $ajax,
    ],
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => CheckboxColumn::classname(),
            'contentOptions' => ['style' => 'width: 1px;']
        ],
        'id',
        [
            'format' => 'image',
            'attribute' => 'image',
            'filter' => '',
            'contentOptions' => ['class' => 'text-center', 'style' => 'width: 1px;'],
            'value' => function($model) {
                return Image::thumb($model->image, 50, 50);
            }
        ],
        [
            'attribute' => 'name',
            'format' => 'html',
            'value' => function ($model) {
                return $model['isparent'] ? Html::a($model['name'], ['index', 'parent' => $model['id']]) :
                        $model['name'];
            }
        ],
        'price',
        [
            'attribute' => 'status',
            'label' => \Yii::t('catalog/main', 'Status'),
            'filter' => Html::activeDropDownList(
                    $searchModel, 'status', CatalogProducts::getStatusArray(), ['class' => 'form-control', 'prompt' => Yii::t('catalog/main', 'All')]
            ),
            'format' => 'html',
            'value' => function ($model) {
                if ($model->status === CatalogProducts::STATUS_PUBLISHED) {
                    $class = 'label-success';
                    $lable = CatalogProducts::getStatusArray()[CatalogProducts::STATUS_PUBLISHED];
                } elseif ($model->status === CatalogProducts::STATUS_NOT_PUBLISHED) {
                    $class = 'label-danger';
                    $lable = CatalogProducts::getStatusArray()[CatalogProducts::STATUS_NOT_PUBLISHED];
                } elseif ($model->status === CatalogProducts::STATUS_DELETED) {
                    $class = 'label-warning';
                    $lable = CatalogProducts::getStatusArray()[CatalogProducts::STATUS_DELETED];
                }
            return '<span class="label ' . $class . '">' . $lable . '</span>';
            }
        ],
        [
            'class' => ActionColumn::className(),
        ],
            ]
        ]);
        ?>

