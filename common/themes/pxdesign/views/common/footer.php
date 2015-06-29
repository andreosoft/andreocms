<?php

use yii\helpers\Url;
?>
<!-- Footer Section -->
<footer>
    <div class="container">
        <div class="wrapp">

            <div class="row-fluid">
                <div class="span6 fitem">
                    <h2>ООО "Медиасистемы"</h2>

                    <p>Полный комплекс рекламы в интернете. Разработка сайтов и интернет магазинов с индивидуальным дизайном, либо на базе коммерческих (платных) шаблонов. Разработка лэндинг страниц.</p>
                </div>
                <div class="span6 fitem">
                    <h2>Наши контакты</h2>
                    <ul class="contact">
                        <li class="mail">info@pxdesign.ru</li>
                        <li class="tel"><a href="tel:+79649603257"><span style="font-size: 20px;">+7 (964) 960 3257</span></a></li>
                        <li class="address">Россия, г. Уфа, ул. Кольцевая 174</li>
                    </ul>
                    <!-- <a id="openmap" href="http://maps.google.com/?output=embed&amp;f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=London+Eye,+County+Hall,+Westminster+Bridge+Road,+London,+United+Kingdom&amp;hl=lv&amp;ll=51.504155,-0.117749&amp;spn=0.00571,0.016512&amp;sll=56.879635,24.603189&amp;sspn=10.280244,33.815918&amp;vpsrc=8&amp;hq=London+Eye&amp;radius=15000&amp;t=h&amp;z=17">
                        <img src="img/map-icon.png" alt="image" class="map"> -->
                    </a>
                </div>
            </div>

            <div class="row-fluid fitem">
                <div class="span6">
                    <h2>Ответы на вопросы</h2>
                    <ul class="faq">
                        <li><a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'faq'])?>"> <i class="icon-lifebuoy"></i> Что такое поисковая оптимизация?</a></li>
                        <li><a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'faq'])?>"> <i class="icon-lifebuoy"></i> Вы работаете по договору?</a></li>
                        <li><a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'faq'])?>"> <i class="icon-lifebuoy"></i> Какие гарантии Вы можете дать?</a></li>
                    </ul>
                </div>
                <div class="span6 fitem">
                    <h2>Платежная информация</h2>
                    <p>Мы принимаем оплату наличными, перечислением на расчетный счет, электронными платежными системами Webmoney и Яндекс Деньги.</p>
                </div>
            </div>

        </div>
    </div>
</footer>
<!-- End Footer Section -->


<!-- Copyright Section -->
<section class="copyright">
    <div class="container">
        <div class="wrapp">
            <div class="row-fluid">
                <div class="span6">
                    <h6>2015 ООО "Медиасистемы".<br /> Разработка и продвижение сайтов. Контекстная реклама.</h6>
                </div>
                <ul class="social span6">
                    <li title="Twitter" class="tooltip_hover"><a href="https://twitter.com/PxSeo" target="_blank"><i class="icon-twitter"></i></a></li>
                    <li title="Facebook" class="tooltip_hover"><a href="https://www.facebook.com/www.PxDesign.ru" target="_blank"><i class="icon-facebook"></i></a></li>
                    <!-- <li title="Linkedin" class="tooltip_hover"><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li title="Dribbble" class="tooltip_hover"><a href="#"><i class="icon-dribbble"></i></a></li> -->
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Copyright Section -->

<a href="#" class="scrollup"><i class="icon-up-open"></i></a>      