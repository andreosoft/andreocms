<?php

namespace common\widgets\dataPicker;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;
use yii\helpers\FormatConverter;

class DatePicker extends InputWidget {

    public $clientOptions;
    public $options = ['class' => 'form-control'];
    public $language;
    public $inline = false;
    public $containerOptions = [];
    public $dateFormat;
    public $attribute;
    public $value;

    public function init() {
        parent::init();
        if ($this->inline && !isset($this->containerOptions['id'])) {
            $this->containerOptions['id'] = $this->options['id'] . '-container';
        }
        if ($this->dateFormat === null) {
            $this->dateFormat = \Yii::$app->formatter->dateFormat;
        }
    }

    public function run() {
        echo $this->renderWidget() . "\n";

        $view = $this->getView();
        $bundle = Asset::register($view);

        $containerID = $this->inline ? $this->containerOptions['id'] : $this->options['id'];
        $language = $this->language ? $this->language : \Yii::$app->language;

        if (strncmp($this->dateFormat, 'php:', 4) === 0) {
            $this->clientOptions['format'] = FormatConverter::convertDatePhpToJui(substr($this->dateFormat, 4), 'date', $language);
        } else {
            $this->clientOptions['format'] = FormatConverter::convertDateIcuToJui($this->dateFormat, 'date', $language);
        }
        $this->clientOptions['format'] = 'yyyy-mm-dd';
        if ($language != 'en-US') {

            if ($bundle->autoGenerate) {
                $fallbackLanguage = substr($language, 0, 2);
                if ($fallbackLanguage !== $language && !file_exists(\Yii::getAlias($bundle->sourcePath . "/locales/bootstrap-datepicker.$language.js"))) {
                    $language = $fallbackLanguage;
                }
 //               $view->registerJsFile($bundle->baseUrl . "/locales/bootstrap-datepicker.$language.js");
            }
            $options = Json::encode($this->clientOptions);
            $view->registerJs("$('#{$containerID}').datepicker($.extend({}, $options));");
//            $view->registerJs("$('#{$containerID}').datepicker($.extend({}, $.datepicker.regional['{$language}'], $options));");
        } else {
            $this->registerClientOptions('datepicker', $containerID);
        }

//        $this->registerClientEvents('datepicker', $containerID);
    }

    /**
     * Renders the DatePicker widget.
     * @return string the rendering result.
     */
    protected function renderWidget() {
        $contents = [];
        $contents[] = '<div class="input-group">';
        // get formatted date value
        if ($this->hasModel()) {
            $value = Html::getAttributeValue($this->model, $this->attribute);
        } else {
            $value = $this->value;
        }
        if ($value !== null && $value !== '') {
            // format value according to dateFormat
            try {
                $value = \Yii::$app->formatter->asDate($value, $this->dateFormat);
            } catch (InvalidParamException $e) {
                // ignore exception and keep original value if it is not a valid date
            }
        }
        $value = $this->value;
        $options = $this->options;
        $options['value'] = $value;

        if ($this->inline === false) {
            // render a text input
            if ($this->hasModel()) {
                $contents[] = Html::activeTextInput($this->model, $this->attribute, $options);
            } else {
                $contents[] = Html::textInput($this->name, $value, $options);
            }
        } else {
            // render an inline date picker with hidden input
            if ($this->hasModel()) {
                $contents[] = Html::activeHiddenInput($this->model, $this->attribute, $options);
            } else {
                $contents[] = Html::hiddenInput($this->name, $value, $options);
            }
            $this->clientOptions['defaultDate'] = $value;
            $this->clientOptions['altField'] = '#' . $this->options['id'];
            $contents[] = Html::tag('div', null, $this->containerOptions);
        }
        $contents[] = '<span class="input-group-addon">';
//        $contents[] = Html::button('<i class="fa fa-calendar"></i>', ['type' => 'button', 'class' => 'btn btn-default']);
        $contents[] = '<i class="fa fa-calendar"></i>';
        $contents[] = '</span>';
        $contents[] = '</div>';
        return implode("\n", $contents);
    }

}
