<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\themes\admin\widgets\GridView;
use yii\grid\CheckboxColumn;
use common\modules\content\models\backend\Content;

$this->title = 'Контент';
$this->params['breadcrumbs'][] = $this->title;
?>


    <?= GridView::widget([
    'options' => [
        'boxTitle' => $this->title,
        'buttonCreate' => Url::to(['create', 'class' => $class]),
        'buttonUndo' => Url::home(),
        'buttonDelete' => Url::to(['batch-delete']),
        'ajax' => $ajax,
        ],
    'id' => 'main-grid',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => CheckboxColumn::classname()
        ],
        'name',
        [
            'attribute' => 'status',
            'format' => 'html',
            'value' => function ($model) {
                if ($model->status === Content::STATUS_PUBLISHED) {
                    $class = 'label-success';
                    $lable = Content::getStatusArray()[Content::STATUS_PUBLISHED];
                } elseif ($model->status === Content::STATUS_NOT_PUBLISHED) {
                    $class = 'label-danger';
                    $lable = Content::getStatusArray()[Content::STATUS_NOT_PUBLISHED];
                } elseif ($model->status === Content::STATUS_DELETED) {
                    $class = 'label-warning';
                    $lable = Content::getStatusArray()[Content::STATUS_DELETED];
                }

                return '<span class="label ' . $class . '">' . $lable . '</span>';
            },
            'filter' => Html::activeDropDownList(
                $searchModel,
                'status',
                Content::getStatusArray(),
                ['class' => 'form-control', 'prompt' => 'Выберите статус']
            )
        ],
        ['class' => 'common\themes\admin\widgets\ActionColumn'],
    ]
]); ?>

