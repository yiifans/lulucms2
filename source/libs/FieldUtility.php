<?php

namespace common\includes;


use components\helpers\TStringHelper;
use yii\helpers\Html;
use yii\base\InvalidParamException;

class FieldUtility 
{
	public static $formName='Content';
	
	public static function resolveOptions($model,$isBackForm)
	{
		$option = '';
		if($isBackForm)
		{
			$option = $model['back_form_option'];
		}
		else
		{
			$option = $model['front_form_option'];
		}
		return TStringHelper::parse2Array($option);
	}
	
	public static function resolveSource2Array($model, $items,$isBackForm)
	{
		$source='';
		if($isBackForm)
		{
			$source=$model['back_form_source'];
		}
		else
		{
			$source=$model['front_form_source'];
		}
		$ret = TStringHelper::parse2Array($source);
		return array_merge($ret,$items);
	}


	public static function getInputName($model,$options=null)
	{
		if($options!==null && isset($options['name']))
		{
			return $options['name'];
		}
	
		$formName ='Content';
		$attribute = $model['field_name'];
	
		if (!preg_match('/(^|.*\])([\w\.]+)(\[.*|$)/', $attribute, $matches)) {
			throw new InvalidParamException('Attribute name must contain word characters only.');
		}
		$prefix = $matches[1];
		$attribute = $matches[2];
		$suffix = $matches[3];
		if ($formName === '' && $prefix === '') {
			return $attribute . $suffix;
		} elseif ($formName !== '') {
			return $formName . $prefix . "[$attribute]" . $suffix;
		} else {
			throw new InvalidParamException('formname must be Content.');
		}
	}
	
	public static function getInputId($model,$options)
	{
		if($options!=null&&isset($options['id']))
		{
			return $options['id'];
		}
		
		$name = strtolower(self::getInputName($model,$options));
	
		return str_replace(['[]', '][', '[', ']', ' '], ['', '-', '-', '', '-'], $name);
	}
	
	public static function getValue($model,$value,$isBackForm)
	{
		if($value!==null)
		{
			return $value;
		}
		if($isBackForm)
		{
			return $model['back_form_default'];
		}
		return $model['front_form_default'];
	}
	
	public static function getOptions($model,$isBackForm,$appendOptions=[])
	{
		$ret = [
			'id' => self::getInputId($model,$appendOptions),
			'class' => 'form-control',
		];
	
		$options = self::resolveOptions($model,$isBackForm);
		if(!empty($options))
		{
			$ret = array_merge($ret, $options);
		}
		if(!empty($appendOptions))
		{
			$ret = array_merge($ret,$appendOptions);
		}
		return $ret;
	}
	
	public static function textForm($model,$value = null,$isBackForm=true,$appendOptions=[])
	{
		$value =self::getValue($model,$value,$isBackForm);
	
		$options = self::getOptions($model,$isBackForm,$appendOptions);
	
		return Html::textInput(self::getInputName($model,$options),$value,$options);
	}
	
	public static function passwordForm($model,$value = null,$isBackForm=true,$appendOptions=[])
	{
		$value =self::getValue($model,$value,$isBackForm);
	
		$options = self::getOptions($model,$isBackForm,$appendOptions);
	
		return Html::passwordInput(self::getInputName($model,$options),$value,$options);
	}
	
	public static function selectForm($model,$value = null,$items=[],$isBackForm=true,$appendOptions=[])
	{
		$value =self::getValue($model,$value,$isBackForm);
	
		$items = self::resolveSource2Array($model,$items, $isBackForm);
	
		$options = self::getOptions($model,$isBackForm,$appendOptions);
	
		return Html::dropDownList(self::getInputName($model,$options),$value,$items,$options);
	}
	
	public static function radioForm($model,$value = null,$isBackForm=true,$appendOptions=[])
	{
		$value =self::getValue($model,$value,$isBackForm);
		if($value==null||empty($value))
		{
			$value=false;
		}
		else
		{
			$value = true;
		}
	
		$options = self::getOptions($model,$isBackForm,$appendOptions);
	
		return Html::radio(self::getInputName($model,$options),$value,$options);
	}
	
	public static function checkboxForm($model,$value = null,$isBackForm=true,$appendOptions=[])
	{
		$value =self::getValue($model,$value,$isBackForm);
		if($value==null||empty($value))
		{
			$value=false;
		}
		else
		{
			$value = true;
		}
	
		$options = self::getOptions($model,$isBackForm,$appendOptions);
	
		return Html::checkbox(self::getInputName($model,$options),$value,$options);
	}
	
	public static function textareaForm($model,$value = null,$isBackForm=true,$appendOptions=[])
	{
		$value =self::getValue($model,$value,$isBackForm);
	
		$options = self::getOptions($model,$isBackForm,$appendOptions);
		if(!isset($options['rows']))
		{
			$options['rows']=5;
		}
		return Html::textarea(self::getInputName($model,$options),$value,$options);
	}
	
	public static function editorForm($model,$value = null,$isBackForm=true,$appendOptions=[])
	{
		$value =self::getValue($model,$value,$isBackForm);
	
		$options = self::getOptions($model,$isBackForm,$appendOptions);
		if(!isset($options['rows']))
		{
			$options['rows']=5;
		}
		return Html::textarea(self::getInputName($model,$options),$value,$options);
	}
	
	public static function imgForm($model,$value = null,$isBackForm=true,$appendOptions=[])
	{
		$value =self::getValue($model,$value,$isBackForm);
	
		$options = self::getOptions($model,$isBackForm,$appendOptions);
	
		return Html::img($value,$options);
	}
	
	public static function flashForm($model,$value = null,$isBackForm=true,$appendOptions=[])
	{
		$value =self::getValue($model,$value,$isBackForm);
	
		$options = self::getOptions($model,$isBackForm,$appendOptions);
	
		return Html::textInput(self::getInputName($model,$options),$value,$options);
	}
	
	public static function fileForm($model,$value = null,$isBackForm=true,$appendOptions=[])
	{
		$value =self::getValue($model,$value,$isBackForm);
	
		$options = self::getOptions($model,$isBackForm,$appendOptions);
	
		return Html::fileInput(self::getInputName($model,$options),$value,$options);
	}
	
	public static function dateForm($model,$value = null,$isBackForm=true,$appendOptions=[])
	{
		$value =self::getValue($model,$value,$isBackForm);
	
		$options = self::getOptions($model,$isBackForm,$appendOptions);
	
		return Html::textInput(self::getInputName($model,$options),$value,$options);
	}
	
	public static function colorForm($model,$value = null,$isBackForm=true,$appendOptions=[])
	{
		$value =self::getValue($model,$value,$isBackForm);
	
		$options = self::getOptions($model,$isBackForm,$appendOptions);
	
		return Html::textInput(self::getInputName($model,$options),$value,$options);
	}

}
