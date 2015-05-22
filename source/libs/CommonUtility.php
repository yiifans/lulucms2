<?php

namespace common\includes;

use common\models\ContentFlag;
use yii\web\UploadedFile;
use components\LuLu;
use components\helpers\TFileHelper;
use common\models\config\Config;
use yii\base\InvalidParamException;
use common\models\Channel;

class CommonUtility
{

	public static function getYesNo($var = null)
	{
		$ret = ['1' => '是', '0' => '否'];
		if($var !== null)
		{
			return $ret[$var];
		}
		return $ret;
	}

	public static function getDataType($id = null)
	{
		$dataType = ['0' => '字符串', '1' => '数字', '2' => '布尔型', '3' => '日期', '4' => '数组', '5' => 'JSON'];
		
		if($id !== null)
		{
			return $dataType[$id];
		}
		
		return $dataType;
	}

	public static function getStatus($id = null)
	{
		$status = ['1' => '通过', '0' => '审核'];
		
		if($id !== null)
		{
			return $status[$id];
		}
		
		return $status;
	}

	public static function getTitleFormat($id = null)
	{
		$format = ['b' => '加粗', 'i' => '斜体', 'u' => '下划线', 's' => '删除线'];
		
		if($id !== null)
		{
			return $format[$id];
		}
		return $format;
	}

	public static function getTitleFormatValue($array)
	{
		if($array === null || ! is_array($array))
		{
			return '';
		}
		return implode(',', $array);
	}

	public static function getTitleFormatArray($var)
	{
		$format = '';
		if(is_string($var))
		{
			$format = $var;
		}
		else if(isset($var['title_format']))
		{
			$format = $var['title_format'];
		}
		
		return explode(',', trim($format, ','));
	}

	public static function formatTitle($title, $format)
	{
		$format = self::getTitleFormatArray($format);
		if(isset($format['b']))
		{
			$title = '<b>' . $title . '</b>';
		}
		if(isset($format['i']))
		{
			$title = '<i>' . $title . '</i>';
		}
		if(isset($format['u']))
		{
			$title = '<u>' . $title . '</u>';
		}
		if(isset($format['s']))
		{
			$title = '<s>' . $title . '</s>';
		}
// 		if(isset($format['c']))
// 		{
// 			$title = '<font color=' . $format['c'] . '>' . $title . '</font>';
// 		}
		return $title;
	}

	public static function getFlag($id = null)
	{
		$flags = ContentFlag::getFlags();
		if($id !== null)
		{
			if(isset($flags[$id]))
			{
				return $flags[$id];
			}
			return '';
		}
		return $flags;
	}

	public static function getFlagValue($var)
	{
		if(is_string($var))
		{
			$var = explode(',', $var);
		}
		if(! is_array($var))
		{
			return 0;
		}
		
		$ret = 0;
		foreach($var as $value)
		{
			$ret += intval($value);
		}
		return $ret;
	}

	public static function getTitlePic($var)
	{
		$titlePic = '';
		if(is_string($var))
		{
			$titlePic = $var;
		}
		else if(isset($var['title_pic']))
		{
			$titlePic = $var['title_pic'];
		}
		if(stripos($titlePic, 'http') === false)
		{
			return 'data/' . $titlePic;
		}
		return $titlePic;
	}
	
	// 碎片类型
	public static function getFragmentType($id = null)
	{
		$ret = ['1' => '代码碎片', '2' => '静态碎片', '3' => '动态碎片'];
		if($id !== null)
		{
			if(isset($ret[$id]))
			{
				return $ret[$id];
			}
			return '';
		}
		return $ret;
	}

	public static function uploadFile($name)
	{
		$uploadedFile = UploadedFile::getInstanceByName($name);
		
		if($uploadedFile === null || $uploadedFile->hasError)
		{
			return null;
		}
		
		$ymd = date("Ymd");
		
		$save_path = \Yii::getAlias('@data/attachment/image_test') . '/' . $ymd . "/";
		$save_url = 'attachment/image/' . $ymd . "/";
		
		if(! file_exists($save_path))
		{
			mkdir($save_path);
		}
		
		$file_name = $uploadedFile->getBaseName();
		$file_ext = $uploadedFile->getExtension();
		
		// 新文件名
		$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
		
		$uploadedFile->saveAs($save_path . $new_file_name);
		
		return ['path' => $save_path, 'url' => $save_url, 'name' => $file_name, 'new_name' => $new_file_name, 'ext' => $file_ext];
	}

	private static $currentTheme = null;

	public static function getCurrentTheme()
	{
		if(self::$currentTheme == null)
		{
			// todo
			self::$currentTheme = 'default';
		}
		return self::$currentTheme;
	}

	public static function getThemeUrl($resource = null)
	{
		$currentTheme = self::getCurrentTheme();
		
		if($resource === null)
		{
			return LuLu::getWebUrl() . '/static/themes/' . $currentTheme . '/';
		}
		return LuLu::getWebUrl() . '/static/themes/' . $currentTheme . '/' . $resource;
	}

	public static function getThemePath($path = null)
	{
		$currentTheme = self::getCurrentTheme();
		
		$frontend = \Yii::getAlias('@frontend');
		
		if(is_array($path))
		{
			$dir = array_merge([$frontend, 'themes', $currentTheme], $path);
		}
		else if(is_string($path))
		{
			$dir = [$frontend, 'themes', $currentTheme, $path];
		}
		else
		{
			$dir = [$frontend, 'themes', $currentTheme];
		}
		
		return TFileHelper::buildPath($dir);
	}

	public static function getFrontViews($dir, $prefix)
	{
		$themePath = self::getThemePath($dir);
		
		return TFileHelper::getFiles($themePath, $prefix);
	}

	public static function getBackViews($dir=null, $prefix=null)
	{
		$backend = \Yii::getAlias('@backend');
		if($dir==null)
		{
			$pathArray = [$backend, 'views'];
		}
		else 
		{
			if(is_string($dir))
			{
				$pathArray = [$backend, 'views', $dir];
			}
			else if(is_array($dir))
			{
				$pathArray = array_merge([$backend, 'views'], $dir);
			}
		}
		return TFileHelper::getFiles($pathArray, $prefix);
	}

	public static function getFiles($dir = null, $prefix = null, $isBack = null)
	{
		$root = '';
		if($isBack === null)
		{
			$root = \Yii::getAlias('@webroot');
		}
		else if($isBack)
		{
			$root = \Yii::getAlias('@backend');
		}
		else
		{
			$root = \Yii::getAlias('@frontend');
		}
		
		if($dir !== null)
		{
			if(is_string($dir))
			{
				$pathArray = [$root, $dir];
			}
			else if(is_array($dir))
			{
				$pathArray = array_merge([$root], $dir);
			}
		}
		else 
		{
			$pathArray=[$root];
		}
		
		return TFileHelper::getFiles($pathArray, $prefix);
	}
	
	public static function getAttachUrl($url, $echo = true)
	{
		if($echo)
		{
			echo LuLu::getWebUrl() . '/data/attachment/' . $url;
		}
		return LuLu::getWebUrl() . '/data/attachment/' . $url;
	}
	
	public static function getCachedValue($cacheItem,$cacheKey=null)
	{
		$cache = LuLu::getAppParam($cacheItem);
	
		if($cache === null)
		{
			throw new InvalidParamException('cache item:' . $cacheItem . ' does not exist');
		}
	
		if($cacheKey === null)
		{
			return $cache;
		}
		
		if(array_key_exists($cacheKey,$cache))
		{
			return $cache[$cacheKey];
		}
	
		throw new InvalidParamException('cache key:' . $cacheKey .'('. $cacheItem . '} does not exist');
	}
	
	public static function getCachedTable($tableName = null)
	{
		return self::getCachedValue('cachedTables',$tableName);
	}
	public static function getCachedChannel($chnid = null)
	{
		return self::getCachedValue('cachedChannels',$chnid);
	}
	public static function getRootChannels()
	{
		return Channel::getRootChannels();
	}
	public static function getCachedConfig($id = null)
	{
		return self::getCachedValue('cachedConfigs',$id);
	}
	public static function getCachedConfigValue($id = null)
	{
		$cachedData = self::getCachedValue('cachedConfigs',$id);
		return $cachedData['value'];
	}
	public static function getCachedDict($category = null,$id=null)
	{
		$cachedData = self::getCachedValue('cachedDicts',$category);
		if($id!==null)
		{
			return $cachedData[$id];
		}
		return $cachedData;
	}
	public static function getDictsByPId($category,$pid)
	{
		$ret = [];
		$cachedData = self::getCachedValue('cachedDicts',$category);
		if($pid===0)
		{
			foreach ($cachedData as $id=>$dict)
			{
				if($dict['parent_id']===0)
				{
					$ret[$id]=$dict;
				}
			}
		}
		else
		{
			$dict = $cachedData[$pid];
			$childIds=explode(',', $dict['child_ids']);
			foreach ($childIds as $childId)
			{
				$ret[$childId]=$dicts[$childId];
			}
		}
		return $ret;
	}
	public static function getCachedVariable($id = null)
	{
		return self::getCachedValue('cachedVariables',$id);
	}
	
	public static function getCachedVariableValue($id)
	{
		$cached = LuLu::getAppParam('cachedVariables');
		$dataType=$cached[$id]['data_type'];
		//$dataType = ['0' => '字符串', '1' => '数字', '2' => '布尔型', '3' => '日期', '4' => '数组', '5' => 'JSON'];
		
		$value = $cached[$id]['value'];
		if($dataType===0)
		{
			return $value;
		}
		if($dataType===1)
		{
			return intval($value);
		}
		if($dataType===2)
		{
			$value = strtolower($value);
			if($value=='true'||$value=='1')
			{
				return true;
			}
			return false;
		}
		if($dataType===3)
		{
			return $value;
		}
		if($dataType===4)
		{
			return $value;
		}
		if($dataType===5)
		{
			return $value;
		}
		return $value;
	}
	
}
