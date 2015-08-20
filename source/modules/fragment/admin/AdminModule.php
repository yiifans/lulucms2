<?php

namespace source\modules\fragment\admin;

use source\LuLu;

class AdminModule extends \source\core\modularity\BackModule
{

    public $controllerNamespace = 'source\modules\fragment\admin\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    //public function getMenus()
    //{
    //    return [
    //        ['首页',['/fragment']],
    //        ['设置',['/fragment/setting']],
    //    ];
    //}
}
