<?php
namespace source\modules\rbac\rules;

use source\core\modularity\ModuleInfo;

class Rule extends \yii\base\Object
{

    public static function getRules()
    {
        $items=[
            'BooleanRule'=>'布尔值判断',
            'ControllerRule'=>'对控制器中Action判断',
        ];
        return $items;
    }
  
  
//     $role = $permission['role'];
//     $permission = $permission['permission'];
//     $value = $permission['value'];
//     $rule = $permission['rule'];
//     $form = $permission['form'];
    
    public function execute($role, $permission, $params = [])
    {
        return true;
    }
}