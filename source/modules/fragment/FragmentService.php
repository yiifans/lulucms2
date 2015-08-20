<?php

namespace source\modules\fragment;

use source\LuLu;

class FragmentService extends \source\core\modularity\ModuleService
{

    public function init()
    {
        parent::init();
    }
    
    public function getServiceId()
    {
        return 'fragmentSerivce';
    }
}
