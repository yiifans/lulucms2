<?php

namespace source\modules\tools;

use source\LuLu;

class ToolsService extends \source\core\modularity\ModuleService
{

    public function init()
    {
        parent::init();
    }
    
    public function getServiceId()
    {
        return 'toolsSerivce';
    }
}
