<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;
use common\modules\filemanager\models\File;
use common\modules\catalog\models\CatalogProducts;


$name = CatalogProducts::findOne(['id' => $parent])->name;
$this->title = \Yii::$app->name . ' - ' . $name;
$this->registerJs("
$('input').change(function () {
//    alert($(this).val());


});

");
?>

<?php if (empty($elements)) :?>
<div class="page_content_offset" style="padding-top:0px;">
    <div class="container">
        <h4>К сожалению, мы ничего не нашли :(</h4>
    </div>
</div>
<?php else: ?>
<!--content-->
<div class="page_content_offset" style="padding-top:0px;">
    <div class="container">
        <div class="clearfix m_bottom_30 m_sm_bottom_30" style="padding-top:30px;">
            <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12 m_xs_bottom_10">
                <h2 class="tt_uppercase color_dark f_left heading2 animate_fade f_mxs_none m_mxs_bottom_15 animate_sj_finished animate_fade_finished"><?= $name ?></h2>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 t_align_r t_xs_align_l">
                <p class="d_inline_middle f_size_medium">Сортировка по цене:</p>
                <!--manufacturer select-->
                <div class="custom_select f_size_medium relative d_inline_middle m_left_15 m_xs_left_5 m_mxs_left_0 m_mxs_top_10">
                    <div class="select_title r_corners relative color_dark" style="min-width: 166px;"><?= $sortdirection=='asc'?'Сначала дешевле':'Сначала дороже'?></div>
                    <ul class="select_list d_none" style="display: none;">
                        <li class="tr_delay_hover"><?= Html::a('Сначала дешевле', ArrayHelper::merge([''], ArrayHelper::merge(\Yii::$app->getRequest()->getQueryParams(), ['sortdirection' => 'asc', 'sortname' => 'price'])))?></li>
                        <li class="tr_delay_hover"><?= Html::a('Сначала дороже', ArrayHelper::merge([''], ArrayHelper::merge(\Yii::$app->getRequest()->getQueryParams(), ['sortdirection' => 'desc', 'sortname' => 'price'])))?></li>
                    </ul>
                    <input id="price_sort" name="price_sort" type="hidden" value="desc">
                </div>
            </div>
        </div>

        <hr class="m_bottom_10 divider_type_3">

        <div class="row clearfix m_bottom_15">
            <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12 m_xs_bottom_10">
                <p class="d_inline_middle f_size_medium d_xs_block m_xs_bottom_5">Показано <?=$pagination->offset?> - <?= $pagination->limit?> из <?= $pagination->totalCount?></p>
                <p class="d_inline_middle f_size_medium m_left_20 m_xs_left_0">Показать:</p>
                <!--show items per page select-->
                <div class="custom_select f_size_medium relative d_inline_middle m_left_5">
                    <div class="select_title r_corners relative color_dark" style="min-width: 75px;"><?= $pagination->PageSize?></div>
                    <ul class="select_list d_none" style="display: none;">
                        <li class="tr_delay_hover"><?= Html::a('20', ArrayHelper::merge([''], ArrayHelper::merge(\Yii::$app->getRequest()->getQueryParams(), ['pageSize' => 20])))?></li>
                        <li class="tr_delay_hover"><?= Html::a('40', ArrayHelper::merge([''], ArrayHelper::merge(\Yii::$app->getRequest()->getQueryParams(), ['pageSize' => 40])))?></li>
                        <li class="tr_delay_hover"><?= Html::a('50', ArrayHelper::merge([''], ArrayHelper::merge(\Yii::$app->getRequest()->getQueryParams(), ['pageSize' => 50])))?></li>
                    </ul>
                    <input name="num" type="hidden" value="20">
                </div>
                <p class="d_inline_middle f_size_medium m_left_5">товаров на странице</p>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 t_align_r t_xs_align_l">
                <!--pagination-->
                <?= LinkPager::widget([
                    'pagination' => $pagination, 
                    'options' => ['class' => 'horizontal_list clearfix d_inline_middle f_size_medium m_left_10'], 
                    'linkOptions' => ['class' => 'color_dark m_right_10'],
                    'activePageCssClass' => 'scheme_color',
                    'disabledPageCssClass' => 'm_right_10',
                    'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
                    'nextPageLabel' => '<i class="fa fa-angle-right"></i>'
                    ]) ?>            
            </div>
        </div>

        <hr class="m_bottom_10 divider_type_3">

        <section class="products_container a_type_2 clearfix m_bottom_25">
            <?php foreach ($elements as $model): ?>
                <!--product item-->
                <div class="product_item w_xs_full">
                    <figure class="r_corners photoframe animate_ftb type_2 t_align_c tr_all_hover shadow relative">
                        <?= Html::a(Html::img(File::thumb($model->image, 242, 242), ['class' => 'tr_all_hover']), ['view-by-url', 'url' => $model->seo_url], ['class' => '_block relative pp_wrap m_bottom_15']) ?>
                        <figcaption>
                            <h5 class="m_bottom_10"><?= Html::a($model->name, ['view-by-url', 'url' => $model->seo_url], ['class' => 'color_dark']) ?></h5>
                            <div class="clearfix m_bottom_15">
                                <p class="scheme_color f_size_large"><?= $model->price ?> руб.</p>
                            </div>
                            <div class="clearfix">
                                <?= Html::a('Подробнее', ['view-by-url', 'url' => $model->seo_url], ['class' => 'button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15']) ?>
                            </div>
                        </figcaption>
                    </figure>
                </div>            
            <?php endforeach; ?>
        </section>
        <hr class="m_bottom_10 divider_type_3">

        <div class="row clearfix m_bottom_15">
            <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12 m_xs_bottom_10">
                <p class="d_inline_middle f_size_medium d_xs_block m_xs_bottom_5">Показано <?=$pagination->offset?> - <?= $pagination->limit?> из <?= $pagination->totalCount?></p>
                <p class="d_inline_middle f_size_medium m_left_20 m_xs_left_0">Показать:</p>
                <!--show items per page select-->
                <div class="custom_select f_size_medium relative d_inline_middle m_left_5">
                    <div class="select_title r_corners relative color_dark" style="min-width: 75px;"><?= $pagination->PageSize?></div>
                    <ul class="select_list d_none" style="display: none;">
                        <li class="tr_delay_hover"><?= Html::a('20', ArrayHelper::merge([''], ArrayHelper::merge(\Yii::$app->getRequest()->getQueryParams(), ['pageSize' => 20])))?></li>
                        <li class="tr_delay_hover"><?= Html::a('40', ArrayHelper::merge([''], ArrayHelper::merge(\Yii::$app->getRequest()->getQueryParams(), ['pageSize' => 40])))?></li>
                        <li class="tr_delay_hover"><?= Html::a('50', ArrayHelper::merge([''], ArrayHelper::merge(\Yii::$app->getRequest()->getQueryParams(), ['pageSize' => 50])))?></li>                </ul>
                    <input name="num" type="hidden" value="20">
                </div>
                <p class="d_inline_middle f_size_medium m_left_5">товаров на странице</p>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 t_align_r t_xs_align_l">
                <!--pagination-->
                <?= LinkPager::widget([
                    'pagination' => $pagination, 
                    'options' => ['class' => 'horizontal_list clearfix d_inline_middle f_size_medium m_left_10'], 
                    'linkOptions' => ['class' => 'color_dark m_right_10'],
                    'activePageCssClass' => 'scheme_color',
                    'disabledPageCssClass' => 'm_right_10',
                    'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
                    'nextPageLabel' => '<i class="fa fa-angle-right"></i>'
                    ]) ?>             
            </div>
        </div>

        <hr class="m_bottom_10 divider_type_3">

    </div>
</div>
<?php endif; ?>