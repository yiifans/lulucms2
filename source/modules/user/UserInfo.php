<?php
namespace source\modules\user;


class UserInfo extends \source\core\modularity\ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='user';
        $this->name = '用户模块';
        $this->version = '1.0';
        $this->description = '用户管理模块';
        
        $this->is_system = true;
    }
}
