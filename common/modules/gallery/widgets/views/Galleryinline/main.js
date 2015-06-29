<?php 
use \yii\helpers\Url;
?>
$(document).ready(function() {
    $.ajax({
        url: '<?= Url::to(['/gallery/admin/index'])?>&render=ajax/index&ajax=true',
                data: {
                    GallerySearch: {
                        table_name: '<?= $options['table_name']?>', 
                        table_id: '<?= $options['table_id']?>',
                    },
                },
                dataType: 'html',
                beforeSend: function () {
//                $('#button-image i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
//                        $('#button-image').prop('disabled', true);
                },
                complete: function () {
//                $('#button-image i').replaceWith('<i class="fa fa-upload"></i>');
//                        $('#button-image').prop('disabled', false);
                },
                success: function (html) {
                $('#<?= $id?>').append(html);
                }
        });
    $('#<?=$id?>').on('click', 'a#button-update', function(e) {
        $('#modal-edit').remove();
        e.preventDefault();
        var self = this;
        $.ajax({
            url: $(self).attr('href'),
            dataType: 'html',
            cache: false,
            type: 'post',
            data: {ajax: true},
            success: function(html) {
                $('body').append('<div id="modal-edit" class="modal">' + html + '</div>');
                $('#modal-edit').modal('show');
            },
        });
    });
        
});
