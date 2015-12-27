<?php

namespace source\traits;


use yii\helpers\VarDumper;
use Yii;
use yii\helpers\Url;
use yii\data\Pagination;
use yii\web\Cookie;
use source\LuLu;
use yii\base\Model;
use source\libs\Common;


/**
 *
 * @property \source\modules\modularity\ModularityService $modularityService 
 * @property \source\modules\rbac\RbacService $rbacService 
 * @property \source\modules\taxonomy\TaxonomyService $taxonomyService
 * @property \source\modules\menu\MenuService $menuService 
 *
 */
trait  CommonTrait
{   
    public function __get($name)
    {
        $dot = strpos($name,'Service');
        if($dot>0)
        {
            $serviceName = substr($name,0,$dot);
            return LuLu::getService($serviceName);
        }
        return parent::__get($name);
    }
   
    public function getConfig($id)
    {
        return Common::getConfig($id);
    }
    
    public function getConfigValue($id)
    {
        return Common::getConfigValue($id);
    }
    
    public function showConfigValue($id)
    {
        $value = self::getConfigValue($id);
        if(!empty($value))
        {
            echo $value;
        }
    }
}



