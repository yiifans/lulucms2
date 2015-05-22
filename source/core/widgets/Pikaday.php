<?php

namespace source\core\widgets;

use yii\web\View;

class Pikaday extends BaseWidget
{

	public $libUrl = 'static/common/libs/pikaday';

	public $inputId = null;
	
	public $pikadayId = null;

	public $defaultParams = [
		'firstDay' => '1',
		'i18n'=>"{
		    previousMonth : '上月',
		    nextMonth     : '下月',
		    months        : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		    weekdays      : ['日','一','二','三','四','五','六'],
		    weekdaysShort : ['日','一','二','三','四','五','六']
		}",
	];
	
	public function init()
	{
	}

	public function run()
	{
		$view = $this->view;
		
		if(! isset($view->params['__Pikaday']))
		{
			$view->registerCssFile($this->libUrl . '/css/pikaday.css');
			$view->registerJsFile($this->libUrl . '/pikaday.js',['yii\web\JqueryAsset']);
			$view->registerJsFile($this->libUrl . '/moment.min.js');
			
			$view->params['__Pikaday'] = true;
		}
		
		if($this->inputId === null)
		{
			$this->inputId = $this->id;
		}
		
		if($this->pikadayId === null)
		{
			$this->pikadayId = 'pikaday_' . str_replace('-', '_', $this->pikadayId);
		}
		
		$this->params = array_merge($this->defaultParams, $this->params);
		
		$paramsString  = '';
		foreach($this->params as $name => $value)
		{
			$paramsString .= $name . ' : ' . $value . ",\r\n";
		}
		
		$jsString =<<<STR
var $this->pikadayId = new Pikaday({
		field: document.getElementById("$inputId"),
		firstDay: 1,
		i18n: {
		    previousMonth : '上月',
		    nextMonth     : '下月',
		    months        : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		    weekdays      : ['日','一','二','三','四','五','六'],
		    weekdaysShort : ['日','一','二','三','四','五','六']
		}
 });
$this->pikadayId.toString('YYYY-MM-DD');
STR;
		
		$view->registerJs($jsString, View::POS_END);
	}
}
