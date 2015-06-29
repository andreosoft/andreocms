<?php

use yii\helpers\Url;
use yii\helpers\Html;
use andreosoft\image\Image;
use common\modules\content\models\Content;
use common\modules\catalog\models\CatalogProducts;

$this->title = Yii::$app->name;
?>

<!-- About Section -->
<section class="small-section" id="about">
    <div class="container relative">

        <h2 class="section-title font-alt align-left mb-70 mb-sm-40">
            О Бренде Samidel`

            <a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'о-бренде', 'view' => 'view']) ?>" class="section-more right">Узнать больше о бренде <i class="fa fa-angle-right"></i></a>

        </h2>

        <div class="section-text">
            <div class="row">

                <div class="col-md-6 col-sm-6 mb-sm-50 mb-xs-30">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus ligula semper metus pellentesque mattis. Maecenas volutpat, diam enim sagittis quam, id porta quam. Sed id dolor consectetur fermentum nibh volutpat, accumsan purus.
                </div>

                <div class="col-md-6 col-sm-6 mb-sm-50 mb-xs-30">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus ligula semper metus pellentesque mattis. Maecenas volutpat, diam enim sagittis quam, id porta quam. Sed id dolor consectetur fermentum nibh volutpat, accumsan purus.
                </div>

            </div>
        </div>

    </div>
</section>
<!-- End About Section -->
<!-- Divider -->
<hr class="mt-0 mb-0" />
<!-- End Divider -->

<!-- Shop Section -->
<section class="small-section">
    <div class="container relative">

        <h2 class="section-title font-alt align-left mb-70 mb-sm-40">
            Наши Модели

            <a href="<?= Url::to(['/catalog/site/index', 'parent' => 3]) ?>" class="section-more right">Портфолио <i class="fa fa-angle-right"></i></a>

        </h2>

        <div class="row multi-columns-row">
            <?php foreach (CatalogProducts::find()->where(['isparent' => false, 'status' => CatalogProducts::STATUS_PUBLISHED, 'discont' => true])->limit(4)->all() as $model): ?>
                <!-- Shop Item -->
                <div class="col-md-3 col-lg-3 mb-xs-40 wow fadeIn" data-wow-delay="0.1s" data-wow-duration="2s">
                    <div class="post-prev-img">
                        <?= Html::a(Html::img(Image::thumb($model->image, 370, 450)), ['/catalog/site/view-by-url', 'url' => $model->seo_url]) ?>
                    </div>
                    <div class="post-prev-title font-alt align-center">
                        <?= Html::a($model->name, ['/catalog/site/view-by-url', 'url' => $model->seo_url]) ?>
                    </div>
                </div>
                <!-- End Shop Item -->

            <?php endforeach; ?> 
        </div>

    </div>
</section>
<!-- End Shop Section -->

<!-- Divider -->
<hr class="mt-0 mb-0 " />
<!-- End Divider -->


<!--Our Team-->
<section class="small-section" id="about">
    <div class="container relative">

        <h2 class="section-title font-alt mb-70 mb-sm-40">
            Наша команда
        </h2>


        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-text align-center mb-70 mb-xs-40">
                    Вводный рекламный текст с описанием преймуществ команды.
                </div>
            </div>
        </div>


        <div class="row multi-columns-row">
        <?php foreach (Content::find()->where(['class' => 'about', 'status' => Content::STATUS_PUBLISHED])->limit(4)->all() as $model): ?>
            <!-- Team Item -->
            <div class="col-sm-6 col-md-3 col-lg-3 mb-sm-30 wow fadeInUp">
                <div class="team-item">

                    <div class="team-item-image">
                        <?= Html::img(Image::thumb($model->image, 370, 450))?>
                        <div class="team-item-detail">

                            <h4 class="font-alt normal"><?= $model->name?></h4>
                            <p><?= $model->content?></p>
                            <div class="team-social-links">
                                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                            </div>

                        </div>
                    </div>

                    <div class="team-item-descr font-alt">

                        <div class="team-item-name">
                            <?= $model->name?>
                        </div>

                        <div class="team-item-role">
                            <?= $model->introtext?>
                        </div>

                    </div>

                </div>
            </div>
            <!-- End Team Item -->
        <?php endforeach; ?> 
        </div>

    </div>
</section>
<!--End Our Team-->

<!-- Divider -->
<hr class="mt-0 mb-0 " />
<!-- End Divider -->

<!-- Ask About Us -->
<section class="small-section bg-dark bg-dark-alfa-90 fullwidth-slider" data-background="<?= \Yii::$app->assetManager->publish('@common/themes/samidel/assets/images/photo_for_template/2.jpg')[1]?>">
<?php foreach (Content::find()->where(['class' => 'ask', 'status' => Content::STATUS_PUBLISHED])->all() as $model): ?>
    <!-- Slide Item -->
    <div>
        <div class="container relative">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 align-center">
                    <!-- Section Icon -->
                    <div class="section-icon">
                        <span class="icon-quote"></span>
                    </div>
                    <!-- Section Title -->
                    <h3 class="small-title font-alt"><?= $model->name?></h3>
                    <blockquote class="testimonial white">
                        <p><?= $model->content?></p>
                        <footer class="testimonial-author">
                            <?= $model->introtext?>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slide Item -->
<?php endforeach; ?> 
</section>
<!-- End Ask About Us -->

<!-- Divider -->
<hr class="mt-0 mb-0 " />
<!-- End Divider -->