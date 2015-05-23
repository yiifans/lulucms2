<?php

namespace source\modules\test;

use source\LuLu;

class AdminModule extends \source\core\modularity\BaseBackModule
{
    public $controllerNamespace = 'source\modules\test\admin';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public function getMenus()
    {
        return [
            ['首页',['/test-id']],
            ['设置',['/test-id/setting']],
        ];
    }
}
