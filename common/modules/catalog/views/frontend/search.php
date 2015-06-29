<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Поиск по каталогу: '.$search;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-columns container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="title medium orange"><?= $this->title ?></div>
            <?php if (empty($elements)) :?>
            <p>
                К сожалению по запросу <?= $search?> ничего не найдено :(
            </p>
            <?php else :?>
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
                         data-values=""
                         data-search="<?= $search?>"
                         data-limit="<?=$pagination->limit?>"
                         data-page="<?=$pagination->page?>">
                              
                            <?php foreach ($elements as $element): ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="product">
                                    <div class="product__image">
                                        <a href="<?=Url::to(['/catalog/site/view', 'id' => $element->id])?>"><img src="<?= Url::to('@webuploads/' . str_replace('.jpg', '-thumb-200.jpg', $element->image), true)?>" alt="" /></a>
                                    </div>
                                    <div class="product__price"><strong><?=$element->price?></strong> сом. </div>
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
            <?php endif ?>
        </div>    

    </div>
</div>    