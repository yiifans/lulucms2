<?php
namespace source\modules\taxonomy;

use source\core\modularity\ModuleInfo;

class TaxonomyInfo extends ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='taxonomy';
        $this->name = '分类';
        $this->version = '1.0';
        $this->description = '分类管理';
        
        $this->is_system = true;
    }
}
