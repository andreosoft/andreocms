<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\themes\admin\widgets\GridView;
use yii\grid\CheckboxColumn;
use common\modules\callback\models\backend\Callback;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\callback\models\CallbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Callbacks';
$this->params['breadcrumbs'][] = $this->title;
?>
    <?= GridView::widget([
    'options' => [
        'boxTitle' => $this->title,
        'buttonCreate' => Url::to(['create']),
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
        'phone',
        'content',
        [
            'attribute' => 'status',
            'format' => 'html',
            'value' => function ($model) {
                if ($model->status === Callback::STATUS_FINISHED) {
                    $class = 'label-success';
                    $lable = Callback::getStatusArray()[Callback::STATUS_FINISHED];
                } elseif ($model->status === Callback::STATUS_NEW) {
                    $class = 'label-danger';
                    $lable = Callback::getStatusArray()[Callback::STATUS_NEW];
                } elseif ($model->status === Callback::STATUS_DELETED) {
                    $class = 'label-warning';
                    $lable = Callback::getStatusArray()[Callback::STATUS_DELETED];
                }

                return '<span class="label ' . $class . '">' . $lable . '</span>';
            },
            'filter' => Html::activeDropDownList(
                $searchModel,
                'status',
                Callback::getStatusArray(),
                ['class' => 'form-control', 'prompt' => 'Выберите статус']
            )
        ],
        'createdon',
        ['class' => 'common\themes\admin\widgets\ActionColumn'],
    ]
]); ?>
