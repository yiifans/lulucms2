<?php
namespace source\modules\page;

use source\core\base\ModuleComponent;
use source\core\modularity\ModuleInfo;

class PageInfo extends ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='page';
        $this->name = '单面';
        $this->version = '1.0';
        $this->description = '单面内容模块';
        
        $this->is_system = true;
    }
}
