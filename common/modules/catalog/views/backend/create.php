<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\modules\catalog\models\CatalogProducts */

$this->title = Yii::t('catalog/main', 'Catalog');
$this->params['breadcrumbs'][] = ['label' => Yii::t('catalog/main', 'Catalog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?=

$this->render('_form', [
    'model' => $model,
    'options' => ['title' => '<i class="fa fa-pencil"></i> Создать', 'buttonUndo' => Url::to(['index', 'parent' => $model->parent])],
])
?>
