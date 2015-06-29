<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\modules\filemanager\models\File;

?>

<header class="menu-header navbar-fixed-top" role="banner">
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <!-- hamburger button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- / hamburger button -->

                <!-- Logo -->
                <?= Html::a(Html::img(File::thumb(Yii::$app->params['logo']['url'], Yii::$app->params['logo']['x'], Yii::$app->params['logo']['y'])), Yii::$app->homeUrl, ['class' => 'navbar-brand'])?>
                <!-- /Logo -->
            </div>
            <div class="collapse navbar-collapse">
                <!-- Main navigation -->
                <ul class="nav navbar-nav navbar-right" style="padding-top:8px;">
                    <li>
                        <?= Html::a('Главная', Yii::$app->homeUrl, ['class' => 'active has-sub-menu'])?>
                    </li>
                    <li> 
                        <?= Html::a('О нас', ['/content/site/view-by-url', 'url' => 'о_нас', 'view' => 'view'])?>
                    </li>
                    <li>
                        <?= Html::a('Услуги', ['/content/site/view-by-url', 'url' => 'Металлоконструкции', 'view' => 'view_uslugy'], ['class' => 'has-sub-menu'])?>
                    </li>
                    <li>
                        <?= Html::a('Наши работы', ['/catalog/site/index'], ['class' => 'has-sub-menu'])?>
                    </li>
                    <li>
                        <?= Html::a('Контакты', ['/content/site/view-by-url', 'url' => 'Контакты', 'view' => 'view'], ['class' => 'btn border small'])?>
                    </li>

                </ul>
                <!-- / End main navigation -->
            </div>


        </nav>
    </div>

</header>

