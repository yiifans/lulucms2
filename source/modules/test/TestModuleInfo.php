<?php

namespace source\modules\test;

use source\LuLu;

class TestModuleInfo extends \source\core\modularity\ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='test-id';
        $this->name = 'Test Module';
        $this->version = '1.0';
        $this->description = 'Test description';
    }
}
