<?php
namespace source\core\modularity;

class BaseBackModule extends BaseModule
{

    public function init()
    {
        parent::init();
        
        $this->setViewPath($this->getBasePath() . '/admin/views');
    }
}
