<?php

use yii\helpers\Html;
use yii\helpers\Url;
use andreosoft\codemirror\Codemirror;
use common\themes\admin\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin([
    'options' => [
                'enctype' => 'multipart/form-data',
                'boxTitle' => $path,
                'buttonUndo' => Url::to(['index', 'rootAlias' => $rootAlias]),
        ],
    'fieldConfig' => [
        'template' => '<div class="col-sm-12">{label}{input}{error}</div>',
        'labelOptions' => ['class' => 'control-label'],
        ]
    ]);

?>
<?= $form->field($model, 'content')->widget(Codemirror::className(), [
    'editorOptions' => [
        'lineNumbers' => true,
        'matchBrackets' => true,
        'indentUnit' => 4,
        'indentWithTabs' => true,
        'mode' => 'application/x-httpd-php',
        ], 
    'editorHeight' => 800]) ?>
<?php ActiveForm::end(); ?>
