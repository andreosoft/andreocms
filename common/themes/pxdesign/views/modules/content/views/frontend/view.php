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

<!-- Information Section -->
<section class="information" id="menu-info" style="margin-top:130px;">
    <div class="container">
        <div class="wrapp">

            <div class="divider"></div>
            <div class="row-fluid text-center title">
                <h1><?= $model->name?></h1>
            </div>
            <div class="row-fluid text-left">
                <p style="color:#23313a; margin-bottom: 15px;"><?= $model->content?></p>
            </div>
            <!-- End Title -->

        </div>
    </div>
</section>
<!-- End Information Section -->