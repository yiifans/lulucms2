<?php

namespace app\modules\rbac;

use yii\base\Component;
use app\modules\rbac\models\Role;
use app\modules\rbac\models\Assignment;
use app\modules\rbac\models\Permission;
use app\modules\rbac\models\Relation;
use yii\db\Query;

class RbacManager extends Component
{

	public $assignmentTable;
	public $roleTable;
	public $permissionTable;
	public $relationTable;
	
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        
        $this->assignmentTable=Assignment::tableName();
        $this->roleTable=Role::tableName();
        $this->permissionTable=Permission::tableName();
        $this->relationTable=Relation::tableName();
    }
    
    private function buildOn($left,$right)
    {
    	return $left[0].'.'.$left[1].' = '.$right[0].'.'.$right[1];
    }
    
    public function getRolesByUser($user)
    {
    	$on = $this->buildOn([$this->roleTable,'key'], [$this->assignmentTable,'role']);
    	
    	$query = Role::find()->innerJoin($this->assignmentTable,$on);
    	$query->andWhere([$this->assignmentTable.'.user'=>$user]);
    	return $query->all();
    }
    

    
    public function getPermissionsByUser($user)
    {
    	$query = new Query();
    	$query->select(['r.permission','r.value','p.form']);
    	$query->from([$this->relationTable.' as r',$this->permissionTable.' as p',$this->assignmentTable.' as a']);
    	$query->where('r.permission=p.key and r.role=a.role');
    	$query->andWhere(['a.user'=>$user]);
    	$rows = $query->all();
    	return $this->convertPermissionValue($rows);
    }
    
    public function getPermissionsByRole($role)
    {
    	$query = new Query();
    	$query->select(['r.permission','r.value','p.form']);
    	$query->from([$this->relationTable.' as r',$this->permissionTable.' as p']);
    	$query->where('r.permission=p.key');
    	$query->andWhere(['r.role'=>$role]);
    	$rows = $query->all();
    	return $this->convertPermissionValue($rows);
    }
    
    private function convertPermissionValue($rows)
    {
    	$ret = [];
    	if($rows===null)
    	{
    		return $ret;
    	}
    	foreach ($rows as $row)
    	{
    		$form = intval($row['form']);
    		$v=$row['value'];
    		if($form===Permission::Form_Boolean){
    			if($v==='1'||$v==='true'){
    				$v=true;
    			}
    			else{
    				$v=false;
    			}
    		}else if($form===Permission::Form_CheckboxList)
    		{
    			$v=explode(',', $v);
    		}
    		$ret[$row['permission']]=$v;
    	}
    	return $ret;
    }
    
    public function checkRole($user,$role)
    {
    	$rows = Assignment::findAll(['user'=>$user,'role'=>$role]);
    	if($rows===null)
    	{
    		return false;
    	}
    	
    	if(is_string($permission))
    	{
    		return true;
    	}
    	else
    	{
    		if(count($rows)===count($role))
    		{
    			return true;
    		}
    		$ret=[];
    		foreach ($role as $t)
    		{
    			$found=false;
    			foreach ($rows as $row)
    			{
    				if($t===$row['role'])
    				{
    					$found=true;
    					break;
    				}
    			}
    			if(!$found)
    			{
    				$ret[]=$t;
    			}
    		}
    		return $ret;
    	}
    }
    
    public function checkPermission($user,$permission)
    {
    	$query = new Query();
    	$query->select(['r.permission','r.value','p.form']);
    	$query->from([$this->relationTable.' as r',$this->permissionTable.' as p',$this->assignmentTable.' as a']);
    	$query->where('r.permission=p.key and r.role=a.role');
    	$query->andWhere(['a.user'=>$user,'r.permission'=>$permission]);
    	$rows = $query->all();
    	if($rows===null)
    	{
    		return false;
    	}
    	
    	if(is_string($permission))
    	{
    		return true;
    	}
    	else
    	{
    		if(count($rows)===count($permission))
    		{
    			return true;
    		}
    		$ret=[];
    		foreach ($permission as $p)
    		{
    			$found=false;
    			foreach ($rows as $row)
    			{
    				if($t===$row['permission'])
    				{
    					$found=true;
    					break;
    				}
    			}
    			if(!$found)
    			{
    				$ret[]=$t;
    			}
    		}
    		return $ret;
    	}
    }
    
    public function canExecute($user,$permission,$validate=null)
    {
    	$query = new Query();
    	$query->select(['r.permission','r.value','p.form']);
    	$query->from([$this->relationTable.' as r',$this->permissionTable.' as p',$this->assignmentTable.' as a']);
    	$query->where('r.permission=p.key and r.role=a.role');
    	$query->andWhere(['a.user'=>$user,'r.permission'=>$permission]);
    	$rows = $query->all();
    	
    	if($rows===null)
    	{
    		return false;
    	}
    	if($validate===null)
    	{
    		$validate=function ($p,$v){
    			if(is_bool($v))
    			{
    				return $v;
    			}
    		};
    	}
    	$ret = true;
    	foreach ($rows as $row)
    	{
    		$form = intval($row['form']);
    		$v=$row['value'];
    		if($form===Permission::Form_Boolean){
    			if($v==='1'||$v==='true'){
    				$v=true;
    			}
    			else{
    				$v=false;
    			}
    		}else if($form===Permission::Form_CheckboxList)
    		{
    			$v=explode(',', $v);
    		}
    		$ret = $ret && call_user_func($validate,$row['permission'],$v);
    	
    		//$ret[$row['permission']]=$v;
    	}
    	return $ret;
    		
    }
    
    
}
