<?php
namespace source\core\widgets;

use Yii;
use yii\helpers\Html;

class ActiveField extends \yii\widgets\ActiveField implements IBaseWidget
{

    public $options = [
        'class' => 'da-form-row'
    ];

    public $template = "{label}\n<div class=\"da-form-item {size}\">{input}\n{error}</div>\n{hint}";

    public $size = 'small';
    

    public $errorOptions = [
        'class' => 'errorMessage'
    ];

    public function render($content = null)
    {
        if ($content === null)
        {
            if (! isset($this->parts['{input}']))
            {
                $this->parts['{input}'] = Html::activeTextInput($this->model, $this->attribute, $this->inputOptions);
            }
            if (! isset($this->parts['{label}']))
            {
                $this->parts['{label}'] = Html::activeLabel($this->model, $this->attribute, $this->labelOptions);
            }
            if (! isset($this->parts['{error}']))
            {
                $this->parts['{error}'] = Html::error($this->model, $this->attribute, $this->errorOptions);
            }
            if (! isset($this->parts['{hint}']))
            {
                $this->parts['{hint}'] = '';
            }
            
            $this->parts['{size}'] = $this->size;
            $content = strtr($this->template, $this->parts);
        }
        elseif (! is_string($content))
        {
            $content = call_user_func($content, $this);
        }
        
        return $this->begin() . "\n" . $content . "\n" . $this->end();
    }

    public function checkbox($options = [], $enclosedByLabel = true)
    {
        $options = array_merge($this->inputOptions, $options);
        return parent::checkbox($options, $enclosedByLabel);
    }
   
    public function dropDownList($items, $options = [], $generateDefault = true)
    {
        if ($generateDefault === true && ! isset($options['prompt']))
        {
            $options['prompt'] = '请选择';
        }
        return parent::dropDownList($items, $options);
    }

    public function reayOnly($value = null, $options = [])
    {
        $options = array_merge($this->inputOptions, $options);
        
        $this->adjustLabelFor($options);
        $value = $value === null ? Html::getAttributeValue($this->model, $this->attribute) : $value;
        $options['class']='da-style';
        $options['style']='display: inline-block;';
        $this->parts['{input}'] = Html::activeHiddenInput($this->model, $this->attribute) . Html::tag('span', $value, $options);
    
        return $this;
    }
   
    public function radioList($items,$options=[])
    { 
        $options['tag']='ul';
        
        $inputId = Html::getInputId($this->model, $this->attribute);
        $this->selectors=['input'=>"#$inputId input"];
        
        $options['class']='da-form-list inline';
        $encode = !isset($options['encode']) || $options['encode'];
        $itemOptions = isset($options['itemOptions']) ? $options['itemOptions'] : [];
        
        $options['item'] = function($index, $label, $name, $checked, $value)
        use($encode, $itemOptions)
        {
            $radio = Html::radio($name, $checked, array_merge($itemOptions, [
                'value' => $value,
                'label' => $encode ? Html::encode($label) : $label,
            ]));
            
            return '<li>'.$radio.'</li>';
        };
        return parent::radioList($items, $options);
    }
    
    public function checkboxList($items,$options=[])
    {
        
        $options['tag']='ul';
        
        $inputId = Html::getInputId($this->model, $this->attribute);
        $this->selectors=['input'=>"#$inputId input"];
        
        $options['class']='da-form-list inline';
        $encode = !isset($options['encode']) || $options['encode'];
        $itemOptions = isset($options['itemOptions']) ? $options['itemOptions'] : [];
    
        $options['item'] = function($index, $label, $name, $checked, $value)
        use($encode, $itemOptions)
        {
            $checkbox = Html::checkbox($name, $checked, array_merge($itemOptions, [
                'value' => $value,
                'label' => $encode ? Html::encode($label) : $label,
            ]));
    
            return '<li>'.$checkbox.'</li>';
        };
        return parent::checkboxList($items, $options);
    }
    
    public function textarea($options = [])
    {
        if(!isset($options['rows']))
        {
            $options['rows'] = 5;
        }
        return parent::textarea($options);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}