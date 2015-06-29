<?php

use common\modules\comments\widgets\getCommentsByUser;
use common\modules\catalog\widgets\getSimilar\getSimilar;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Иформация о продавце';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-columns container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="service">
                <div class="service__image"><img src="<?= Url::to('@webuploads/' . str_replace('.jpg', '-thumb-300.jpg', $modelUserProfile->image), true) ?>" alt="" /></div>
                <div class="service__right">
                    <div class="service__pretitle"><?= $modelUserProfile->type ?></div>
                    <div class="service__title"><?= $modelUserProfile->fullname ?></div>
                    <div class="service__fields">
                        <div class="service__field"><span class="service__field-portfolio"></span><strong>Время работы:</strong> <?= $modelUserProfile->workingtime ?></div>
                        <div class="service__field"><span class="service__field-phone"></span><strong>Тел:</strong> <?= $modelUserProfile->phone ?></div>
                        <div class="service__field"><span class="service__field-calendar"></span><strong>Интернет сайт:</strong> <?= $modelUserProfile->website ?></div>                        
                    </div>
                </div>
            </div>

            <ul class="nav nav-tabs" role="tablist">
                <li><a href="#tab-about" role="tab" data-toggle="tab">О себе</a></li>
                <li class="active"><a href="#tab-products" role="tab" data-toggle="tab">Список товаров</a></li>
                <li><a href="#tab-contacts" role="tab" data-toggle="tab">Контакты</a></li>
                <li><a href="#tab-reviews" role="tab" data-toggle="tab">Отзывы</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane" id="tab-about"><?= $modelUserProfile->about ?></div>
                <div class="tab-pane active" id="tab-products">
                    <div class="offer-list">
                        <div class="container-fluid">
                            <div class="row">
                                <?= LinkPager::widget(['pagination' => $pagination]) ?>
                                <?php foreach ($elements as $element): ?>
                                    <div class="products products-list">
                                        <div class="product">
                                            <div class="product__image"><a href="<?= Url::to(['/catalog/site/view', 'id' => $element->id]) ?>"><img src="<?= Url::to('@webuploads/' . str_replace('.jpg', '-thumb-200.jpg', $element->image), true) ?>" alt="" /></a></div>
                                            <div class="product__info">
                                                <div class="product__title"><a href="<?= Url::to(['/catalog/site/view', 'id' => $element->id]) ?>"><?= $element->title ?></a></div>
                                                <div class="product__price"><strong><?= $element->price ?></strong> сом. </div>
                                            </div>
                                            <div class="product__person">
                                                <?= $element->user_name ?>
                                                <div class="product__person-phone phone"><a href="#" class="dashed show-phone"> <span data-value="<?= $element->user_phone ?>"><?= $element->user_phone ?></span></a></div>
                                            </div>
                                        </div>
                                    </div> 
                                <?php endforeach; ?>
                                <?= LinkPager::widget(['pagination' => $pagination]) ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="tab-contacts">
                    <?= empty($modelUserProfile->country) ?  '' : $modelUserProfile->country.'<br>' ?>
                    <?= empty($modelUserProfile->state) ?  '' : $modelUserProfile->state.'<br>' ?>
                    <?= empty($modelUserProfile->zip) ?  '' : $modelUserProfile->zip.'<br>' ?>
                    <?= empty($modelUserProfile->city) ?  '' : $modelUserProfile->city.'<br>' ?>
                    <?= empty($modelUserProfile->address) ?  '' : $modelUserProfile->address ?>
                    <br><?= Html::a('Показать на карте', ['/users/site/pos-owner', 'id' => $modelUserProfile->user_id], ['class' => 'btn btn-primary']) ?>
                </div>
                <div class="tab-pane" id="tab-reviews"><?= getCommentsByUser::widget(['id' => $modelUserProfile->user_id]) ?></div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="sidebar-right">
                <?php // getSimilar::widget(['id' => $model->id]) ?>
            </div>
        </div>    
    </div>
</div>           