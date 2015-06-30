<?php

namespace source\modules\dict;

use source\LuLu;

class AdminModule extends \source\core\modularity\BackModule
{

    public $controllerNamespace = 'source\modules\dict\admin';

    public function init()
    {
        parent::init();

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
