<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<div class="reviews">
    <div class="review-list">
        <?php if ($elements): ?>
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
            <?php foreach ($elements as $element): ?>
                <div class="review">
                    <div class="review__meta">
                        <div class="review__author"><?= $element->username ?></div>
                        <div class="review__date"><?= $element->createdon ?></div>
                    </div>
                    <div class="review__summary">
                        <p><?= $element->content ?></p>
                    </div>
                </div>        
            <?php endforeach; ?>
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
        <?php else: ?>
        <p>У вас пока нет комметариев</p>
        <?php endif; ?>
    </div>    
</div>
