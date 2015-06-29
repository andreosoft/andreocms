<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::$app->name;
?>
<section class="information" id="menu-info" style="margin-top:130px;">
    <div class="container">
        <div class="wrapp">

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
    </div>
</section>