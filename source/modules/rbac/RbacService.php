<?php
namespace source\modules\rbac;

use source\modules\rbac\models\Role;
use source\modules\rbac\models\Assignment;
use source\modules\rbac\models\Permission;
use source\modules\rbac\models\Relation;
use yii\db\Query;
use source\modules\rbac\models\Category;
use source\LuLu;

class RbacService extends \source\core\modularity\ModuleService
{
    private $assignmentTable;
    private $roleTable;
    private $permissionTable;
    private $relationTable;

    public function init()
    {
        parent::init();
        
        $this->assignmentTable = Assignment::tableName();
        $this->roleTable = Role::tableName();
        $this->permissionTable = Permission::tableName();
        $this->relationTable = Relation::tableName();
    }
    
    public function getServiceId()
    {
        return 'rbacService';
    }
   
//     public function getRolesByUser($user)
//     {
//         $query = new Query();
//         $query->select([
//             'r.id',
//             'r.category_id',
//             'r.name',
//             'r.description',
//             'r.is_system',
//             'r.status',
//         ]);
//         $query->from([
//             'r'=>$this->roleTable,
//             'a'=>$this->assignmentTable,
//         ]);
//         $query->where('r.id=a.role');
//         $query->andWhere([
//             'a.user' => $user
//         ]);
//         $rows = $query->all();
//         return $this->convertPermissionValue($rows);
//     }

//     public function getPermissionsByUser($user=null)
//     {
//         $query = new Query();
//         $query->select([
//             'r.role',
//             'r.permission', 
//             'r.value',
//             'p.rule', 
//             'p.form'
//         ]);
//         $query->from([
//             'p'=>$this->permissionTable,
//             'r'=>$this->relationTable, 
//             'a'=>$this->assignmentTable,
//         ]);
//         $query->where('p.id=r.permission and r.role=a.role');
//         $query->andWhere([
//             'a.user' => $user
//         ]);
//         $query->from([
//             'p'=>$this->permissionTable,
//             'r'=>$this->relationTable,
//         ]);
//         $query->where('p.id=r.permission and r.role=a.role');
//         $query->andWhere([
//             'a.user' => $user
//         ]);
//         $rows = $query->all();
//         return $this->convertPermissionValue($rows);
//     }

    public function getPermissionsByRole($role)
    {
        $query = new Query();
        $query->select([
            'r.role',
            'r.permission', 
            'r.value', 
            'p.rule',
            'p.form',
        ]);
        $query->from([
            'p'=>$this->permissionTable,
            'r'=>$this->relationTable
        ]);
        $query->where('r.permission=p.id');
        $query->andWhere(['r.role' => $role ]);
        $rows = $query->all();
        
        return $this->convertPermissionValue($rows);
    }

    private function convertPermissionValue($rows)
    {
        $ret = [];
        if ($rows === null)
        {
            return $ret;
        }
        foreach ($rows as $row)
        {
            $form = intval($row['form']);
            $v = $row['value'];
            if ($form === Permission::Form_Boolean)
            {
                if ($v === '1' || $v === 'true')
                {
                    $v = true;
                }
                else
                {
                    $v = false;
                }
            }
            else if ($form === Permission::Form_CheckboxList)
            {
                $v = explode(',', $v);
            }
            $row['value']=$v;
            $ret[$row['permission']] = $row;
        }
        return $ret;
    }

    public function checkPermission($role=null,$permission=null,$params=[])
    {
        if($role===null)
        {
            $role = LuLu::getIdentity()->role;
        }
        if($permission===null)
        {
            $m= LuLu::getApp()->controller->module->id;
            $c= LuLu::getApp()->controller->id;
            $permission = empty($m) ?  $c: $m . '/' . $c;
        }
         
        $rows = $this->getPermissionsByRole($role);
        
        if(!isset($rows[$permission]))
        {
            return false;
        }
        
        return $this->executeRule($role, $rows[$permission],$params);
    }
   
    private function executeRule($role,$permission,$params=[])
    {
        $ruleClass = $permission['rule'];
        $ruleClass='\source\modules\rbac\rules\\'.$ruleClass;
        
        $ruleInstance = new $ruleClass();
        return $ruleInstance->execute($role,$permission,$params);
    }
}
