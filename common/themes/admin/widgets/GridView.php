<?php

namespace common\themes\admin\widgets;

use yii\helpers\Html;
use yii\helpers\Url;
use common\themes\admin\DataTablesAsset;
use yii\web\YiiAsset;

class GridView extends \yii\grid\GridView {

    public $batchParam = 'ids';
    public $tableOptions = [
        'class' => 'table table-bordered table-hover dataTable'
    ];
    public $headerRowOptions = [
//        'class' => 'sorting',
    ];
    public $emptyCell = '';
    public $options = [
        'class' => 'dataTables_wrapper form-inline',
        'role' => 'grid'
    ];

    /**
     * @inheritdoc
     */
    public $layout = "{items}\n<div class='row'><div class='col-xs-6'><div class='dataTables_info'>{summary}</div></div>\n<div class='col-xs-6'><div class='dataTables_paginate paging_bootstrap'>{pager}</div></div></div>";

    public function init() {
        parent::init();
        if (!$this->options['ajax']) {
            echo '<div id="box-' . $this->id . '" class="box box-primary">'
            . '  <div class="box-header with-border">';
            if (isset($this->options['boxTitle'])) {
                echo Html::tag('h3', '<i class="fa fa-list"></i> ' . $this->options['boxTitle'], ['class' => 'box-title']);
            }
            echo '<div class="box-tools pull-right">';
            if (isset($this->options['buttonUp'])) {
                echo Html::a('<i class="fa fa-arrow-up"></i>', $this->options['buttonUp'], ['id' => 'button-up', 'class' => 'btn btn-sm btn-default', 'title' => \Yii::t('theme/widgets/box', 'Up')]);
                echo ' ';
            };
            if (isset($this->options['buttonCreate'])) {
                echo Html::a('<i class="fa fa-plus"></i>', $this->options['buttonCreate'], ['class' => 'btn btn-sm btn-primary', 'title' => \Yii::t('theme/widgets/box', 'Create')]);
                echo ' ';
            };
            if (isset($this->options['buttonDelete'])) {
                echo Html::a('<i class="fa fa-trash-o"></i>', $this->options['buttonDelete'], ['id' => 'batch-delete', 'class' => 'btn btn-sm btn-danger', 'title' => \Yii::t('theme/widgets/box', 'Delete')]);
                echo ' ';
            };
            if (isset($this->options['buttonUndo'])) {
                echo Html::a('<i class="fa fa-undo"></i>', $this->options['buttonUndo'], ['class' => 'btn btn-sm btn-default', 'title' => \Yii::t('theme/widgets/box', 'Undo')]);
                echo ' ';
            }
            echo '</div>';
            echo '</div>';
            echo '<div class="box-body">';

            $this->renderFiltersForm();
        }
        echo "<div id='table-{$this->id}'>";
    }

    public function run() {
        parent::run();
        echo '</div>';
        if (!$this->options['ajax']) {
            echo '</div>';
            echo '</div>';
            $this->registerClientScripts();
            DataTablesAsset::register($this->getView());
        }
    }

    public function renderItems() {
        $caption = $this->renderCaption();
        $columnGroup = $this->renderColumnGroup();
        $tableHeader = $this->showHeader ? $this->renderTableHeader() : false;
        $tableBody = $this->renderTableBody();
        $tableFooter = $this->showFooter ? $this->renderTableFooter() : false;
        $content = array_filter([
            $caption,
            $columnGroup,
            $tableHeader,
            $tableFooter,
            $tableBody,
        ]);

        return Html::tag('table', implode("\n", $content), $this->tableOptions);
    }

    private function registerClientScripts() {
        $view = $this->getView();
        YiiAsset::register($view);
        $view->registerJs(
                "jQuery(document).on('click', '#batch-delete', function (evt) {" .
                "evt.preventDefault();" .
                "var keys = jQuery('#" . $this->id . "').yiiGridView('getSelectedRows');" .
                "if (keys == '') {" .
                "alert('" . \Yii::t('theme/widgets/box', 'You need to select at least one item.') . "');" .
                "} else {" .
                "if (confirm('" . \Yii::t('theme/widgets/box', 'Are you sure you want to delete selected items?') . "')) {" .
                "jQuery.ajax({" .
                "type: 'POST'," .
                "url: jQuery(this).attr('href')," .
                "data: { " . $this->batchParam . ": keys}" .
                "});" .
                "}" .
                "}" .
                "});"
                . "$('#table-{$this->id}').on('click', 'a', function(e) {"
                    . "if ($(this).attr('ajax')) { return true; }"
                    . "e.preventDefault();"
                    . "var self = this;"
                    . "$.ajax({"
                        . "url: $(self).attr('href'),"
                        . "dataType: 'html',"
                        . "cache: false,"
                        . "type: 'post',"
                        . "data: {ajax: true},"
                        . "success: function(html) {"
                            . "$('#table-{$this->id}').html(html);"
                            . "$('#box-{$this->id}').find('a#button-up').attr('href', $('#{$this->id}').attr('buttonup'));"
                            . "history.pushState(null, null, $(self).attr('href'));"
                            . "var parent = location.search.replace('?','').split('&').reduce(function(s,c){var t=c.split('=');s[t[0]]=t[1];return s;},{})['parent'];" 
                            . "if ($('#box-{$this->id}').find('input[name=\'parent\']').length) {"
                                . "$('#box-{$this->id}').find('input[name=\'parent\']').attr('value', parent);"
                            . "} else {"
                            . "$('#box-{$this->id}').find('form').append('<input type=\"hidden\" name=\"parent\" value=\"'+ parent +'\">');"
                            . "}"    
                        . "},"
                    . "});"
                . "});"                                    
               . "$('#box-{$this->id}').on('click', 'a#button-up', function(e) {"
                    . "e.preventDefault();"
                    . "var self = this;"
                    . "$.ajax({"
                        . "url: $(self).attr('href'),"
                        . "dataType: 'html',"
                        . "cache: false,"
                        . "type: 'post',"
                        . "data: {ajax: true},"
                        . "success: function(html) {"
                            . "$('#table-{$this->id}').html(html);"
                            . "history.pushState(null, null, $(self).attr('href'));"
                            . "$('#box-{$this->id}').find('a#button-up').attr('href', $('#{$this->id}').attr('buttonup'));"
                            . "var parent = location.search.replace('?','').split('&').reduce(function(s,c){var t=c.split('=');s[t[0]]=t[1];return s;},{})['parent'];" 
                            . "if ($('#box-{$this->id}').find('input[name=\'parent\']').length) {"
                                . "$('#box-{$this->id}').find('input[name=\'parent\']').attr('value', parent);"
                            . "} else {"
                            . "$('#box-{$this->id}').find('form').append('<input type=\"hidden\" name=\"parent\" value=\"'+ parent +'\">');"
                            . "}"     
                        . "},"
                    . "});"
                . "});"
        );
        /*        $view->registerJs(''
          . '$(function () {'
          . "$('#{$this->id}').dataTable({"
          . '"bPaginate": true,'
          . '"bLengthChange": false,'
          . '"bFilter": false,'
          . '"bSort": true,'
          . '"bAutoWidth": false,'
          . '"bInfo": true,'
          . '});'
          . '});'); */
    }

    public function renderFiltersForm() {
        if ($this->filterModel !== null) {
            echo Html::beginForm(Url::current(), 'get');
            echo '<div class="box box-default box-solid">';

            echo '<div class="box-header with-border">';
            echo '<h4 class="box-title">Filter</h4>';
            echo '<div class="box-tools pull-right">';
            echo Html::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-default btn-sm', 'title' => \Yii::t('theme/widgets/box', 'Search')]);
            echo '<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>';
            echo '<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>';
            echo '</div>';
            echo '</div>';
            echo '  <div class="box-body">';
            echo '  <div class="row">';
            foreach ($this->columns as $column) {
                $cell = $column->renderFilterCell();
                $model = new $this->dataProvider->query->modelClass;
                if (strlen($cell) != 9) {
                    if (isset($column->label)) {
                        $label = $column->label;
                    } else {
                        $label = $model->getAttributeLabel($column->attribute);
                    }
                    echo '<div class="col-sm-4 form-group">';
                    echo '<label class="control-label" for="input-name">' . $label . '</label>';
                    echo $cell;
                    echo '</div>';
                }
            }

            echo '  </div>';
            echo '  </div>';
            echo '</div>';
            echo Html::endForm();
        }
    }

    public function renderFilters() {
        return '';
    }

}
