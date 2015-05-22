<?php

namespace source\modules\menu;


use source\core\modularity\BaseBackModule;
class AdminModule extends BaseBackModule
{
    public $controllerNamespace = 'source\modules\menu\admin';

    public function init()
    {
        parent::init();

        $this->defaultRoute='menu-category';
        // custom initialization code goes here
    }
}
