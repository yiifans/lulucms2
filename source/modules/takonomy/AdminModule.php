<?php

namespace source\modules\takonomy;



use source\core\modularity\BackModule;
class AdminModule extends BackModule
{
    public $controllerNamespace = 'source\modules\takonomy\admin';

   
    public function init()
    {
    	parent::init();
    	$this->defaultRoute='takonomy-category';
    }
   
}
