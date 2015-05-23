<?php

namespace source\modules\ttt;

use source\LuLu;

class AdminModule extends \source\core\modularity\BaseBackModule
{
    public $controllerNamespace = 'source\modules\ttt\admin';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public function getMenus()
    {
        return [
            ['首页',['/yy-y']],
            ['设置',['/yy-y/setting']],
        ];
    }
}
