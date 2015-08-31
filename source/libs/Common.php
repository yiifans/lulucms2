<?php

namespace source\libs;


use yii\web\UploadedFile;
use source\models\Config;
use source\LuLu;
class Common 
{
	public static function getConfig($id, $fromCache = true)
	{
	    return Config::getModel($id, $fromCache);
	}
	public static function getConfigValue($id, $fromCache = true)
	{
	    return Config::getValue($id, $fromCache);
	}
	
	public static function getTaxonomyCategories()
	{
	    $service = LuLu::getService('taxonomy');
	    return $service->getTaxonomyCategories();
	}
	
	
	public static function uploadFile($name)
	{
		
		$uploadedFile = UploadedFile::getInstanceByName($name);
	
		var_dump($uploadedFile);
		if($uploadedFile === null || $uploadedFile->hasError)
		{
			return null;
		}
	
		$ymd = date("Ymd");
	
		$save_path = \Yii::getAlias('@attachmentPath') . '/' . $ymd . "/";
		$save_url =  'data/attachment/' . $ymd . "/";
	
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
}
