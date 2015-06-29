<?php

use common\themes\samidel\ThemeAsset;

ThemeAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <?= $this->render('//common/head') ?>
    </head>
    <body class="appear-animate"> 

        <?php $this->beginBody(); ?>
        <!-- Page Loader -->
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- End Page Loader -->

        <!-- Page Wrap -->
        <div class="page" id="top">
            <!-- Home Section -->
            <section class="home-section fixed-height-small" data-background="<?=Yii::$app->assetManager->publish('@common/themes/samidel/assets/images/457.jpg')[1]?>" id="home">
                <div class="js-height-parent container">

                    <!-- Hero Content -->
                    <div class="home-content">
                        <div class="home-text">

                            <h1 class="hs-line-8 no-transp font-alt mb-50 mb-xs-30">
                                Дизайнерская Женская Одежда
                            </h1>

                            <h2 class="hs-line-14 font-alt mb-50 mb-xs-30">
                                SAMIDEL
                            </h2>

                            <div class="local-scroll">
                                <a href="#about" class="btn btn-mod btn-border btn-medium btn-round hidden-xs lightbox">Портфолио</a>
                                <span class="hidden-xs">&nbsp;</span>
                                <a href="http://vimeo.com/50201327" class="btn btn-mod btn-border btn-medium btn-round lightbox mfp-iframe">YouTube</a>
                            </div>

                        </div>
                    </div>
                    <!-- End Hero Content -->

                </div>
            </section>
            <!-- End Home Section -->
            <?= $this->render('//common/header-index') ?>

            <?= $content ?>

            <?= $this->render('//common/footer') ?>
        </div>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?> 
