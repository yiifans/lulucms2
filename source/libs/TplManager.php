<?php

namespace common\includes;

use components\base\BaseActiveRecord;
use yii\helpers\Html;
use components\LuLu;
use yii\base\InvalidParamException;
use components\helpers\TStringHelper;
use yii\base\Object;
use components\helpers\TFileHelper;

class TplManager
{
	public static function createTableCache()
	{
		$newLine="\r\n";
	
		$content='<?php'.$newLine;
	
		$dataList= DefineTable::findAll();
	
		foreach ($dataList as $row)
		{
			$content.='$cachedTables[\''.$row['name_en'].'\']=['.$newLine;
	
			$content.=self::getCacheItem('name_en',$row);
			$content.=self::getCacheItem('name',$row);
			$content.=self::getCacheItem('description',$row);
			$content.=self::getCacheItem('is_default',$row, 'bool');
			$content.=self::getCacheItem('note',$row);
			
			$content.=self::getCacheItem('back_action_index',$row, 'bool');
			$content.=self::getCacheItem('back_action_create',$row , 'bool');
			$content.=self::getCacheItem('back_action_update',$row, 'bool');
			$content.=self::getCacheItem('back_action_delete',$row, 'bool');
			$content.=self::getCacheItem('back_action_other',$row, 'bool');
			$content.=self::getCacheItem('back_action_custom',$row );
			
			$content.=self::getCacheItem('front_action_channel',$row, 'bool');
			$content.=self::getCacheItem('front_action_list',$row, 'bool');
			$content.=self::getCacheItem('front_action_detail',$row, 'bool');
			$content.=self::getCacheItem('front_action_search',$row, 'bool');
			$content.=self::getCacheItem('front_action_index',$row, 'bool');
			$content.=self::getCacheItem('front_action_create',$row, 'bool');
			$content.=self::getCacheItem('front_action_update',$row, 'bool');
			$content.=self::getCacheItem('front_action_delete',$row, 'bool');
			$content.=self::getCacheItem('front_action_other',$row, 'bool');
			$content.=self::getCacheItem('front_action_custom',$row);
				
			$content.="];".$newLine;
		}
	
	
		$rootData = \Yii::getAlias('@data');

		TFileHelper::writeFile([$rootData,'cache','cachedTables.php'], $content);
	
		return $content;
	}
	
	public static function createFieldCache()
	{
		$newLine="\r\n";
	
		$content='<?php'.$newLine;
	
		$tables = DefineTable::findAll();
		foreach ($tables as $table )
		{
			$tableName = $table['name_en'];
			
			$dataList= DefineTableField::findAll(['table'=>$tableName]);
			
			foreach ($dataList as $row)
			{
				$content.='$cachedFields[\''.$tableName.'\'][\''.$row['name_en'].'\']=['.$newLine;
				
				$content.=self::getCacheItem('id',$row, 'int');
				$content.=self::getCacheItem('table',$row);
				$content.=self::getCacheItem('name_en',$row);
				$content.=self::getCacheItem('name',$row);
				$content.=self::getCacheItem('type',$row);
				$content.=self::getCacheItem('length',$row,'int');
				
				$content.=self::getCacheItem('is_null',$row, 'bool');
				$content.=self::getCacheItem('is_main',$row, 'bool');
				$content.=self::getCacheItem('is_sys',$row, 'bool');
				$content.=self::getCacheItem('sort_num',$row, 'int');
				$content.=self::getCacheItem('note',$row);
				
				$content.=self::getCacheItem('front_status',$row, 'bool');
				$content.=self::getCacheItem('front_fun_add',$row );
				$content.=self::getCacheItem('front_fun_update',$row );
				$content.=self::getCacheItem('front_fun_show',$row );
				$content.=self::getCacheItem('front_form_type',$row );
				$content.=self::getCacheItem('front_form_option',$row );
				$content.=self::getCacheItem('front_form_default',$row );
				$content.=self::getCacheItem('front_form_source',$row );
				$content.=self::getCacheItem('front_form_html',$row );
				$content.=self::getCacheItem('front_note',$row );
				
				$content.=self::getCacheItem('back_status',$row,'bool');
				$content.=self::getCacheItem('back_fun_add',$row );
				$content.=self::getCacheItem('back_fun_update',$row );
				$content.=self::getCacheItem('back_fun_show',$row );
				$content.=self::getCacheItem('back_form_type',$row);
				$content.=self::getCacheItem('back_form_option',$row);
				$content.=self::getCacheItem('back_form_default',$row);
				$content.=self::getCacheItem('back_form_source',$row);
				$content.=self::getCacheItem('back_form_html',$row);
				$content.=self::getCacheItem('back_note',$row);
				
				$content.="];".$newLine;
			}
		}
	
		$rootData = \Yii::getAlias('@data');
	
		TFileHelper::writeFile([$rootData,'cache','cachedFields.php'], $content);
	
		return $content;
	}
	
	public static function createChannelCache()
	{
		$newLine="\r\n";
	
		$content='<?php'.$newLine;
	
		$dataList=Channel::_getChannelArrayTree(0,0);
	
		foreach ($dataList as $row)
		{
			$id = $row['id'];
				
			$parentIds=Channel::getParentIds($id);
			$childrenIds=Channel::getChildrenIds($id);
			$leafIds=Channel::getLeafIds($id);
			
			$content.='$cachedChannels['.$row['id'].']=['.$newLine;
				
			$content.=self::getCacheItem('id',$row, 'int');
			$content.=self::getCacheItem('parent_id',$row, 'int');
			$content.=self::getCacheItemValue('parent_ids',implode(',', $parentIds));
			$content.=self::getCacheItemValue('children_ids',implode(',', $childrenIds));
			$content.=self::getCacheItemValue('leaf_ids',implode(',', $leafIds));
			$content.=self::getCacheItem('name',$row);
			$content.=self::getCacheItem('name_alias',$row);
			$content.=self::getCacheItem('name_url',$row);
			$content.=self::getCacheItem('redirect_url',$row);
			$content.=self::getCacheItem('level',$row, true);
			$content.=self::getCacheItem('is_leaf',$row,true);
			$content.=self::getCacheItem('is_nav',$row, true);
			$content.=self::getCacheItem('sort_num',$row, true);
			$content.=self::getCacheItem('table',$row );
			$content.=self::getCacheItem('channel_tpl',$row);
			$content.=self::getCacheItem('list_tpl',$row);
			$content.=self::getCacheItem('detail_tpl',$row);
			$content.=self::getCacheItem('page_size',$row, true);
	
			$content.="];".$newLine;
		}
	
	
		$rootData = \Yii::getAlias('@data');
	
		TFileHelper::writeFile([$rootData,'cache','cachedChannels.php'], $content);
	
		return $content;
	}
	
	private static function getCacheItem($name, $row, $dataType = null)
	{
		return self::getCacheItemValue($name, $row[$name], $dataType);
	}
	
	private static function getCacheItemValue($name, $value, $dataType = null)
	{
		$newLine = "\r\n";
	
		if ($dataType==null)
		{
			$value = '\'' . $value . '\'';
			
		}
		else if($dataType == 'int')
		{
			$value = intval($value);
		}
		else if($dataType == 'bool')
		{
			if(strtolower($value)=='true'||$value==='1'||$value===1)
			{
				$value = 'true';
			}
			else 
			{
				$value = 'false';
			}
		}
	
		return '	\'' . $name . '\' => ' . $value . ',' . $newLine;
	}
}