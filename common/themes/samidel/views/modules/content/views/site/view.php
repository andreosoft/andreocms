<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = \Yii::$app->name . ' - ' . $model->name;
?>
<section class="page-section bg-dark-alfa-90 parallax-3" data-background="<?= Yii::$app->assetManager->publish('@common/themes/samidel/assets/images/photo_for_template/4.jpg')[1] ?>">
    <div class="relative container align-left">

        <div class="row">

            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">О бренде SAMIDEL`</h1>
                <div class="hs-line-4 font-alt">
                    "Народные мотивы в огранке XXI века"
                </div>
            </div>

        </div>
    </div>

</div>
</section>
<!-- End Head Section -->
<!-- Divider -->
<hr class="mt-0 mb-0 "/>
<!-- End Divider -->

<!-- Alternative Services Section -->
<section class="small-section">
    <div class="container relative">

        <!-- Section Headings -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 align-center">

                <h3 class="font-alt mb-70 mb-sm-40"><?= $model->name?></h3>

                <div class="section-text mb-80 mb-xs-40">
                    <?= $model->introtext?>
                </div>

            </div>
        </div>
        <!-- End Section Headings -->

        <!-- Service Grid -->
        <div class="alt-service-grid">
            <div class="row">


                <div class="col-sm-6 col-md-6 col-lg-6">

                    <!-- Alt Service Item -->
                    <div class="alt-service-wrap">                                
                        <div class="alt-service-item">
                            <div class="alt-service-icon"></div>
                            <?= $model->content?>
                        </div>

                    </div>
                    <!-- End Service Item -->

                </div>


                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">

                    <div class="alt-services-image content_frame">
                        <img src="<?= Yii::$app->assetManager->publish('@common/themes/samidel/assets/images/photo_for_template/5.png')[1] ?>" alt="Модная одежда" />
                    </div>

                </div>

            </div>
        </div>
        <!-- End Service Grid -->

    </div>
</section>
<!-- End Alternative Services Section -->            

<!-- Divider -->
<hr class="mt-0 mb-0 "/>
<!-- End Divider -->

<!-- Call Action Section -->
<section class="page-section pt-0 pb-0 banner-section bg-dark bg-dark-alfa-90" data-background="<?= Yii::$app->assetManager->publish('@common/themes/samidel/assets/images/photo_for_template/6.jpg')[1] ?>">
    <div class="container relative">

        <div class="row">

            <div class="col-sm-6">

                <div class="mt-140 mt-lg-80 mb-140 mb-lg-80">
                    <div class="banner-content">
                        <h3 class="banner-heading font-alt">Хотите еще больше информации о нас?</h3>
                        <div class="banner-decription">
                            Большее колличество информации вы всегда можете получить из нашего Блога. Там вы всегда встретите последние новости.
                        </div>
                        <div class="local-scroll">
                            <a href="<?= Url::to(['/content/site/index', 'class' => 'blog'])?>" class="btn btn-mod btn-w btn-medium btn-round">Интересное</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-6 banner-image wow fadeInUp">
                <img src="<?= Yii::$app->assetManager->publish('@common/themes/samidel/assets/images/promo-1.png')[1] ?>" alt="" />
            </div>

        </div>

    </div>
</section>