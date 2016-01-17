<?php
namespace yii\helpers;



use source\LuLu;
class FileHelper extends \yii\helpers\BaseFileHelper
{

    public static function buildPath($pathes, $withStart = false, $withEnd = false)
    {
        $ret = '';
        
        foreach ($pathes as $path)
        {
            $ret .= $path . DIRECTORY_SEPARATOR;
        }
        if ($withStart)
        {
            $ret = DIRECTORY_SEPARATOR . $ret;
        }
        if (! $withEnd)
        {
            $ret = rtrim($ret, DIRECTORY_SEPARATOR);
        }
        return $ret;
    }

    public static function isDir($path)
    {
        return is_dir($path);
    }

    public static function exist($path)
    {
        if (is_array($path))
        {
            $path = self::buildPath($path);
        }
        $path = self::normalizePath($path);
        //LuLu::info($path);
        return file_exists($path);
    }

    public static function getFiles($path, $prefix = null)
    {
        if (is_array($path))
        {
            $path = self::buildPath($path);
        }
        
        if (! is_dir($path))
        {
            // var_dump($path);
            return [];
        }
        
        $files = scandir($path);
        if ($prefix == null)
        {
            return $files;
        }
        
        $ret = [];
        foreach ($files as $file)
        {
            if (strpos($file, $prefix) === 0)
            {
                $ret[] = $file;
            }
        }
        
        return $ret;
    }

    public static function createFile($filePath, $content)
    {
    }

  
    public static function readFile($filePath)
    {
        if (is_array($filePath))
        {
            $filePath = self::buildPath($filePath);
        }
        
        return file_get_contents($filePath);
    }

    public static function writeFile($filePath, $content, $mode = 'w')
    {
        if (is_array($filePath))
        {
            $filePath = self::buildPath($filePath);
        }
        
        $f = fopen($filePath, $mode);
        fwrite($f, $content);
        fclose($f);
    }

    public static function createDir($dirPath)
    {
    }

    public static function removeDir($dirPath)
    {
    }
    
    public static function canWrite($file)
    {
        return is_writable($file);
    }
    
    public static function removeFile($file)
    {
        @unlink();
    }
   
    public static function writeArray($file, $array)
    {
        $str = var_export($array, TRUE);
        $str = '<?php return ' . $str . ' ;?>';
        file_put_contents($file, $str);
    }
}