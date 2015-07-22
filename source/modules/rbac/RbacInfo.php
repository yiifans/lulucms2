<?php
namespace source\modules\rbac;

use source\core\modularity\ModuleInfo;

class RbacInfo extends ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='rbac';
        $this->name = '权限模块';
        $this->version = '1.0';
        $this->description = '权限管理模块';
        
        $this->is_system = true;
    }
}
