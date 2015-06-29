<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use andreosoft\image\Image;
use common\modules\catalog\models\CatalogProducts;
use common\modules\content\models\Content;

$name = 'ВАЖНО ЗНАТЬ';
$this->title = \Yii::$app->name . ' - ' . $name;
$this->params['breadcrumbs'][] = $name;
?>
<!--content-->
<div class="page_content_offset" style="padding-top:0px;">
    <div class="container">
        <div class="row clearfix">
            <!--left content column-->
            <section class="col-lg-9 col-md-9 col-sm-9">
                <h2 class="tt_uppercase color_dark m_bottom_25">Важно знать</h2>
                <?php foreach ($elements as $model):?>
                <!--blog post-->
                <hr class="divider_type_3 m_bottom_30">
                <article class="m_bottom_20 clearfix">
                    <?= Html::a(Html::img(Image::thumb($model->image, 350, 220), ['class' => 'tr_all_long_hover']), ['/content/site/view-by-url', 'url' => $model->seo_url, 'view' => 'view'], ['class' => 'photoframe d_block d_xs_inline_b f_xs_none wrapper shadow f_left m_right_20 m_bottom_10 r_corners'])?>
                    <div class="mini_post_content">
                        <h4 class="m_bottom_5"><?= Html::a($model->name, ['/content/site/view-by-url', 'url' => $model->seo_url, 'view' => 'view'], ['class' => 'color_dark fw_medium'])?></h4>
                        <hr>
                        <hr class="m_bottom_15">
                        <p class="m_bottom_10"><?= $model->introtext?></p>
                        <?= Html::a('Читать далее..', ['/content/site/view-by-url', 'url' => $model->seo_url, 'view' => 'view'], ['class' => 'tt_uppercase f_size_large'])?>
                    </div>
                </article>
                <?php endforeach;?>
                <hr class="divider_type_3 m_bottom_10">
                <div class="row clearfix m_xs_bottom_30">
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-5">
                        <!--<p class="d_inline_middle f_size_medium">Results 1 - 5 of 45</p>-->
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7 t_align_r">
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
            </section>
            <!--right column-->
            <aside class="col-lg-3 col-md-3 col-sm-3">
                <!--Popular articles-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">Это интересно</h3>
                    </figcaption>
                    <div class="widget_content">
                        <?php $first = true; ?>
                        <?php foreach (Content::find()->where(['class' => 'blog', 'status' => Content::STATUS_PUBLISHED])->orderBy('RAND()')->limit(3)->all() as $model): ?>
                            <?= $first ? '<hr class="m_bottom_15">' : '' ?> 
                            <?php $first = false ?>
                            <article class="clearfix m_bottom_15">
                                <?= Html::img(Image::thumb($model->image, 80, 80), ['class' => 'f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0']) ?>
                                <?= Html::a($model->name, ['/content/site/view-by-url', 'url' => $model->seo_url, 'view' => 'view'], ['class' => 'color_dark d_block bt_link p_vr_0']) ?>
                            </article>                                          
                        <?php endforeach; ?>                       
                    </div>
                </figure>
                <!--Bestsellers-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                    <figcaption>
                        <h3 class="color_light">Наши товары</h3>
                    </figcaption>
                    <div class="widget_content">
                        <?php $first = true; ?>
                        <?php foreach (CatalogProducts::find()->where(['isparent' => 'false', 'status' => CatalogProducts::STATUS_PUBLISHED])->orderBy('RAND()')->limit(4)->all() as $model): ?>
                            <?= $first ? '<hr class="m_bottom_15">' : '' ?> 
                            <?php $first = false ?>
                            <div class="clearfix m_bottom_15">
                                <?= Html::img(Image::thumb($model->image, 80, 80), ['class' => 'f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0']) ?>
                                <?= Html::a($model->name, ['/catalog/site/view-by-url', 'url' => $model->seo_url], ['class' => 'color_dark d_block bt_link']) ?>
                                <?php if ($model->price > 0) :?>
                                <p class="scheme_color"><?= $model->price ?> руб.</p>
                                <?php endif ?>
                            </div>                                     
                        <?php endforeach; ?>                         
                    </div>
                </figure>
            </aside>
        </div>

    </div>
</div>