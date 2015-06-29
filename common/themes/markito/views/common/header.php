<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="top-header" >		
    <div class="container">
        <div class="top-head" >
            <div class="header-para">
                <ul class="social-in">
                    <li><a href="#"><i> </i></a></li>						
                    <li><a href="#"><i class="ic"> </i></a></li>
                    <li><a href="#"><i class="ic1"> </i></a></li>

                </ul>			
            </div>	

            <ul class="header-in">
                <?php foreach (Yii::$app->params['top-menu'] as $element):?>
                    <li><?= Html::a($element['text'], $element['url']) ?></li>
                <?php endforeach; ?>
            </ul>
            <div class="search-top">
                <div class="search">
                    <form method="get" action="<?= Url::to(Yii::$app->params['search']['url']) ?>">
                        <input type="text" value="Поиск" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'search about something ?';
                                                        }" >
                        <input type="submit" value="" >
                    </form>
                </div>
                <div class="world">
                    <ul >
                        <li><a href="#"><span> </span></a> </li>
                        <li><select class="in-drop">
                                <option>RU</option>
                            </select>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

