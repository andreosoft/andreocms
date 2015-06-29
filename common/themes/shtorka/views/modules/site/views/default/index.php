<?php

use yii\helpers\Url;
use yii\helpers\Html;
use andreosoft\image\Image;
use common\modules\content\models\Content;
use common\modules\catalog\models\CatalogProducts;

$this->title = Yii::$app->name;
/*
  $this->registerMetaTag([
  'name' => 'description',
  'content' => $model->seo_description
  ]);
  $this->registerMetaTag([
  'name' => 'keywords',
  'content' => $model->seo_keyword
  ]);
  $this->registerMetaTag([
  'name' => 'title',
  'content' => $model->seo_title != '' ? $model->seo_title : $model->name
  ]);
 */
?>

<div id="main-content"> 
    <section class="kopa-area kopa-area-2 pb-17">
        <span class="span-bg"></span>
        <div class="wrapper">
            <div class="widget kopa-service-widget">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="service-content">
                            <h5 class="service-title"><a href="">Пошив штор в Бишкеке от студии "Шторка"</a></h5>
                            <p class="service-excerpt">Мы учитываем 
                                все пожелания наших клиентов и работаем так,чтобы шторы были не просто 
                                защитой от яркого света и постороннего глаза, а создавали внутреннее 
                                чувство радости и спокойствия. Многообразие расцветок, большой выбор 
                                тканей и фурнитуры смогут создать неповторимый и уникальный образ 
                                интерьера в наших руках. Мы шили шторы не только для кыргызстанцев, но и
                                для людей из Австралии, Америки, Казахстана.</p>
                            <p class="service-excerpt">Многообразие расцветок, большой выбор 
                                тканей и фурнитуры смогут создать неповторимый и уникальный образ 
                                интерьера в наших руках. Мы шили шторы не только для кыргызстанцев, но и
                                для людей из Австралии, Америки, Казахстана.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="service-content">
                            <h5 class="service-title"><a href="">Наши услуги</a></h5>
                            <ul style="list-style: inside;"><li>Выезд дизайнера на дом</li>
                                <li>Дизайн штор в интерьере</li>
                                <li>Пошив штор и покрывал</li>
                                <li>Комплексный текстильный дизайн</li>
                                <li>Подбор карниза</li>
                                <li>Совместный выбор тканей</li>
                                <li>Утюжка и повес готовых штор</li></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span class="bottom-line"></span>
        <span class="bottom-right-corner"></span>
    </section>

<?= $this->render('//common/works') ?>
</div>
<!-- main content -->