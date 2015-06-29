<?php

namespace common\themes\admin\widgets;

use yii\base\InvalidCallException;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ActiveFormAsset;

class ActiveForm extends \yii\widgets\ActiveForm
{
    
    public $options = [
        'class' => 'form-horizontal',
    ];
    
    public $fieldClass = 'common\themes\admin\widgets\ActiveField';
    
    public $fieldConfig = [
        'template' => '{label}<div class="col-sm-10">{input}{error}</div>',
        'labelOptions' => ['class' => 'col-sm-2 control-label'],
    ];
    
    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        
        echo Html::beginForm($this->action, $this->method, $this->options);
        echo '<div class="box box-primary">'
            .'  <div class="box-header with-border">';
        echo Html::tag('h3', $this->options['boxTitle'], ['class' => 'box-title']);
        echo '<div class="box-tools pull-right">';
        echo Html::button('<i class="fa fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-primary', 'title' => \Yii::t('theme/widgets/box', 'Save')]);
        echo ' ';
        if (isset($this->options['buttonUndo'])) {
            echo Html::a('<i class="fa fa-undo"></i>', $this->options['buttonUndo'], ['class' => 'btn btn-sm btn-default', 'title' => \Yii::t('theme/widgets/box', 'Undo')]);
        }
        echo '</div>';
        
        echo '</div>';
        
        echo '<div class="box-body form-horizontal">';
    }
    
    public function run()
    {
        if (!empty($this->_fields)) {
            throw new InvalidCallException('Each beginField() should have a matching endField() call.');
        }

        if ($this->enableClientScript) {
            $id = $this->options['id'];
            $options = Json::encode($this->getClientOptions());
            $attributes = Json::encode($this->attributes);
            $view = $this->getView();
            ActiveFormAsset::register($view);
            $view->registerJs("jQuery('#$id').yiiActiveForm($attributes, $options);");
        }
        
        echo '</div>';        
        echo '</div>';
        echo Html::endForm();
    }
}
