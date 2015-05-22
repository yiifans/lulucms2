<?php
namespace source\modules\system;

use source\core\modularity\ModuleInfo;

class SystemModule extends ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->name = '系统模块';
        $this->version = '1.0';
        $this->description = '系统设置，如站点信息、时间等';
        
        $this->is_system = true;
    }
}
