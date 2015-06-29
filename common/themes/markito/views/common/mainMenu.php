<?php
use yii\helpers\Html;
use common\modules\filemanager\models\File;
use \yii\helpers\ArrayHelper;
use common\modules\catalog\models\CatalogProducts;
?>
<div class="header-top">
    <div class="container">
        <div class="head-top">
            <div class="logo">
                <?= Html::a(Html::img(File::thumb(Yii::$app->params['logo']['url'], Yii::$app->params['logo']['x'], Yii::$app->params['logo']['y'])), Yii::$app->homeUrl)?>
            </div>
            <div class="top-nav">		
                <ul class="megamenu skyblue">
                    <?php foreach (ArrayHelper::map(
                            CatalogProducts::findAll(
                            ['parent' => 0, 'isparent' => true, 'status' => CatalogProducts::STATUS_PUBLISHED]), 'id', 'name') 
                            as $category_id=>$category_name):?>
                    <li class="active grid"><a  href="#"><?= $category_name ?></a>
                        <div class="megapanel">
                            <div class="row">
                                <div class="col1">
                                    <div class="h_nav">
                                        <ul>
                                            <?php 
                                            $count = CatalogProducts::find()->where(['parent' => $category_id, 'isparent' => true, 'status' => CatalogProducts::STATUS_PUBLISHED])->count() / 2;
                                            $i = 0;
                                            foreach (ArrayHelper::map(CatalogProducts::findAll(
                                                ['parent' => $category_id, 'isparent' => true, 'status' => CatalogProducts::STATUS_PUBLISHED]), 'id', 'name') 
                                                as $element_id => $element_name):?>
                                                    <?php if ($i++ >= $count):?>
                                                        </ul>
                                                        </div>
                                                        </div>
                                                        <div class="col1">
                                                        <div class="h_nav">
                                                        <ul>
                                                    <?php $count = 0; endif; ?>
                                                    <li><?= Html::a($element_name, ['/catalog/site/index', 'parent' => $element_id])?></li>
                                            <?php endforeach; ?>
                                        </ul>	
                                    </div>							
                                </div>
                                <div class="col1">
                                    <?= Html::img(File::thumb(CatalogProducts::findOne($category_id)['image'], 300, 300)); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul> 
            </div>
<!--            <div class="cart box_1">
                <a href="checkout.html">
                    <h3> <div class="total">
                            <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
                        <img src="images/cart.png" alt=""/></h3>
                </a>
                <p><a href="javascript:;" class="simpleCart_empty"><img src="images/cart-c.png"  alt=""></a></p>
                <div class="clearfix"> </div>
            </div>
-->
            <div class="clearfix"> </div>
        </div>
    </div>
</div>


<?php /*



<div class="main-menu-container container">
    <div class="row">
        <div class="col-md-12">
            <div class="main-menu-wrapper">
                <nav class="main-menu">
                    <ul>
                        <li class="main-menu__item-products"><a href="">Товары</a>
                            <div class="main-menu__submenu">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="main-menu__submenu-columns">
<?= getCategory::widget(['parent' => 1]) ?> 
                                            </div>   
                                        </div>
                                        <div class="col-md-4 visible-lg">
                                            <img class="img-responsive" src="<?= Yii::$app->assetManager->publish('@common/themes/site/assets/pic/menu-image.jpg')[1] ?>" width="309" height="225" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="main-menu__item-services"><a href="">Услуги</a>
                            <div class="main-menu__submenu">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="main-menu__submenu-columns">
<?= getCategory::widget(['parent' => 2]) ?> 
                                            </div> 
                                        </div>
                                        <div class="col-md-4 visible-lg">
                                            <img class="img-responsive" src="<?= Yii::$app->assetManager->publish('@common/themes/site/assets/pic/menu-image.jpg')[1] ?>" width="309" height="225" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="main-menu__item-discounts"><a href="">Скидки</a>
                            <div class="main-menu__submenu">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="main-menu__submenu-columns">
<?= getCategory::widget(['parent' => 1, 'render' => 'indexDiscount']) ?> 
                                            </div> 
                                        </div>
                                        <div class="col-md-4 visible-lg">
                                            <img class="img-responsive" src="<?= Yii::$app->assetManager->publish('@common/themes/site/assets/pic/menu-image.jpg')[1] ?>" width="309" height="225" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>                
                        <li class="main-menu__item-interesting"><?= Html::a('Интересное', ['/content/site/index-blog']) ?></li>
                        <li class="main-menu__item-news"><?= Html::a('Новости', ['/content/site/index-news']) ?></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

*/ ?>