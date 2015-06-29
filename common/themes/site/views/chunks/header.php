<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?=Html::a('Comfort', ['/site/default/index'], ['class' => 'header__logo'])?>
            <div class="header__right">
                <?=Html::a('+ Разместить объявление', ['/catalog/site/create'], ['class' => 'btn btn-primary'])?>
            </div>
            <form class="header__search" method="get" action="<?= Url::to(['/catalog/site/search'])?>">
                <div class="header__search-inner">
                    <input type="text" class="form-control" placeholder="Что ищем?" name="q" />
 <?php /*                   <div class="header__search-dropdown dropdown"><a href="#" class="dropdown-toggle" id="dropdownMenu-search" data-toggle="dropdown">Выбрать раздел</a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu-search">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Товары</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Услуги</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Интересное</a></li>
                        </ul>
                    </div>*/ ?>
                    <button type="submit">Поиск</button>
                </div>
            </form>
            <div class="clear"></div>
        </div>
    </div>
</div>

