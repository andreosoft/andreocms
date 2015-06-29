<?php

use yii\helpers\Url;
?>
<?php if ($tpl == 'grid') : ?>
    <?php foreach ($elements as $element): ?>
        <div class="col-md-4 col-sm-6">
            <div class="product">
                <?php if ($element->price_d > 0) : ?>
                    <div class="product__image product-sticker-sale">
                        <a href="<?= Url::to(['/catalog/site/view', 'id' => $element->id]) ?>"><img src="<?= Url::to('@webuploads/' . str_replace('.jpg', '-thumb-200.jpg', $element->image), true) ?>" alt="" /></a>
                    </div>                                   
                    <div class="product__price_old"><strong><?= $element->price ?></strong> сом. </div>
                    <div class="product__price_new"><strong><?= $element->price_d ?></strong> сом. </div>
                <?php else : ?>
                    <div class="product__image">
                        <a href="<?= Url::to(['/catalog/site/view', 'id' => $element->id]) ?>"><img src="<?= Url::to('@webuploads/' . str_replace('.jpg', '-thumb-200.jpg', $element->image), true) ?>" alt="" /></a>
                    </div>                                        
                    <div class="product__price"><strong><?= $element->price ?></strong> сом. </div>
                <?php endif ?>

                <div class="product__title"><a href="<?= Url::to(['/catalog/site/view', 'id' => $element->id]) ?>"><?= $element->title ?></a></div>
                <div class="product__person">
                <?= $element->user_name ?>
                    <div class="product__person-phone phone"><a href="#" class="dashed show-phone"><span data-value="<?= $element->user_phone ?>"><?= $element->user_phone ?></span></a></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php if ($tpl == 'list') : ?>
    <?php foreach ($elements as $element): ?>
        <div class="products products-list">
            <?php if ($element->price_d > 0) : ?>
                <div class="product product-sticker-sale">
            <?php else : ?>   
                <div class="product">    
            <?php endif ?>  
                    <div class="product__image"><a href="<?= Url::to(['/catalog/site/view', 'id' => $element->id]) ?>"><img src="<?= Url::to('@webuploads/' . str_replace('.jpg', '-thumb-200.jpg', $element->image), true) ?>" alt="" /></a></div>                 
                    <div class="product__info">
                    <div class="product__title"><a href="<?= Url::to(['/catalog/site/view', 'id' => $element->id]) ?>"><?= $element->title ?></a></div>
                <?php if ($element->price_d > 0) : ?>    
                    <div class="product__price_old"><strong><?= $element->price ?></strong> сом. </div>
                    <div class="product__price_new"><strong><?= $element->price_d ?></strong> сом. </div>
                <?php else : ?>    
                    <div class="product__price"><strong><?= $element->price ?></strong> сом. </div>
                <?php endif ?>     
                </div>
                <div class="product__person">
                        <?= $element->user_name ?>
                    <div class="product__person-phone phone"><a href="#" class="dashed show-phone"> <span data-value="<?= $element->user_phone ?>"><?= $element->user_phone ?></span></a></div>
                </div>
            </div>
        </div> 
    <?php endforeach; ?>
<?php endif; ?>
