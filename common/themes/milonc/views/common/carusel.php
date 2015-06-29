<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use common\modules\content\models\Content;
use common\modules\filemanager\models\File;
?>

<!-- carousel -->
<section id="carousel" class="pt-medium pb-medium light-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel neko-data-owl" data-neko_items="1" data-neko_singleitem="true" data-neko_paginationnumbers="true" data-neko_transitionstyle="fade">
                    <!--item -->
                    <?php foreach (Content::findAll(['class' => 'carusel', 'status' => Content::STATUS_PUBLISHED]) as $element): ?>
                     <div class="item">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <?= Html::img(File::thumb($element->image, 457, 400), ['class' => 'img-responsive']) ?>
                            </div>

                            <div class="col-md-6 pt">
                                <h1><?= $element->name?></h1>
                                <?= $element->introtext?>
                            </div>
                        </div>
                    </div>                   
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / carousel -->