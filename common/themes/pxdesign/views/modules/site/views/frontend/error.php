<?php

use yii\helpers\Url;
use yii\helpers\Html;
use andreosoft\image\Image;
use common\modules\content\models\Content;
use common\modules\catalog\models\CatalogProducts;

$this->title = Yii::$app->name;
?>

<!-- About Section -->
<section class="small-section" id="about">
    <div class="container relative">

        <h2 class="section-title font-alt align-left mb-70 mb-sm-40">
            <?= Html::encode($this->title) ?>
        </h2>

        <div class="section-text">
            <div class="row">

            <div class="alert alert-danger">
                <?= nl2br(Html::encode($message)) ?>
            </div>

            </div>
        </div>

    </div>
</section>
<!-- End About Section -->
<!-- Divider -->
<hr class="mt-0 mb-0" />
<!-- End Divider -->
