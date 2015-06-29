<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\modules\content\models\Content;
use andreosoft\image\Image;
use yii\widgets\Breadcrumbs;
?>

<header class="kopa-header style1">

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
                        <form action="<?= Url::to(['/catalog/site/search']) ?>">
                            <input class="sb-search-input" placeholder="" type="text" value="" name="q" id="search">
                            <button type="submit" class="search-submit"><span class="fa fa-search"></span></button>
                            <span class="sb-icon-search fa fa-search"></span>
                        </form>
                    </div>
                </div> 

            </div>

        </div>  

    </div>

    <div class="kopa-header-bottom">  

        <div class="wrapper">

            <div class="kopa-logo">
                <a href="<?= \Yii::$app->homeUrl ?>"><img src="<?= \Yii::$app->assetManager->publish('@common/themes/shtorka/assets/images/shtorka-logo-in.png')[1] ?>" alt="logo"></a>
            </div>

            <nav class="kopa-main-nav">
                <ul class="main-menu sf-menu">
                    <li class="<?= \Yii::$app->request->url === \Yii::$app->homeUrl ? 'current-menu-item' : '' ?>">
                        <a href="<?= \Yii::$app->homeUrl ?>">Главная</a>
                    </li>
                    <li class="<?= \Yii::$app->request->url === Url::to(['/content/site/view-by-url', 'url' => 'о+нас', 'view' => 'view']) ? 'current-menu-item' : '' ?>">
                        <a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'о+нас', 'view' => 'view']) ?>">О нас</a>
                    </li>
                    <li>
                        <a href="#.html">Наши работы</a> 
                        <ul class="sub-menu">
                            <li><a href="<?= Url::to(['/catalog/site/index', 'parent' => '1']) ?>">По проектам</a></li>
                            <li><a href="<?= Url::to(['/catalog/site/index', 'parent' => '2']) ?>">По типу помещений</a></li>
                        </ul>                               
                    </li>
                    <li class="<?= \Yii::$app->request->url === Url::to(['/content/site/index', 'class' => 'blog']) ? 'current-menu-item' : '' ?>">
                        <a href="<?= Url::to(['/content/site/index', 'class' => 'blog']) ?>">Интересное</a>
                    </li>
                    <li class="<?= \Yii::$app->request->url === Url::to(['/content/site/view-by-url', 'url' => 'Контакты', 'view' => 'view']) ? 'current-menu-item' : '' ?>">
                        <a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'Контакты', 'view' => 'view']) ?>">Контакты</a>                                
                    </li>
                </ul>                
            </nav>
            <!--/end main-nav-->    

            <span class="mobile-menu-icon"><i class="fa fa-align-justify"></i></span>

            <nav class="main-nav-mobile">                        
                <ul class="main-menu-mobile sf-menu">
                    <li class="<?= \Yii::$app->request->url === \Yii::$app->homeUrl ? 'current-menu-item' : '' ?>">
                        <a href="<?= \Yii::$app->homeUrl ?>">Главная</a>
                    </li>
                    <li class="<?= \Yii::$app->request->url === Url::to(['/content/site/view-by-url', 'url' => 'о+нас', 'view' => 'view']) ? 'current-menu-item' : '' ?>">
                        <a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'о+нас', 'view' => 'view']) ?>">О нас</a>
                    </li>
                    <li>
                        <a href="#.html">Наши работы</a> 
                        <ul class="sub-menu">
                            <li><a href="<?= Url::to(['/catalog/site/index', 'parent' => '1']) ?>">По проектам</a></li>
                            <li><a href="<?= Url::to(['/catalog/site/index', 'parent' => '2']) ?>">По типу помещений</a></li>
                        </ul>                               
                    </li>
                    <li class="<?= \Yii::$app->request->url === Url::to(['/content/site/index', 'class' => 'blog']) ? 'current-menu-item' : '' ?>">
                        <a href="<?= Url::to(['/content/site/index', 'class' => 'blog']) ?>">Интересное</a>
                    </li>
                    <li class="<?= \Yii::$app->request->url === Url::to(['/content/site/view-by-url', 'url' => 'Контакты', 'view' => 'view']) ? 'current-menu-item' : '' ?>">
                        <a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'Контакты', 'view' => 'view']) ?>">Контакты</a>                                
                    </li>
                </ul>                
            </nav>           

        </div>
        <!-- wrapper -->
    </div>
</header>
<!-- kopa header --> 

<div class="kopa-breadcrumb">
    <div class="wrapper">
        <div class="page-title">
            <h1><?= $this->title?></h1>
        </div>
        
        <div class="bread-crumb clearfix">
            <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
                <a itemprop="url" href="<?= \Yii::$app->homeUrl?>">
                    <span itemprop="title">Главная</span>
                </a>
            </span>
                        
            <?php foreach ($this->params['breadcrumbs'] as $breadcrumb):?>
            &nbsp;&rsaquo;&nbsp;
            <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
                <a <?= is_array($breadcrumb) ? 'href="'.Url::to($breadcrumb['url']).'"' : ''?> itemprop="url" class="<?= $breadcrumb === end($this->params['breadcrumbs']) ? 'current-page' : ''?>">
                    <span itemprop="title"><?= is_array($breadcrumb) ? $breadcrumb['label'] : $breadcrumb?></span>
                </a>
            </span>
            <?php endforeach;?>    
        </div>
        
    </div>
</div> 