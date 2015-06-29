<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\modules\gallery\models\Gallery */

$this->title = 'Gallery';
$this->params['breadcrumbs'][] = ['label' => 'Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
        'model' => $model,
        'options' => ['title' => '<i class="fa fa-pencil"></i> Create', 'buttonUndo' => Url::to(['index'])],
    ]) ?>
