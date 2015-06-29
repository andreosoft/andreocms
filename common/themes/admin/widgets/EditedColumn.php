<?php
namespace common\themes\admin\widgets;

use yii\helpers\Html;

class EditedColumn extends \yii\grid\DataColumn {
    
    public $contentOptions = ['style' => 'vertical-align: middle;'];
    public $footerOptions = ['style' => 'vertical-align: middle;'];

    public function getDataCellValue($model, $key, $index)
    {
        if ($this->value !== null) {
            if (is_string($this->value)) {
                return ArrayHelper::getValue($model, $this->value);
            } else {
                return call_user_func($this->value, $model, $key, $index, $this);
            }
        } elseif ($this->attribute !== null) {
            $this->filterInputOptions['style'] = 'width:100%;';
            return Html::activeTextInput($model, $this->attribute, $this->filterInputOptions) . $error;
        }
        return null;
    }
    
    protected function renderDataCellContent($model, $key, $index)
    {
        if ($this->content === null) {
            return $this->getDataCellValue($model, $key, $index);
        } else {
            return parent::renderDataCellContent($model, $key, $index);
        }
    } 
    
    public function renderFooterCellJS($model) {
        return Html::tag('td', $this->renderFooterCellContentJS($model), $this->footerOptions);
    }
    
    
    protected function renderFooterCellContentJS($model) {
        $key = '';
        if ($this->value !== null) {
            if (is_string($this->value)) {
                return ArrayHelper::getValue($model, $this->value);
            } else {
                return call_user_func($this->value, $model, '', '', $this);
            }
        } elseif ($this->attribute !== null) {
            $this->filterInputOptions['style'] = 'width:100%;';
            return Html::activeTextInput($model, $this->attribute, $this->filterInputOptions) . $error;
        }
        return null;
    }       
}

