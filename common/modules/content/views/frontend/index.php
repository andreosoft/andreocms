<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use common\modules\content\widgets\getContent;

?>
<div class="row">
    <div class="col-md-9">
        <div class="content">
            <div class="title">Новости</div>
            <div class="news">
                <?= LinkPager::widget(['pagination' => $pagination]) ?>
                <?php foreach ($elements as $element): ?>
                    <div class="news__item">
                        <div class="news__item-image"><a href="<?=Url::to(['/content/site/view', 'id' => $element->id])?>"><img src="<?=Url::to('@webuploads/' . str_replace('.jpg', '-thumb-120.jpg', $element->image), true)?>" alt="" /></a></div>
                        <div class="news__item-right">
                            <div class="news__item-date"><?php
                                $data = new DateTime($element->publishedon);
                                echo $data->format('d.m.Y')?>
                            </div>
                            <div class="news__item-title"><?= Html::a($element->title, ['/content/site/view', 'id' => $element->id]) ?></div>
                            <div class="news__item-summary">
                                <p><?= $element->introtext ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="sidebar-right">
            <?=getContent::widget([
                'idc' =>3,
            ])?>            
        </div>
    </div>
</div>
<?= LinkPager::widget(['pagination' => $pagination]) ?>