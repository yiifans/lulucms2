<?php
namespace source\libs;

use source\LuLu;
use yii\helpers\FileHelper;

class Resource
{

    public static function registerFile($url)
    {
        $view = LuLu::getView();
        
        $dot = stripos($url, '.css');
        if ($dot > 0)
        {
            echo '<link type="text/css" rel="stylesheet" href="' . $url . '" />' . "\n";
        }
        else
        {
            echo '<script type="text/javascript" src="' . $url . '" ></script>' . "\n";
        }
    }

    public static function getAdminTheme()
    {
        $currentTheme = Common::getConfigValue('sys_theme_admin');
        return $currentTheme;
    }

    public static function getHomeTheme()
    {
        $currentTheme = Common::getConfigValue('sys_theme_home');
        return $currentTheme;
    }

    public static function getCommonPath($path = null)
    {
        $ret = LuLu::getAlias('@webroot/statics/common');
        if ($path != null)
        {
            return $ret . $path;
        }
        return $ret;
    }

    public static function getCommonUrl($url = null)
    {
        $ret = LuLu::getAlias('@web/statics/common');
        if ($url != null)
        {
            return $ret . $url;
        }
        return $ret;
    }

    public static function registerCommon($url)
    {
        $url = self::getCommonUrl($url);
        self::registerFile($url);
    }

    public static function getAdminPath($path = null)
    {
        $currentTheme = self::getAdminTheme();
        $ret = '@webroot/statics/admin/' . $currentTheme;
        if ($path != null)
        {
            return $ret . $path;
        }
        return $ret;
    }

    public static function getAdminUrl($url = null)
    {
        $currentTheme = self::getAdminTheme();
        $ret = LuLu::getAlias('@web/statics/admin/' . $currentTheme);
        if ($url != null)
        {
            return $ret . $url;
        }
        return $ret;
    }

    public static function registerAdmin($url)
    {
        if (is_array($url))
        {
            foreach ($url as $u)
            {
                $u = self::getAdminUrl($u);
                self::registerFile($u);
            }
        }
        else
        {
            $url = self::getAdminUrl($url);
            self::registerFile($url);
        }
    }

    public static function getThemePath($path = null)
    {
        $currentTheme = self::getHomeTheme();
        $ret = '@webroot/statics/themes/' . $currentTheme;
        if ($path != null)
        {
            return $ret . $path;
        }
        return $ret;
    }

    public static function getThemeUrl($url = null)
    {
        $currentTheme = self::getHomeTheme();
        $ret = LuLu::getAlias('@web/statics/themes/' . $currentTheme);
        if ($url != null)
        {
            return $ret . $url;
        }
        return $ret;
    }

    public static function registerTheme($url)
    {
        $url = self::getThemeUrl($url);
        self::registerFile($url);
    }

    public static function getContentItemView($content)
    {
        $currentTheme = self::getHomeTheme();
        $ret = '@webroot/statics/themes/' . $currentTheme . '/modules/' . $content['type'] . '/_inc/content_default';
        
        return $ret;
    }
    
    public static function checkHomeThemeFile($fileName,$checkDefault=true)
    {
        $currentTheme = Resource::getHomeTheme();
        
        $path=LuLu::getAlias('statics').'/themes/'.$currentTheme.$fileName.'.php';
        if(!FileHelper::exist($path) && $checkDefault)
        {
            
            $currentTheme='d';
            $path=LuLu::getAlias('statics').'/themes/'.$currentTheme.$fileName.'.php';
        }
        else
        {
            return $currentTheme;
        }
        if(!FileHelper::exist($path))
        {
            return false;
        }
        return $currentTheme;
    }
    
    public static function getInstallPath($path = null)
    {
        $ret = '@webroot/statics/install';
        if ($path != null)
        {
            return $ret . $path;
        }
        return $ret;
    }
    
    public static function getInstallUrl($url = null)
    {
        $ret = LuLu::getAlias('@web/statics/install');
        if ($url != null)
        {
            return $ret . $url;
        }
        return $ret;
    }
}

