<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace source\core\base;




use yii\rbac\DbManager;
class RbacManager extends DbManager
{
    public function addRole($role)
    {
    	return parent::addItem($role);
    }
    public function addPermission($permission)
    {
    	return parent::addItem($permission);
    }
    public function addRule($rule)
    {
    	return parent::addRule($rule);
    }
    public function addChild($parent, $child)
    {
    	return parent::addChild($parent, $child);
    }
}
