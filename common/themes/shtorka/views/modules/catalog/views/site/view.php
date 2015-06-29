<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\catalog\models\CatalogProducts;
use andreosoft\image\Image;
use common\modules\gallery\models\Gallery;

$this->title = $model->name;

$this->params['breadcrumbs'][] = ['label' => 'Наши Работы', 'url' => ['index', 'parent' => $model->parent]];
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

    <div class="kopa-area kopa-area-1">

        <div class="wrapper">

            <div class="row">

                <div class="col-md-8 col-sm-8 col-xs-12">

                    <div class="kopa-sync-portfolio-widget">

                        <div class="owl-carousel sync3">
                            <?php foreach (Gallery::findAll(['table_id' => $model->id, 'status' => Gallery::STATUS_PUBLISHED]) as $element): ?>

                            <div class="item">
                                <div class="entry-thumb">
                                    <?= Html::img(Image::thumb($element->image, 757, 413)) ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- carousel sync 3 -->

                    </div>
                    <!-- kopa sync portfolio widget -->

                </div>
                <!-- col-md-8 -->

                <div class="col-md-4 col-sm-4 col-xs-12">

                    <div class="kopa-por-des pt-20 mb-50">
                        <?= $model->content ?>
                    </div>

                </div>
                <!-- col-md-4 -->

            </div>
            <!-- row -->





        </div>
        <!-- wrapper -->

    </div>
    <!-- kopa area 1 -->  

<?= $this->render('//common/works') ?>

</div>