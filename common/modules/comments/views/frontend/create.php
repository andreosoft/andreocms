<?php

use yii\helpers\Html;
use common\modules\catalog\models\CatalogProducts;

$this->title = 'Создать комментарий';
$element = CatalogProducts::findOne($id);
if ($element->parent == 1) {
    $this->params['breadcrumbs'][] = ['label' => 'Каталог товаров', 'url' => ['/catalog/site/index-by-category', 'parent' => $element->parent, 'category' => $element->category]];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'Каталог услуг', 'url' => ['/catalog/site/index-by-category', 'parent' => $element->parent, 'category' => $element->category]];    
}
$this->params['breadcrumbs'][] = ['label' => $element->title, 'url' => ['/catalog/site/view', 'id' => $id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
        'model' => $model,
    ]) ?>