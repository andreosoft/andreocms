<?php

use yii\helpers\Html;
use common\modules\catalog\models\CatalogProducts;
use common\modules\content\models\Content;

?>
<!--markup footer-->
<footer id="footer" class="type_2">
    <div class="footer_top_part">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
                    <h3 class="color_light_2 m_bottom_20">Компани "Я-Свет"</h3>
                    <p class="m_bottom_15">Nam elit agna, endrerit sit amet, tincidunt ac, viverra sed, nulla. Donec porta diam eu massa. Quisque diam lorem.</p>
                    <p>Interdum vitae, dapibus ac, scelerisque.
                        vitae, pede. Donec eget tellus non erat lacinia fermentum. Donec in velit vel ipsum auctor pulvinar. </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
                    <h3 class="color_light_2 m_bottom_20">Каталог товаров</h3>
                    <ul class="vertical_list">
                        <?php foreach (CatalogProducts::findAll(['parent' => 0, 'isparent' => true, 'status' => CatalogProducts::STATUS_PUBLISHED]) as $model):?>
                            <?= Html::tag('li', Html::a($model->name.'<i class="fa fa-angle-right"></i>', ['/catalog/site/index', 'parent' => $model->id], ['class' => 'color_light tr_delay_hover']))?>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
                    <h3 class="color_light_2 m_bottom_20">Услуги</h3>
                    <ul class="vertical_list">
                        <?php foreach (Content::findAll(['class' => 'uslugy', 'status' => Content::STATUS_PUBLISHED]) as $model):?>
                            <?= Html::tag('li', Html::a($model->name.'<i class="fa fa-angle-right"></i>', ['/content/site/view-by-url', 'url' => $model->seo_url, 'view' => 'view'], ['class' => 'color_light tr_delay_hover']))?>
                        <?php endforeach;?>                        
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <h3 class="color_light_2 m_bottom_20">Контакты</h3>
                    <ul class="c_info_list">
                        <li class="m_bottom_10">
                            <div class="clearfix m_bottom_15">
                                <i class="fa fa-map-marker f_left"></i>
                                <p class="contact_e">890165 Воронеж,<br> Ул. Светлая 18 оф. 205.</p>
                            </div>
                        </li>
                        <li class="m_bottom_10">
                            <div class="clearfix m_bottom_10">
                                <i class="fa fa-phone f_left"></i>
                                <p class="contact_e">800-559-65-80</p>
                            </div>
                        </li>
                        <li class="m_bottom_10">
                            <div class="clearfix m_bottom_10">
                                <i class="fa fa-envelope f_left"></i>
                                <a class="contact_e color_light" href="mailto:#">info@isvet.ru</a>
                            </div>
                        </li>
                        <li>
                            <div class="clearfix">
                                <i class="fa fa-clock-o f_left"></i>
                                <p class="contact_e">Понедельник - Пятница: 09.00-20.00 <br>Суббота: 09.00-15.00<br> Воскресение: выходной</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--copyright part-->
    <div class="footer_bottom_part">
        <div class="container clearfix t_mxs_align_c">
            <p class="f_left f_mxs_none m_mxs_bottom_10">&copy; 2015 <span class="color_light">Компания "Я-Свет"</span>. Права на материалы защищены!</p>
            <ul class="f_right horizontal_list clearfix f_mxs_none d_mxs_inline_b">
                <li>Разработка сайта</li>
                <!--<li class="m_left_5"><img src="images/payment_img_5.png" alt=""></li>-->
            </ul>
        </div>
    </div>
</footer>