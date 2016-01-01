<?php

namespace source\libs;


use yii\web\UploadedFile;
use source\models\Config;
use source\LuLu;
class Common 
{
    public static function checkInstall($config)
    {
        if(!isset($config['components']['db']['class']))
        {
            exit('<script>top.location.href="install.php"</script>');
        }
    }
    
    public static function setTimezone()
    {
        $timezone = Common::getConfigValue('sys_datetime_timezone');
         
        date_default_timezone_set($timezone);
    }
    
    /**
     * 获取配置
     * @param string $id 配置ID
     * @param boolean $fromCache 是否从缓存读取，
     * @return \source\models\Config 
     */
	public static function getConfig($id, $fromCache = true)
	{
	    return Config::getModel($id, $fromCache);
	}
	
	/**
	 * 获取配置值
	 * @param string $id
	 * @param boolean $fromCache
	 * @return string
	 */
	public static function getConfigValue($id, $fromCache = true)
	{
	    return Config::getValue($id, $fromCache);
	}
	
	public static function getTaxonomyCategories()
	{
	    $service = LuLu::getService('taxonomy');
	    return $service->getTaxonomyCategories();
	}
	
	/**
	 * 
	 * -path
	 * -url
	 * -name
	 * -new_name
	 * -temp_name
	 * -type
	 * -ext
	 * -size
	 * -message
	 * 
	 * @param string $name the form name
	 * @return array
	 */
	public static function uploadFile($name)
	{
	    LuLu::info($name,__METHOD__.',the form name is '.$name);
		$uploadedFile = UploadedFile::getInstanceByName($name);
		
		if($uploadedFile === null)
		{
			return ['message'=>'没有文件'];
		}
	
		if($uploadedFile->hasError)
		{
    		switch($uploadedFile->error){
        		case '1':
        			$error = '超过php.ini允许的大小。';
        			break;
        		case '2':
        			$error = '超过表单允许的大小。';
        			break;
        		case '3':
        			$error = '图片只有部分被上传。';
        			break;
        		case '4':
        			$error = '请选择图片。';
        			break;
        		case '6':
        			$error = '找不到临时目录。';
        			break;
        		case '7':
        			$error = '写文件到硬盘出错。';
        			break;
        		case '8':
        			$error = 'File upload stopped by extension。';
        			break;
        		case '999':
        		default:
        			$error = '未知错误。';
        	}
		        
		    LuLu::error($error,'上传文件出错');
		    return ['message'=>$error];
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
	
		return ['path' => $save_path, 'url' => $save_url, 'name' => $file_name, 'new_name' => $new_file_name, 'ext' => $file_ext,
            'full_name'=>$save_url.$new_file_name,
		    'temp_name'=>$uploadedFile->tempName,'type'=>$uploadedFile->type,'size'=>$uploadedFile->size,'message'=>'ok'];
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
