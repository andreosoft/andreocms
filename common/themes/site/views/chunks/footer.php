<?php
use yii\helpers\Html;
use common\modules\catalog\widgets\getCategory\getCategory;
?>
<div class="footer__inner container">
    <div class="footer__right">
        <nav class="social__menu">
            <div class="social__menu-title">Наши страницы в:</div>
            <ul>
                <li class="fb"><a href="#">Facebook</a></li>
                <li class="vk"><a href="#">Вконтакте</a></li>
                <li class="ok"><a href="#">Одноклассники</a></li>
                <li class="yt"><a href="#">YouTube</a></li>
            </ul>
        </nav>
        <div class="footer__copyright">© 2014 Comfort, All rights reserved</div>
    </div>
    <div class="footer__left">

        <div class="footer__menu-table">
            <div class="footer__menu-row">

                <nav class="footer__menu">
                    <div class="footer__menu-title">Товары</div>
                    <?=getCategory::widget(['parent'=>1])?>                   
                </nav>

                <nav class="footer__menu">
                    <div class="footer__menu-title">Услуги</div>
                    <?=getCategory::widget(['parent'=>2])?>  
                </nav>

                <nav class="footer__menu">
                    <div class="footer__menu-title">О проекте</div>
                    <ul>
                        <li><?=Html::a('FAQ', ['/content/site/view-by-name', 'name' => 'faq'])?></li>
                        <li><?=Html::a('Как это работает?', ['/content/site/view-by-name', 'name' => 'how-it-do'])?></li>
                        <li><?=Html::a('Реклама на сайте', ['/content/site/view-by-name', 'name' => 'reklama'])?></li>
                        <li><?=Html::a('Помогите нам стать лучше', ['/content/site/view-by-name', 'name' => 'help-us'])?></li>                     
                    </ul>

                </nav>

            </div>
        </div>

    </div>
</div>
