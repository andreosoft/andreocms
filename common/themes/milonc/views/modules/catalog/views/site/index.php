<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\filemanager\models\File;

$this->title = \Yii::$app->name . ' - Наши работы';
?>

<header class="page-header main-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Наши работы</h1>
            </div>
        </div>
    </div>
</header>


<!-- portfolio -->
<section class="pt-medium pb-medium">
    <div class="container">
        <div class="row">
            <?php foreach ($elements as $model): ?>
            <!-- item -->
            <div class="col-md-3">
                <article class="mb">
                    <figure>
                        <div>
                            <?= Html::a(Html::img(File::thumb($model->image, 263, 263), ['class' => 'full-width']), ['view-by-url', 'url' => $model->seo_url])?>
                        </div>
                        <figcaption>
                            <h3><?= $model->name ?></h3>
                            <?= Html::a('Подробнее', ['view-by-url', 'url' => $model->seo_url], ['class' => 'btn default x-small'])?>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <!-- / item -->
            <?php endforeach; ?>
        </div>
    </div>
</section>