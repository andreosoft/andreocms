<?php
use yii\helpers\Url;
?>
$(document).ready(function() {
    var path = '';
    $.ajax({
        url: '<?= Url::to(['/filemanager/file/view', 'rootAlias' => $rootAlias])?>&path=' + path,
                dataType: 'html',
                success: function (html) {
                $('#file-block').html(html);
                }
    });
});
