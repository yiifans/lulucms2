<?php
namespace source\modules\rbac;

use source\modules\rbac\models\Role;
use source\modules\rbac\models\Assignment;
use source\modules\rbac\models\Permission;
use source\modules\rbac\models\Relation;
use yii\db\Query;
use source\modules\rbac\models\Category;
use source\LuLu;
use source\core\front\FrontApplication;

class RbacService extends \source\core\modularity\ModuleService
{   
    private $assignmentTable;
    private $roleTable;
    private $permissionTable;
    private $relationTable;

    private $ruleNamespace='\source\modules\rbac\rules\\';
    
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
    
    public function getRolesByUser($user)
    {
        $query = new Query();
        $query->select([
            'r.id',
            'r.category',
            'r.name',
            'r.description',
            'r.is_system',
            'r.sort_num',
        ]);
        $query->from([
            'r'=>$this->roleTable,
            'a'=>$this->assignmentTable,
        ]);
        $query->where('r.id=a.role');
        $query->andWhere([
            'a.user' => $user
        ]);
        $rows = $query->indexBy('id')->all();
        return $rows;
    }

    public function getPermissionsByUser($user=null)
    {
        $query = new Query();
        $query->select([
            'p.id',
            'p.category',
            'p.name',
            'p.description',
            'p.form',
            'p.default_value',
            'p.rule',
            'p.sort_num',
            'r.role',
            'r.value',
        ]);
        $query->from([
            'p'=>$this->permissionTable,
            'r'=>$this->relationTable, 
            'a'=>$this->assignmentTable,
        ]);
        $query->where('p.id=r.permission and r.role=a.role');
        $query->andWhere([
            'a.user' => $user
        ]);
        $rows = $query->all();
        return $this->convertPermissionValue($rows);
    }

    public function getPermissionsByRole($role)
    {
        $query = new Query();
        $query->select([
            'p.id',
            'p.category',
            'p.name',
            'p.description',
            'p.form',
            'p.default_value',
            'p.rule',
            'p.sort_num',
            'r.role',
            'r.value',
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
            if ($form === Permission::Form_Boolean)
            {
                $v = ($row['value'] === '1' || $row['value'] === 'true') ? true : false;
            }
            else if ($form === Permission::Form_CheckboxList)
            {
                $v = explode(',', $row['value']);
            }
            else
            {
                $v = $row['value'];
            }
            $row['value'] = $v;
            $ret[$row['id']][] = $row;
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
   
  
    private function checkSkipActions()
    {
        if(empty($this->skipActions))
        {
            return false;
        }
        $actionId = LuLu::getApp()->requestedAction->uniqueId;
        if(LuLu::getApp() instanceof FrontApplication )
        {
            $actionId='home_'.$actionId;
        }
        return in_array($actionId, $this->skipActions);
    }
    
    private function executeRule($user,$permission,$params=[])
    {
        if(is_array($permission))
        {
            foreach ($permission as $v)
            {
                $ruleClass=$this->ruleNamespace.$v['rule'];
    
                $ruleInstance = new $ruleClass();
                $ret = $ruleInstance->execute($user,$v,$params);
                if($ret===true)
                {
                    return true;
                }
            }
        }
        else
        {
            $ruleClass=$this->ruleNamespace.$permission['rule'];
    
            $ruleInstance = new $ruleClass();
            return $ruleInstance->execute($user,$permission,$params);
        }
    
    }
}
