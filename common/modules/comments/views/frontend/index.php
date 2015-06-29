<?php 
use yii\helpers\Url;
use yii\widgets\LinkPager;
use common\modules\catalog\models\CatalogProducts;

$this->title = 'Отзывы';
$element = CatalogProducts::findOne($id);
if ($element->parent == 1) {
    $this->params['breadcrumbs'][] = ['label' => 'Каталог товаров', 'url' => ['/catalog/site/index-by-category', 'parent' => $element->parent, 'category' => $element->category]];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'Каталог услуг', 'url' => ['/catalog/site/index-by-category', 'parent' => $element->parent, 'category' => $element->category]];    
}
$this->params['breadcrumbs'][] = ['label' => $element->title, 'url' => ['/catalog/site/view', 'id' => $id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviews">

    <div class="title"><?= $this->title?></div>

    <div class="reviews__add"><span class="reviews__add-icon"></span><a href="<?= Url::to(['/comments/site/create', 'table_id' => $id, 'table_name' => 'catalog'])?>" class="dashed">Добавить отзыв</a></div>

    <div class="review-list">
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
        <?php foreach ($elements as $element): ?>
            <div class="review">
                <div class="review__meta">
                    <div class="review__author"><?= $element->username?></div>
                    <div class="review__date"><?= $element->createdon?></div>
                </div>
                <div class="review__summary">
                    <p><?= $element->content?></p>
                </div>
            </div>        
        <?php endforeach; ?>
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
    </div>    
</div>

