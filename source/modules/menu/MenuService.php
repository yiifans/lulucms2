<?php
namespace source\modules\menu;

use source\LuLu;
use source\core\modularity\ModuleService;
use source\core\modularity\ModuleInfo;
use source\modules\modularity\models\Modularity;
use yii\helpers\FileHelper;

class MenuService extends ModuleService
{

    public function getServiceId()
    {
        return 'menuService';
    }

}
