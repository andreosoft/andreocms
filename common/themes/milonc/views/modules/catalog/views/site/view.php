<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\catalog\models\CatalogProducts;
use common\modules\filemanager\models\File;
use common\modules\gallery\models\Gallery;

$this->title = \Yii::$app->name . ' - ' . $model->name;
?>
<header class="page-header main-color">
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <?= Html::a('Назад', ['index'], ['class' => 'btn small primary']) ?>
            </div>
            <div class="col-md-11 text-right">
                <h1><?= $model->name ?></h1>
            </div>
        </div>
    </div>
</header>

<section class="pt-medium pb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="owl-carousel neko-data-owl" data-neko_items="1" data-neko_singleitem="true" data-neko_paginationnumbers="true" data-neko_transitionstyle="fadeUp">
                    <?php foreach (Gallery::findAll(['table_id' => $model->id, 'status' => Gallery::STATUS_PUBLISHED]) as $element): ?>
                        <div class="item">
                            <?= Html::img(File::thumb($element->image, 750, 500), ['alt' => 'image', 'class' => 'full-width']) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-4">
                <h2><?= $model->name ?></h2>
                <?= $model->introtext ?>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
</section>
<section class="pt-medium pb-medium light-color">
    <div class="container">
        <div class="row">
            <?= $model->content ?>
        </div>
    </div>
</section>

<!-- works -->
<section  class="pb-medium pt-medium">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-medium heading">
                <h1>Другие наши объекты</h1>
            </div>
        </div>
        <div class="row">
            <?php foreach (CatalogProducts::find()->where(['status' => CatalogProducts::STATUS_PUBLISHED])->orderBy('RAND()')->limit(4)->all() as $model): ?>
                <div class="col-sm-6 col-md-3" style="padding: 3px 5px 3px 5px;">
                    <article class="item box padding-small">
                        <figure>
                            <div>
                                <?= Html::img(File::thumb($model->image, 249, 249), ['class' => 'full-width']) ?>
                            </div>
                            <figcaption>
                                <h3><?= $model->name ?></h3>
                                <p class="small">
                                    <?= $model->introtext ?>
                                </p>
                                <?= Html::a('Подробнее', ['/catalog/site/view-by-url', 'url' => $model->seo_url], ['class' => 'btn default x-small']) ?>
                            </figcaption>
                        </figure>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- works -->