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