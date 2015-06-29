<?php
use common\modules\catalog\models\CatalogCategorys;
use common\modules\comments\widgets\getComments;
use common\modules\catalog\widgets\getSimilar\getSimilar;
use common\modules\gallery\widgets\getGalleryElements;
use yii\helpers\Url;
use yii\helpers\Html;
        
$this->title = $model->title;
if ($model->parent == 1) {
    $this->params['breadcrumbs'][] = ['label' => 'Каталог товаров', 'url' => ['index-by-category', 'parent' => $model->parent, 'category' => $model->category]];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'Каталог услуг', 'url' => ['index-by-category', 'parent' => $model->parent, 'category' => $model->category]];    
}
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-columns container-fluid">
    <div class="row">
        <div class="col-md-9">
            <?php if ($model->parent == 1) { ?>
                <div class="title"><?= $model->title ?></div>
                <div class="product-detail">
                    <div class="product-detail__gallery">
                        <?php if ($model->price_d > 0) : ?>
                            <div class="product-detail__image product-sticker-sale">
                                <img src="<?= Url::to('@webuploads/' . str_replace('.jpg', '-thumb-300.jpg', $model->image), true) ?>" alt="" />
                            </div>
                        <?php else :?> 
                            <div class="product-detail__image">
                                <img src="<?= Url::to('@webuploads/' . str_replace('.jpg', '-thumb-300.jpg', $model->image), true) ?>" alt="" />
                            </div>   
                        <?php endif ?> 
                        <div class="product-detail__previews">
                            <a href="<?= Url::to('@webuploads/' . str_replace('.jpg', '-thumb-300.jpg', $model->image), true)?>" class="active"><img src="<?= Url::to('@webuploads/' . str_replace('.jpg', '-thumb-58.jpg', $model->image), true) ?>" alt="" /></a>
                            <?= getGalleryElements::widget(['id' => $model->id])?>
                        </div>
                    </div>
                    <div class="product-detail__right">
                        <?php if ($model->price_d > 0) : ?>
                        <div class="product-detail__price">Старая цена: <strong style="font-size: 16pt;text-decoration: line-through;"><?= $model->price ?> сом.</strong></div>
                            <div class="product-detail__price">Новая цена: <strong class="highlight"><?= $model->price_d ?> сом.</strong></div>
                        <?php else :?>    
                            <div class="product-detail__price">Цена: <strong class="highlight"><?= $model->price ?> сом.</strong></div>
                        <?php endif ?>    
                        <div class="product-detail__person">
                            <?= $model->user_type ?><br />
                            <?= Html::a($model->user_name, ['/users/site/view', 'id' => $model->createdby]) ?>
                            <div class="product-detail__person-phone phone dashed "><?= $model->user_phone ?></div>
                        </div>
                        <div class="product-detail__summary">
                            <h2>Описание</h2>
                            <p><?= $model->content ?></p>
                        </div>
                    </div>
                </div>
                <?= getComments::widget(['id' => $model->id])?>
            <?php } else { ?>
                <div class="service">
                    <div class="service__image"><img src="<?= Url::to('@webuploads/' . str_replace('.jpg', '-thumb-300.jpg', $model->image), true) ?>" alt="" /></div>
                    <div class="service__right">
                        <div class="service__pretitle"><?= $model->user_type?></div>
                        <div class="service__title"><?= $model->user_name?></div>
                        <div class="service__fields">
                            <div class="service__field"><span class="service__field-portfolio"></span><strong>Сфера деятельности:</strong><?= CatalogCategorys::findOne($model->category)->name ?></div>
                            <div class="service__field"><span class="service__field-calendar"></span><strong>Опыт работы:</strong> <?= $model->description?></div>
                            <div class="service__field"><span class="service__field-phone"></span><strong>Тел:</strong> <?= $model->user_phone?></div>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs" role="tablist">
                    <li><a href="#service-about" role="tab" data-toggle="tab">О себе</a></li>
                    <li class="active"><a href="#service-portfolio" role="tab" data-toggle="tab">Портфолио</a></li>
                    <li><a href="#service-contacts" role="tab" data-toggle="tab">Контакты</a></li>
                    <li><a href="#service-reviews" role="tab" data-toggle="tab">Отзывы</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane" id="service-about"><?= $model->content?></div>
                    <div class="tab-pane active" id="service-portfolio">
                        <div class="offer-list">
                            <div class="container-fluid">
                                <div class="row">
                                    <?= getGalleryElements::widget(['id' => $model->id])?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="service-contacts"><?= $model->introtext?></div>
                    <div class="tab-pane" id="service-reviews"><?= getComments::widget(['id' => $model->id])?></div>
                </div>
            <?php } ?>
            
        </div>
        <div class="col-md-3">
            <div class="sidebar-right">
                <?= getSimilar::widget(['id' => $model->id])?>
            </div>
        </div>    
    </div>
</div>
</div>  

