<?php

namespace source\modules\theme\admin;

use source\LuLu;

class AdminModule extends \source\core\modularity\BackModule
{

    public $controllerNamespace = 'source\modules\theme\admin\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    //public function getMenus()
    //{
    //    return [
    //        ['首页',['/theme']],
    //        ['设置',['/theme/setting']],
    //    ];
    //}
}
