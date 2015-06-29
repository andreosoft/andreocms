<?php
use yii\helpers\Html;
use common\modules\catalog\widgets\getCategory\getCategory;
?>
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
                                <?=getCategory::widget(['parent'=>1])?> 
                            </div>   
                        </div>
                        <div class="col-md-4 visible-lg">
                          <img class="img-responsive" src="<?=Yii::$app->assetManager->publish('@common/themes/site/assets/pic/menu-image.jpg')[1]?>" width="309" height="225" alt="" />
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
                                <?=getCategory::widget(['parent'=>2])?> 
                            </div> 
                        </div>
                        <div class="col-md-4 visible-lg">
                          <img class="img-responsive" src="<?=Yii::$app->assetManager->publish('@common/themes/site/assets/pic/menu-image.jpg')[1]?>" width="309" height="225" alt="" />
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
                                <?=getCategory::widget(['parent'=>1, 'render' => 'indexDiscount'])?> 
                            </div> 
                        </div>
                        <div class="col-md-4 visible-lg">
                          <img class="img-responsive" src="<?=Yii::$app->assetManager->publish('@common/themes/site/assets/pic/menu-image.jpg')[1]?>" width="309" height="225" alt="" />
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

