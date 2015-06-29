<?php

use yii\helpers\Html;
use yii\helpers\Url;
use andreosoft\image\Image;
use common\modules\catalog\models\CatalogProducts;

$this->title = \Yii::$app->name . ' - Наши Модели';


$this->registerJS("
function submitform()
{
    document.forms['parent'].submit();
}       
", $this::POS_HEAD);
?>
<!-- Head Section -->
<section class="small-section bg-dark-alfa-90 parallax-2" style="margin-top:75px;" data-background="<?= Yii::$app->assetManager->publish('@common/themes/samidel/assets/images/photo_for_template/4.jpg')[1] ?>">
    <div class="relative container align-left">

        <div class="row">

            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Наши Модели</h1>
                <div class="hs-line-4 font-alt">
                    Lorem ipsum
                </div>
            </div>

        </div>

    </div>
</section>
<!-- End Head Section -->

<!-- Divider -->
<hr class="mt-0 mb-0 "/>
<!-- End Divider -->

<!-- Section -->
<section class="small-section">
    <div class="container relative">

        <div class="row">

            <!-- Content -->
            <div class="col-sm-12">

                <!-- Shop options -->
                <div class="clearfix mb-40">

                    <div class="left section-text mt-10">
                        Выберете коллекцию:
                    </div>

                    <div class="right">
                        <form method="get" id="parent" action="<?= Url::to(['index'])?>" class="form">
                            <select name="parent" class="input-md round" onchange="javascript: submitform()">
                            <?php foreach (CatalogProducts::findAll(['parent' => 0, 'isparent' => true, 'status' => CatalogProducts::STATUS_PUBLISHED]) as $element):?>
                                <option value="<?= $element->id?>" <?= $parent == $element->id ? 'selected="selected"' : ''?>>
                                    <?= $element->name?>
                                </option>
                            <?php endforeach;?>
                            </select>
                        </form>
                    </div>

                </div>
                <!-- End Shop options -->

                <div class="row multi-columns-row">
                <?php foreach ($elements as $model): ?>
                    <!-- Shop Item -->
                    <div class="col-md-3 col-lg-3 mb-60 mb-xs-40">
                        <div class="post-prev-img">
                            <?= Html::a(Html::img(Image::thumb($model->image, 370, 472)), ['view-by-url', 'url' => $model->seo_url])?>
                        </div>
                        <div class="post-prev-title font-alt align-center">
                            <?= Html::a($model->name, ['view-by-url', 'url' => $model->seo_url])?>
                        </div>
                    </div>
                    <!-- End Shop Item -->
                <?php endforeach;?>
            </div>
        </div>
        <!-- End Content -->
    </div>
</div>
</section>
<!-- End Section -->