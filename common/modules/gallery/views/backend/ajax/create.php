<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\modules\gallery\models\Gallery */

$this->title = \Yii::t('gallery/main', 'Gallery');
?>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><?= $this->title ?></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <?=
                $this->render('ajax/_form', [
                    'model' => $model,
                    'options' => ['title' => '<i class="fa fa-pencil"></i> Create', 'buttonUndo' => Url::to(['index'])],
                ])
                ?>                
            </div>
        </div>
        <div class="modal-footer"></div>
    </div>
</div>