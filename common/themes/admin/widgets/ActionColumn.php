<?php
namespace common\themes\admin\widgets;

use yii\helpers\Html;
use yii\helpers\Url;

class ActionColumn extends \yii\grid\ActionColumn {
    
    public $template = '{update}';
    public $footerOptions = ['style' => 'vertical-align: middle;'];
    public $contentOptions = ['style' => 'vertical-align: middle;'];
    
    public function init()
    {
        parent::init();
        $this->initDefaultButtons();
    }
    
    protected function initDefaultButtons() {
                
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                    'title' => \Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                    'ajax' => 'false',
                    'class' => 'btn btn-sm btn-primary',
                    'id' => 'button-update',
                ]);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                return '<a id="button-delete" class="btn btn-sm btn-danger" href="'.$url.'" title="'.\Yii::t('yii', 'Delete').'" data-confirm="'.\Yii::t('yii', 'Are you sure you want to delete this item?').'" data-method="post" data-pjax=0><span class="fa fa-minus-circle"></span></a>';
/*                return Html::tag('a', '<span class="fa fa-minus-circle"></span>', [
                    'href' => $url,
                    'title' => \Yii::t('yii', 'Delete'),
                    'data-confirm' => \Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'class' => 'btn btn-sm btn-danger',
                    'data-method' => 'post',
                    'data-pjax' => '0',
                    'id' => 'button-delete',
                ]);*/
            };
        }         
        if (!isset($this->buttons['create'])) {
            $this->buttons['create'] = function ($url) {
                return Html::a('<span class="fa fa-plus-circle"></span>', $url, [
                    'title' => \Yii::t('yii', 'Create'),
                    'class' => 'btn btn-sm btn-primary',
                    'data-method' => 'post',
                    'data-pjax' => '0',
                    'id' => 'button-create',
                ]);
            };
        }         
    }
    
    protected function renderFooterCellContent() {
        return call_user_func($this->buttons['create'], [$this->controller.'/create']);
    }
    
    public function renderFooterCellContentJS($model) {
        return call_user_func($this->buttons['delete'], Url::to([$this->controller.'/delete'])."&id='+data.id+'", $model, $key);
    }
    
    public function renderFooterCellJS($model) {
        return Html::tag('td', $this->renderFooterCellContentJS($model), $this->footerOptions);
    }    
}