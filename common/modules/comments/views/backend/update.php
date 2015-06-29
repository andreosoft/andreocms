<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\modules\comments\models\Comments */

$this->title = 'Update Comments: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
    <?= $this->render('_form', [
        'model' => $model,
        'options' => ['title' => '<i class="fa fa-pencil"></i> Обновить', 'buttonUndo' => Url::to(['index'])],
    ]) ?>