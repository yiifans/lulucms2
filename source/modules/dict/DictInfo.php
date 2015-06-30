<?php

namespace source\modules\dict;

use source\LuLu;

class DictInfo extends \source\core\modularity\ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='dict';
        $this->name = '字典模块';
        $this->version = '1.0';
        $this->description = '常用的数据，如 省市数据';
        
        $this->is_system = true;
    }
}
