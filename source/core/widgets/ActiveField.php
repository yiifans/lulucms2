<?php
namespace source\core\widgets;

use Yii;
use yii\helpers\Html;


class ActiveField extends \yii\widgets\ActiveField implements IBaseWidget
{


    public $options = ['class'=>'da-form-row'];
    
    public $template="{label}\n<div class=\"da-form-item {size}\">{input}\n{error}</div>\n{hint}";
    public $size='small';
    
    public $errorOptions=['class'=>'errorMessage'];
    
    public function render($content = null)
    {
        if ($content === null) {
            if (!isset($this->parts['{input}'])) {
                $this->parts['{input}'] = Html::activeTextInput($this->model, $this->attribute, $this->inputOptions);
            }
            if (!isset($this->parts['{label}'])) {
                $this->parts['{label}'] = Html::activeLabel($this->model, $this->attribute, $this->labelOptions);
            }
            if (!isset($this->parts['{error}'])) {
                $this->parts['{error}'] = Html::error($this->model, $this->attribute, $this->errorOptions);
            }
            if (!isset($this->parts['{hint}'])) {
                $this->parts['{hint}'] = '';
            }
            
            $this->parts['{size}'] = $this->size;
            $content = strtr($this->template, $this->parts);
        } elseif (!is_string($content)) {
            $content = call_user_func($content, $this);
        }
    
        return $this->begin() . "\n" . $content . "\n" . $this->end();
    }
    
    public function checkbox($options = [], $enclosedByLabel = true)
    {
        $options = array_merge($this->inputOptions, $options);
        if ($enclosedByLabel) {
            $this->parts['{input}'] = Html::activeCheckbox($this->model, $this->attribute, $options);
            $this->parts['{label}'] = '';
        } else {
            if (isset($options['label']) && !isset($this->parts['{label}'])) {
                $this->parts['{label}'] = $options['label'];
                if (!empty($options['labelOptions'])) {
                    $this->labelOptions = $options['labelOptions'];
                }
            }
            unset($options['labelOptions']);
            $options['label'] = null;
            $this->parts['{input}'] = Html::activeCheckbox($this->model, $this->attribute, $options);
        }
        $this->adjustLabelFor($options);
    
        return $this;
    }
    
    public function dropDownList($items, $options = [], $generateDefault=true)
    {
        if($generateDefault===true && !isset($options['prompt']))
        {
            $options['prompt']='请选择';
        }
        return parent::dropDownList($items,$options);
    }
}