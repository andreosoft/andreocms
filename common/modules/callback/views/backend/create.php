<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\modules\callback\models\Callback */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Callback', 'url' => ['index']];
?>
 <?= $this->render('_form', [
        'model' => $model,
        'options' => ['title' => '<i class="fa fa-pencil"></i> Создать', 'buttonUndo' => Url::to(['index'])],
    ]) ?>
