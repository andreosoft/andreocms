<?php

use common\modules\catalog\models\CatalogProducts;
use yii\helpers\Html;
use andreosoft\image\Image;
?>

<div class="wrapper" style="padding-top: 70px;">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="kopa-related-posts">
                <h3 class="widget-title style7">Недавние работы</h3>
                <div class="row">
                    <div style="opacity: 1; display: block;">

<?php foreach (CatalogProducts::find()->where(['parent' => 1, 'isparent' => false, 'status' => CatalogProducts::STATUS_PUBLISHED])->limit(3)->orderBy('publishedon desc')->all() as $model): ?>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="item">
                                    <article class="entry-item">
                                        <div class="entry-thumb">
                                            <div class="entry-thumb-inner">
                                                <?= Html::a('', ['/catalog/site/view-by-url', 'url' => $model->seo_url], ['class' => 'thumb-hover']) ?>
                                                <?= Html::img(Image::thumb($model->image, 303, 205)) ?>
                                            </div>
                                        </div>
                                        <div class="entry-content">
                                            <h4 itemtype="http://schema.org/Event" itemscope="" class="entry-title"><?= Html::a($model->name, ['/catalog/site/view-by-url', 'url' => $model->seo_url], ['itemprop' => 'name']) ?></h4>   
                                            <p><?= $model->introtext ?></p>
                                        </div>
                                    </article>
                                </div>
                            </div>
<?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>