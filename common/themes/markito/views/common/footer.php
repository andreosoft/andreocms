<?php

use yii\helpers\Html;
use common\modules\catalog\widgets\getCategory\getCategory;
?>
<div class="container">
    <div class="col-md-3 footer-left">
        <a href="index.html"><img src="images/logo.png" alt=""></a>
        <p class="footer-class"><?= Yii::$app->params['footer-credits']['text']?></p>
    </div>
    <div class="col-md-2 footer-middle">
        <ul>
                <?php foreach (Yii::$app->params['footer-menu']['1'] as $element):?>
                    <li><?= Html::a($element['text'], $element['url']) ?></li>
                <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-md-4 footer-left-in">
        <ul class="term">
                <?php foreach (Yii::$app->params['footer-menu']['2'] as $element):?>
                    <li><?= Html::a($element['text'], $element['url']) ?></li>
                <?php endforeach; ?>	
        </ul>
        <ul class="term">
                <?php foreach (Yii::$app->params['footer-menu']['3'] as $element):?>
                    <li><?= Html::a($element['text'], $element['url']) ?></li>
                <?php endforeach; ?>

        </ul>
        <div class="clearfix"> </div>
    </div>
    <div class="col-md-3 footer-right">
        <h5>WE SUPPORT</h5>
        <ul>
            <li><a href="#"><i> </i></a> </li>
            <li><a href="#"><i class="we"> </i></a></li>
            <li ><a href="#" ><i class="we-in"> </i></a></li>
            <li ><a href="#" ><i class="we-at"> </i></a></li>
            <li ><a href="#" ><i class="we-at-at"> </i></a></li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>

<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
