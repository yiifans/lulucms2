<?php

namespace source\modules\ttt;

use source\LuLu;

class TttModuleInfo extends \source\core\modularity\ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='yy-y';
        $this->name = 'Ttt Module';
        $this->version = '1.0';
        $this->description = 'Ttt description';
    }
}
