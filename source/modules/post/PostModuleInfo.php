<?php
namespace source\modules\post;

use source\core\modularity\ModuleInfo;

class PostModuleInfo extends ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='post';
        $this->name = '文章';
        $this->version = '1.0';
        $this->description = '文章模块';
    }
}
