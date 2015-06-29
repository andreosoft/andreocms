<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\content\models\Content;
use common\modules\gallery\models\Gallery;
use andreosoft\image\Image;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Блог', 'url' => ['index', 'class' => 'blog']];
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

    <section class="kopa-area-1 pt-70">

        <div class="wrapper">

            <div class="row">

                <div class="kopa-main-col col-md-9 col-sm-12 col-xs-12">

                    <div class="widget kopa-entry-post">

                        <article class="entry-item">
                            <div class="entry-thumb">
                                <?= Html::img(Image::thumb($model->image, 819, 404))?>
                            </div>
                            <div class="entry-content">
                                <h4 class="entry-title"><?= $model->name?></h4>
                                <p><?= $model->introtext?></p>
                                <p><?= $model->content?></p>
                            </div>
                        </article> 
                        <!-- entry item -->
                        <div class="kopa-divide"></div>

                    </div>

                </div>
                <!-- main column -->

                <div class="sidebar col-md-3 col-sm-12">

                    <div class="widget kopa-article-list-widget article-list-1">
                        <h3 class="widget-title style3">Читайте также:</h3>
                        <ul class="clearfix">
                       <?php foreach (Content::find()->where(['status' => Content::STATUS_PUBLISHED, 'class' => 'blog'])->andWhere('id <> '.$model->id)->limit(5)->orderBy('RAND()')->all() as $model) : ?>
                            <li>
                                <article class="entry-item clearfix">
                                    <div class="entry-thumb">
                                        <?= Html::a(Html::img(Image::thumb($model->image, 76, 76)), ['view-by-url', 'url' => $model->seo_url, 'view' => 'blog']) ?>
                                    </div>
                                    <div class="entry-content">
                                        <h6 class="entry-title style1"><?= Html::a($model->name, ['view-by-url', 'url' => $model->seo_url, 'view' => 'blog']) ?><span></span></h6>
                                        <span class="entry-date"><i class="fa fa-calendar"></i><?= $model->publishedondate ?></span>
                                    </div>
                                </article>
                                <!-- entry-item -->
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- /.article-list-1 -->

                </div>
                <!-- sidebar -->

            </div>
            <!-- row -->

        </div>
        <!-- wrapper -->

    </section>
    <!--  kopa area 1 -->

</div>
<!-- main content -->