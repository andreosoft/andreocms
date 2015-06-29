<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\CheckboxColumn;
use common\themes\admin\widgets\GridView;

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>

<?=

GridView::widget([
    'options' => [
        'boxTitle' => $this->title,
        'buttonCreate' => Url::to(['create', 'class' => $class]),
        'buttonUndo' => Url::home(),
        'buttonDelete' => Url::to(['batch-delete']),
    ],
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => CheckboxColumn::classname()
        ],
        'id',
        'table_id',
        'table_name',
        'parent',
        'parent_id',
        'createdby',
        'createdon',
        // 'rate',
        // 'rate_num',
        // 'like',
        // 'dislike',
        // 'status',
        // 'deleted',
        // 'deletedby',
        // 'deletedon',
        // 'editedby',
        // 'editedon',
        // 'name',
        // 'introtext:ntext',
        'content:ntext',
        // 'image',
        ['class' => 'common\themes\admin\widgets\ActionColumn'],
    ],
]);
?>
