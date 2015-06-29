<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use common\modules\catalog\widgets\getCategory\getCategory;
use common\modules\catalog\widgets\getSellout\getSellout;

if ($parent == 1) {
    $this->title = 'Каталог товаров';
} else {
    $this->title = 'Каталог услуг';
};
$this->params['breadcrumbs'][] = $this->title;
?>
 <?= getSellout::widget(['parent' => $parent])?>


<div class="content-columns container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-4">
            <div class="sidebar-left hidden-xs">
                <div class="category-filter">
                    <?= getCategory::widget(['parent' => $parent, 'render' => 'filter']) ?>
                    <div class="category-filter-range">
                        <label>Цена</label>
                        От <input type="text" id="form-slider-min" name="range_start" value="<?=$price_min?>" />
                        до <input type="text" id="form-slider-max" name="range_end" value="<?=$price_max?>" />
                        <div class="range-slider-wrapper">
                            <div class="range-slider" data-handle1="#form-slider-min" data-handle2="#form-slider-max" data-min="<?=$price_min?>" data-max="<?=$price_max?>" data-step="1"></div>
                        </div>
                    </div> 
                </div>    
                <div class="banner"><a href="#"><img class="img-rounded img-responsive" src="<?=Yii::$app->assetManager->publish('@common/themes/site/assets/pic/banner1.jpg')[1]?>" alt="" /></a></div>
            </div>           
        </div>
        <div class="col-md-9 col-sm-8">
            <div class="title medium orange"><?= $this->title ?></div>
            <div class="sort-bar">
                <div class="sort-bar__item pull-left">
                    <label>Сортировать по: 
                        <span class="dropdown">
                            <a href="#" class="dashed dropdown-link dropdown-toggle active" id="dropdownMenu-sort" data-toggle="dropdown">Цене ↑</a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu-sort">
                                <li role="presentation"><a class="catalog_sort_select" role="menuitem" tabindex="-1" href="#" data-value="price,ASC">Цене ↑</a></li>
                                <li role="presentation"><a class="catalog_sort_select" role="menuitem" tabindex="-1" href="#" data-value="price,DESC">Цене ↓</a></li>
                                <li role="presentation"><a class="catalog_sort_select" role="menuitem" tabindex="-1" href="#" data-value="title,ASC">Названию ↑</a></li>
                                <li role="presentation"><a class="catalog_sort_select" role="menuitem" tabindex="-1" href="#" data-value="title,DESC">Названию ↓</a></li>
                            </ul>
                        </span>
                    </label>
                    <label>
                        <span class="dropdown">
                            <a href="#" class="dashed dropdown-link dropdown-toggle" id="dropdownMenu-person-type" data-toggle="dropdown">Все</a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu-person-type">
                                <li role="presentation"><a class="catalog_type_select" role="menuitem" tabindex="-1" href="#" data-value="">Все</a></li>
                                <li role="presentation"><a class="catalog_type_select" role="menuitem" tabindex="-1" href="#" data-value="частное лицо">Частное лицо</a></li>
                                <li role="presentation"><a class="catalog_type_select" role="menuitem" tabindex="-1" href="#" data-value="организация">Организация</a></li>
                            </ul>
                        </span>
                    </label>
                </div>
                <div class="sort-bar__item pull-right catalog_view">
                    <a href="#" class="show-as-list" data-tpl="list">Список</a>
                    <a href="#" class="show-as-grid active" data-tpl="grid">Плиткой</a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="products products-grid">
                <div class="container-fluid">
                    <div class="row" id="catalog_placeholder" 
                         data-action_url="<?=Url::to(['/catalog/site/index-json'])?>"
                         data-sortname="<?=$sortname?>"
                         data-sortdirection="<?=$sortdirection?>"
                         data-tpl="<?=$tpl?>"
                         data-type=""
                         data-values="<?= $values?>"
                         data-limit="<?=$pagination->limit?>"
                         data-page="<?=$pagination->page?>">
                             <?php foreach ($elements as $element): ?>

                            <div class="col-md-4 col-sm-6">
                                <div class="product">
                                    <?php if ($element->price_d > 0) :?>
                                        <div class="product__image product-sticker-sale">
                                            <a href="<?=Url::to(['/catalog/site/view', 'id' => $element->id])?>"><img src="<?= Url::to('@webuploads/' . str_replace('.jpg', '-thumb-200.jpg', $element->image), true)?>" alt="" /></a>
                                        </div>                                   
                                        <div class="product__price_old"><strong><?=$element->price?></strong> сом. </div>
                                        <div class="product__price_new"><strong><?=$element->price_d?></strong> сом. </div>
                                    <?php else :?>
                                        <div class="product__image">
                                            <a href="<?=Url::to(['/catalog/site/view', 'id' => $element->id])?>"><img src="<?= Url::to('@webuploads/' . str_replace('.jpg', '-thumb-200.jpg', $element->image), true)?>" alt="" /></a>
                                        </div>                                        
                                        <div class="product__price"><strong><?=$element->price?></strong> сом. </div>
                                    <?php endif ?>
                                    <div class="product__title"><a href="<?= Url::to(['/catalog/site/view', 'id' => $element->id]) ?>"><?=$element->title?></a></div>
                                    <div class="product__person">
                                        <?=$element->user_name?>
                                        <div class="product__person-phone phone"><a href="#" class="dashed show-phone"><span data-value="<?=$element->user_phone?>"><?=$element->user_phone?></span></a></div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>  
        </div>    

    </div>
</div>    