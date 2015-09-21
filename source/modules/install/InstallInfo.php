<?php

namespace source\modules\install;

use source\LuLu;

class InstallInfo extends \source\core\modularity\ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='install';
        $this->name = 'Install Module';
        $this->version = '1.0';
        $this->description = 'Install description';
    }
}
