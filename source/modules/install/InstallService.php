<?php

namespace source\modules\install;

use source\LuLu;

class InstallService extends \source\core\modularity\ModuleService
{

    public function init()
    {
        parent::init();
    }
    
    public function getServiceId()
    {
        return 'installSerivce';
    }
}
