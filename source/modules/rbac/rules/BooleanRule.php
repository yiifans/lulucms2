<?php
namespace source\modules\rbac\rules;

use source\core\modularity\ModuleInfo;
use source\LuLu;

class BooleanRule extends Rule
{

    public function execute($permission, $params = [], $role = null)
    {
        if ($permission['value'])
        {
            return true;
        }
        return false;
    }
}