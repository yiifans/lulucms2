<?php
namespace source\libs;

use source\LuLu;

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
        $currentTheme = LuLu::getAppParam('adminTheme');
        return $currentTheme;
    }

    public static function getHomeTheme()
    {
        $currentTheme = LuLu::getAppParam('homeTheme');
        return $currentTheme;
    }

    public static function getCommonPath($path = null)
    {
        $ret = LuLu::getAlias('@webroot/static/common');
        if ($path != null)
        {
            return $ret . $path;
        }
        return $ret;
    }

    public static function getCommonUrl($url = null)
    {
        $ret = LuLu::getAlias('@web/static/common');
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
        $ret = '@webroot/static/admin/' . $currentTheme;
        if ($path != null)
        {
            return $ret . $path;
        }
        return $ret;
    }

    public static function getAdminUrl($url = null)
    {
        $currentTheme = self::getAdminTheme();
        $ret = LuLu::getAlias('@web/static/admin/' . $currentTheme);
        if ($url != null)
        {
            return $ret . $url;
        }
        return $ret;
    }

    public static function registerAdmin($url)
    {
        if(is_array($url))
        {
            foreach($url as $u)
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
        $ret = '@webroot/static/themes/' . $currentTheme;
        if ($path != null)
        {
            return $ret . $path;
        }
        return $ret;
    }

    public static function getThemeUrl($url = null)
    {
        $currentTheme = self::getHomeTheme();
        $ret = LuLu::getAlias('@web/static/themes/' . $currentTheme);
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
        $ret = '@webroot/static/themes/' . $currentTheme . '/modules/' . $content['type'] . '/_inc/content_default';
        
        return $ret;
    }
}

