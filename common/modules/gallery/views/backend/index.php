<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\themes\admin\widgets\GridView;
use andreosoft\image\Image;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\gallery\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galleries';
$this->params['breadcrumbs'][] = $this->title;
?>
<?=

GridView::widget([
    'options' => [
        'boxTitle' => $this->title,
        'buttonUp' => Url::to(['index', 'parent' => $parent]),
        'buttonCreate' => Url::to(['create', 'class' => $class]),
        'buttonUndo' => Url::home(),
        'buttonDelete' => Url::to(['batch-delete']),
        'ajax' => $ajax,
    ],
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\CheckboxColumn'],
        'id',
//            [   'format' => 'html',
//                'label' => 'id',
//                'value' => function($data) {return $data->id;}
//            ],
        ['format' => 'image',
            'label' => 'image',
            'value' => function($data) {
                return Image::thumb($data->image, 80, 80);
            }
        ],
        'name',
        'table_id',
        'table_name',
        [
            'attribute' => 'parent',
            'format' => 'raw',
            'value' => function ($model, $index, $widget) {
                return Html::checkbox('parent[]', $model->parent, ['value' => $index, 'disabled' => true]);
            }
                ],
                'parent_id',
                // 'status',
                // 'createdby',
                // 'createdon',
                // 'url:url',
                // 
                // 'introtext:ntext',
                // 'content:ntext',
                // 'like',
                // 'dislike',
                // 'views',
                // 'rate',
                // 'rate_num',
                ['class' => 'common\themes\admin\widgets\ActionColumn'],
            ],
        ]);
?>