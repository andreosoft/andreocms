<?php

use yii\helpers\Url;
use yii\helpers\Html;
use andreosoft\image\Image;
use common\modules\content\models\Content;
use common\modules\catalog\models\CatalogProducts;

$this->title = Yii::$app->name;

  $this->registerMetaTag([
  'name' => 'description',
  'content' => ''
  ]);
  $this->registerMetaTag([
  'name' => 'keywords',
  'content' => ''
  ]);
  $this->registerMetaTag([
  'name' => 'title',
  'content' => $this->title
  ]);
 
?>
<!-- Features Section -->
<section class="features generic animated fadeInUp delay3" id="menu-features">  
    <div class="container">
        <div class="wrapp">

            <!-- Title -->
            <div class="row-fluid text-center title">
                <div class="divider"></div>
                <h1>Разработка сайтов</h1>
                <p>Мы разрабатываем легкие, быстрые, сайты с учетом всех современных требований и тенденций. Наши сайты одинаково хорошо работают как на больших десктопных дисплеях, так и на мобильных устройствах. Удобство управления всегда продумывается на самом начальном этапе разработки. Мы не используем популярные CMS, а работаем на по-настоящему мощном фреймворке Yii2, который считается эталоном производительности. Среди наших собственных разработок имеются решения, которые позволяют быстро создавать сайты различной сложности, от информационных сайтов компаний до больших интернет магазинов и порталов с элеменами социальных сетей.</p>
            </div>
            <!-- End Title -->

            <div class="row-fluid">
                <div class="span6">
                    <div class="item">
                        <h2 class="pull-left"> <img src="<?= \Yii::$app->assetManager->publish('@common/themes/pxdesign/assets/img/features-screen.png')[1] ?>" alt="icon" class="pull-left">  Разработка сайтов</h2>
                        <p>Разработка красивых и быстрых сайтов с учетом всех ваших пожеланий. В итоге Вы получаете индивидуально разработанный сайт, соответствующий всем Вашим ожиданиям и требованиям. <a href="<?= Url::to(['/content/frontend/view-by-url', 'url' => 'Разработка_сайтов'])?>">Подробнее...</a></p></p>
                    </div>
                    <div class="item">
                        <h2 class="pull-left"> <img src="<?= \Yii::$app->assetManager->publish('@common/themes/pxdesign/assets/img/features-showcase.png')[1] ?>" alt="icon" class="pull-left">  Поисковая оптимизация</h2>
                        <p>Наша задача - сделать так, чтобы поисковики высоко оценивали Ваш сайт и правильно определяли ключевые слова для каждой страницы сайта. Высокие позиции в поиске обеспечивают приток потенциально заинтересованных посетителей. <a href="<?= Url::to(['/content/frontend/view-by-url', 'url' => 'Поисковая_оптимизация'])?>">Подробнее...</a></p></p> 
                    </div>        
                </div>

                <div class="span6">
                    <div class="item">
                        <h2 class="pull-left"> <img src="<?= \Yii::$app->assetManager->publish('@common/themes/pxdesign/assets/img/features-screen.png')[1] ?>" alt="icon" class="pull-left"> Контекстная реклама</h2>
                        <p>Контекстная реклама - современная рекламная технология, которая позволяет показывать рекламу человеку в зависимости от его интересов. По эффективности в разы превосходит классические оффлайн площадки. <a href="<?= Url::to(['/content/frontend/view-by-url', 'url' => 'Контекстная_реклама'])?>">Подробнее...</a></p> 
                    </div>
                    <div class="item">
                        <h2 class="pull-left"> <img src="<?= \Yii::$app->assetManager->publish('@common/themes/pxdesign/assets/img/features-support.png')[1] ?>" alt="icon" class="pull-left"> SMO и SMM</h2>
                        <p>Социальные сети - это такой же канал маркетинговых коммуникаций, как реклама на ТВ или участие в профильной выставке. Используя социальные сети, можно эффективно решать маркетинговые задачи и в разы увеличивать эффективность рекламы. <a href="<?= Url::to(['/content/frontend/view-by-url', 'url' => 'SMO_и_SMM'])?>">Подробнее...</a></p></p> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Features Section -->