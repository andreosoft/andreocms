<?php

use yii\helpers\Url;


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('catalog/main', 'Catalog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<?=

$this->render('_form', [
    'model' => $model,
    'options' => ['title' => '<i class="fa fa-pencil"></i> Обновить', 'buttonUndo' => Url::to(['index', 'parent' => $model->parent])],
])
?>
