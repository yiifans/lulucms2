<?php

namespace source\modules\takonomy;



use source\core\modularity\BaseBackModule;
class AdminModule extends BaseBackModule
{
    public $controllerNamespace = 'source\modules\takonomy\admin';

   
    public function init()
    {
    	parent::init();
    	$this->defaultRoute='takonomy-category';
    }
   
}
