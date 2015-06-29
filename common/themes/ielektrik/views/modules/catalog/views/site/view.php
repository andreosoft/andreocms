<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\catalog\models\CatalogProducts;
use common\modules\filemanager\models\File;

$this->title = \Yii::$app->name . ' - ' . $model->name;
?>

<!--content-->
<div class="page_content_offset" style="padding-top:0px;">
    <div class="container">
        <div class="clearfix m_bottom_30 t_xs_align_c">
            <div class="photoframe type_2 shadow r_corners f_left f_sm_none d_xs_inline_b product_single_preview relative m_right_30 m_bottom_5 m_sm_bottom_20 m_xs_right_0 w_mxs_full">
                <div class="relative d_inline_b m_bottom_10 qv_preview d_xs_block">
                    <?= Html::img(File::thumb($model->image, 438, 438))?>
                </div>
            </div>
            <div class="p_top_10 t_xs_align_l">
                <!--description-->
                <h2 class="color_dark fw_medium m_bottom_10"><?= $model->name?></h2>
                <hr class="m_bottom_10 divider_type_3">
                <?= $model->introtext?>
                <hr class="divider_type_3 m_bottom_10">
                <p class="m_bottom_10"><?= $model->content?></p>
                <hr class="divider_type_3 m_bottom_15">
                <div class="m_bottom_15">
                    <span class="v_align_b f_size_big m_left_5 scheme_color fw_medium"><?= $model->price?> руб.</span>
                </div>
            </div>
        </div>
        <!--tabs-->
        <div class="clearfix">
            <h2 class="color_dark tt_uppercase f_left m_bottom_15 f_mxs_none">Смотрите также:</h2>
        </div>
        <section class="products_container a_type_2 clearfix m_bottom_25">
        <?php foreach (CatalogProducts::find()->where(['isparent' => 'false', 'status' => CatalogProducts::STATUS_PUBLISHED])->orderBy('RAND()')->limit(4)->all() as $model):?>
            <!--product item-->
            <div class="product_item w_xs_full">
                <figure class="r_corners photoframe animate_ftb type_2 t_align_c tr_all_hover shadow relative">
                    <?= Html::a(Html::img(File::thumb($model->image, 80, 80), ['class' => 'tr_all_hover']),['/catalog/site/view-by-url', 'url' => $model->seo_url], ['class' => 'd_block relative pp_wrap m_bottom_15'])?>
                    <figcaption>
                        <h5 class="m_bottom_10"><?= Html::a($model->name, ['/catalog/site/view-by-url', 'url' => $model->seo_url], ['class' => 'color_dark'])?></h5>
                        <div class="clearfix m_bottom_15">
                            <p class="scheme_color f_size_large"><?= $model->price?> руб.</p>
                        </div>
                        <div class="clearfix">
                            <?= Html::a('Подробнее', ['view-by-url', 'url' => $model->seo_url], ['class' => 'button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15']) ?>
                        </div>
                    </figcaption>
                </figure>
            </div>
        <?php endforeach;?>  
        </section>
    </div>
</div>