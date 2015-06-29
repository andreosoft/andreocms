<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use andreosoft\image\Image;
use common\modules\content\models\Content;

$this->title = 'Интересное О Шторах';

$this->params['breadcrumbs'][] = $this->title;
/*
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
  ]); */
?>
<div id="main-content"> 

    <div class="wrapper">
        <div class="row">

            <div class="kopa-main-col col-md-9 pt-70">
                <!-- Pagination -->
                <?=
                LinkPager::widget([
                    'pagination' => $pagination,
                ])
                ?> 
                <div class="kopa-entry-list style1">
                    <ul>
                        <?php foreach ($elements as $model): ?>
                            <li class="sticky-post">
                                <article class="entry-item">
                                    <div class="entry-thumb">
                                        <?= Html::a(Html::img(Image::thumb($model->image, 819, 439)), ['view-by-url', 'url' => $model->seo_url, 'view' => 'blog']) ?>
                                    </div>
                                    <div class="inner">
                                        <div class="entry-box">
                                            <h2 class="entry-title"><?= Html::a($model->name, ['view-by-url', 'url' => $model->seo_url, 'view' => 'blog']) ?></h2>    
                                            <div class="entry-content">
                                                <p><?= $model->introtext ?></p>
                                                <a href="<?= Url::to(['view-by-url', 'url' => $model->seo_url, 'view' => 'blog']) ?>" class="more-link">Подробнее...</a>
                                            </div>
                                            <!-- /.entry-content -->
                                        </div>
                                        <!-- /.entry-box -->
                                    </div>
                                    <!-- /.inner -->
                                </article>
                                <!-- /.entry-item -->
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- /.kopa-entry-list -->
                <!-- Pagination -->
                <?=
                LinkPager::widget([
                    'pagination' => $pagination,
                ])
                ?> 
            </div>
            <!-- /.kopa-main-col -->

            <div class="sidebar col-md-3 pt-70">

                <div class="widget kopa-article-list-widget article-list-1">
                    <h3 class="widget-title style3">Популярное:</h3>
                    <ul class="clearfix">
                        <?php foreach (Content::find()->where(['status' => Content::STATUS_PUBLISHED, 'class' => 'blog'])->limit(5)->orderBy('views desc')->all() as $model) : ?>
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
            <!-- /.sidebar -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.wrapper -->
</div>
<!-- main content -->