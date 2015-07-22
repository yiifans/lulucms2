<?php

namespace source\modules\menu\admin;


use source\core\modularity\BackModule;
class AdminModule extends BackModule
{
    public $controllerNamespace = 'source\modules\menu\admin\controllers';

    public function init()
    {
        parent::init();

        $this->defaultRoute='menu-category';
        // custom initialization code goes here
    }
}
