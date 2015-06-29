<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use andreosoft\image\Image;
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


        <hr class="m_bottom_10 divider_type_3">
        <div class="row clearfix m_bottom_15">
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
                        <?= Html::a(Html::img(Image::thumb($model->image, 242, 242), ['class' => 'tr_all_hover']), ['view-by-url', 'url' => $model->seo_url], ['class' => '_block relative pp_wrap m_bottom_15']) ?>
                        <figcaption>
                            <h5 class="m_bottom_10"><?= Html::a($model->name, ['view-by-url', 'url' => $model->seo_url], ['class' => 'color_dark']) ?></h5>
                            <?php if ($model->price > 0) :?>
                            <div class="clearfix m_bottom_15">
                                <p class="scheme_color f_size_large"><?= $model->price ?> руб.</p>
                            </div>
                            <?php endif;?>
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