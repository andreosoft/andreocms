<?php

use yii\helpers\Html;
use yii\helpers\Url;
use andreosoft\image\Image;
use common\modules\content\models\Content;
use common\modules\catalog\models\CatalogProducts;

$this->title = \Yii::$app->name . ' - ' . $model->name;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->seo_description
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $model->seo_keyword
]);
$this->registerMetaTag([
    'name' => 'title',
    'content' => $model->seo_title != '' ? $model->seo_title : $model->name
]);
$this->params['breadcrumbs'][] = $model->name;
?>
<!--content-->
<div class="page_content_offset" style="padding-top:0px;">
    <div class="container">
        <div class="row clearfix">
            <!--left content column-->
            <section class="col-lg-9 col-md-9 col-sm-9">							
                <article class="m_bottom_15">
                    <div class="row clearfix m_bottom_15">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h2 class="m_bottom_5 color_dark fw_medium m_xs_bottom_10"><?= $model->name ?></h2>
                        </div>
                    </div>
                    <a class="d_block photoframe r_corners wrapper shadow m_bottom_15" href="#">
                        <?= Html::img(Image::thumb($model->image, 840, 383), ['class' => 'tr_all_long_hover']) ?>
                    </a>
                    <!--post content-->
                    <p class="m_bottom_15"><?= $model->introtext ?></p>
                    <p><?= $model->content ?></p>
                </article>               
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
                        <?php foreach (CatalogProducts::find()->where(['isparent' => false, 'status' => CatalogProducts::STATUS_PUBLISHED])->orderBy('RAND()')->limit(4)->all() as $model): ?>
                            <?= $first ? '<hr class="m_bottom_15">' : '' ?> 
                            <?php $first = false ?>
                            <div class="clearfix m_bottom_15">
                                <?= Html::img(Image::thumb($model->image, 80, 80), ['class' => 'f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0']) ?>
                                <?= Html::a($model->name, ['/catalog/site/view-by-url', 'url' => $model->seo_url], ['class' => 'color_dark d_block bt_link']) ?>
                                <?php if ($model->price > 0) : ?>
                                    <p class="scheme_color"><?= $model->price ?> руб.</p>
                                <?php endif; ?>
                            </div>                                     
                        <?php endforeach; ?>                         
                    </div>
                </figure>
            </aside>
        </div>

    </div>
</div>