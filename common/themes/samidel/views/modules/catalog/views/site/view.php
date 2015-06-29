<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\catalog\models\CatalogProducts;
use andreosoft\image\Image;
use common\modules\gallery\models\Gallery;

$this->title = \Yii::$app->name . ' - ' . $model->name;
?>

<!-- Head Section -->
<section class="small-section bg-dark-alfa-90 parallax-2" style="margin-top:75px;">
    <div class="relative container align-left">

        <div class="row">

            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0"><?= $model->name?></h1>
                <div class="hs-line-4 font-alt">
                    Коллекция: <?= CatalogProducts::findOne(['id' => $model->parent])->name?>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- End Head Section -->

<!-- Section -->
<section class="small-section blockdown">
    <div class="container relative">

        <!-- Product Content -->
        <div class="row mb-60 mb-xs-30">

            <!-- Product Images -->
            <div class="col-md-4 mb-md-30">

                <div class="post-prev-img">
                    <a href="<?= Image::thumb($model->image, 740, 944)?>" class="lightbox-gallery-3 mfp-image"><img src="<?= Image::thumb($model->image, 370, 472)?>" alt="Дизайнерская одежда SAMIDEL" /></a>
                    <?php if ($model->discont):?>
                    <div class="intro-label">
                        <span class="label label-danger bg-red">Sale</span>
                    </div>
                    <?php endif;?>
                </div>

                <div class="row">
                    <?php foreach (Gallery::findAll(['table_id' => $model->id, 'table_name' => 'catalog', 'status' => Gallery::STATUS_PUBLISHED]) as $element): ?>
                        <div class="col-xs-3 post-prev-img">
                            <a href="<?= Image::thumb($element->image, 740, 944)?>" class="lightbox-gallery-3 mfp-image"><img src="<?= Image::thumb($element->image, 67.5, 86)?>" alt="Дизайнерская одежда SAMIDEL" /></a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- End Product Images -->

            <!-- Product Description -->
            <div class="col-sm-8 col-md-8 mb-xs-40">

                <h3 class="mt-0"><?= $model->name?></h3>

                <hr class="mt-0 mb-30"/>

                <div class="section-text mb-30">
                    <?= $model->content?>
                </div>

                <hr class="mt-0 mb-30"/> 

                <div class="section-text small">
                    <?= $model->introtext?>
                </div>

            </div>
            <!-- End Product Description -->
        </div>
        <!-- End Product Content -->

    </div>
</section>
<!-- End Section -->


<!-- Divider -->
<hr class="mt-0 mb-0 "/>
<!-- End Divider -->


<!-- Related Products -->
<section class="small-section blockup">
    <div class="container relative">

        <h2 class="section-title font-alt mb-70 mb-sm-40">
            Смотрите также
        </h2>

        <!-- Products Grid -->
        <div class="row multi-columns-row">
        <?php foreach (CatalogProducts::find()->where(['status' => CatalogProducts::STATUS_PUBLISHED, 'parent' => $model->parent])->andWhere('id <> '.$model->id)->orderBy('RAND()')->limit(4)->all() as $model): ?>
            <!-- Shop Item -->
            <div class="col-md-3 col-lg-3 mb-xs-40">
                <div class="post-prev-img">
                    <?= Html::a(Html::img(Image::thumb($model->image, 370, 472)), ['view-by-url', 'url' => $model->seo_url])?>
                </div>
                <div class="post-prev-title font-alt align-center">
                    <?= Html::a($model->name, ['view-by-url', 'url' => $model->seo_url])?>
                </div>
            </div>
            <!-- End Shop Item -->
        <?php endforeach;?>
        </div>
        <!-- End Products Grid -->
    </div>
</section>
<!-- End Related Products -->