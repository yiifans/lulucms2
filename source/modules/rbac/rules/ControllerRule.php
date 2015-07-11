<?php
namespace source\modules\rbac\rules;

use source\core\modularity\ModuleInfo;
use source\LuLu;

class ControllerRule extends Rule
{

    
    // $role = $permission['role'];
    // $permission = $permission['permission'];
    // $value = $permission['value'];
    // $rule = $permission['rule'];
    // $form = $permission['form'];
    public function execute($role, $permission, $params = [])
    {
        $actionId = isset($params['actionId']) ? $params['actionId'] : LuLu::getApp()->requestedAction->id;
        
        $actions = $permission['value'];
        if (in_array($actionId, $actions))
        {
            return true;
        }
        
        $method = LuLu::getApp()->request->method;
        $method=strtolower($method);
        if (in_array($actionId.':'.$method, $actions))
        {
            return true;
        }
        
        return false;
    }
}