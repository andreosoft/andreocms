<?php

namespace common\modules\gallery\widgets;

use \yii\bootstrap\Widget;
use yii\helpers\Html;
use common\modules\gallery\models\Gallery;
use andreosoft\image\Image;

class getGallery extends \yii\widgets\ListView {
    
    public function renderItem($model, $key, $index) {
        
        $html  = Html::a(Html::img(Image::thumb($model['url'], 100, 100),  ['data-placeholder' => Image::thumb('', 100, 100)]), "", ['id' => "thumb-image-{$key}", 'data-toggle' => 'image', 'class' => 'img-thumbnail']);
        $html .= Html::hiddenInput(\yii\helpers\BaseHtml::getInputName($model, 'image'), $model['image'], ['id' => "input-image-{$key}"]);

        return $html;
    }
}