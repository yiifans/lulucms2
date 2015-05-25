<?php
namespace source\modules\menu;

use source\core\base\ModuleComponent;
use source\core\modularity\ModuleInfo;

class MenuInfo extends ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='menu';
        $this->name = '菜单';
        $this->version = '1.0';
        $this->description = '提供所有的菜单功能支持';
        
        $this->is_system = true;
    }
}
