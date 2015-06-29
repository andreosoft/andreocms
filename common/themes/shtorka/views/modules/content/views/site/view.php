<?php

use yii\helpers\Html;
use yii\helpers\Url;
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

    <section class="kopa-area kopa-area-1">

        <div class="wrapper">

            <div class="row">

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= Html::img(Image::thumb($model->image, 560, 343)) ?>
                </div>
                <!-- col-md-6 -->

                <div class="col-md-6 col-sm-6 col-xs-12">

                    <div class="widget widget_text">
                        <?= $model->content ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->render('//common/works') ?>
</div>
<!-- main content -->