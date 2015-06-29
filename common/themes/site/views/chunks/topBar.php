<?php

use yii\helpers\Html;
?>
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <nav class="top-bar__menu top-bar__menu-left">
                    <ul>
                        <li><?= Html::a('FAQ', ['/content/site/view-by-name', 'name' => 'faq']) ?></li>
                        <li><?= Html::a('Как это работает?', ['/content/site/view-by-name', 'name' => 'how-it-do']) ?></li>
                        <li><?= Html::a('Реклама на сайте', ['/content/site/view-by-name', 'name' => 'reklama']) ?></li>
                        <li><?= Html::a('Помогите нам стать лучше', ['/content/site/view-by-name', 'name' => 'help-us']) ?></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-4">
                <nav class="top-bar__menu top-bar__menu-right">
                    <ul>
                            <?php if (Yii::$app->user->isGuest) : ?>
                            <li>
                                <?= Html::a('Войти', ['/users/site/login'], ['class' => 'top-bar__menu-slashed']) ?>
                                 / 
                            <?= Html::a('Регистрация', ['/users/site/signup'], ['class' => 'top-bar__menu-slashed']) ?>
                            </li>                            
                            <?php else : ?>                     
                            <li>
                                <?= Html::a('Личный кабинет', ['/users/site/index'], ['class' => 'top-bar__menu-slashed']) ?>
                                 / 
                            <?= Html::a('Выйти', ['/users/site/logout'], ['class' => 'top-bar__menu-slashed']) ?>
                            </li>
                            <?php endif; ?>                    
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
