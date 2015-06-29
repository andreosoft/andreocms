<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\modules\content\models\Content;
use andreosoft\image\Image;
?>

<header id="kopa-header" class="kopa-header style3">

    <div class="kopa-header-top">

        <div class="wrapper">

            <div class="header-top-left">

                <div class="kopa-hotline">
                    <p class="">Звоните: <a href="callto:+996550607303">+996 (550) 607303</a>; <a href="callto:+996550390290">+996 (550) 390290;</a></p>
                </div>

            </div> 
            <!-- header top left -->  

            <div class="header-top-right">

                <div class="sb-search-wrapper">
                    <div id="sb-search" class="sb-search">
                        <form action="<?= Url::to(['/catalog/site/search'])?>">>
                            <input class="sb-search-input" placeholder="" type="text" value="" name="q" id="search">
                            <button type="submit" class="search-submit"><span class="fa fa-search"></span></button>
                            <span class="sb-icon-search fa fa-search"></span>
                        </form>
                    </div>
                </div><!-- sb-search-wrapper -->

            </div>
            <!-- header top right -->   

        </div>  
        <!-- wrapper -->

    </div>

    <!-- kopa header bottom -->
    <div class="kopa-header-bottom">

        <div class="menu-wrapper">

            <div class="wrapper">

                <div class="kopa-logo">
                     <a href="<?= \Yii::$app->homeUrl?>"><?= \Yii::$app->formatter->asImage(\Yii::$app->assetManager->publish('@common/themes/shtorka/assets/images/shtorka-logo2.png')[1])?></a>
                </div>
                <!-- logo -->

                <nav class="kopa-main-nav">
                    <ul class="main-menu sf-menu">
                         <li class="<?= \Yii::$app->request->url === \Yii::$app->homeUrl ? 'current-menu-item' : '' ?>">
                            <a href="<?= \Yii::$app->homeUrl?>">Главная</a>
                        </li>
                        <li class="<?= \Yii::$app->request->url === Url::to(['/content/site/view-by-url', 'url' => 'о+нас', 'view' => 'view']) ? 'current-menu-item' : '' ?>">
                            <a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'о+нас', 'view' => 'view'])?>">О нас</a>
                        </li>
                        <li>
                            <a href="#.html">Наши работы</a> 
                            <ul class="sub-menu">
                                <li><a href="<?= Url::to(['/catalog/site/index', 'parent' => '1'])?>">По проектам</a></li>
                                <li><a href="<?= Url::to(['/catalog/site/index', 'parent' => '2'])?>">По типу помещений</a></li>
                            </ul>                               
                        </li>
                        <li class="<?= \Yii::$app->request->url === Url::to(['/content/site/index', 'class' => 'blog']) ? 'current-menu-item' : '' ?>">
                            <a href="<?= Url::to(['/content/site/index', 'class' => 'blog'])?>">Интересное</a>
                        </li>
                        <li class="<?= \Yii::$app->request->url === Url::to(['/content/site/view-by-url', 'url' => 'Контакты', 'view' => 'view']) ? 'current-menu-item' : '' ?>">
                            <a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'Контакты', 'view' => 'view'])?>">Контакты</a>                                
                        </li>
                    </ul>                
                </nav>
                <!--/end main-nav-->

                <span class="mobile-menu-icon"><i class="fa fa-align-justify"></i></span>

                <nav class="main-nav-mobile">                         
                    <ul class="main-menu-mobile sf-menu">
                         <li class="<?= \Yii::$app->request->url === \Yii::$app->homeUrl ? 'current-menu-item' : '' ?>">
                            <a href="<?= \Yii::$app->homeUrl?>">Главная</a>
                        </li>
                        <li class="<?= \Yii::$app->request->url === Url::to(['/content/site/view-by-url', 'url' => 'о+нас', 'view' => 'view']) ? 'current-menu-item' : '' ?>">
                            <a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'о+нас', 'view' => 'view'])?>">О нас</a>
                        </li>
                        <li>
                            <a href="#.html">Наши работы</a> 
                            <ul class="sub-menu">
                                <li><a href="<?= Url::to(['/catalog/site/index', 'parent' => '1'])?>">По проектам</a></li>
                                <li><a href="<?= Url::to(['/catalog/site/index', 'parent' => '2'])?>">По типу помещений</a></li>
                            </ul>                               
                        </li>
                        <li class="<?= \Yii::$app->request->url === Url::to(['/content/site/index', 'class' => 'blog']) ? 'current-menu-item' : '' ?>">
                            <a href="<?= Url::to(['/content/site/index', 'class' => 'blog'])?>">Интересное</a>
                        </li>
                        <li class="<?= \Yii::$app->request->url === Url::to(['/content/site/view-by-url', 'url' => 'Контакты', 'view' => 'view']) ? 'current-menu-item' : '' ?>">
                            <a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'Контакты', 'view' => 'view'])?>">Контакты</a>                                
                        </li>
                    </ul>                
                </nav>

            </div>

        </div>

    </div>

    <div class="main-logo">
        <a href="<?= \Yii::$app->homeUrl?>"><img src="<?= \Yii::$app->assetManager->publish('@common/themes/shtorka/assets/images/shtorka-logo2.png')[1]?>" alt=""></a>
    </div>

    <div id="menu-icon">
        <a href="#"><i class="fa fa-navicon"></i><span style="font-size:1.3em; font-weight: bold;">Меню</span></a>
    </div>

    <div class="top-content">

        <div class="top-content-bg1"></div>
        <div class="top-content-bg2"></div>
        <div class="top-content-bg3"></div>

        <div class="content-wrapper">
            <div class="navigator clearfix">                
                Мы будем рады ответить на Ваши вопросы
            </div>

            <div class="contact">
                <p class="call-title">Звоните:</p>
                <a href="callto:123456789" class="number">+996(550)607303</a><br />
                <a href="callto:123456789" class="number">+996(550)390290</a>                
            </div>

            <div class="kopa-social-links">
                <ul class="clearfix">
                    <li><a href="#" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-google-plus"></a></li>
                </ul>
            </div>
        </div>

    </div>
    <!-- top content -->

    <div class="humberger-menu-wrapper">

        <div id="overlay"></div>

        <div id="humberger-menu">

            <nav class="kopa-main-nav-hbg">
                <ul class="humberger-nav sf-menu">
                         <li class="<?= \Yii::$app->request->url === \Yii::$app->homeUrl ? 'current-menu-item' : '' ?>">
                            <a href="<?= \Yii::$app->homeUrl?>">Главная</a>
                        </li>
                        <li class="<?= \Yii::$app->request->url === Url::to(['/content/site/view-by-url', 'url' => 'о+нас', 'view' => 'view']) ? 'current-menu-item' : '' ?>">
                            <a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'о+нас', 'view' => 'view'])?>">О нас</a>
                        </li>
                        <li>
                            <a href="#">Наши работы</a> 
                            <ul class="sub-menu">
                                <li><a href="<?= Url::to(['/catalog/site/index', 'parent' => '1'])?>">По проектам</a></li>
                                <li><a href="<?= Url::to(['/catalog/site/index', 'parent' => '2'])?>">По типу помещений</a></li>
                            </ul>                               
                        </li>
                        <li class="<?= \Yii::$app->request->url === Url::to(['/content/site/index', 'class' => 'blog']) ? 'current-menu-item' : '' ?>">
                            <a href="<?= Url::to(['/content/site/index', 'class' => 'blog'])?>">Интересное</a>
                        </li>
                        <li class="<?= \Yii::$app->request->url === Url::to(['/content/site/view-by-url', 'url' => 'Контакты', 'view' => 'view']) ? 'current-menu-item' : '' ?>">
                            <a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'Контакты', 'view' => 'view'])?>">Контакты</a>                                
                        </li>
                </ul>                
            </nav>
            <!--/end main-nav-->

            <div class="kopa-social-links">
                <ul class="clearfix">
                    <li><a href="#" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-google-plus"></a></li>
                </ul>
            </div>

            <p class="copyright">Copyrights &copy; 2015</p>
        </div>            

    </div>
    <!-- humberger menu -->

    <div class="home-top-carousel loading">
        <div class="owl-carousel owl-home-top-carousel">
        <?php foreach (Content::findAll(['class' => 'carusel']) as $model):?>
            <div class="item">
                <?= Html::a(Html::img(Image::thumb($model->image, 1920, 922)), '#')?>
                <span class="right-bg"></span>      
                <div class="caption">
                    <h5><?= $model->name?></h5>   
                    <p><?= $model->content?></p> 
                    <a href="<?= Url::to(['/catalog/site/index', 'parent' => '1'])?>" class="kopa-button sm-button button-3">Наше портфолио</a>
                </div>        
            </div>
        <?php endforeach;?>
        </div>

    </div>        
    <!-- home top carousel -->

</header>
<!-- kopa-page-header -->

