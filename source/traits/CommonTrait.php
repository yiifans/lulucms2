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


trait  CommonTrait
{
    /**
     * @var \source\modules\modularity\ModularityService
     */
    public $modularityService;
    /**
     * @var \source\modules\rbac\RbacService
     */
    public $rbacService;
    /**
     * @var \source\modules\taxonomy\TaxonomyService
     */
    public $taxonomyService;
    
    /**
     * @var \source\modules\menu\MenuService
     */
    public $menuService;
    
    public function initService()
    {
        $this->modularityService = LuLu::getService('modularity');
        $this->rbacService = LuLu::getService('rbac');
        $this->taxonomyService = LuLu::getService('taxonomy');
        $this->menuService=LuLu::getService('menu');
    }
    
    public function getConfig($id)
    {
        return Common::getConfig($id);
    }
    
    public function getConfigValue($id)
    {
        return Common::getConfigValue($id);
    }
}



