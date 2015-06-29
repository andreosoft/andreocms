<?php

namespace common\themes\admin\widgets;

use yii\helpers\Html;
use yii\helpers\Url;
use common\themes\admin\DataTablesAsset;
use yii\web\YiiAsset;
//use \yii\widgets\ActiveForm;

class GridViewEdited extends \yii\grid\GridView {

    public $dataColumnClass = '\common\themes\admin\widgets\EditedColumn';
    public $actionUpdate;
    public $defaultValue;
    public $createModel;

    public $batchParam = 'ids';
    public $tableOptions = [
        'class' => 'table table-bordered table-hover dataTable'
    ];
    public $headerRowOptions = [
//        'class' => 'sorting',
    ];
    public $showFooter = true;
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
        echo "<div id='table-{$this->id}'>";
    }

    public function run() {
        parent::run();
        echo '</div>';
        if (!$this->options['ajax']) {
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
        $this->tableOptions = array_merge($this->tableOptions, ['data-defaultvalue' => $this->defaultValue]);
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
/*                . "$('#table-{$this->id}').on('click', 'a', function(e) {"
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
                . "});"          */                         
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
                . "$('#{$this->id}').on('change', 'td', function(e) {"
                    . "e.preventDefault();"
                    . "var self = this;"
                    . "var id = $(this).parent('tr').data('key');"
                    . "var str = $(this).children('input').serialize();"
                    . "if (str=='') {"
                        . "var str = $(this).children('select').serialize();"
                    . "}"
                    . "$.ajax({"
                        . "url: '{$this->actionUpdate}&id='+id,"
                        . "dataType: 'html',"
                        . "type: 'post',"
                        . "data: str + '&ajax=true',"
                    . "});"                           
                . "});"                               
                . "$('#{$this->id}').on('click', 'a#button-delete', function(e) {"
                    . "var self = this;"
                    . "$.ajax({"
                        . "url: $(self).attr('href'),"
                        . "dataType: 'html',"
                        . "cache: false,"
                        . "type: 'post',"
                        . "data: {ajax: true},"
                        . "success: function(data) {"
                            . "var data = $.parseJSON(data);"
                            . "$('#{$this->id}').find('tr[data-key='+data.id+']').html('');"    
                        . "},"
                    . "});"
                    . "return false;"    
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

    public function renderFilters() {
        return '';
    }
    
    public function renderTableBody()
    {
        $models = array_values($this->dataProvider->getModels());
        $keys = $this->dataProvider->getKeys();
        $rows = [];
        foreach ($models as $index => $model) {
            $key = $keys[$index];
            if ($this->beforeRow !== null) {
                $row = call_user_func($this->beforeRow, $model, $key, $index, $this);
                if (!empty($row)) {
                    $rows[] = $row;
                }
            }

            $rows[] = $this->renderTableRow($model, $key, $index);

            if ($this->afterRow !== null) {
                $row = call_user_func($this->afterRow, $model, $key, $index, $this);
                if (!empty($row)) {
                    $rows[] = $row;
                }
            }
        }

        return "<tbody>\n" . implode("\n", $rows) . "\n</tbody>";
    }
        
    public function renderTableRow($model, $key, $index)
    {
        $cells = [];

        foreach ($this->columns as $column) {
            $cells[] = $column->renderDataCell($model, $key, $index);
        }
        if ($this->rowOptions instanceof Closure) {
            $options = call_user_func($this->rowOptions, $model, $key, $index, $this);
        } else {
            $options = $this->rowOptions;
        }
        $options['data-key'] = is_array($key) ? json_encode($key) : (string) $key;
        
        return Html::tag('tr', implode('', $cells), $options);
    }
    
    public function renderTableFooter() {
        
        $html = "var html = '';\n";
        foreach ($this->columns as $column) {
            $html .= "html += '" . str_replace("\n", "';\nhtml += '",$column->renderFooterCellJS($this->createModel)) . "';\n";
        }
        $view = $this->getView();
        YiiAsset::register($view);
        $view->registerJs(
                 "$('#{$this->id}').on('click', 'a#button-create', function(e) {"
                    . "var self = this;"
                    . "var str = {};"  
                    . "str = $('#{$this->id}').children('table').data('defaultvalue');"
                    . "str.ajax = true;"                    
                    . "$.ajax({"
                        . "url: $(self).attr('href'),"
                        . "dataType: 'html',"
                        . "cache: false,"
                        . "type: 'post',"
                        . "data: str,"
                        . "success: function(data) {"
                            . "var data = $.parseJSON(data);"
                            . $html
                            . "var tbody = $('#{$this->id}').find('tbody');"
                            . "tbody.append('<tr data-key='+ data.id +'>'+html+'</tr>');"    
                        . "},"
                    . "});"
                    . "return false;"        
                . "});"               
                );
        
        $cells = [];
        foreach ($this->columns as $column) {
                $cells[] = $column->renderFooterCell();         
        }
        
        $content = Html::tag('tr', implode('', $cells), $this->footerRowOptions);
        return "<tfoot>\n" . $content . "\n</tfoot>";
    } 
 
}
