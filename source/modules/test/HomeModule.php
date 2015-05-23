<?php

namespace source\modules\test;

use source\LuLu;

class HomeModule extends \source\core\modularity\BaseFrontModule
{
    
    public $controllerNamespace = 'source\modules\test\home';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public function getMenus()
    {
        return [
            //['首页',['/test-id']],
            //['设置',['/test-id/setting']],
        ];
    }
}
