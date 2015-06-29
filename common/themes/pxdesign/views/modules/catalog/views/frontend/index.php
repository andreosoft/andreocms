<?php

use yii\helpers\Html;
use yii\helpers\Url;
use andreosoft\image\Image;
use common\modules\catalog\models\CatalogProducts;

$this->title = 'Наши Работы';

$this->params['breadcrumbs'][] = $this->title;
/*
  $this->registerJS("
  function submitform()
  {
  document.forms['parent'].submit();
  }
  ", $this::POS_HEAD); */
?>

<div id="main-content"> 

    <section class="kopa-area kopa-area-4 pb-17">

        <span class="span-bg"></span>

        <div class="widget kopa-portfolio-2-widget">
            <div class="wrapper">
                <header class="style-1">
                    <h3 class="widget-title"><span>Наши </span>&nbsp;Работы</h3>
                    <?= $parent == 1 ?
                    '<p>В этом разделе фотографии наших работ объединены в проекты.</p> ' :
                    '<p>В этом разделе мы сделали подборку работ по типу помещений: гостиные, спальни, кухни, рестораны </p>'
                    ?>
                </header>
            </div>
            <!-- wrapper -->
            <div class="por-wrap">
                <div class="portfolio-container">
                    <ul class="portfolio-list-item clearfix">
                        <?php foreach ($elements as $model): ?>
                        <li class="por-item1">
                            <div class="entry-item">
                                <div class="entry-thumb">
                                    <?= Html::a(Html::img(Image::thumb($model->image, 336, 252)), ['view-by-url', 'url' => $model->seo_url])?>
                                </div>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <!-- portfolio-list-item -->
                </div>
            </div>                
        </div>
        <!-- widget --> 

        <span class="bottom-line"></span>
        <span class="bottom-right-corner"></span>
        <span class="bottom-left-corner"></span> 

    </section>

</div>
<!-- main content -->