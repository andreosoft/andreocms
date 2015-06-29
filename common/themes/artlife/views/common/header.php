<?php

use yii\helpers\Url;
use yii\helpers\Html;
use andreosoft\image\Image;
use common\modules\catalog\models\CatalogProducts;
use common\modules\content\models\Content;
use common\modules\callback\widgets\callbackModal;
?>
<!--markup header type 2-->
<header role="banner">
    <section class="h_bot_part container">
        <div class="clearfix row">
            <div class="col-lg-4 col-md-6 col-sm-4 t_xs_align_c">
                <a href="<?= \Yii::$app->homeUrl?>" class="logo m_xs_bottom_15 d_xs_inline_b" style="text-align: center">
                    <img src="<?= Image::thumb('/ArtLife_logo.png', 180, 50)?>" alt=""> <br /><h3 >В Ногинске</h3>
                </a>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-8">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-6 t_align_r t_xs_align_c m_xs_bottom_15" style="margin-top: -10px;">
                        <dl class="l_height_medium">
                            <dt class="f_size_small">Бесплатные консультации:</dt>
                            <dd class="f_size_ex_large color_dark"><a data-toggle="modal" data-target="#modalCallback"><b>8 (000) 000-00-00</b><br /> <small>Нажмите для звонка</small></a></dd>
                        </dl>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6">
                        <form class="relative type_2" role="search" action="<?= Url::to(['/catalog/site/search'])?>">
                            <input type="text" placeholder="Что будем искать?"  name="q" class="r_corners f_size_medium full_width">
                            <button class="f_right search_button tr_all_hover f_xs_none">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?= callbackModal::widget(['options' => ['id' => 'modalCallback']])?>
    <!--main menu container-->
    <div class="container">
        <section class="menu_wrap type_2 relative clearfix t_xs_align_c m_bottom_20">
            <!--button for responsive menu-->
            <button id="menu_button" class="r_corners centered_db d_none tr_all_hover d_xs_block m_bottom_15">
                <span class="centered_db r_corners"></span>
                <span class="centered_db r_corners"></span>
                <span class="centered_db r_corners"></span>
            </button>
            <!--main menu-->
            <nav role="navigation" class="f_left f_xs_none d_xs_none t_xs_align_l">	
                <ul class="horizontal_list main_menu clearfix">
                    <li class="<?= Yii::$app->request->url === Yii::$app->homeUrl ? 'current' : ''?> relative f_xs_none m_xs_bottom_5"><?= Html::a('<b>Главная</b>',Yii::$app->homeUrl , ['class' => 'tr_delay_hover color_light tt_uppercase'])?></li>
                    <li class="<?= Yii::$app->request->url === Url::to(['/content/site/view-by-url', 'url' => 'о-нас', 'view' => 'view']) ? 'current' : ''?> relative f_xs_none m_xs_bottom_5"><?= Html::a('<b>О нас</b>',['/content/site/view-by-url', 'url' => 'о-нас', 'view' => 'view'] , ['class' => 'tr_delay_hover color_light tt_uppercase'])?></li>
                    <li class="relative f_xs_none m_xs_bottom_5"><a href="#" class="tr_delay_hover color_light tt_uppercase"><b>Каталог товаров</b></a>
                        <div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
                            <ul class="sub_menu">
                                <?php foreach (CatalogProducts::findAll(['parent' => 0, 'isparent' => true, 'status' => CatalogProducts::STATUS_PUBLISHED]) as $model):?>
                                    <?= Html::tag('li', Html::a($model->name, ['/catalog/site/index', 'parent' => $model->id], ['class' => 'color_dark tr_delay_hover']))?>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </li>
                    <li class="relative f_xs_none m_xs_bottom_5"><a href="#" class="tr_delay_hover color_light tt_uppercase"><b>Наши услуги</b></a>
                        <!--sub menu-->
                        <div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
                            <ul class="sub_menu">
                                <?php foreach (Content::findAll(['class' => 'uslugy', 'status' => Content::STATUS_PUBLISHED]) as $model):?>
                                    <?= Html::tag('li', Html::a($model->name, ['/content/site/view-by-url', 'url' => $model->seo_url, 'view' => 'view'], ['class' => 'color_dark tr_delay_hover']))?>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </li>
                    <li class="<?= Yii::$app->request->url === Url::to(['/content/site/index', 'class' => 'blog']) ? 'current' : ''?> relative f_xs_none m_xs_bottom_5"><?= Html::a('<b>Важно знать</b>',['/content/site/index', 'class' => 'blog'] , ['class' => 'tr_delay_hover color_light tt_uppercase'])?></li>
                    <li class="<?= Yii::$app->request->url === Url::to(['/content/site/view-by-url', 'url' => 'контакты', 'view' => 'view']) ? 'current' : ''?> relative f_xs_none m_xs_bottom_5"><?= Html::a('<b>Контакты</b>',['/content/site/view-by-url', 'url' => 'контакты', 'view' => 'view'] , ['class' => 'tr_delay_hover color_light tt_uppercase'])?></li>
                </ul>
            </nav>
        </section>
    </div>
</header>

