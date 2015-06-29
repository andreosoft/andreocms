<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<?=
$this->render('_form', [
    'options' => ['title' => '<i class="fa fa-pencil"></i> Обновить', 'buttonUndo' => Url::to(['index'])],
    'model' => $model,
    'modelProfile' => $modelProfile,
])
?>

