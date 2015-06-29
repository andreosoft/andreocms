<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\modules\content\models\backend */

$this->title = 'Создать контент';
$model->class = \Yii::$app->request->get()['class'];
$this->params['breadcrumbs'][] = ['label' => 'Контент', 'url' => ['index', 'class' => $model->class]];
?>
 <?= $this->render('_form', [
        'model' => $model,
        'class' => $model->class,
        'options' => ['title' => '<i class="fa fa-pencil"></i> Создать', 'buttonUndo' => Url::to(['index', 'class' => $model->class])],
    ]) ?>

