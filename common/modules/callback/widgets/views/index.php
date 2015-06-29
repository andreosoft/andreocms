<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->registerJs("
$('#{$id}').submit(function (e) {
    e.preventDefault();
    var modal = $('#{$id}');
    var form = modal.children('form');
    var data = form.serialize()+'&ajax=true';
    var action = form.attr('action');
    $.post(action, data, function(data) {
        modal.find('.modal-content').html(data);
        return false;
    });
    return false;
});

");
?>
<!-- Modal -->
<div class="modal fade" id="<?= $id?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel-<?= $id?>" aria-hidden="true">
<?php $form = ActiveForm::begin(['action' => Url::to(['/callback/site/create'])]); ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel-<?= $id?>">Мы вам перезвоним</h4>
            </div>
            <div class="modal-body">
                <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
                <?= $form->field($model, 'phone')->textInput(['maxlength' => 255]) ?>
                <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>    
</div>