<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="content">
            <h1><?= $model->title ?></h1>
            <?php empty($model->introtext) ? '' : print '<p>'.$model->introtext.'</p>'?>
            <?php empty($model->image) ? '' : print '<p>'.Html::img(Url::to('@webuploads' . $model->image, true), ['class' => 'img-responsive']).'</p>'?>
            <p><?= $model->content ?></p>
        </div>
    </div>
</div>