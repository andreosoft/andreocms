<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use andreosoft\image\Image;
use common\modules\content\models\Content;

$this->title = 'Наши работы';

$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag([
  'name' => 'description',
  'content' => ''//$model->seo_description
  ]);
  $this->registerMetaTag([
  'name' => 'keywords',
  'content' => ''//$model->seo_keyword
  ]);
  $this->registerMetaTag([
  'name' => 'title',
  'content' => ''//$model->seo_title != '' ? $model->seo_title : $model->name
  ]); 
?>

<!-- Information Section -->
<section class="information" id="menu-info" style="margin:130px 0 80px 0;">
    <div class="container">
        <div class="wrapp">

            <!-- Title -->
            <div class="row-fluid text-center title">
                <div class="divider"></div>
                <h1><?= $this->title?></h1>
                <?php foreach ($elements as $model): ?>
                <div class="span4" style="margin-left:0;">
                    <?= Html::a(Html::img(Image::thumb($model->image, 200, 500)).'<div style="font-size: 14px;">'.$model->name.'</div>', ['view-by-url', 'url' => $model->seo_url]) ?>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- End Title -->
        </div>
    </div>
</section>
<!-- End Information Section -->