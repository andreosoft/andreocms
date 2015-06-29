<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\content\models\frontend\Content;
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

<!-- Information Section -->
<section class="information" id="menu-info" style="margin-top:130px;">
    <div class="container">
        <div class="wrapp">

            <!-- Title -->
            <div class="row-fluid text-center title">
                <div class="divider"></div>
                <h1><?= $model->name?></h1>
                <p><?= $model->introtext?></p>
            </div>
            <div class="row-fluid">
                <?= $model->content?>
            </div>
            <div class="row-fluid text-center title" style="padding-top: 20px;">
                <div class="divider"></div>
                <h3>Другие работы</h3>
            </div>
            <div class="row-fluid">
            <?php foreach (Content::find()->where(['status' => Content::STATUS_PUBLISHED, 'class' => 'portfolio'])->andWhere('id <> '.$model->id)->limit(4)->orderBy('RAND()')->all() as $element):?>
                <div class="span3" style="margin-left:5px;">
                    <?= Html::a(Html::img(Image::thumb($element->image, 200, 500)), ['/content/frontend/view-class-by-url', 'url' => $element->seo_url, 'class' => $element->class])?>
                </div>
            <?php endforeach;?>    
            </div>
            <!-- End Title -->

        </div>
    </div>
</section>
<!-- End Information Section -->