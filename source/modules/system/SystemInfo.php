<?php
namespace source\modules\system;

use source\core\modularity\ModuleInfo;

class SystemInfo extends ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='system';
        $this->name = '系统模块';
        $this->version = '1.0';
        $this->description = '系统设置，如站点信息、时间等';
        
        $this->is_system = true;
    }
}
