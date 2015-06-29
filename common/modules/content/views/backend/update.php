<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\modules\content\models\backend */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Контент', 'url' => ['index', 'class' => $model->class]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
    <?= $this->render('_form', [
        'model' => $model,
        'options' => ['title' => '<i class="fa fa-pencil"></i> Обновить', 'buttonUndo' => Url::to(['index', 'class' => $model->class])],
    ]) ?>