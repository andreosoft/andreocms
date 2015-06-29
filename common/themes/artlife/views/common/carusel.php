<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\modules\content\models\Content;
use andreosoft\image\Image;
?>
<!--slider with banners-->
<section class="container">
    <div class="row clearfix">

        <div class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_30">
            <div id="owl-demo" class="owl-carousel owl-theme">
                <?php foreach (Content::findAll(['class' => 'carusel', 'status' => Content::STATUS_PUBLISHED]) as $model): ?>
                <div class="item"><?= Html::img(Image::thumb($model->image, 1140, 416)) ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>