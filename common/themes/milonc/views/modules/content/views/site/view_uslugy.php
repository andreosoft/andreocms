<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\content\models\Content;
use common\modules\filemanager\models\File;

$this->title = \Yii::$app->name . ' - ' . $model->name;
?>

<header class="page-header main-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Услуги - <?= $model->name ?></h1>
            </div>
        </div>
    </div>
</header>

<!-- page -->
<section class="pt-medium pb-medium">
    <div class="container">
        <div class="row">
            <!-- sub menu -->
            <aside id="sidebar" class="col-md-3">
                <nav class="sidebar-menu mb-xs">
                    <ul>
                        <?php foreach (Content::findAll(['class' => 'uslugy', 'status' => Content::STATUS_PUBLISHED]) as $element): ?>
                            <li><?= Html::a($element->name, ['/content/site/view-by-url', 'url' => $element->seo_url, 'view' => 'view_uslugy'], ['class' => $element->id==$model->id?'active':'']) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </aside>
            <!-- / sub menu -->
            <!-- content -->
            <section class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <?= Html::img(File::thumb($model->image, 847, 370), ['alt' => 'image', 'class' => 'img-responsive mb']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <h2><?= $model->name ?></h2>
                        <?= $model->introtext ?>
                        <hr>
                        <?= $model->content ?>
                    </div>
                </div>
            </section>
            <!-- / content -->
        </div> <!-- row -->
    </div> <!-- container -->
</section>
<!-- page -->