<?php

namespace source\modules\ttt;

use source\LuLu;

class HomeModule extends \source\core\modularity\BaseFrontModule
{
    
    public $controllerNamespace = 'source\modules\ttt\home';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public function getMenus()
    {
        return [
            //['首页',['/yy-y']],
            //['设置',['/yy-y/setting']],
        ];
    }
}
