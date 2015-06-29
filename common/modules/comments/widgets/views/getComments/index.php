<?php 
use yii\helpers\Url;
?>
<div class="reviews">

    <h2>Отзывы</h2>

    <div class="reviews__add"><span class="reviews__add-icon"></span><a href="<?= Url::to(['/comments/site/create', 'table_id' => $id, 'table_name' => 'catalog'])?>" class="dashed">Добавить отзыв</a></div>

    <div class="review-list">
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
    </div>    
    <div class="reviews__all"><a href="<?= Url::to(['/comments/site/index', 'id' => $id])?>">Показать все отзывы</a></div>
</div>

