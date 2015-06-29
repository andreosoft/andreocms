<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\content\models\Content;
use common\modules\gallery\models\Gallery;
use andreosoft\image\Image;

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->seo_description
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $model->seo_keyword
]);
$this->registerMetaTag([
    'name' => 'title',
    'content' => $model->seo_title != '' ? $model->seo_title : $model->name
]);
?>
<div id="main-content"> 

    <section class="kopa-area kopa-area-4 pb-17">

        <span class="span-bg"></span>

        <div class="widget kopa-portfolio-2-widget">
            <div class="wrapper">
                <header class="style-1">
                    <h3 class="widget-title"><span>Наши </span>&nbsp;Работы</h3>
                    <p>В этом разделе мы подобрали фотографии, которые нашли в интернете. Это не наши работы, но мы посчитали их интересными с точки зрения дизайна.</p> 
                </header>
            </div>
            <!-- wrapper -->
            <div class="por-wrap">
                <div class="portfolio-container">
                    <ul class="portfolio-list-item clearfix">
                        <?php foreach (Gallery::findAll(['table_id' => $model->id, 'status' => Gallery::STATUS_PUBLISHED]) as $element): ?>
                            <li class="por-item1">
                                <div class="entry-item">
                                    <div class="entry-thumb">
                                        <a class="thumb-hover"></a>
                                        <?= Html::img(Image::thumb($element->image, 336, 252)) ?>
                                        <?= Html::a('<span class="fa fa-expand"></span>', Image::thumb($element->image, 600, 400), ['class' => 'popup-icon style1 cboxElement']) ?>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
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