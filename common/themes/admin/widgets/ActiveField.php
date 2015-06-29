<?php

namespace common\themes\admin\widgets;

use yii\helpers\Html;

class ActiveField extends \yii\widgets\ActiveField 
{
        
    public function render($content = null)
    {
        if ($content === null) {
            if (!isset($this->parts['{input}'])) {
                $this->parts['{input}'] = Html::activeTextInput($this->model, $this->attribute, $this->inputOptions);
            }
            if (!isset($this->parts['{label}'])) {
                $labelsHelp = $this->model->attributeHints();
                if (isset($labelsHelp[$this->attribute])) {
                    $this->labelOptions['label']  = '<span data-toggle="tooltip" title="" data-original-title="';
                    $this->labelOptions['label'] .= Html::encode($labelsHelp[$this->attribute]);
                    $this->labelOptions['label'] .= '">';
                    $this->labelOptions['label'] .= Html::encode($this->model->getAttributeLabel($this->attribute));
                    $this->labelOptions['label'] .= ' <span class="glyphicon glyphicon-question-sign" style="font-size: 8pt;" aria-hidden="true"></span>';
                    $this->labelOptions['label'] .= '</span>';
                } else {
                    $this->labelOptions['label'] = Html::encode($this->model->getAttributeLabel($this->attribute));
                }
                $this->parts['{label}'] = Html::activeLabel($this->model, $this->attribute, $this->labelOptions);
            }
            if (!isset($this->parts['{error}'])) {
                $this->parts['{error}'] = Html::error($this->model, $this->attribute, $this->errorOptions);
            }
            if (!isset($this->parts['{hint}'])) {
                $this->parts['{hint}'] = '';
            }
            $content = strtr($this->template, $this->parts);
        } elseif (!is_string($content)) {
            $content = call_user_func($content, $this);
        }
        return $this->begin() . "\n" . $content . "\n" . $this->end();
    }
    
    public function checkbox($options = [], $enclosedByLabel = false)
    {
        parent::checkbox($options, $enclosedByLabel);
        return $this;
    }
}

