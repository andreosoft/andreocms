<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\filemanager\models\File;
use common\modules\catalog\models\CatalogProducts;

$parentModel = CatalogProducts::findOne($parent);
$this->title = \Yii::$app->name . ' - ' . $parentModel->name;
$this->params['breadcrumbs'][] = $parentModel->name;
?>
<div class="content-top-blue">
    <h2 class="new"><?= $parentModel->name ?></h2>
    <div class="pink">
        <?php foreach ($elements as $element): ?>
            <div class="col-md-3 blue">	
                <?= Html::a(Html::img(File::thumb($element->image, 255, 255), ['class' => 'img-responsive']), ['view-by-url', 'url' => $element->seo_url])?>		 	
                <div class="grid_1 simpleCart_shelfItem">
                    <?= Html::a($element->name, ['view-by-url', 'url' => $element->seo_url], ['class' => 'cup item_add'])?>					
                </div>
            </div>           

    <?php endforeach; ?>
    </div>
</div>