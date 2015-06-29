<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\gallery\models\Gallery */

$this->title = 'Обновить элемент';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/users/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Обновить обявление', 'url' => ['/catalog/site/update', 'id' => $table_id]];
$this->params['breadcrumbs'][] = ['label' => 'Галерея', 'url' => ['index', 'table_id' => $table_id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="gallery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
