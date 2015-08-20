<?php

namespace source\modules\taxonomy\admin;



use source\core\modularity\BackModule;
class AdminModule extends BackModule
{
    public $controllerNamespace = 'source\modules\taxonomy\admin\controllers';

   
    public function init()
    {
    	parent::init();
    	$this->defaultRoute='taxonomy-category';
    }
   
}
