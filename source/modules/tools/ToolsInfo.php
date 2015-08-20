<?php

namespace source\modules\tools;

use source\LuLu;

class ToolsInfo extends \source\core\modularity\ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='tools';
        $this->name = '工具模块';
        $this->version = '1.0';
        $this->description = '缓存、数据库管理等';
        
        $this->is_system = true;
    }
}
