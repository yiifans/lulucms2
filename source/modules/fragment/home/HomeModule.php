<?php

namespace source\modules\fragment\home;

use source\LuLu;

class HomeModule extends \source\core\modularity\FrontModule
{
    
    public $controllerNamespace = 'source\modules\fragment\home\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    //public function getMenus()
    //{
    //    return [
    //        //['首页',['/fragment']],
    //        //['设置',['/fragment/setting']],
    //    ];
    //}
}
