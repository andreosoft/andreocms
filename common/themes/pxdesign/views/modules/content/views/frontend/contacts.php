<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = \Yii::$app->name . ' - ' . $model->name;


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
                <h1><?= $model->name ?></h1>
            </div>
            <div class="row-fluid text-left">
                <div class="row" style="padding-bottom: 20px;">
                    <div class="span6">
                        <?= $model->content?>
                    </div>
                    <div class="span6">
                        <?= $model->introtext?>
                    </div>
                </div>

            </div>
            <!-- End Title -->

        </div>
    </div>
</section>
<!-- End Information Section -->