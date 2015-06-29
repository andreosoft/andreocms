<?php

use yii\helpers\Url;
use yii\helpers\Html;


$this->title = Yii::$app->name  . ' - Спасибо!';
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
                <h4>Спасибо! Ваша заявка принята</h4>
            </div>

            </div>
        </div>

    </div>
</section>
<!-- End About Section -->
<!-- Divider -->
<hr class="mt-0 mb-0" />
<!-- End Divider -->

