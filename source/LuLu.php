<?php
namespace source;

use yii\helpers\VarDumper;
use yii\data\Pagination;
use source\core\modularity\ModuleService;
use yii\base\InvalidParamException;
use yii\helpers\Url;

class LuLu extends \Yii
{

    public static function getApp()
    {
        return self::$app;
    }

    public static function getView()
    {
        $app = self::getApp();
        return $app->getView();
    }

    public static function getRequest()
    {
        $app = self::getApp();
        return $app->request;
    }

    public static function getResponse()
    {
        $app = static::getApp();
        return $app->response;
    }

    public static function getBaseUrl($url = null)
    {
        $app = self::getApp();
        $baseUrl = $app->request->getBaseUrl();
        if ($url !== null)
        {
            $baseUrl .= $url;
        }
        return $baseUrl;
    }

    public static function getHomeUrl($url = null)
    {
        $app = self::getApp();
        $homeUrl = $app->getHomeUrl();
        if ($url !== null)
        {
            $homeUrl .= $url;
        }
        return $homeUrl;
    }

    public static function getWebUrl($url = null)
    {
        $webUrl = self::getAlias('@web');
        if ($url !== null)
        {
            $webUrl .= $url;
        }
        return $webUrl;
    }

    public static function getWebPath($path = null)
    {
        $webPath = self::getAlias('@webroot');
        if ($path !== null)
        {
            $webPath .= $path;
        }
        return $webPath;
    }

    public static function getAppParam($key, $defaultValue = null)
    {
        $app = self::getApp();
        if (array_key_exists($key, $app->params))
        {
            return $app->params[$key];
        }
        return $defaultValue;
    }

    public static function setAppParam($array)
    {
        $app = self::getApp();
        foreach ($array as $key => $value)
        {
            $app->params[$key] = $value;
        }
    }

    public static function getViewParam($key, $defaultValue = null)
    {
        $app = self::getApp();
        $view = $app->getView();
        if (array_key_exists($key, $view->params))
        {
            return $view->params[$key];
        }
        return $defaultValue;
    }

    public static function setViewParam($array)
    {
        $app = self::getApp();
        $view = $app->getView();
        foreach ($array as $name => $value)
        {
            $view->params[$name] = $value;
        }
    }

    public static function hasGetValue($key)
    {
        return isset($_GET[$key]);
    }

    /**
     * 
     * @param string $key a or a/b/c
     * @param string $default
     * @return string|unknown
     */
    public static function getGetValue($key, $default = NULL)
    {
        $data = $_GET;
        
        $keys = explode('/', $key);
        foreach ($keys as $key)
        {
            if (is_array($data) && key_exists($key, $data))
            {
                $data = $data[$key];
            }
            else
            {
                return $default;
            }
        }
        
        if ($data===null)
        {
            return $default;
        }
        return $data;
    }

    public static function hasPostValue($key)
    {
        return isset($_POST[$key]);
    }

    public static function getPostValue($key, $default = NULL)
    {
        $data = $_POST;
        
        $keys = explode('/', $key);
        foreach ($keys as $key)
        {
            if (is_array($data) && key_exists($key, $data))
            {
                $data = $data[$key];
            }
            else
            {
                return $default;
            }
        }
        
        if ($data===null)
        {
            return $default;
        }
        return $data;
    }

    public static function getFlash($type,$default=null)
    {
        $app = self::getApp();
        $flash = $app->session->getFlash($type,$default);
        if($flash===null)
        {
            $flash=[];
        }
        if(is_string($flash))
        {
            $flash=[$flash];
        }
        return $flash;
    }
    
    public static function setFlash($type, $message,$append=true)
    {
        if($append)
        {
            $flash = self::getFlash($type);
            if(is_string($message))
            {
                $flash[]=$message;
            }
            else if(is_array($message))
            {
                $flash=array_merge($flash,$message);
            }
            else if($message===null)
            {
                $flash=null;
            }
            
            $message=$flash;
        }
        $app = self::getApp();
        $app->session->setFlash($type, $message);
    }

    public static function setWarningMessage($message)
    {
        self::setFlash('warning', $message);
    }

    public static function setSuccessMessage($message)
    {
        self::setFlash('success', $message);
    }

    public static function setErrorMessage($message)
    {
        self::setFlash('error', $message);
    }

    

    public static function error($message, $category = 'application')
    {
        parent::error($message, $category);
        self::setErrorMessage($message);
    }
    public static function warning($message, $category = 'application')
    {
        parent::warning($message, $category);
        self::setWarningMessage($message);
    }
    public static function info($var, $category = 'application')
    {
        $dump = VarDumper::dumpAsString($var);
        parent::info($dump, $category);
    }
    public static function debug($var, $category = 'application')
    {
        $dump = VarDumper::dumpAsString($var);
        parent::info($dump, $category);
    }
    public static function getCache($key)
    {
        $cache = LuLu::$app->cache;
        return $cache->get($key);
    }
    public static function setCache($key, $value, $duration = 0, $dependency = null)
    {
        $cache = LuLu::$app->cache;
        return $cache->set($key, $value,$duration,$dependency);
    }
    public static function deleteCache($key)
    {
        $cache = LuLu::$app->cache;
        $cache->delete($key);
    }
    public static function flushCache()
    {
        $cache = LuLu::$app->cache;
        $cache->flush();
    }
    
    public static function getUser()
    {
        $app = self::getApp();
        return $app->user;
    }

    public static function getIdentity()
    {
        $app = self::getApp();
        $identity = $app->user->getIdentity();
        if(empty($identity))
        {
            $identity = new \source\models\User();
        }
        return $identity;
    }

    public static function getIsGuest()
    {
        $app = self::getApp();
        return $app->user->isGuest;
    }

    public static function checkIsGuest($loginUrl = null)
    {
        $app = self::getApp();
        $isGuest = $app->user->isGuest;
        if ($isGuest)
        {
            if ($loginUrl == false)
            {
                return false;
            }
            if ($loginUrl == null)
            {
                $loginUrl = [
                    'site/login'
                ];
            }
            return $app->getResponse()->redirect(Url::to($loginUrl), 302);
        }
        return true;
    }

    public static function checkAuth($permissionName, $params = [], $allowCaching = true)
    {
        $app = self::getApp();
        return $app->user->can($permissionName, $params, $allowCaching);
    }

    public static function getDB()
    {
        $app = self::getApp();
        return $app->db;
    }

    public static function createCommand($sql = null)
    {
        $app = self::getApp();
        $db = $app->db;
        if ($sql !== null)
        {
            return $db->createCommand($sql);
        }
        return $db->createCommand();
    }

    public static function execute($sql)
    {
        $app = self::getApp();
        $db = $app->db;
        $command = $db->createCommand($sql);
        return $command->execute();
    }

    public static function queryAll($sql)
    {
        $app = self::getApp();
        $db = $app->db;
        $command = $db->createCommand($sql);
        return $command->queryAll();
    }

    public static function queryOne($sql)
    {
        $app = self::getApp();
        $db = $app->db;
        $command = $db->createCommand($sql);
        return $command->queryOne();
    }

    /**
     * 
     * @param unknown $query
     * @param array $config ['db','page','pageSize','orderBy','rows','pager']
     * @return multitype:\yii\data\Pagination unknown
     */
    public static function getPagedRows($query, $config = [])
    {
        $db = isset($config['db'])?$config['db']:null;
        
        $countQuery = clone $query;
        $pager = new Pagination([
            'totalCount' => $countQuery->count('*', $db),
        ]);
        if (isset($config['page']))
        {
            $pager->setPage($config['page'], true);
        }
        
        if (isset($config['pageSize']))
        {
            $pager->setPageSize($config['pageSize'], true);
        }
        
        $rows = $query->offset($pager->offset)->limit($pager->limit);
        
        if (isset($config['orderBy']))
        {
            $rows = $rows->orderBy($config['orderBy']);
        }
        $rows = $rows->all($db);
        
        $rowsLable = isset($config['rows']) ? $config['rows'] : 'rows';
        $pagerLable = isset($config['pager']) ? $config['pager'] : 'pager';
        
        $ret = [];
        $ret[$rowsLable] = $rows;
        $ret[$pagerLable] = $pager;
		
		return $ret;
	}
	
	public static function getService($id)
	{
	    $id=$id.'Service';
        $component = self::$app->get($id,true);
	    if( $component instanceof ModuleService)
	    {
	        return  $component;
	    }
	    InvalidParamException("get service:$id");
	}
	
	public static function go($url)
	{
	    $url=Url::to($url);
	    exit('<script>top.location.href="'.$url.'"</script>');
	}
}
