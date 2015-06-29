<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use andreosoft\image\Image;

$this->title = \Yii::$app->name . ' - Интересное';
?>

<!-- Head Section -->
<section class="small-section bg-dark-alfa-90 parallax-2" style="margin-top:75px;" data-background="<?= Yii::$app->assetManager->publish('@common/themes/samidel/assets/images/photo_for_template/4.jpg')[1] ?>">
    <div class="relative container align-left">

        <div class="row">

            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Интересное</h1>
                <div class="hs-line-4 font-alt">
                    Последние новости бренда и моды
                </div>
            </div>

        </div>

    </div>
</section>
<!-- End Head Section -->

<!-- Section -->
<section class="small-section">
    <div class="container relative">

        <div class="row multi-columns-row">
        <?php foreach ($elements as $model): ?>
                <!-- Post Item -->
                <div class="col-sm-6 col-md-3 col-lg-3 mb-60 mb-xs-40">
                    <div class="post-prev-img">
                        <?= Html::a(Html::img(Image::thumb($model->image, 370, 200)), ['view-by-url', 'url' => $model->seo_url, 'view' => 'blog']) ?>
                    </div>
                    <div class="post-prev-title font-alt">
                        <?= Html::a($model->name, ['view-by-url', 'url' => $model->seo_url, 'view' => 'blog']) ?>
                    </div>
                    <div class="post-prev-text"><?= $model->introtext?></div>
                    <div class="post-prev-more">
                        <a href="<?= Url::to(['view-by-url', 'url' => $model->seo_url, 'view' => 'blog']) ?>" class="btn btn-mod btn-gray btn-round">Читать статью <i class="fa fa-angle-right"></i></a>
                    </div>
            </div>
            <!-- End Post Item -->
        <?php endforeach; ?>    
        </div>

        <!-- Pagination -->
        <?=
        LinkPager::widget([
            'pagination' => $pagination,
            ])
        ?>          

<!--        <div class="pagination">
            <a href=""><i class="fa fa-angle-left"></i></a>
            <a href="" class="active">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a class="no-active">...</a>
            <a href="">9</a>
            <a href=""><i class="fa fa-angle-right"></i></a>
        </div>-->
        <!-- End Pagination -->


    </div>
</section>
<!-- End Section -->
