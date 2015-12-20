<?php
namespace source\modules\menu;

use source\LuLu;
use source\core\modularity\ModuleService;
use source\core\modularity\ModuleInfo;
use source\modules\modularity\models\Modularity;
use yii\helpers\FileHelper;
use source\modules\menu\models\Menu;

class MenuService extends ModuleService
{

    public function getServiceId()
    {
        return 'menuService';
    }
    
    public static function getChildren($category,$parentId=0,$status=null)
    {
        return Menu::getChildren($category, $parentId,$status=null);
    }

    public static function getMenuHtml($category,$parentId)
    {
        return Menu::getMenuHtml($category, 0);
    }
}
