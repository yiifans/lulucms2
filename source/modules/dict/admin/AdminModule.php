<?php

namespace source\modules\dict\admin;

use source\LuLu;

class AdminModule extends \source\core\modularity\BackModule
{

    public $controllerNamespace = 'source\modules\dict\admin\controllers';

    public function init()
    {
        parent::init();

        $this->defaultRoute='dict-category';
        // custom initialization code goes here
    }
    
//     public function getMenus()
//     {
//         return [
//             ['首页',['/dict']],
//             ['设置',['/dict/setting']],
//         ];
//     }
}
