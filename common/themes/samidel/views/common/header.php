<?php
use yii\helpers\Url;
?>

<!-- Navigation panel -->
<nav class="main-nav stick-fixed">
    <div class="full-wrapper relative clearfix">
        <!-- Logo ( * your text or image into link tag *) -->
        <div class="nav-logo-wrap local-scroll">
            <a href="<?= \Yii::$app->homeUrl?>" class="logo">
                <img src="<?= \Yii::$app->assetManager->publish('@common/themes/samidel/assets/images/imgo.png')[1]?>" alt="IN" />
            </a>
        </div>
        <div class="mobile-nav">
            <i class="fa fa-bars"></i>
        </div>

        <!-- Main Menu -->
        <div class="inner-nav desktop-nav">
            <ul class="clearlist">
                <li> 
                    <a href="<?= Url::to(\Yii::$app->homeUrl)?>" class="mn-has-sub <?= \Yii::$app->request->url === \Yii::$app->homeUrl ? 'active' : ''?>">Главная</a>
                </li>
                <li>
                    <a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'о-бренде', 'view' => 'view'])?>" class="mn-has-sub <?= \Yii::$app->request->url === Url::to(['/content/site/view-by-url', 'url' => 'о-бренде', 'view' => 'view']) ? 'active' : ''?>">О Бренде</a>
                </li>
                <li>
                    <a href="<?= Url::to(['/catalog/site/index', 'parent' => 4])?>" class="mn-has-sub <?= \Yii::$app->request->url === Url::to(['/catalog/site/index']) ? 'active' : ''?>">Наши Модели</a>
                </li>
                <li>
                    <a href="<?= Url::to(['/content/site/index', 'class' => 'blog'])?>" class="mn-has-sub <?= \Yii::$app->request->url === Url::to(['/content/site/index']) ? 'active' : ''?>">Интересное</a>
                </li>
                <li>
                    <a href="<?= Url::to(['/content/site/view-by-url', 'url' => 'бутики', 'view' => 'contacts'])?>" class="mn-has-sub <?= \Yii::$app->request->url === Url::to(['/content/site/view-by-url', 'url' => 'бутики', 'view' => 'view']) ? 'active' : ''?>">Бутики</a>
                </li>
            </ul>
        </div>
        <!-- End Main Menu -->


    </div>
</nav>
<!-- End Navigation panel -->

