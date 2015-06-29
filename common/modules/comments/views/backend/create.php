<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\modules\comments\models\Comments */

$this->title = 'Create Comments';
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <?= $this->render('_form', [
        'model' => $model,
        'options' => ['title' => '<i class="fa fa-pencil"></i> Создать', 'buttonUndo' => Url::to(['index'])],
    ]) ?>

