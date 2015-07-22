<?php

namespace source\modules\takonomy\admin;



use source\core\modularity\BackModule;
class AdminModule extends BackModule
{
    public $controllerNamespace = 'source\modules\takonomy\admin\controllers';

   
    public function init()
    {
    	parent::init();
    	$this->defaultRoute='takonomy-category';
    }
   
}
