<?php

use yii\helpers\Url;
use yii\helpers\Html;
use andreosoft\image\Image;
use common\modules\content\models\Content;
use common\modules\catalog\models\CatalogProducts;

$this->title = Yii::$app->name;
?>

<?= $this->render('//common/carusel') ?>

<!--content-->
<div class="page_content_offset">
    <div class="container">
        <div class="row clearfix">
            <!--products-->
            <section class="col-lg-12 col-md-12 col-sm-12">
                <?php foreach (CatalogProducts::findAll(['parent' => 0, 'isparent' => true, 'status' => CatalogProducts::STATUS_PUBLISHED]) as $model):?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin: 10px 0 10px 0;">
                        <a href="<?= Url::to(['/catalog/site/index', 'parent' => $model->id])?>" class="d_block animate_ftb h_md_auto m_xs_bottom_15 banner_type_2 r_corners green t_align_c tt_uppercase vc_child n_sm_vc_child">
                            <span class="d_inline_middle">
                                <?= Html::img(Image::thumb($model->image, 56, 56), ['class' => 'd_inline_middle m_md_bottom_5']) ?>
                                <span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
                                    <b><?= $model->name?></b>
                                </span>
                            </span>
                        </a>
                    </div>
                <?php endforeach;?>
            </section>
            <!--/products-->
        </div>

        <div class="clearfix m_bottom_10 m_sm_bottom_20" style="padding-top:30px;">
            <h2 class="tt_uppercase color_dark heading2 animate_fade f_mxs_none m_mxs_bottom_15">Акция!!!</h2>
        </div>

        <section class="products_container a_type_2 clearfix m_bottom_25">
            <?php foreach (CatalogProducts::find()->where(['isparent' => false, 'status' => CatalogProducts::STATUS_PUBLISHED, 'discont' => true])->limit(4)->all() as $model):?>
            <!--product item-->
            <div class="product_item w_xs_full">
                <figure class="r_corners photoframe animate_ftb type_2 t_align_c tr_all_hover shadow relative">
                    <?= Html::a(Html::img(Image::thumb($model->image, 242, 242), ['class' => 'tr_all_hover']), ['/catalog/site/view-by-url', 'url' => $model->seo_url], ['class' => 'd_block relative pp_wrap m_bottom_15'])?>
                    <figcaption>
                        <h5 class="m_bottom_10"><?= Html::a($model->name, ['/catalog/site/view-by-url', 'url' => $model->seo_url], ['class' => 'color_dark'])?></h5>
                        <?php if ($model->price > 0) :?>
                        <div class="clearfix m_bottom_15">
                            <p class="scheme_color f_size_large"><?= $model->price?> руб.</p>
                        </div>
                        <?php endif ?>
                        <div class="clearfix">
                            <?= Html::a('Подробнее', ['/catalog/site/view-by-url', 'url' => $model->seo_url], ['class' => 'button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15'])?>
                        </div>
                    </figcaption>
                </figure>
            </div>
            <!--/product item-->
            <?php endforeach;?>           
        </section>

        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-6 m_bottom_45 m_xs_bottom_30">
                <h2 class="tt_uppercase color_dark m_bottom_10">Компания "Art Life"</h2>
                <p class="first_letter_2 m_bottom_15"><span class="fl r_corners t_align_c f_left d_block">Н</span>аша компания поставляет электрооборудование на рынок Воронежской области... dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit.</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 m_bottom_45 m_xs_bottom_30">
                <h2 class="tt_uppercase color_dark m_bottom_10">Почему с нами работать выгодно?</h2>
                <p class="first_letter_2"><span class="fl r_corners t_align_c f_left d_block">M</span>auris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit.</p>
            </div>
        </div>

        <hr class="m_bottom_10 divider_type_3">
        <div class="row clearfix">
            
            <?php foreach (Content::findAll(['class' => 'uslugy', 'status' => Content::STATUS_PUBLISHED]) as $model):?>
            <div class="col-lg-4 col-md-6 col-sm-6 m_bottom_45 m_xs_bottom_30">
                <figure class="info_block_type_3">
                    <div class="icon_wrap_2 f_left r_corners t_align_c vc_child scheme_color tr_all_hover"><i class="fa fa-wrench d_inline_middle"></i></div>
                    <h4 class="fw_medium color_dark m_bottom_15"><?= Html::a($model->name, ['/content/site/view-by-url', 'url' => $model->seo_url, 'view' => 'view'])?></h4>
                    <p><?= $model->introtext?></p>
                </figure>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>