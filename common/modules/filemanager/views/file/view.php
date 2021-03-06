<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<div class="box box-primary">
    <div class="box-header with-border">
            <h3>
                <i class="fa fa-pencil"></i> <?= \Yii::t('filemanager/main', 'File Manager') ?>
            </h3>
        <div class="row">
            <div class="col-sm-6">
                <?= Html::a('<i class="fa fa-level-up"></i>', ['view', 'directory' => $parent, 'thumb' => $thumb, 'target' => $target, 'rootAlias' => $rootAlias], ['id' => 'fm-button-parent', 'class' => 'btn btn-default', 'data-toggle' => 'tooltip', 'title' => \Yii::t('filemanager/main', 'Parent folder')]) ?>
                <?= Html::a('<i class="fa fa-refresh"></i>', ['view', 'directory' => $current, 'thumb' => $thumb, 'target' => $target, 'rootAlias' => $rootAlias], ['id' => 'fm-button-refresh', 'class' => 'btn btn-default', 'data-toggle' => 'tooltip', 'title' => \Yii::t('filemanager/main', 'Refresh')]) ?>
                <?= Html::button('<i class="fa fa-upload"></i>', ['id' => 'fm-button-upload', 'class' => 'btn btn-primary', 'type' => 'button', 'data-toggle' => 'tooltip', 'title' => \Yii::t('filemanager/main', 'File Upload')]) ?>
                <?= Html::button('<i class="fa fa-folder"></i>', ['id' => 'fm-button-folder', 'class' => 'btn btn-default', 'type' => 'button', 'data-toggle' => 'tooltip', 'title' => \Yii::t('filemanager/main', 'Create Folder')]) ?>
<?= Html::button('<i class="fa fa-trash-o"></i>', ['id' => 'fm-button-delete', 'class' => 'btn btn-danger', 'type' => 'button', 'data-toggle' => 'tooltip', 'title' => \Yii::t('filemanager/main', 'Delete')]) ?>
            </div>
            <div class="col-sm-6">
                <div class="input-group">
                        <?= Html::input('text', 'search', '', ['class' => 'form-control', 'placeholder' => \Yii::t('filemanager/main', 'Search')]) ?>
                    <span class="input-group-btn">
<?= Html::button('<i class="fa fa-search"></i>', ['id' => 'fm-button-search', 'class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'type' => 'button', 'title' => \Yii::t('filemanager/main', 'Search')]) ?>
                    </span>
                </div>  
            </div>    
        </div>
    </div>
    <div class="box-body form-horizontal">
        <?php if (isset($files)): ?>
                        <?php foreach ($files as $file) { ?>
                        <div class="thumb" style="display: inline-block; width: 120px; height: auto; vertical-align: top;">
                            <?php if ($file['type'] == 'directory') : ?>
                                <div class="text-center">
                                    <?= Html::a('<i class="fa fa-folder fa-5x"></i>', ['view', 'directory' => $file['path'], 'thumb' => $thumb, 'target' => $target, 'rootAlias' => $rootAlias], ['class' => 'directory', 'style' => 'vertical-align: middle;']) ?>
                                </div>
                                <label class="text-center">
                                    <?= Html::input('checkbox', 'path[]', $file['path']) ?>
                                <?= $file['name']; ?>
                                </label>
                            <?php endif; ?>
                            <?php if ($file['type'] == 'edited') : ?>
                                <div class="text-center">
                                    <?= Html::a('<i class="fa fa-file fa-5x"></i>', ['update', 'path' => $file['path'], 'thumb' => $thumb, 'target' => $target, 'rootAlias' => $rootAlias], ['class' => 'file', 'style' => 'vertical-align: middle;']) ?>
                                </div>
                                <label class="text-center">
                                    <?= Html::input('checkbox', 'path[]', $file['path']) ?>
                                <?= $file['name']; ?>
                                </label>
                            <?php endif; ?>     
                            <?php if ($file['type'] == 'file') : ?>
                                <div class="text-center">
                                    <?= Html::tag('div', '<i class="fa fa-file fa-5x"></i>', ['class' => 'file', 'style' => 'vertical-align: middle;']) ?>
                                </div>
                                <label class="text-center">
                                    <?= Html::input('checkbox', 'path[]', $file['path']) ?>
                                <?= $file['name']; ?>
                                </label>
                            <?php endif; ?>                               
                            <?php if ($file['type'] == 'image') : ?>
                                    <?= Html::a(Html::img($file['thumb'], ['alt' => $image['name'], 'title' => $file['name']]), $file['href'], ['class' => 'thumbnail']) ?>
                                <label class="text-center">
                                    <?= Html::input('checkbox', 'path[]', $file['path']) ?>
                                <?= $file['name']; ?></label>
                            <?php endif; ?>
                        </div>
            <?php } ?>
<?php endif; ?>
        <div class="modal-footer"><?= LinkPager::widget(['pagination' => $pagination]) ?></div>
    </div>

</div>    


<script>
    $('a.thumbnail').on('click', function (e) {
        e.preventDefault();

<?php if ($thumb) { ?>
            $('#<?php echo $thumb; ?>').find('img').attr('src', $(this).find('img').attr('src'));
<?php } ?>

<?php if ($target) { ?>
            $('#<?php echo $target; ?>').attr('value', $(this).parent().find('input').attr('value'));
            $('#<?php echo $target; ?>').trigger('change');
<?php } else { ?>
            var range, sel = document.getSelection();

            if (sel.rangeCount) {
                var img = document.createElement('img');
                img.src = $(this).attr('href');

                range = sel.getRangeAt(0);
                range.insertNode(img);
            }
<?php } ?>

        $('#modal-image').modal('hide');
    });

    $('a.directory').on('click', function (e) {
        e.preventDefault();

        $('#file-block').load($(this).attr('href'));
    });

    $('.pagination a').on('click', function (e) {
        e.preventDefault();

        $('#file-block').load($(this).attr('href'));
    });

    $('#fm-button-parent').on('click', function (e) {
        e.preventDefault();

        $('#file-block').load($(this).attr('href'));
    });

    $('#fm-button-refresh').on('click', function (e) {
        e.preventDefault();

        $('#file-block').load($(this).attr('href'));
    });

    $('#fm-button-search').on('click', function () {
        var url = '<?= Url::to(['view', 'directory' => $current, 'rootAlias' => $rootAlias]) ?>';

        var filter_name = $('input[name=\'search\']').val();

        if (filter_name) {
            url += '&filter_name=' + encodeURIComponent(filter_name);
        }

<?php if ($thumb) { ?>
            url += '&thumb=' + '<?php echo $thumb; ?>';
<?php } ?>

<?php if ($target) { ?>
            url += '&target=' + '<?php echo $target; ?>';
<?php } ?>

        $('#file-block').load(url);
    });

    $('#fm-button-upload').on('click', function (e) {
        $('#form-upload').remove();

        $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input id="form-upload-input" type="file" name="File[file][]" value="" multiple="multiple"/></form>');

        $('#form-upload input[name=\'File[file][]\']').trigger('click');

        timer = setInterval(function () {
            if ($('#form-upload input[name=\'File[file][]\']').val() != '') {
                clearInterval(timer);
                $.ajax({
                    url: '<?= Url::to(['upload', 'directory' => $current, 'rootAlias' => $rootAlias]) ?>',
                    type: 'post',
                    dataType: 'json',
                    data: new FormData($('#form-upload')[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#fm-button-upload i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
                        $('#fm-button-upload').prop('disabled', true);
                    },
                    complete: function () {
                        $('#fm-button-upload i').replaceWith('<i class="fa fa-upload"></i>');
                        $('#fm-button-upload').prop('disabled', false);
                    },
                    success: function (json) {
                        if (json['error']) {
                            alert(json['error']);
                        }

                        if (json['success']) {
                            alert(json['success']);

                            $('#fm-button-refresh').trigger('click');
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
            }
        }, 1500);
    });


    $('#fm-button-folder').popover({
        html: true,
        placement: 'bottom',
        trigger: 'click',
        title: '<?= \Yii::t('filemanager/main', 'Folder Name') ?>',
        content: function () {
            html = '<div class="input-group">';
            html += '  <input type="text" name="folder" value="" placeholder="<?= \Yii::t('filemanager/main', 'Folder Name') ?>" class="form-control">';
            html += '  <span class="input-group-btn"><button type="button" title="<?= \Yii::t('filemanager/main', 'New Folder') ?>" id="fm-button-create" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></span>';
            html += '</div>';

            return html;
        }
    });

    $('#fm-button-folder').on('shown.bs.popover', function () {
        $('#fm-button-create').on('click', function () {
            $.ajax({
                url: '<?= Url::to(['folder', 'directory' => $current]) ?>',
                type: 'post',
                dataType: 'json',
                data: 'folder=' + encodeURIComponent($('input[name=\'folder\']').val()),
                beforeSend: function () {
                    $('#fm-button-create').prop('disabled', true);
                },
                complete: function () {
                    $('#fm-button-create').prop('disabled', false);
                },
                success: function (json) {
                    if (json['error']) {
                        alert(json['error']);
                    }

                    if (json['success']) {
                        alert(json['success']);

                        $('#fm-button-refresh').trigger('click');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        });
    });

    $('#modal-image #fm-button-delete').on('click', function (e) {

        if (confirm('<?= \Yii::t('filemanager/main', 'Are you sure?') ?>')) {
            $.ajax({
                url: '<?= Url::to(['delete']) ?>',
                type: 'post',
                dataType: 'json',
                data: $('input[name^=\'path\']:checked'),
                beforeSend: function () {
                    $('#fm-button-delete').prop('disabled', true);
                },
                complete: function () {
                    $('#fm-button-delete').prop('disabled', false);
                },
                success: function (json) {
                    if (json['error']) {
                        alert(json['error']);
                    }

                    if (json['success']) {
                        alert(json['success']);

                        $('#fm-button-refresh').trigger('click');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    });
</script>