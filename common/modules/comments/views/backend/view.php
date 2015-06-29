<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\comments\models\Comments */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'table_id',
            'table_name',
            'parent',
            'parent_id',
            'createdby',
            'createdon',
            'rate',
            'rate_num',
            'like',
            'dislike',
            'status',
            'deleted',
            'deletedby',
            'deletedon',
            'editedby',
            'editedon',
            'name',
            'introtext:ntext',
            'content:ntext',
            'image',
        ],
    ]) ?>

</div>
