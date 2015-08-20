<?php

namespace source\modules\theme;

use source\LuLu;

class ThemeInfo extends \source\core\modularity\ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='theme';
        $this->name = '主题模块';
        $this->version = '1.0';
        $this->description = '用来设置前台和后台主题';
        
        $this->is_system = true;
    }
}
