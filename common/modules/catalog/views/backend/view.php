<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\catalog\models\CatalogProducts */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cs Catalogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cs-catalog-view">

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
            'name',
            'title',
            'introtext:ntext',
            'content:ntext',
            'description:ntext',
            'parent',
            'isparent',
            'views',
            'image:ntext',
            'image1',
            'image2',
            'image3',
            'image4',
            'image5',
            'createdby',
            'createdon',
            'deleted',
            'deletedby',
            'category',
            'published',
            'publishedon',
            'price',
            'sellout',
            'user_name',
            'user_type',
            'user_phone',
        ],
    ]) ?>

</div>
