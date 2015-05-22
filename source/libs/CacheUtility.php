<?php

namespace common\includes;

use components\helpers\TFileHelper;
use common\models\DefineTable;
use common\models\DefineTableField;
use common\models\Channel;
use common\models\config\Config;
use common\models\ContentFlag;
use common\models\Variable;
use common\models\DictCategory;
use common\models\Dict;

class CacheUtility
{

	private static $newLine = "\r\n";

	public static function createCacheFile()
	{
		$content = '<?php' . self::$newLine;
		
		$content .= '$cachedTables=[];' . self::$newLine;
		$content .= '$cachedFields=[];' . self::$newLine;
		$content .= '$cachedChannels=[];' . self::$newLine;
		$content .= '$cachedConfigs=[];' . self::$newLine;
		$content .= '$cachedContentFlags=[];' . self::$newLine;
		$content .= '$cachedVariables=[];' . self::$newLine;
		$content .= '$cachedDicts=[];' . self::$newLine;
		
		$content .= self::$newLine;
		$content .= 'require(__DIR__ . \'/cachedTables.php\');' . self::$newLine;
		$content .= 'require(__DIR__ . \'/cachedFields.php\');' . self::$newLine;
		$content .= 'require(__DIR__ . \'/cachedChannels.php\');' . self::$newLine;
		$content .= 'require(__DIR__ . \'/cachedConfigs.php\');' . self::$newLine;
		$content .= 'require(__DIR__ . \'/cachedContentFlags.php\');' . self::$newLine;
		$content .= 'require(__DIR__ . \'/cachedVariables.php\');' . self::$newLine;
		$content .= 'require(__DIR__ . \'/cachedDicts.php\');' . self::$newLine;
		
		$content .= self::$newLine;
		$content .= 'return [' . self::$newLine;
		$content .= '	\'cachedTables\' => $cachedTables,' . self::$newLine;
		$content .= '	\'cachedFields\' => $cachedFields,' . self::$newLine;
		$content .= '	\'cachedChannels\' => $cachedChannels,' . self::$newLine;
		$content .= '	\'cachedConfigs\' => $cachedConfigs,' . self::$newLine;
		$content .= '	\'cachedContentFlags\' => $cachedContentFlags,' . self::$newLine;
		$content .= '	\'cachedVariables\' => $cachedVariables,' . self::$newLine;
		$content .= '	\'cachedDicts\' => $cachedDicts,' . self::$newLine;
		$content .= '];' . self::$newLine;
		
		self::writeFile('cachedData.php', $content);
	}

	public static function createTableCache()
	{
		self::createCacheFile();
		
		$content = '<?php' . self::$newLine;
		
		$dataList = DefineTable::findAll();
		foreach($dataList as $row)
		{
			$content .= '$cachedTables[\'' . $row['table_name'] . '\']=[' . self::$newLine;
			
			$content .= self::getCacheItem('table_name', $row);
			$content .= self::getCacheItem('name', $row);
			$content .= self::getCacheItem('is_default', $row, 'bool');
			$content .= self::getCacheItem('note', $row);
			
			$content .= self::getCacheItem('back_action_custom', $row);
			$content .= self::getCacheItem('front_action_custom', $row);
			
			$content .= "];" . self::$newLine;
		}
		
		self::writeFile('cachedTables.php', $content);
	}

	public static function createFieldCache()
	{
		self::createCacheFile();
		
		$content = '<?php' . self::$newLine;
		
		$tables = DefineTable::findAll();
		foreach($tables as $table)
		{
			$tableName = $table['table_name'];
			
			$dataList = DefineTableField::findAll(['table' => $tableName]);
			
			foreach($dataList as $row)
			{
				$content .= '$cachedFields[\'' . $tableName . '\'][\'' . $row['field_name'] . '\']=[' . self::$newLine;
				
				$content .= self::getCacheItem('id', $row, 'int');
				$content .= self::getCacheItem('table', $row);
				$content .= self::getCacheItem('field_name', $row);
				$content .= self::getCacheItem('name', $row);
				$content .= self::getCacheItem('type', $row);
				$content .= self::getCacheItem('length', $row, 'int');
				
				$content .= self::getCacheItem('is_null', $row, 'bool');
				$content .= self::getCacheItem('is_main', $row, 'bool');
				$content .= self::getCacheItem('is_sys', $row, 'bool');
				$content .= self::getCacheItem('sort_num', $row, 'int');
				$content .= self::getCacheItem('note', $row);
				
				$content .= self::getCacheItem('front_status', $row, 'bool');
				$content .= self::getCacheItem('front_fun_add', $row);
				$content .= self::getCacheItem('front_fun_update', $row);
				$content .= self::getCacheItem('front_fun_show', $row);
				$content .= self::getCacheItem('front_form_type', $row);
				$content .= self::getCacheItem('front_form_option', $row);
				$content .= self::getCacheItem('front_form_default', $row);
				$content .= self::getCacheItem('front_form_source', $row);
				$content .= self::getCacheItem('front_form_html', $row);
				$content .= self::getCacheItem('front_note', $row);
				
				$content .= self::getCacheItem('back_status', $row, 'bool');
				$content .= self::getCacheItem('back_fun_add', $row);
				$content .= self::getCacheItem('back_fun_update', $row);
				$content .= self::getCacheItem('back_fun_show', $row);
				$content .= self::getCacheItem('back_form_type', $row);
				$content .= self::getCacheItem('back_form_option', $row);
				$content .= self::getCacheItem('back_form_default', $row);
				$content .= self::getCacheItem('back_form_source', $row);
				$content .= self::getCacheItem('back_form_html', $row);
				$content .= self::getCacheItem('back_note', $row);
				
				$content .= "];" . self::$newLine;
			}
		}
		
		self::writeFile('cachedFields.php', $content);
	}

	public static function createChannelCache()
	{
		self::createCacheFile();
		
		$content = '<?php' . self::$newLine;
		
		$dataList = Channel::_getChannelArrayTree(0, 0);
		
		foreach($dataList as $row)
		{
			$id = $row['id'];
			
			$parentIds = Channel::getParentIds($id);
			$childrenIds = Channel::getChildrenIds($id);
			$leafIds = Channel::getLeafIds($id);
			
			$content .= '$cachedChannels[\'' . $row['id'] . '\']=[' . self::$newLine;
			
			$content .= self::getCacheItem('id', $row, 'int');
			$content .= self::getCacheItem('parent_id', $row, 'int');
			$content .= self::getCacheItemValue('parent_ids', implode(',', $parentIds));
			$content .= self::getCacheItemValue('child_ids', implode(',', $childrenIds));
			$content .= self::getCacheItemValue('leaf_ids', implode(',', $leafIds));
			
			$content .= self::getCacheItem('name', $row);
			$content .= self::getCacheItem('name_alias', $row);
			$content .= self::getCacheItem('name_url', $row);
			$content .= self::getCacheItem('redirect_url', $row);
			$content .= self::getCacheItem('level', $row, 'int');
			$content .= self::getCacheItem('is_leaf', $row, 'bool');
			$content .= self::getCacheItem('is_nav', $row, 'bool');
			$content .= self::getCacheItem('sort_num', $row, 'int');
			
			$content .= self::getCacheItem('table', $row);
			$content .= self::getCacheItem('channel_tpl', $row);
			$content .= self::getCacheItem('list_tpl', $row);
			$content .= self::getCacheItem('detail_tpl', $row);
			
			$content .= self::getCacheItem('page_size', $row, 'int');
			
			$content .= self::getCacheItem('seo_title', $row);
			$content .= self::getCacheItem('seo_keywords', $row);
			$content .= self::getCacheItem('seo_description', $row);
			
			$content .= "];" . self::$newLine;
		}
		
		self::writeFile('cachedChannels.php', $content);
	}

	public static function createConfigCache()
	{
		self::createCacheFile();
		
		$content = '<?php' . self::$newLine;
		
		$dataList = Config::findAll();
		
		foreach($dataList as $row)
		{
			$id = $row['id'];
			
			$content .= '$cachedConfigs[\'' . $row['id'] . '\']=[' . self::$newLine;
			
			$content .= self::getCacheItem('id', $row);
			$content .= self::getCacheItem('scope', $row);
			$content .= self::getCacheItem('value', $row);
			$content .= self::getCacheItem('note', $row);
			
			$content .= "];" . self::$newLine;
		}
		
		self::writeFile('cachedConfigs.php', $content);
	}

	public static function createContentFlagCache()
	{
		self::createCacheFile();
		
		$content = '<?php' . self::$newLine;
		
		$dataList = ContentFlag::getFlags();
		
		foreach($dataList as $row)
		{
			$id = $row['id'];
			
			$content .= '$cachedContentFlags[\'' . $row['id'] . '\']=[' . self::$newLine;
			
			$content .= self::getCacheItem('id', $row);
			$content .= self::getCacheItem('name', $row);
			$content .= self::getCacheItem('value', $row, 'int');
			$content .= self::getCacheItem('note', $row);
			
			$content .= "];" . self::$newLine;
		}
		
		self::writeFile('cachedContentFlags.php', $content);
	}

	public static function createVariableCache()
	{
		self::createCacheFile();
	
		$content = '<?php' . self::$newLine;
	
		$dataList = Variable::findAll();
	
		foreach($dataList as $row)
		{
			$id = $row['id'];
				
			$content .= '$cachedVariables[\'' . $row['id'] . '\']=[' . self::$newLine;
				
			$content .= self::getCacheItem('id', $row);
			$content .= self::getCacheItem('name', $row);
			$content .= self::getCacheItem('value', $row);
			$content .= self::getCacheItem('data_type', $row,'int');
			$content .= self::getCacheItem('is_cache', $row,'bool');
			$content .= self::getCacheItem('note', $row);
				
			$content .= "];" . self::$newLine;
		}
	
		self::writeFile('cachedVariables.php', $content);
	}

	public static function createDictCache()
	{
		self::createCacheFile();
	
		$content = '<?php' . self::$newLine;
	
		$categories = DictCategory::findAll();
	
		foreach($categories as $category)
		{
			$content .= '$cachedDicts[\'' . $category['id'] . '\']=[' . self::$newLine;
	
			$dicts = Dict::_getDictArrayTree($category['id'], 0,0);
			foreach ($dicts as $row)
			{
				$id = $row['id'];
				$childrenIds=Dict::getChildrenIds($id);
				
				$content .= '	\'' . $id . '\'=>[' . self::$newLine;
				$content .='	'. self::getCacheItem('id', $row,'int');
				$content .='	'. self::getCacheItem('parent_id', $row,'int');
				$content .= '	'. self::getCacheItemValue('child_ids', implode(',', $childrenIds));
				$content .='	'. self::getCacheItem('category_id', $row);
				$content .='	'. self::getCacheItem('name', $row);
				$content .='	'. self::getCacheItem('value', $row);
				$content .='	'. self::getCacheItem('level', $row,'int');
				$content .='	'. self::getCacheItem('sort_num', $row,'int');
				$content .= "	]," . self::$newLine;
			}
			
			$content .= "];" . self::$newLine;
		}
	
		self::writeFile('cachedDicts.php', $content);
	}
	
	private static function getCacheItem($name, $row, $dataType = null)
	{
		return self::getCacheItemValue($name, $row[$name], $dataType);
	}

	private static function getCacheItemValue($name, $value, $dataType = null)
	{
		if($dataType == null)
		{
			$value = '\'' . $value . '\'';
		}
		else if($dataType == 'int')
		{
			$value = intval($value);
		}
		else if($dataType == 'bool')
		{
			if(strtolower($value) === 'true' || $value === '1' || $value === 1)
			{
				$value = 'true';
			}
			else
			{
				$value = 'false';
			}
		}
		
		return '	\'' . $name . '\' => ' . $value . ',' . self::$newLine;
	}

	private static function writeFile($fileName, $content)
	{
		$rootData = \Yii::getAlias('@data');
		TFileHelper::writeFile([$rootData, 'cache', $fileName], $content);
	}
}