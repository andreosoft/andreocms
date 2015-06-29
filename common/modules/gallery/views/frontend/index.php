<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\gallery\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Галерея';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/users/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Обновить обявление', 'url' => ['/catalog/site/update', 'id' => $table_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-index">
    
    <p>
        <?= Html::a('Создать новый элемент', ['create', 'table_id' => $table_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['format' => 'image',
             'value' => function($data) { return Url::to( '@webuploads' . $data->url_preview);}   
                ],
            'name',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{update} {delete}'],
        ],
    ]); ?>

</div>
