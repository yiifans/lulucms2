<?php
namespace source\modules\takonomy;

use source\core\modularity\ModuleInfo;

class TakonomyModule extends ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->name = '分类';
        $this->version = '1.0';
        $this->description = '分类管理';
        
        $this->is_system = true;
    }
}
