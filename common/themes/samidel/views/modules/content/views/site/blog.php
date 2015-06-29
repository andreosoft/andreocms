<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\content\models\Content;
use common\modules\gallery\models\Gallery;
use andreosoft\image\Image;
$this->title = \Yii::$app->name . ' - ' . $model->name;
?>

<!-- Head Section -->
<section class="small-section bg-dark-alfa-90 parallax-2" style="margin-top:75px;" data-background="<?= Yii::$app->assetManager->publish('@common/themes/samidel/assets/images/photo_for_template/4.jpg')[1] ?>">
    <div class="relative container align-left">

        <div class="row">

            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Интересное</h1>
                <div class="hs-line-4 font-alt">
                    Последние новости бренда и моды
                </div>
            </div>

        </div>

    </div>
</section>
<!-- End Head Section -->

<!-- Section -->
<section class="small-section">
    <div class="container relative">

        <div class="row">

            <!-- Content -->
            <div class="col-sm-10 col-sm-offset-1">

                <!-- Post -->
                <div class="blog-item mb-80 mb-xs-40">

                    <!-- Text -->
                    <div class="blog-item-body">

                        <h1 class="mt-0 font-alt"><?= $model->name?></h1>

                        <div class="lead">
                            <p><?= $model->introtext?></p>
                        </div>
                        <!-- End Text -->   

                        <!-- Media Gallery -->
                        <div class="blog-media mt-40 mb-40 mb-xs-30">
                            <ul class="clearlist content-slider">
                            <?php foreach (Gallery::find()->where(['table_id' => $model->id, 'table_name' => 'content', 'status' => Gallery::STATUS_PUBLISHED])->orderBy('sort asc')->all() as $element): ?>    
                                <li><?= Html::img(Image::thumb($element->image, 945, 532))?></li
                            <?php endforeach;?>
                            </ul>
                        </div>

                        <p><?= $model->content?></p>

                    </div>
                    <!-- End Text -->
                </div>
                <!-- End Post -->
                <!-- Prev/Next Post -->
                <div class="clearfix mt-40">
                    <?php 
                        $seo_url = Content::find()
                                ->where(['class' => $model->class, 'status' => Content::STATUS_PUBLISHED])
                                ->orderBy('publishedon desc')
                                ->one()
                                ->seo_url;
                        if ($seo_url != $model->seo_url) {
                            echo Html::a('<i class="fa fa-angle-left"></i>&nbsp;Предыдущая новость', ['view-by-url', 'url' => $seo_url, 'view' => 'blog'], ['class' => 'blog-item-more left']);
                        }  
                        
                        $seo_url = Content::find()
                                ->where(['class' => $model->class, 'status' => Content::STATUS_PUBLISHED])
                                ->orderBy('publishedon asc')
                                ->one()
                                ->seo_url;
                        if ($seo_url != $model->seo_url) {
                            echo Html::a('Следующая новость &nbsp;<i class="fa fa-angle-right"></i>', ['view-by-url', 'url' => $seo_url, 'view' => 'blog'], ['class' => 'blog-item-more right']);
                        }                          
                    ?>
                </div>
                <!-- End Prev/Next Post -->

            </div>
            <!-- End Content -->

        </div>

    </div>
</section>
<!-- End Section -->