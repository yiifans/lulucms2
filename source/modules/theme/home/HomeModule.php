<?php

namespace source\modules\theme\home;

use source\LuLu;

class HomeModule extends \source\core\modularity\FrontModule
{
    
    public $controllerNamespace = 'source\modules\theme\home\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    //public function getMenus()
    //{
    //    return [
    //        //['首页',['/theme']],
    //        //['设置',['/theme/setting']],
    //    ];
    //}
}
