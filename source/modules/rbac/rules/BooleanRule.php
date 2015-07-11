<?php
namespace source\modules\rbac\rules;

use source\core\modularity\ModuleInfo;
use source\LuLu;

class BooleanRule extends Rule
{

    
    // $role = $permission['role'];
    // $permission = $permission['permission'];
    // $value = $permission['value'];
    // $rule = $permission['rule'];
    // $form = $permission['form'];
    public function execute($role, $permission, $params = [])
    {
        if($permission['value'])
        {
            return true;
        }
        return false;
    }
}