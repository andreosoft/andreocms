<?php

use yii\helpers\Url;
?>

<aside id="above-bottom-sidebar">

    <span class="span-bg"></span>

    <div class="ab-bg">
        <div class="ab-bg-1"></div>
        <div class="ab-bg-2"></div>
        <div class="ab-bg-left"></div>
        <div class="ab-bg-right"></div>
    </div>

    <div class="wrapper">             

        <div class="widget kopa-contact-info-widget">
            <div class="footer-logo"><img alt="" src="<?= \Yii::$app->assetManager->publish('@common/themes/shtorka/assets/images/shtorka-logo2.png')[1] ?>">
            </div>
            <img alt="" src="<?= \Yii::$app->assetManager->publish('@common/themes/shtorka/assets/images/divider/divider-1.png')[1] ?>" class="divider-1">
            <div class="phone">
                <i class="fa fa-phone"></i>Звоните: <span>&nbsp;+996 (555) 310584</span><br>
                <i class="fa fa-envelope-o"></i> Пишите: <span>&nbsp;info@shtorka.kg</span>
            </div>
        </div>

    </div>

</aside>
<!-- above bottom sidebar -->

<footer id="kopa-footer">

    <div class="wrapper clearfix">
        <p><a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'Подборка+идей+дизайна+штор', 'view' => 'gallery']) ?>">Подборка идей дизайна штор</a></p>
        <p class="copyright">Copyright &copy; 2015. Студия "Шторка".<br> Все картинки на сайте - фото наших работ. Все права на материалы защищены.</p>
        <p class="copyright">Разработка сайта: <a href="#">PxDesign Studio</a>. Сайт работает на <a href="#">Andreo CMS</a></p>

    </div>
    <!-- wrapper -->

    <div class="back-to-top"><span>Начало</span></div>

</footer>
<!-- kopa footer -->