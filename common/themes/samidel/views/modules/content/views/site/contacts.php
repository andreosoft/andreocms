<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = \Yii::$app->name . ' - ' . $model->name;

$this->registerJsFile('http://maps.google.com/maps/api/js?sensor=false&amp;language=en');
?>

<!-- Head Section -->
<section class="page-section bg-dark-alfa-90 parallax-3" data-background="<?= Yii::$app->assetManager->publish('@common/themes/samidel/assets/images/photo_for_template/8.jpg')[1] ?>">
    <div class="relative container align-left">

        <div class="row">

            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Бутики</h1>
                <div class="hs-line-4 font-alt">
                    Мы всегда Вам  рады!
                </div>
            </div>

        </div>

    </div>
</section>
<!-- End Head Section -->


<!-- Contact Section -->
<section class="small-section">
    <div class="container relative">

        <h2 class="section-title font-alt mb-70 mb-sm-40">
            Главный офис
        </h2>

        <div class="row mb-60 mb-xs-40">

            <div class="col-md-8 col-md-offset-2">
                <div class="row">

                    <!-- Phone -->
                    <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                        <div class="contact-item">
                            <div class="ci-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="ci-title font-alt">
                                Мобильный телефон
                            </div>
                            <div class="ci-text">
                                <a href="tel:+77015378526">+7 (701) 537-85-26</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Phone -->

                    <!-- Address -->
                    <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                        <div class="contact-item">
                            <div class="ci-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="ci-title font-alt">
                                Адрес
                            </div>
                            <div class="ci-text">
                                г. Астана, ул. Достык, 1
                            </div>
                        </div>
                    </div>
                    <!-- End Address -->

                    <!-- Email -->
                    <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                        <div class="contact-item">
                            <div class="ci-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="ci-title font-alt">
                                Email
                            </div>
                            <div class="ci-text">
                                <a href="mailto:manager@samidel.kz">manager@samidel.kz</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Email -->

                </div>
            </div>

        </div>

        <!-- Contact Form -->                            
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <form class="form contact-form" id="contact_form" method="post" action="<?= Url::to(['/callback/site/create'])?>">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                    <div class="clearfix">

                        <div class="cf-left-col">

                            <!-- Name -->
                            <div class="form-group">
                                <input type="text" name="Callback[name]" id="Callback[name]" class="input-md round form-control" placeholder="Name" pattern=".{3,100}" required>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <input type="email" name="Callback[email]" id="Callback[email]" class="input-md round form-control" placeholder="Email" pattern=".{5,100}" required>
                            </div>

                        </div>

                        <div class="cf-right-col">

                            <!-- Message -->
                            <div class="form-group">                                            
                                <textarea name="Callback[content]" id="Callback[content]" class="input-md round form-control" style="height: 84px;" placeholder="Message"></textarea>
                            </div>

                        </div>

                    </div>

                    <div class="clearfix">

                        <div class="cf-left-col">

                            <!-- Inform Tip -->                                        
                            <div class="form-tip pt-20">
                                <i class="fa fa-info-circle"></i> Все поля обязательны для заполнения
                            </div>

                        </div>

                        <div class="cf-right-col">

                            <!-- Send Button -->
                            <div class="align-right pt-10">
                                <button type="submit" class="submit_btn btn btn-mod btn-medium btn-round" id="submit_btn">Отправить письмо</button>
                            </div>

                        </div>

                    </div>



                    <div id="result"></div>
                </form>

            </div>
        </div>
        <!-- End Contact Form -->
        <div class="row">
            <h2 class="section-title font-alt mb-70 mb-sm-40">
                Где можно купить нашу одежу?
            </h2>
            <!-- contact2 -->
            <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <img src="<?= Yii::$app->assetManager->publish('@common/themes/samidel/assets/images/photo_for_template/map1.jpg')[1] ?>">

                <div class="col-sm-12 col-lg-12">
                    <div class="row">

                        <!-- Phone -->
                        <div class="sub_contact-item col-sm-12 col-lg-12 pt-20 pb-20 pb-xs-0">
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="ci-title font-alt">
                                    Мобильный телефон
                                </div>
                                <div class="ci-text">
                                    <a href="tel:+77015378526">+7 (701) 537-85-26</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Phone -->

                        <!-- Address -->
                        <div class="sub_contact-item col-sm-12 col-lg-12 pt-20 pb-20 pb-xs-0">
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="ci-title font-alt">
                                    Адрес
                                </div>
                                <div class="ci-text">
                                    г. Астана, ул. Достык, 1
                                </div>
                            </div>
                        </div>
                        <!-- End Address -->

                        <!-- Email -->
                        <div class="sub_contact-item col-sm-12 col-lg-12 pt-20 pb-20 pb-xs-0">
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="ci-title font-alt">
                                    Email
                                </div>
                                <div class="ci-text">
                                    <a href="mailto:manager@samidel.kz">manager@samidel.kz</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Email -->

                    </div>
                </div>

            </div>
            <!-- And contact2 -->

            <!-- contact2 -->
            <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <img src="<?= Yii::$app->assetManager->publish('@common/themes/samidel/assets/images/photo_for_template/map1.jpg')[1] ?>">

                <div class="col-sm-12 col-lg-12">
                    <div class="row">

                        <!-- Phone -->
                        <div class="sub_contact-item col-sm-12 col-lg-12 pt-20 pb-20 pb-xs-0">
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="ci-title font-alt">
                                    Мобильный телефон
                                </div>
                                <div class="ci-text">
                                    <a href="tel:+77015378526">+7 (701) 537-85-26</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Phone -->

                        <!-- Address -->
                        <div class="sub_contact-item col-sm-12 col-lg-12 pt-20 pb-20 pb-xs-0">
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="ci-title font-alt">
                                    Адрес
                                </div>
                                <div class="ci-text">
                                    г. Астана, ул. Достык, 1
                                </div>
                            </div>
                        </div>
                        <!-- End Address -->

                        <!-- Email -->
                        <div class="sub_contact-item col-sm-12 col-lg-12 pt-20 pb-20 pb-xs-0">
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="ci-title font-alt">
                                    Email
                                </div>
                                <div class="ci-text">
                                    <a href="mailto:manager@samidel.kz">manager@samidel.kz</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Email -->

                    </div>
                </div>

            </div>
            <!-- And contact2 -->

            <!-- contact2 -->
            <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <img src="<?= Yii::$app->assetManager->publish('@common/themes/samidel/assets/images/photo_for_template/map1.jpg')[1] ?>">

                <div class="col-sm-12 col-lg-12">
                    <div class="row">

                        <!-- Phone -->
                        <div class="sub_contact-item col-sm-12 col-lg-12 pt-20 pb-20 pb-xs-0">
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="ci-title font-alt">
                                    Мобильный телефон
                                </div>
                                <div class="ci-text">
                                    <a href="tel:+77015378526">+7 (701) 537-85-26</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Phone -->

                        <!-- Address -->
                        <div class="sub_contact-item col-sm-12 col-lg-12 pt-20 pb-20 pb-xs-0">
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="ci-title font-alt">
                                    Адрес
                                </div>
                                <div class="ci-text">
                                    г. Астана, ул. Достык, 1
                                </div>
                            </div>
                        </div>
                        <!-- End Address -->

                        <!-- Email -->
                        <div class="sub_contact-item col-sm-12 col-lg-12 pt-20 pb-20 pb-xs-0">
                            <div class="contact-item">
                                <div class="ci-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="ci-title font-alt">
                                    Email
                                </div>
                                <div class="ci-text">
                                    <a href="mailto:manager@samidel.kz">manager@samidel.kz</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Email -->

                    </div>
                </div>

            </div>
            <!-- And contact2 -->

        </div>
    </div>
</section>
<!-- End Contact Section -->


<!-- Google Map -->
<div class="google-map">

    <div data-address="51.128532, 71.417530" id="map-canvas"></div>

    <div class="map-section">

        <div class="map-toggle">
            <div class="mt-icon">
                <i class="fa fa-map-marker"></i>
            </div>
            <div class="mt-text font-alt">
                <div class="mt-open">Открыть карту </div>
                <div class="mt-close">Закрыть карту <i class="fa fa-angle-up"></i></div>
            </div>
        </div>

    </div>

</div>
<!-- End Google Map -->
